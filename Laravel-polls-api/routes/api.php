<?php

use App\Models\Question;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getUsers', function () {
    function trythis($item) {
        $answers_array = Vote::where('user_id', $item['id'])->get()->map->only(['question_id', 'option'])->toArray();
        $answers_assoc = [];
        foreach ($answers_array as $answer) {
            $answers_assoc[$answer['question_id']] = $answer['option'];
        }
        $item['answers'] = $answers_assoc;

        $questions = Question::where('user_id', $item['id'])->get()->map(function ($question){
            return $question->toArray()['id'];
        })->toArray();
        $item['questions'] = $questions;

        return $item;
    }

    $users_array = array_map('trythis', User::all()->toArray());
    $users = [];
    foreach ($users_array as $user) {
        $users[$user['id']] = $user;
    };
    return $users;
});

Route::get('/getQuestions', function () {
    $questions_array = Question::all()->map(function ($question) {
        $optionOneVotes = Vote::where([['question_id', $question->id], ['option', 'optionOne']])->get()->map(function ($vote) {
            return $vote->user_id;
        })->toArray();
        $question['optionOneVotes'] = $optionOneVotes;

        $optionTwoVotes = Vote::where([['question_id', $question->id], ['option', 'optionTwo']])->get()->map(function ($vote) {
            return $vote->user_id;
        })->toArray();
        $question['optionTwoVotes'] = $optionTwoVotes;
        
        return $question;
    });

    $questions = [];
    foreach($questions_array as $question) {
        $questions[$question->id] = $question;
    }

    return $questions;
});

Route::post('/createQuestion', function (Request $request) {
    $request->validate([
        'user_id' => 'required',
        'optionOneText' => 'required',
        'optionTwoText' => 'required',
    ]);
    
    $question = Question::create([
        'user_id' => $request->user_id,
        'optionOneText' => $request->optionOneText,
        'optionTwoText' => $request->optionTwoText,
    ]);

    return $question;
});

Route::post('/createUser', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'password' => 'required',
        'id' => 'required',
    ]);

    User::create([
        'name' => $request->name,
        'password' => $request->password,
        'id' => $request->id,
    ]);

    return User::all();
});

Route::post('/addVote', function (Request $request) {
    $request->validate([
        'question_id' => 'required',
        'user_id' => 'required',
        'option' => 'required',
    ]);
    $isExist = Vote::where([['question_id', $request->question_id], ['user_id', $request->user_id]])->get();
    if (count($isExist) !== 0) {
        return throw new Exception("Vote already exists", 404);
    } else {
        Vote::create([
            'question_id' => $request->question_id,
            'user_id' => $request->user_id,
            'option' => $request->option,
        ]);
        return ["success"];
    }
});

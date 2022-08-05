<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Question;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 'sarahedo',
            'name' => 'Sarah Edo',
            'password' => 'password123',
            'avatarURL' => 'https://cdn.pixabay.com/photo/2016/08/28/13/12/secondlife-1625903_960_720.jpg',
        ]);

        User::create([
            'id' => 'tylermcginnis',
            'name' => 'Tyler McGinnis',
            'password' => 'abc321',
            'avatarURL' => 'https://cdn.pixabay.com/photo/2016/10/07/12/35/man-1721463_960_720.png',
        ]);

        User::create([
            'id' => 'mtsamis',
            'name' => 'Mike Tsamis',
            'password' => 'xyz123',
            'avatarURL' => 'https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png',
        ]);

        User::create([
            'id' => 'zoshikanlu',
            'name' => 'Zenobia Oshikanlu',
            'password' => 'pass246',
            'avatarURL' => 'https://cdn.pixabay.com/photo/2016/12/07/21/01/cartoon-1890438_960_720.jpg',
        ]);

        Question::create([
            'user_id' => 'sarahedo',
            'optionOneText' => 'Build our new application with Javascript',
            'optionTwoText' => 'Build our new application with Typescript',
        ]);

        Question::create([
            'user_id' => 'mtsamis',
            'optionOneText' => 'hire more frontend developers',
            'optionTwoText' => 'hire more backend developers',
        ]);

        Question::create([
            'user_id' => 'sarahedo',
            'optionOneText' => 'conduct a release retrospective 1 week after a release',
            'optionTwoText' => 'conduct release retrospectives quarterly',
        ]);

        Question::create([
            'user_id' => 'tylermcginnis',
            'optionOneText' => 'have code reviews conducted by peers',
            'optionTwoText' => 'have code reviews conducted by managers',
        ]);

        Question::create([
            'user_id' => 'tylermcginnis',
            'optionOneText' => 'take a course on ReactJS',
            'optionTwoText' => 'take a course on unit testing with Jest',
        ]);

        Question::create([
            'user_id' => 'mtsamis',
            'optionOneText' => 'deploy to production once every two weeks',
            'optionTwoText' => 'deploy to production once every month',
        ]);

        Vote::create([
            'question_id' => '1',
            'user_id' => 'sarahedo',
            'option' => 'optionOne',
        ]);

        Vote::create([
            'question_id' => '2',
            'user_id' => 'sarahedo',
            'option' => 'optionOne',
        ]);

        Vote::create([
            'question_id' => '3',
            'user_id' => 'sarahedo',
            'option' => 'optionTwo',
        ]);

        Vote::create([
            'question_id' => '4',
            'user_id' => 'sarahedo',
            'option' => 'optionTwo',
        ]);

        Vote::create([
            'question_id' => '5',
            'user_id' => 'tylermcginnis',
            'option' => 'optionOne',
        ]);

        Vote::create([
            'question_id' => '6',
            'user_id' => 'tylermcginnis',
            'option' => 'optionTwo',
        ]);

        Vote::create([
            'question_id' => '6',
            'user_id' => 'mtsamis',
            'option' => 'optionOne',
        ]);

        Vote::create([
            'question_id' => '5',
            'user_id' => 'mtsamis',
            'option' => 'optionTwo',
        ]);

        Vote::create([
            'question_id' => '2',
            'user_id' => 'mtsamis',
            'option' => 'optionOne',
        ]);

        Vote::create([
            'question_id' => '6',
            'user_id' => 'zoshikanlu',
            'option' => 'optionOne',
        ]);
    }
}

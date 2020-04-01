<?php

use App\Post;
use App\User;
use App\Services;
use App\Comment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @param Faker $faker
	 * @return void
	 */
    public function run(Faker $faker)
    {
		$users = User::all();
		foreach ($users as $user) {
			foreach ($user->posts as $userPost) {
				for ($i=0; $i < 5; $i++) {
					$newComment = new Comment;

					$newComment->name = $faker->name;
					$newComment->email = $faker->email;
					$newComment->title = 'COMMENT_' . $i . '_' . $userPost->id . '_' . $user->id;
					$newComment->body = Services\Service::gimmeLittleLorem();
					$newComment->post_id = $userPost->id;

					$newComment->save();
				}
			}
		}
    }
}

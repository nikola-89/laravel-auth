<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Services;
use Illuminate\Support\Str;

	class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::all();
    	foreach ($users as $user) {
			for ($i=0; $i < 5; $i++) {
				$newPost = new Post;
				$newPost->title = 'POST_' . $i . '_' . $user->id;
				$newPost->body = Services\Service::gimmeLorem();
				$newPost->slug = Str::slug($newPost->title . '-' . $user->id);
				$newPost->user_id = $user->id;
				$newPost->save();
			}
		}
    }
}

<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller {

	private $validateCommentRules;

	public function __construct()
	{
		$this->validateCommentRules = [
			'name' => 'required|string|max:50',
			'email' => 'required|email|max:80',
			'title' => 'required|string|max:100',
			'body' => 'required|string|max:200',
			'post_id' => 'required|numeric|exists:posts,id'
		];
	}

    public function store(Request $request) {

		$request->validate($this->validateCommentRules);
		$data = $request->all();

		$comment = new Comment;
		$comment->fill($data);

		$saved = $comment->save();

		if (!$saved) {
			return redirect()->back();
		}

		return redirect()->route('posts.show', $comment->post->slug);
	}
}

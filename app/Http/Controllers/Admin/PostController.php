<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Factory|View
	 */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('admin.posts.index', compact('posts'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return void
	 */
    public function create()
    {
        //
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return void
	 */
    public function store(Request $request)
    {
        //
    }

	/**
	 * Display the specified resource.
	 *
	 * @param Post $slug
	 * @return Factory|View
	 */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
		return view('admin.posts.show', compact('post'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Post $post
	 * @return void
	 */
    public function edit(Post $post)
    {
        //
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Post $post
	 * @return void
	 */
    public function update(Request $request, Post $post)
    {
        //
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Post $post
	 * @return RedirectResponse
	 * @throws Exception
	 */
    public function destroy(Post $post)
    {
        if (empty($post)) {
        	abort('404');
		}
		$id = $post->id;
        $deleted = $post->delete();

        $data = [
			'type' => 'DELETE',
			'success' => $deleted,
			'id' => $id
		];

        return redirect()->route('admin.posts.index')->with('message', $data);


    }
}

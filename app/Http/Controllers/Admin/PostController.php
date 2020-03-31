<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Contracts\View\Factory;
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
	 * @param Post $post
	 * @return void
	 */
    public function show(Post $post)
    {
        //
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
	 * @return void
	 */
    public function destroy(Post $post)
    {
        //
    }
}

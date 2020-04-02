<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
	private $validatePostRules;

	public function __construct()
	{
		$this->validatePostRules = [
			'title' => 'required|string|max:255',
			'body' => 'required|string',
		];
	}

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
	 * @return Factory|View
	 */
    public function create()
    {
    	$tags = Tag::all();

        return view('admin.posts.create', compact('tags'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
    public function store(Request $request)
    {
    	$request->validate($this->validatePostRules);

		$data = $request->all();

		$userId = $this->user()->id;

		$newPost = new Post;
		$newPost->title = $data['title'];
		$newPost->body = $data['body'];
		$newPost->user_id = $userId;

		$saved = $newPost->save();

		if (!empty($data['tags'])) {
			$newPost->tags()->sync($data['tags']);
		}

		$data = [
			'type' => 'CREATE',
			'success' => $saved,
			'id' => $newPost->id
		];

		return redirect()->route('admin.posts.index')->with('message', $data);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param $slug
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
	 * @param $slug
	 * @return Factory|View
	 */
    public function edit($slug)
    {
		$post = Post::where('slug', $slug)->first();
		$tags = Tag::all();

		$data = [
			'post' => $post,
			'tags' => $tags
		];

		return view('admin.posts.edit', $data);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Post $post
	 * @return RedirectResponse
	 */
    public function update(Request $request, Post $post)
    {

    	if (empty($post)) {

			$data = [
				'type' => 'EDIT',
				'success' => false,
				'id' => 'UNKNOWN',
				'sms' => 'MISSING DATA'
			];

			return redirect()->route('admin.posts.index')->with('message', $data);
		}

		$userId = $this->user()->id;

    	if ($userId != $post->user->id) {

			$data = [
				'type' => 'EDIT',
				'success' => false,
				'id' => $post->id,
				'sms' => 'USER MISMATCH'
			];

			return redirect()->route('admin.posts.index')->with('message', $data);

		}

		$request->validate($this->validatePostRules);

		$data = $request->all();

		$post->title = $data['title'];
		$post->body = $data['body'];
		$post->updated_at = Carbon::now()->setTimezone('Europe/Zurich');

		$updated = $post->update();

		if (!empty($data['tags'])) {
			$post->tags()->sync($data['tags']);
		}

		$data = [
			'type' => 'EDIT',
			'success' => $updated,
			'id' => $post->id
		];

		return redirect()->route('admin.posts.index')->with('message', $data);
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

			$data = [
				'type' => 'DELETE',
				'success' => false,
				'id' => 'UNKNOWN',
				'sms' => 'MISSING DATA'
			];

			return redirect()->route('admin.posts.index')->with('message', $data);
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

    // ---------------------------------------------------------------------------------

	private function user()
	{
		return Auth::user();
	}

	// ---------------------------------------------------------------------------------
}

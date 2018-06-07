<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(25);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:255',
            ]);

            Post::create([
                'title'   => $request->get('title'),
                'content' => $request->get('content'),
                'state'   => $request->get('state'),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('admin-posts')->with('success', 'Post added!');
        }

        return view('admin.posts.add');
    }

    public function edit(Post $post, Request $request)
    {
        if ($request->isMethod('post')) {
            $toUpdate = [];

            foreach (['title','content', 'state'] as $key) {
                $toUpdate[$key] = $request->get($key);
            }

            $validator = Validator::make($toUpdate, [
                'title' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $post->update($toUpdate);

            return redirect()->route('admin-posts')->with('success', 'Post changed!');
        }

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function del($id)
    {
        Post::destroy($id);

        return redirect()->route('admin-posts')->with('undo', 'post:' . $id); // TODO: add undo feature
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();

        return redirect()->back();
    }
}

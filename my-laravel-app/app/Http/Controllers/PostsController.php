<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  // Modelの名前空間を指定
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index() {
      // return "hello";

      // $posts = \App\Post::all();
      // $posts = Post::all();
      // $posts = Post::orderBy('created_at', 'desc')->get();
      $posts = Post::latest()->get();

// dd($posts->toArray()); // dump die

      // return view('posts.index');
      // return view('posts.index', ['posts' => $posts]);
      return view('posts.index')->with('posts', $posts);
    }


    // public function show($id) {
    public function show(Post $post) {
      // $post = Post::find($id);
      // $post = Post::findOrFail($id);  // データが見つからなかった場合、例外を返す。

      return view('posts.show')->with('post', $post);
    }

    public function create() {
      return view('posts.create');
    }


    /**
     * Validation 用のクラスを作成しない場合
     *
     * @return 
     */
    // public function store(Request $request) {
    //   $this->validate($request, [
    //     'title' => 'required|min:3',
    //     'body' => 'required'
    //   ]);
    //   $post = new Post();
    //   $post->title = $request->title;
    //   $post->body = $request->body;
    //   $post->save();
    //   return redirect('/');
    // }

    /**
     * use Validation Request
     *
     * @return 
     */
    public function store(PostRequest $request) {
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }

    public function edit(Post $post) {
      return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post) {
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }

    public function destroy(Post $post) {
      $post->delete();
      return redirect('/');
    }

}
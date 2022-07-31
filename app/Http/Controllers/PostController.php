<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortDesc();

        return view('articles', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formCreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|max:30',
        //     'content' => 'required',
        // ]);

        // dd($message);

        // if ($validator->fails()) {
        //     dd($validator);
        //     return back()->withErrors($validator)->withInput();
        // }

        $newPost = new Post;
        // dd($newPost);

        $newPost->title = $request->input('title');
        $newPost->content = $request->input('content');

        // dd($newPost);
        // dd($error);
        $newPost->save();

        // // test with method create but don't work
        // Post::created([
        //     "title" => $request->title,
        //     "content" => $request->content,
        // ]);

        return redirect('/')->with('success', 'Post créer avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $posts = [
        //     1 => 'Titre 1',
        //     2 => 'Titre 2',
        // ];

        // to avoid processing error 404, we put findOrFail()
        // $post = Post::findOrFail($id);

        $post = Post::find($id);

        // dd($post->comments());
        // $post = $post[$id] ?? 'Cette article n\'existe pas';

        return view('post', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('formCreatePost', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            "title" => $request->title,
            "content" => $request->content
        ]);

        return redirect('/')->with('success', 'Modification validée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('success', 'Suppression validée');
    }
}

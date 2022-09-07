<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

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

    public function search(Request $request)
    {
        $posts = Post::all()->sortDesc();

        // SELECT posts.title, posts.content FROM `posts` WHERE posts.created_at BETWEEN '2022-07-10' AND '2022-07-30'

        if ($request->searchDate != null && $request->searchDate2 != null) {
            $query = $posts->whereBetween('created_at', [$request->searchDate, $request->searchDate2]);
            $posts = $query;
        };

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
        Post::create([
            "title" => $request->title,
            "content" => $request->content,
        ]);

        // $newPost = new Post;
        // dd($newPost);

        // $newPost->title = $request->input('title');
        // $newPost->content = $request->input('content');
        // $newPost->save();

        return redirect('/')->with('success', 'Post créer avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('formCreatePost', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/')->with('success', 'Modification validée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $comment = Comment::where('post_id', '=', $id);
        if ($comment) {
            $comment->delete();
        }
        $post->delete();

        return redirect('/')->with('success', 'Suppression validée');
    }
}

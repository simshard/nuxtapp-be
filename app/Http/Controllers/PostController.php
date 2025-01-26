<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

// use App\Http\Requests\StorePostRequest;
// use App\Http\Requests\UpdatePostRequest;

 

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     
    public function index()
    {
        return Post::with('user:id,name')->latest()->get();
        return  Post::with('user:id,name')->latest()->get();
    }
  



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //sleep(3);
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        return Post::create([
            'title' => $request->title,
            'content' => $request->content,
            //'user_id' => 1, // consider dynamically assigning user_id
            'user_id' => rand(1, 21),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->load('user:id,name');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Display form for editing the post
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        $post->update($request->only(['title', 'content']));

        return $post;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
        //
    }
}
/******  d72efcb9-c3c6-4f40-bb24-40c80f8739db  *******/

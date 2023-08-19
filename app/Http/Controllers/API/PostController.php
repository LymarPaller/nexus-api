<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        return PostResource::make(
            Post::create([
                'post_description' => $request->postDescription,
                'img_post' => $request->imgPost,
                'date_created' => $request->dateCreated,
                'user_id' => $request->userId,
            ])
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return PostResource::make(($post));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if(isset($request->postDescription)) {
            $post->post_description = $request->postDescription;
        }
        if(isset($request->imgPost)) {
            $post->img_post = $request->imgPost;
        }
        if(isset($request->dateCreated)) {
            $post->date_created = $request->dateCreated;
        }
        if(isset($request->userId)) {
            $post->user_id = $request->userId;
        }

        $post->save();
        return PostResource::make($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'sucess' => true,
            'message' => 'Successfully Deleted'
        ]);
    }
}

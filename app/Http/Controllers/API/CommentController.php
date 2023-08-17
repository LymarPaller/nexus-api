<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Comment::query();

        if (isset($request->postId)) {
            $query->where('post_id', $request->postId);
        }
        return CommentResource::collection($query->get());
        // return CommentResource::collection(Comment::all());
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
    public function store(CommentStoreRequest $request)
    {
        return CommentResource::make(
            Comment::create([
                 'comment_description' => $request->commentDescription,
                 'date_commented' => $request->dateCommented,
                 'user_id' => $request->userId,
                 'post_id' => $request->postId,
            ])
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return CommentResource::make(($comment));
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
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        if(isset($request->commentDescription)) {
            $comment->comment_description = $request->commentDescription;
        }
        if(isset($request->dateCommented)) {
            $comment->date_commented = $request->dateCommented;
        }
        if(isset($request->userId)) {
            $comment->user_id = $request->userId;
        }
        if(isset($request->postId)) {
            $comment->post_id = $request->postId;
        }


        $comment->save();

        return CommentResource::make($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

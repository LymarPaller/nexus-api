<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeStoreRequest;
use App\Http\Requests\LikeUpdateRequest;
use App\Http\Resources\LikeResource;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LikeResource::collection(Like::all());
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
    public function store(LikeStoreRequest $request)
    {
        return LikeResource::make(
            Like::create([
                'like_id' => $request->likeId,
                'post_id' => $request->postId,
            ])
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        return LikeResource::make(($like));
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
    public function update(LikeUpdateRequest $request, Like $like)
    {
        if(isset($request->likeId)) {
            $like->like_id = $request->likeId;
        }
        if(isset($request->postId)) {
            $like->post_id = $request->postId;
        }

        $like->save();

        return LikeResource::make($like);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

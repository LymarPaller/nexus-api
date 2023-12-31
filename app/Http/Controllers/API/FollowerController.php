<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowerStoreRequest;
use App\Http\Requests\FollowerUpdateRequest;
use App\Http\Resources\FollowerResource;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = Follower::query();

        if (isset($request->followUserId)) {
            $query->where('follow_user_id', $request->followUserId);
        }
        return FollowerResource::collection($query->get());
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
    public function store(FollowerStoreRequest $request)
    {
        return FollowerResource::make(
            Follower::create([
                'follow_user_id' => $request->followUserId,
                'follower_user_id' => $request->followerUserId,
            ])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Follower $follower)
    {
        return FollowerResource::make(($follower));
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
    public function update(FollowerUpdateRequest $request, Follower $follower)
    {
        if(isset($request->followUserId)) {
            $follower->follow_user_id = $request->followUserId;
        }
        if(isset($request->followerUserId)) {
            $follower->follower_user_id = $request->followerUserId;
        }

        $follower->save();

        return FollowerResource::make($follower);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follower $follower)
    {
        $follower->delete();

        return response()->json([
            'sucess' => true,
            'message' => 'Successfully Deleted'
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = User::query();

        if (isset($request->username)) {
            $query->where('username', $request->username);
        }
        return UserResource::collection($query->get());
        // return UserResource::collection(User::all());
        // return UserResource::collection(User::paginate());
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
    public function store(UserStoreRequest $request)
    {
        return UserResource::make(
            User::create([
                 'name' => $request->name,
                 'username' => $request->username,
                 'password' => bcrypt($request->password), 
                 'email' => $request->email,
                 'profile_photo' => $request->profilePhoto,
                 'cover_photo' => $request->coverPhoto,
                 'city' => $request->city,
                 'websites' => $request->websites,
                 'introduction' => $request->introduction,
                 'company' => $request->company,
            ])
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make(($user));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

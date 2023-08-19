<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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

    
    //  public function show(User $user)
    //  {
    //      return UserResource::make(($user));
    //  }

    public function show($username)
    {
        $user = User::firstWhere('username', $username);
        // return User::firstWhere('username', $username);
        return UserResource::make(($user));
    }

    // public function show(User $query)
    // {
    //     return User::firstWhere('username', $query);
    //     // return UserResource::make(($user));
    //     // return UserResource::make(($user));
    // }

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
    public function update(UserUpdateRequest $request, User $user)
    {
        if(isset($request->name)) {
            $user->name = $request->name;
        }
        if(isset($request->username)) {
            $user->username = $request->username;
        }
        if(isset($request->password)) {
            $user->password = $request->password;
        }
        if(isset($request->email)) {
            $user->email = $request->email;
        }
        if(isset($request->profilePhoto)) {
            $user->profile_photo = $request->profilePhoto;
        }
        if(isset($request->coverPhoto)) {
            $user->cover_photo = $request->coverPhoto;
        }
        if(isset($request->city)) {
            $user->city = $request->city;
        }
        if(isset($request->websites)) {
            $user->websites = $request->websites;
        }
        if(isset($request->introduction)) {
            $user->introduction = $request->introduction;
        }
        if(isset($request->company)) {
            $user->company = $request->company;
        }

        $user->save();

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'sucess' => true,
            'message' => 'Successfully Deleted'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)){
            $user = User::where('username', $request->username)->first();

            $token = $user->createToken('token', ['getUsers']);

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'profilePhoto' => $user->profile_photo,
                    'coverPhoto' => $user->cover_photo,
                    'city' => $user->city,
                    'websites' => $user->websites,
                    'introduction' => $user->introduction,
                    'company' => $user->company,
                    'token' => $token->plainTextToken
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Username and password does not match',
            ]);
        }
    }
}

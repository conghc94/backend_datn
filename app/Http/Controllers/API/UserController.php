<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Register success',
        ]);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong email or password.'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'data' => ['token' => $token]
        ]);
    }

    public function getUserDetails(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return response()->json([
            'success' => true,
            'message' => 'Get user details success',
            'data' => ['user' => $user]
        ]);
    }
}

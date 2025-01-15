<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{   
    // set csrf cookie
    public function csrfCookie(Request $request)
    {
        return response()->json(['message' => 'CSRF cookie set']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // find username in database
        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            // username check
            return response()->json(['error' => 'Invalid Username'], 401);
        }

        // attempt to authenticate user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user], 200);
        }

        // unable to authenticate invalid password
        return response()->json(['error' => 'Invalid Password'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
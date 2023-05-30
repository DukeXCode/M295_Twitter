<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return ['token' => $request->user()->createToken('auth-token')->plainTextToken];
        }
        return response()->json(['errors' => ['general' => 'E-Mail oder Passwort falsch.']], 422);
    }

    public function checkAuth(Request $request)
    {
        return UserResource::make($request->user());
    }

    public function logout(Request $request)
    {
        if ($request->user() == null) {
            return response()->json(['errors' => 'not logged in'], 401);
        }
        $request->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }
}

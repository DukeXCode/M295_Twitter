<?php

namespace App\Http\Controllers;

use App\Http\Resources\TweetResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id)
    {
        return UserResource::make(User::find($id));
    }

    public function tweets(int $id)
    {
        $tweets = User::find($id)->tweets()->latest()->take(10)->get();
        return ['data' => TweetResource::collection($tweets)];
    }
}

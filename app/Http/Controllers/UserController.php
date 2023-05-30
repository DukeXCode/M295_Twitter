<?php

namespace App\Http\Controllers;

use App\Http\Resources\TweetResource;
use App\Http\Resources\UserResource;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return UserResource::make($user);
    }

    public function tweets(User $user)
    {
        $tweets = $user->tweets()->latest()->take(10)->get();
        return ['data' => TweetResource::collection($tweets)];
    }
}

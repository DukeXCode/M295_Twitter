<?php

namespace App\Http\Controllers;

use App\Http\Resources\TweetResource;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::with('user')->latest()->take(100)->get();
        return TweetResource::collection($tweets);
    }

    public function like(Tweet $tweet)
    {
        $tweet->update(['likes' => $tweet->likes + 1]);
        return TweetResource::make($tweet);
    }
}

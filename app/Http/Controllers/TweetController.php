<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::latest()->take(100)->get();
        $tweets = $tweets->map(function ($tweet) {
            $tweet->user = [
                'id' => $tweet->user->id,
                'name' => $tweet->user->name
            ];
            return $tweet;
        });
        return ['data' => $tweets];
    }
}

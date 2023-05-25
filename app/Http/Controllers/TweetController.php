<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::all();
        $tweets = $tweets->map(function ($tweet) {
            $tweet->user = [
                'name' => 'Franzi Musterfrau'
            ];
            return $tweet;
        });
        return ['data' => $tweets];
    }
}
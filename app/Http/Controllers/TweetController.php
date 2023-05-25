<?php

namespace App\Http\Controllers;

use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::latest()->take(100)->get();
        return TweetResource::collection($tweets);
    }
}

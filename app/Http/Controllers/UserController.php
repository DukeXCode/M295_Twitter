<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id)
    {
        return ['data' => User::find($id)->first()];
    }
}

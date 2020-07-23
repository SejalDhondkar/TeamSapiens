<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return $user;
    }


}

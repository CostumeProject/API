<?php

namespace App\Http\Controllers;
use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // Allow to login a user
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        return User::login($request);
    }

    // Return a bool if a user is logged in
    public function isLogged()
    {
        return 'isLogged';
    }
}

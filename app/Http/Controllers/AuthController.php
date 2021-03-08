<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $request = request()->validate([
            "email" => "required|email",
            "password" => "required",
        ]);


        $user = User::where("email", request('email'))->first();

        if (Hash::check(request('password'), $user->password)) {
            return response()->json([
                'access_token' => $user->createToken("auth-token")->plainTextToken
            ]);
        } else {
            return response()->json([
                'error' => "Invalid email or password"
            ], 400);
        }
    }

    public function register()
    {
        $request = request()->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|min:6'
        ]);

        $user = User::create([
            "name" => request("name"),
            "email" => request("email"),
            "password" => Hash::make(request("password"))
        ]);

        return response()->json($user);
    }
}

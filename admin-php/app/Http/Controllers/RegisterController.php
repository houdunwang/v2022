<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return $user;
    }
}

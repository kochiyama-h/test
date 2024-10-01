<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Loginrequest;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('/login');
        
    }

    public function login(LoginRequest $request)    
    {
        $user = $request->only('email', 'password');
        return redirect('/admin');
    }
}

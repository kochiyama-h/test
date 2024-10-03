<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Loginrequest;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
//     public function index()
// {
//     return view('auth.register'); // 登録フォームのビューを表示
// }


public function registerForm()
    {
        return view('auth.register'); // 登録フォームのビューを返す
    }

//登録処理
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('/login');
        
    }

    public function loginForm()
    {
        return view('auth.login'); // ログインフォームのビューを返す
    }

    public function login(LoginRequest $request)    
    {
        $user = $request->only('email', 'password');
        return redirect('/admin');
    }

    // public function index()
    // {
    //     // 7件ずつ表示
    //     $users = User::paginate(7);
    //     return view('auth.index', compact('users'));
    // }
}

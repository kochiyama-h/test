<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Loginrequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
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
        // 認証を試みる
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/admin');
        }

        // 認証に失敗した場合
        return redirect()->back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput($request->only('email'));




        // $user = $request->only('email', 'password');
        // return redirect('/admin');
    }

    
}

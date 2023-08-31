<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('contacts.login', ['errorMessage' => null]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                // ログイン成功時の処理
                return redirect()->route('contacts.index'); // 登録ページにリダイレクトする
            } else {
                return back()->withErrors(['email' => 'ログインに失敗しました']);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::channel('login')->error($e->getMessage());
            return back()->withErrors(['email' => 'ログイン時にエラーが発生しました']);
        }
    }

    public function resetPasswordLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                // ログイン成功時の処理（パスワードリセット後）
                return redirect()->route('reset-success'); // リセット成功時のリダイレクト先を適宜変更
            } else {
                return back()->withErrors(['email' => 'ログインに失敗しました']);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::channel('login')->error($e->getMessage());
            return back()->withErrors(['email' => 'ログイン時にエラーが発生しました']);
        }
    }

}

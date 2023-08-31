<?php

// app/Http/Controllers/LogoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    public function showLogoutForm()
    {
        return view('contacts.logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('index')->with('message', 'ログアウトしました');
    }
}

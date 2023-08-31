<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
public function showResetForm(Request $request)
{
$email = $request->input('email'); // URLからメールアドレスを取得
return view('contacts.reset', compact('email')); // ビューに変数を渡す
}

public function processReset(Request $request)
{
$request->validate([
'email' => 'required|email',
'password' => 'required|min:8|confirmed',
]);

$user = User::where('email', $request->email)->first();

if (!$user) {
return back()->withErrors(['email' => 'ユーザーが存在しないか、メールアドレスが無効です。']);
}

// パスワードを変更
$user->password = Hash::make($request->password);
$user->save();

// リセット成功時のリダイレクト
return redirect()->route('reset-success');
}
public function resetSuccess(Request $request)
{
// リセット成功時の処理
// 例えば、リセット成功メッセージの表示など
return view('contacts.reset-success');
}
public function showResetSuccess()
{
    return view('contacts.reset-success');
}

// 他のメソッドを定義
}

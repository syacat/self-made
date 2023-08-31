<!-- web.php -->
<?php

use App\Models\Contacts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PersonalController;

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ContactsController@index')->name('index');



// 'final'ルートを定義し、GETとPOSTメソッドをサポートする
Route::match(['get', 'post'], '/final', function () {
  return view('contacts.final');
});
Route::get('/contacts/header', function () {
  return view('contacts.header');
});
// 編集が完了したらfinal.blade.phpにリダイレクトする
Route::get('/contacts/final', function () {
  return view('contacts.final');
})->name('contacts.final');

// 新規登録
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 新規登録成功
Route::get('/contacts./register_success', [RegisterController::class, 'showRegistrationSuccess'])->name('contacts.register_success');

// ログインフォームを表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('/login', [LoginController::class, 'login']);

// ホームにリダイレクト
Route::get('/contacts/index', [ContactsController::class, 'index'])->name('contacts.index');

// ログアウトフォームを表示
Route::get('/logout', 'LogoutController@showLogoutForm')->name('logout.form');
Route::post('/logout', 'LogoutController@logout')->name('logout');

// リセットフォーム表示
Route::get('/reset', 'PasswordResetController@showResetForm')->name('reset');

// リセットフォームの送信処理
Route::post('/reset', 'PasswordResetController@processReset')->name('process-reset');

// リセット成功
Route::get('/reset-success', 'PasswordResetController@showResetSuccess')->name('reset-success');


// パーソナルカラー診断結果表示
Route::get('/personal', [PersonalController::class, 'index'])->name('personal');
Route::post('/personal', [PersonalController::class, 'submit'])->name('personal.submit'); // フォーム送信用のルート

Route::post('/color_result', [PersonalController::class, 'showResult'])->name('color_result');
Route::get('/color_result', [PersonalController::class, 'showResult'])->name('color_result_get');

// マイページのルート

Route::get('/my-page', [MyPageController::class, 'show'])->name('my-page');


// いいねボタンのルート
Route::post('/like/{result_id}', [LikeController::class, 'like'])->name('like');


// 削除
Route::delete('/delete-result/{id}', [MyPageController::class, 'deleteResult'])->name('delete-result');

<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('contacts.register');
    }

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            $formData = [
                'name' => $request->input('name'),  // 名前を追加
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
    // ユーザー登録データをログに出力
    // \Log::info('Register Data:', $formData);

            $result = $this->create($formData);

            if ($result) {
                return redirect()->route('contacts.register_success');
            } else {
                return back()->withErrors(['error' => 'データベースの登録に失敗しました。']);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors(['error' => 'エラーが発生しました。']);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $hashedPassword = Hash::make($data['password']);

        $result = DB::table('users')->insert([
            'name' => $data['name'],  // 名前を追加
            'email' => $data['email'],
            'password' => $hashedPassword,
        ]);

        return $result;
    }

    public function showRegistrationSuccess()
    {
        return view('contacts.register_success');
    }
}

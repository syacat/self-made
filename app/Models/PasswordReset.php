<?php

// app/Models/PasswordReset.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $table = 'password_resets'; // テーブル名を指定

    protected $primaryKey = 'email'; // 主キーをメールアドレスに設定

    public $incrementing = false; // プライマリーキーは自動増分しない

    public $timestamps = false; // タイムスタンプを使用しない

    protected $fillable = ['email', 'token', 'created_at']; // 可変項目

    // ユーザーとの関連を定義
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class PasswordReset extends Model
// {
//     use HasFactory;

//     // テーブル名を指定
//     protected $table = 'password_resets';

//     // 主キーの指定（通常はIDですが、このテーブルではemailを主キーとします）
//     protected $primaryKey = 'email';

//     // プライマリーキーが自動増分でない場合はfalseを指定
//     public $incrementing = false;

//     // タイムスタンプを使用しない場合はfalseを指定
//     public $timestamps = false;

//     // 可変項目（fillable）の指定
//     // PasswordReset モデル内
// protected $fillable = ['email', 'token', 'created_at'];


//      // 外部キーの関連を定義
//      public function user()
//      {

//          return $this->belongsTo(User::class, 'email', 'email');
//      }
// }

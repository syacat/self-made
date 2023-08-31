<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal'; // テーブル名が正しく指定されていることを確認
    protected $fillable = [
        'user_id',
        'season',
        'color_image',
        'result_image',
        'created_at',
        'updated_at',
    ];

    // 他にも関連するメソッドやリレーションシップを定義することができます
}

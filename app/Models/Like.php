<?php
// app/Models/Like.php
// app/Models/Like.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Like extends Model
{
    protected $fillable = [
        'personal_result_id',
    ];
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_result_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

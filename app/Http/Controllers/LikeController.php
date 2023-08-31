<?php
namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personal;

class LikeController extends Controller
{
    public function like($resultId)
    {
        $user = auth()->user();

        // すで編集しているか確認
        $existingLike = Like::where('personal_result_id', $resultId)
                            ->where('user_id', $user->id)
                            ->first();

        if (!$existingLike) {
            // 編集を新規作成
            $like = new Like();
            $like->personal_result_id = $resultId;
            $like->user_id = $user->id;
            $like->save();

            // ユーザーのパーソナルレコードを取得
            $personal = Personal::where('user_id', $user->id)
            ->where('id', $resultId)
            ->first();


            if ($personal) {
                $image = $personal->result_image;
                return redirect()->route('my-page')->with(['success' => 'いいねが保存されました', 'image' => $image]);
            }
        }

        return redirect()->route('my-page')->with('error', 'いいねが保存されませんでした');
    }
}

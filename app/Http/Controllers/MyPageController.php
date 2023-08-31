<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserImage;
use App\Models\Like;

class MyPageController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $images = $user->images;
        $likedResults = $user->likes;

        // \Log::info($likedResults);
        return view('contacts.my-page', compact('user', 'images', 'likedResults'));
    }

    public function storeImage(Request $request)
    {
        $colorBoxes = $request->input('color_boxes'); // 適切に背景色情報を取得

        $user = Auth::user();
        $user->color_boxes = $colorBoxes;
        $user->save();

        return redirect()->route('my-page')->with('success', '背景色情報が保存されました');
    }

    public function deleteResult($id)
    {
        $like = Like::find($id);
        if ($like) {
            // 該当するLikeレコードを削除
            $like->delete();
            return redirect()->route('my-page')->with('success', '診断結果が削除されました');
        } else {
            return redirect()->route('my-page')->with('error', '診断結果が見つかりません');
        }
    }


}

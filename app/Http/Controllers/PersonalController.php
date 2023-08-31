<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\Log;

class PersonalController extends Controller
{
    public function index()
    {
        return view('contacts.personal');
    }

public function submit(Request $request)
{
    // フォームデータを取得
    $question1 = $request->input('question_1');
    $question2 = $request->input('question_2');
    $question3 = $request->input('question_3');
    $question4 = $request->input('question_4');
    $question5 = $request->input('question_5');

    // 診断結果を計算
    $result = $this->calculatePersonalColor($question1, $question2, $question3, $question4, $question5);

    // 診断結果をセッションに保存
    session(['result' => $result]);
    Log::info('Result stored in session: ' . session('result'));
       // セッションの内容を表示して確認
    //    dd(session()->all());

       // 診断結果を表示して確認
    //    dd($result);
    // リダイレクト
    return redirect()->route('color_result_get');
}

// 診断結果を計算するロジックを実装
private function calculatePersonalColor($q1, $q2, $q3, $q4, $q5)
{

// 各質問の選択肢に対する得点を初期化
$scores = [
'spring' => 0,
'summer' => 0,
'autumn' => 0,
'winter' => 0,
];

// 質問1に対する得点を計算
if ($q1 === '上品、やさしそう、癒し系') {
$scores['spring'] += 1;
} elseif ($q1 === 'かわいい、明るい、若々しい') {
$scores['summer'] += 1;
}

// 質問2に対する得点を計算
if ($q2 === 'はっきりした顔立ち') {
$scores['winter'] += 1;
} elseif ($q2 === 'やさしい顔立ち') {
$scores['autumn'] += 1;
}

// 質問3に対する得点を計算

if ($q3 === '瞳がくっきり、キリッとした目') {
$scores['winter'] += 1;
} elseif ($q3 === '瞳がくっきり、キラキラした目') {
$scores['summer'] += 1;
} elseif ($q3 === '瞳がふんわり、おだやかな目') {
$scores['spring'] += 1;
} elseif ($q3 === '瞳がふんわり、深みのある目') {
$scores['autumn'] += 1;
}

// 質問4に対する得点を計算
if ($q4 === '銀色のアクセサリー（1円玉）') {
$scores['summer'] += 1;
} elseif ($q4 === '金色のアクセサリー（5円玉）') {
$scores['autumn'] += 1;
}

// 質問5に対する得点を計算
if ($q5 === '行きなれたカフェで、友人とまったり派') {
$scores['spring'] += 1;
} elseif ($q5 === '今話題のカフェで、友人とワイワイおしゃべり派') {
$scores['summer'] += 1;
} elseif ($q5 === '落ち着きのあるカフェで、一人で贅沢な時間を過ごす派') {
$scores['autumn'] += 1;
} elseif ($q5 === 'こだわりが強めの店長がいるカフェで、一人でゆったり派') {
$scores['winter'] += 1;
}

// 最も得点の高い季節を求める
$maxScore = max($scores);
// 最も得点の高い季節のキーを取得
$resultKey = array_search($maxScore, $scores);

// 得点の最も高い季節に応じたメッセージを作成して返す
if ($resultKey === 'spring') {
    return 'あなたのパーソナルカラーは春です！';
} elseif ($resultKey === 'summer') {
    return 'あなたのパーソナルカラーは夏です！';
} elseif ($resultKey === 'autumn') {
    return 'あなたのパーソナルカラーは秋です！';
} elseif ($resultKey === 'winter') {
    return 'あなたのパーソナルカラーは冬です！';
} else {
    return 'あなたのパーソナルカラーは特定できませんでした。';
}

// デフォルトのメッセージを返す
return "あなたのパーソナルカラーは特定できませんでした。";
}

public function showResult()
{
    // セッションから診断結果を取得
    $result = session('result');

    // Log::info('Result: ' . $result);

    // シーズンごとのカラーパレットと画像を取得
$seasonPalettes = [
    'あなたのパーソナルカラーは春です！' => [
        'palette' => ['#f4cdc2', '#efbd92', '#e4745c', '#e4745c', '#e07481','#dd5e6b','#d5455a', '#e9923a', '#de5322', '#d9221b', '#ebd262','#f4e158', '#e5ad26', '#a5c860', '#79b74c', '#309e39','#67b46a', '#2aab7f', '#45b1a1', '#9dd1d7', '#f4cdc2','#7c93b3', '#0a679d', '#305088', '#8a4788', '#f8f0b7','#f9e9aa', '#dccec5', '#e1c589', '#d6ab64', '#904d23',],
        'image' => 'spring2.png',
    ],
    'あなたのパーソナルカラーは夏です！' => [
        'palette' => ['#ead1d2', '#ecafbc', '#e899bb', '#e07481', '#d66891','#b64d77', '#d83b5e', '#be2838', '#be2838', '#ad2557','#c10f57', '#f0ebb5', '#a1cda8', '#63b587', '#109f76','#d2eaf0', '#b1d6e2', '#70b2de', '#487ba7', '#3e6181','#34435c', '#c3bddb', '#9593b9', '#8b307a', '#f9f8e4','#f5e6c5', '#a58265', '#755239', '#96a7af', '#5c6063',],
        'image' => 'summer  .png',
    ],
    'あなたのパーソナルカラーは秋です！' => [
        'palette' => ['#eddeb8', '#498d37', '#8c6b2a', '#e2983e', '#eab77e','#c7a564', '#1c532c', '#817546', '#db7c29', '#d7674c','#a37e40', '#273619', '#97a46d', '#d37020', '#d25e38','#61451f', '#43a6a0', '#adb450', '#d0a544', '#d0432c','#793d21', '#176972', '#abb138', '#e8ca2d', '#c7302b','#352913', '#452d5f', '#627831', '#b27b1f', '#8f1e22',],
        'image' => 'autumn.png',
    ],
    'あなたのパーソナルカラーは冬です！' => [
        'palette' => ['#ffffff', '#f9e0e0', '#1797cf', '#d31176', '#e899bb','#c9c9ca', '#f8f6cf', '#146fa7', '#e9e683', '#dc6991','#898989', '#e9eed5', '#144493', '#1fa258', '#d7557f','#343432', '#ddeef0', '#11337b', '#118b42', '#922a49','#040000', '#cfdfd5', '#112a52', '#006939', '#a61e2c','#351812', '#ded3e7', '#2f204c', '#003f2e', '#bb1a25',],
        'image' => 'winter.png',
    ],
];
  // 季節と画像パスの対応関係を定義
  $seasonImages = [
    'あなたのパーソナルカラーは春です！' => 'spring2.png',
    'あなたのパーソナルカラーは夏です！' => 'summer2.png',
    'あなたのパーソナルカラーは秋です！' => 'autumn.png',
    'あなたのパーソナルカラーは冬です！' => 'winter.png',
];

// dd($result);
    // ユーザーのIDを取得
    $userId = auth()->id();

    // パーソナルカラー診断の結果を保存
    $personal=
    Personal::create([
        'user_id' => $userId,
        'season' => $result, // フォームからの選択した季節
        'color_image' => 'img/image.png', // カラー画像のパス
        'result_image' => $seasonImages[$result], // 結果画像のパス
    ]);
    // 診断結果に対応するシーズン情報を取得
    $seasonInfo = $seasonPalettes[$result] ?? null;

     // ログにデータを出力して確認
     Log::info('Result: ' . $result);
     Log::info('Season Palettes: ' . json_encode($seasonPalettes));

    // ユーザーの診断結果を取得
    $userResults = Personal::where('user_id', auth()->id())->get();



    // 診断結果と関連データをビューに渡して表示
    $personalResult=Personal::find($personal->id);
return view('contacts.color_result',compact('personalResult','seasonInfo'));
    // return view('contacts.color_result', compact('result', 'userResults', 'seasonImages', 'seasonInfo'));

}

}

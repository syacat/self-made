<!-- resources/views/my-page.blade.php -->

<div class="container4">

<h2>マイページ</h2>
<p>診断履歴</p>
@if($likedResults && count($likedResults) > 0)
    @foreach($likedResults->reverse() as $like) <!-- ここでreverse()を使用して逆順に表示 -->
        @php
            $personalResult = \App\Models\Personal::find($like->personal_result_id);
        @endphp
        @if ($personalResult)
            <p>{{ $personalResult->season }}</p>
            <img src="{{ asset('img/' . $personalResult->result_image) }}" alt="Color Image" style="max-width: 100%;">
            <form action="{{ route('delete-result', ['id' => $like->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
        @endif
    @endforeach
@else
    <p>削除しました</p>
    <a href="{{ route('index') }}">ホームへ</a>
@endif
            </div>


{{-- @dump($likedResults) --}}
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container4 {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    container4-h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    container4-p {
        font-size: 16px;
        margin-bottom: 5px;
    }
    container4-img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    container4-button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }
    container4-a {
        color: #007bff;
        text-decoration: none;
        margin-left: 10px;
    }
</style>

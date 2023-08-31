{{-- color_result.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>パーソナルカラー診断結果</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/4-4.js') }}"></script>
    <style>
  .color-boxes {
    display: flex;
    flex-wrap: wrap;
}

.color-box {
    width: 20px;
    height: 20px;
    margin: 2px;
}
    </style>

</head>
<header>
    @include('contacts.header')
  </header>
<body>
        @if(isset($errorMessage))
            <div class="alert alert-danger">
                {{ $errorMessage }}
            </div>
        @else
            <h2>パーソナルカラー診断結果</h2>
            <p>{{ $personalResult->season }}</p>

            <p>User Result Season: {{ $personalResult->season }}</p>
            <img src="{{ asset('img/'.$personalResult->result_image) }}" alt="Color Image" style="max-width: 100%;">

            <div class="color-boxes">
                @foreach($seasonInfo['palette'] as $color)
                    <div class="color-box" style="background-color: {{ $color }};"></div>
                @endforeach
            </div>
            @if (auth()->check())
    <form action="{{ route('like', ['result_id' => $personalResult->id]) }}"method="post">
        @csrf
        <button type="submit">編集</button>
    </form>
@endif
            <hr>

        @endif
    </body>
</html>

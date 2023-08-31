<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>PersonalColor</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">

  </head>
<body>
  <div class=guidance>

  </div>
  <header>
    @include('contacts.header')
  </header>
  {{-- register_success.blade.php --}}
  <div class="thanks">
    <h1>新規会員登録</h1>
    <div class="massage">
      <p>会員登録が完了しました</p>
      <a href="{{ route('login') }}">こちらへどうぞ</a>
    </div>
  </div>
</body>

</html>

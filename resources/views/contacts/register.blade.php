<!-- register.blade.php -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>PersonalColor</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">

  </head>

<body>


  <header>
    @include('contacts.header')
  </header>

    <div class="register-container">

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- 新規登録フォームの入力フィールド -->
        <input type="text" name="name" placeholder="名前">
        <input type="email" name="email" placeholder="メールアドレス">
        <input type="password" name="password" placeholder="パスワード">
        <input type="password" name="password_confirmation" placeholder="パスワード確認">
        <button type="submit">登録</button>
    </form>

    </div>
</body>
</html>

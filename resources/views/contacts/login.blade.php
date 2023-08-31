<!-- Views/contacts/login.php　ログイン画面 -->

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>cafe</title>
  <title>cafe</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">

</head>


<header>
  @include('contacts.header')
</header>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
</head>
<body>
<!-- login.blade.php -->
<div class="login-container">
  <h2>ログイン</h2>
  <form action="{{ route('login') }}" method="POST"> <!-- actionとmethodを設定 -->
    @csrf <!-- CSRFトークンを含める -->
      <input type="text" name="email" placeholder="メールアドレス"> <!-- name属性を追加 -->
      <input type="password" name="password" placeholder="パスワード"> <!-- name属性を追加 -->
      <button type="submit">ログイン</button>
  </form>
  <p> <a href="{{ route('register') }}">新規登録はこちら</a></p>

  @if(isset($errorMessage))
      <div class="error-message">
          {{ $errorMessage }}
      </div>
  @endif

</div>

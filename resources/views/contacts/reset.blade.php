{{-- パスワードリセット --}}
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Personal Color</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
</head>

<header>
  @include('contacts.header')
</header>
<div class="container">
  <div class="reset-form">
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('reset') }}">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <div>
      <label for="email">メールアドレス</label>
      <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
  </div>
  <div>
      <label for="password">パスワード</label>
      <input id="password" type="password" name="password" required autocomplete="new-password">
  </div>
  <div>
      <label for="password-confirm">パスワード確認</label>
      <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
  </div>
  <div>
      <button type="submit">
          リセット
      </button>
  </div>

</form>


</div>
</div>

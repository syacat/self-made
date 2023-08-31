<!-- resources/views/contacts/logout.blade.php -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">

  </head>

<body>
  <header>
    @include('contacts.header')
  </header>
  <div class="container3">
   <h1>ログアウトしますか？</h1>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">はい</button>
    </form>
    <a href="{{ route('index') }}">いいえ</a>
  </div>
</body>

  
<style>
.container3 {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    container3-h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    container3-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    container3-a {
      display: inline-block;
      margin-top: 10px;
      color: #007bff;
      text-decoration: none;
    }

    container3-button:hover {
      background-color: #0056b3;
    }

</style>
</html>

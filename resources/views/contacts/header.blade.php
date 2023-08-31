<header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <nav class="hed_nav">

    <div class="hed_frame">
      <div class="hed_box1">
        <a href="{{ route('index') }}#location">
          <img src="{{ asset('img/logo1.png') }}" alt="Logo Image 1"style="width: 50px; height: auto;"></a>
      </div>
      <div class="hed_box2">
        <div class="hed2-first">
          <a href="{{ route('reset') }}">パスワードリセット</a>
        </div>
        <div class="hed2-second">
          <a href="{{ route('register') }}">新規会員登録</a>
        </div>
        <div class="hed2-third">
          <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="hed2-fourth">
          <a href="{{ route('logout.form') }}">
          Logout
      </a></div>
      <div class="hed3_shadow">
        <img src="{{ asset('img/menu.png') }}" alt="Menu Image">
      </div>
    </div>
  </nav>
</header>

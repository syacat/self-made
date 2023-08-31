{{-- personal.bladee.php --}}
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>personal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
  </head>

  <header>
    @include('contacts.header')
  </header>
<body>
  <body>
    <div class="container2">
    <h2>パーソナルカラー診断</h2>
    <form action="{{ route('personal') }}" method="post">

      @csrf
      <p>あなたの印象に近いと思う言葉の組み合わせは？</p>

      <!-- 質問1 -->
      <label><input type="radio" name="question_1" value="上品、やさしそう、癒し系"> 上品、やさしそう、癒し系</label><br>
      <label><input type="radio" name="question_1" value="かわいい、明るい、若々しい"> かわいい、明るい、若々しい</label><br>

      <!-- 質問2 -->
      <p>あなたの顔の印象は？</p>
      <label><input type="radio" name="question_2" value="はっきりした顔立ち"> はっきりした顔立ち</label><br>
      <label><input type="radio" name="question_2" value="やさしい顔立ち"> やさしい顔立ち</label><br>

      <!-- 質問3 -->
      <p>あなたの目の印象は？</p>
      <label><input type="radio" name="question_3" value="瞳がくっきり、キリッとした目"> 瞳がくっきり、キリッとした目</label><br>
      <label><input type="radio" name="question_3" value="瞳がくっきり、キラキラした目"> 瞳がくっきり、キラキラした目</label><br>
      <label><input type="radio" name="question_3" value="瞳がふんわり、おだやかな目"> 瞳がふんわり、おだやかな目</label><br>
      <label><input type="radio" name="question_3" value="瞳がふんわり、深みのある目"> 瞳がふんわり、深みのある目</label><br>

      <!-- 質問4 -->
      <p>肌がきれいに見えるのは？</p>
      <label><input type="radio" name="question_4" value="銀色のアクセサリー（1円玉）"> 銀色のアクセサリー（1円玉）</label><br>
      <label><input type="radio" name="question_4" value="金色のアクセサリー（5円玉）"> 金色のアクセサリー（5円玉）</label><br>

      <!-- 質問5 -->
      <p>気分転換のためにカフェに行くなら？</p>
      <label><input type="radio" name="question_5" value="行きなれたカフェで、友人とまったり派"> 行きなれたカフェで、友人とまったり派</label><br>
      <label><input type="radio" name="question_5" value="今話題のカフェで、友人とワイワイおしゃべり派"> 今話題のカフェで、友人とワイワイおしゃべり派</label><br>
      <label><input type="radio" name="question_5" value="落ち着きのあるカフェで、一人で贅沢な時間を過ごす派"> 落ち着きのあるカフェで、一人で贅沢な時間を過ごす派</label><br>
      <label><input type="radio" name="question_5" value="こだわりが強めの店長がいるカフェで、一人でゆったり派"> こだわりが強めの店長がいるカフェで、一人でゆったり派</label><br>

      <button type="submit">診断結果を見る</button>
  </form>
</div>
<style>
      body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container2 {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    container2-h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    container2-p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    container2-input[type="radio"] {
      margin-right: 5px;
    }

    container2-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    container2-button:hover {
      background-color: #0056b3;
    }
  </style>
</body>

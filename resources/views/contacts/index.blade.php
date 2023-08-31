{{-- index.blade.php --}}

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">

<html>
    <body>
      @include('contacts.header')

      <section class="button-container">
        <button class="personal-button" onclick="location.href='{{ route('personal') }}'">パーソナルカラー診断</button>
    </section>

   <main>
        {{-- <section class="bg_white">
            <h2>Enjoy the Colors</h2>
            <div class="cafe_local">
                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="{{ asset('img/darkblue.png') }}" alt="Intro Image 1"></div>
                        <div class="text"></div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="{{ asset('img/pink.png') }}" alt="Intro Image 2"></div>
                        <div class="text"></div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="{{ asset('img/summer.png') }}" alt="Intro Image 3"></div>
                        <div class="text"></div>
                    </div>
                </div>

                <div class="box">
                    <div class="info">
                        <div class="photo"><img src="{{ asset('img/pale.png') }}" alt="Intro Image 4"></div>
                        <div class="text"></div>
                    </div>
                </div> --}}

            </div>
        </section>
    </main>

</body>


</html>

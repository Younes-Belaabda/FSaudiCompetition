<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/guest.css') }}">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    @vite(['resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('assets/bg/first-saudi.png') }}')">
    @yield('content')
    <footer>
        <div class="upper-footer sponsors">
            <div class="container">
                <div class="row my-2">
                    <div class="col-md-6">
                        <b>الدعم الفني</b>
                        <ul>
                            <li>
                                <a style="text-decoration: none" class="text-white" href="Tel: +966555177306">الدعم الفني روبوتيرا</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            <p class="text-dark">يسرنا تواصلكم واستقبال استفساراتكم للجنة التسكين والضيافة بتصفيات فيرست 2024 عبر الواتس آب
                                <span class="badge bg-success">
                                    <a style="text-decoration: none" href="Tel:+966508344983" class="text-white">0508344983</a>
                                </span>
                            </p>
                            <p class="text-dark">أو بالضغط مباشرة على  الرابط ادناه</p>
                            <div class="badge bg-success">
                                <a style="text-decoration: none" class="text-white" href="wa.me/966508344983">وتساب</a>
                            </div>
                            <p class="text-dark m-0 p-0">مرحبا بالجميع</p>
                        </div>
                    </div>

                </div>
                <div class="row my-4">
                    <div class="col-3">
                        <div class="text-center">
                            <img class="special" src="{{ asset('assets/sponsors/logo-3.png') }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <img  src="{{ asset('assets/sponsors/logo-2.png') }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <img src="{{ asset('assets/sponsors/logo-1.png') }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <img class="special" src="{{ asset('assets/sponsors/logo-4.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')
</body>

</html>

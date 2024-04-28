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
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{ asset('assets/sponsors/minstry-saudi.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{ asset('assets/sponsors/RCJY.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')
</body>

</html>

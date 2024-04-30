
<!DOCTYPE html>
<html lang="ar" dir="rtl" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Belaabda Younes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/style-rtl.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{asset('assets/js/config.js') }}"></script>
    <style>
        html {
            height: 100vh;
            /* width: 100vw; */
        }

        body {
            height: 100%;
            /* width: 100%; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100vw 100vh;
        }
    </style>
</head>

<body style="background-image: url('{{ asset('assets/bg/bg-guest.jpeg') }}')" class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        @yield('content')
        <!-- end row -->
    </div>

    <!-- App js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{asset('assets/js/app.js') }}"></script>

</body>

</html>

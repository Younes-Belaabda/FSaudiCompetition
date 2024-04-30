<!DOCTYPE html>
<html lang="ar" dir="rtl" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>لوحة التحكم | تسجيل الحضور</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Belaabda Younes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link href="{{ asset('assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/style-rtl.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="/" class="logo-light">
                    <img src="{{ asset('assets/guest/logo.png') }}" alt="logo" class="logo-lg" height="28">
                    <img src="{{ asset('assets/guest/logo.png') }}" alt="small logo" class="logo-sm" height="28">
                </a>

                <!-- Brand Logo Dark -->
                <a href="/" class="logo-dark">
                    <img src="{{ asset('assets/guest/logo.png') }}" alt="dark logo" class="logo-lg" height="28">
                    <img src="{{ asset('assets/guest/logo.png') }}" alt="small logo" class="logo-sm" height="28">
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">
                    @role('ادمين')
                    <li class="menu-item">
                        <a href="{{ route('admin.user.index') }}" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-user"></i></span>
                            <span class="menu-text"> المستخدمين </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.team.index') }}" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-group"></i></span>
                            <span class="menu-text"> الفرق </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.competition-day.index') }}" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-group"></i></span>
                            <span class="menu-text"> المسابقة </span>
                        </a>
                    </li>
                    @endrole
                    @hasanyrole(['ادمين' , 'مشرف'])
                    <li class="menu-item">
                        <a href="{{ route('admin.presence.index') }}" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-badge-check"></i></span>
                            <span class="menu-text"> الحضور </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.team.scan') }}" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa fa-qrcode"></i></span>
                            <span class="menu-text"> تسجيل الحضور </span>
                        </a>
                    </li>
                    @endhasanyrole
                </ul>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a href="index.html" class="logo-light">
                                <img src="{{ asset('assets/guest/logo.png') }}" alt="logo" class="logo-lg" height="22">
                                <img src="{{ asset('assets/guest/logo.png') }}" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="22">
                                <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>







                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item notify-item">الخروج</button>
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="page-title mb-0">لوحة التحكم</h4>
                            </div>
                            <div class="col-lg-6" dir="ltr">
                                @yield('buttons')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    @yield('content')


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer d-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                2024 &copy; <a href="https://www.linkedin.com/in/younes-belaabda/">Belaabda Younes</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://www.linkedin.com/in/younes-belaabda/"
                                        target="_blank">Belaabda Younes</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('assets/js/vendor.min.js') }} "></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

</body>

</html>

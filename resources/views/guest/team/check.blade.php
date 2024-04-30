@extends('layouts.auth')

@section('content')
<style>
    body {
        height: 100vh;
        overflow: hidden;
    }
</style>
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-5">
            <div class="card">
                <div class="card-body p-4">

                    <div class="text-center w-75 mx-auto auth-logo mb-4">
                        <a href="index.html" class="logo-dark">
                            <span><img src="{{ asset('assets/guest/logo.png') }}" alt="" height="22"></span>
                        </a>

                        <a href="index.html" class="logo-light">
                            <span><img src="{{ asset('assets/guest/logo.png') }}" alt="" height="22"></span>
                        </a>
                    </div>

                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="coach_eID">رقم هوية المدرب</label>
                            <input class="form-control" type="coach_eID" name="coach_eID" id="coach_eID" required=""
                                placeholder="رقم هوية المدرب">
                        </div>
                        @error('coach_eID')
                            <div class="alert alert-danger">رقم الهوية غير موجود</div>
                        @enderror


                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary w-100" type="submit"> الدخول </button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
    <style>
        footer {
            /* min-height: 200px; */
            /* background-color: rebeccapurple; */
            position: absolute;
            bottom: -30px;
            right: 0;
            width: 100%;
            padding-bottom: 20px;
        }

        footer {
            /* padding-top: 50px !important; */
            /* background-color: #F7E4A2; */
        }

        footer img {
            width: 100%;
            height: auto;
        }

        footer img.special {
            width: 60%;
            height: auto;
        }
    </style>
    <footer>
        <div class="container">
            <div class="row my-4">
                <div class="col-4">
                    <div class="text-center">
                        <img class="special" src="{{ asset('assets/sponsors/logo-3.png') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img src="{{ asset('assets/sponsors/logo-2.png') }}">
                    </div>
                </div>
                {{-- <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/sponsors/logo-1.png') }}">
                    </div>
                </div> --}}
                <div class="col-4">
                    <div class="text-center">
                        <img class="special" src="{{ asset('assets/sponsors/logo-4.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

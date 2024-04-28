@extends('layouts.auth')

@section('content')
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


                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary w-100" type="submit"> الدخول </button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
@endsection

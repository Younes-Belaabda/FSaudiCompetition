@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.team.scan') }}" class="btn btn-success">تسجيل الحضور</a>
            <a href="{{ route('admin.team.index') }}" class="btn btn-info">عرض الفرق</a>
            <a href="{{ route('admin.presence.index') }}" class="btn btn-warning">عرض الحضور</a>
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

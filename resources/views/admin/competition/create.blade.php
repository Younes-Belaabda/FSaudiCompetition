@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.competition-day.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label" for="name">العنوان</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="day">التاريخ</label>
            <input class="form-control" type="date" name="day">
        </div>
        <button class="btn btn-success">حفظ</button>
    </form>
@endsection

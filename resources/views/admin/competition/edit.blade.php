@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.competition-day.update', ['competition_day' => $competition_day]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="form-label" for="name">العنوان</label>
            <input class="form-control" type="text" name="name" value="{{ $competition_day->name }}">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="day">التاريخ</label>
            <input class="form-control" type="date" name="day" value="{{ $competition_day->day }}">
        </div>
        <button class="btn btn-success">حفظ</button>
    </form>
@endsection

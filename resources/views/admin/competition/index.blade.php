@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.competition-day.create') }}" class="btn btn-success mb-3">انشاء</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>التاريخ</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competitions_day as $competition_day)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $competition_day->name }}</td>
                        <td>{{ $competition_day->day }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.competition-day.edit' , ['competition_day' => $competition_day]) }}" class="btn btn-success">تعديل</a>
                                <form action="{{ route('admin.competition-day.destroy' , ['competition_day' => $competition_day]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $competitions_day->links() }}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.team.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button>import</button>
    </form>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الرقم</th>
                    <th>الفئة</th>
                    <th>الادارة التعليمية</th>
                    <th>اسم الفريق</th>
                    <th>اسم المدرسة</th>
                    <th>اسم المدرب</th>
                    <th>رقم المدرب</th>
                    <th>هوية المدرب</th>
                    <th>معلومات الفريق</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $team->team_eID }}</td>
                        <td>{{ $team->team_category }}</td>
                        <td>{{ $team->team_administration }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->school_name }}</td>
                        <td>{{ $team->coach_name }}</td>
                        <td>{{ $team->coach_phone }}</td>
                        <td>{{ $team->coach_eID }}</td>
                        <td>
                            <a href="{{ route('team.info' , ['team' => $team]) }}">الرابط</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $teams->links() }}
    </div>
@endsection

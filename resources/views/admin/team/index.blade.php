@extends('layouts.app')

@section('buttons')
    <form action="{{ route('admin.team.reset') }}" method="post">
        @csrf
        <button class="btn btn-sm btn-danger">حذف كل الفرق</button>
    </form>
@endsection
@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <form action="{{ route('admin.team.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-control">
                    <label for="file" class="form-label">ملف الفرق</label>
                    <input class="form-control mb-2" type="file" name="file">
                    <button class="btn btn-success">رفع الملف</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="get">
                <div class="row mb-2">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="team_name" class="form-label">اسم الفريق</label>
                            <input class="form-control" type="text" name="team_name" placeholder="اسم الفريق"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="team_category" class="form-label">الفئة</label>
                            <select name="team_category" id="team_category" class="form-control">
                                <option value="">اختر الفئة</option>
                                @foreach ($team_categories as $team_category)
                                <option value="{{ $team_category }}">{{ $team_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-md-3">
                        <button class="btn btn-success">بحث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                            <a href="{{ route('team.info', ['team' => $team]) }}">الرابط</a>
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

@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col-12">
            <form action="" method="get">
                <div class="row mb-2">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="name" class="form-label">الإسم الكامل</label>
                            <input class="form-control" type="text" name="name" placeholder="الإسم الكامل"/>
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
    </div> --}}
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success mb-3">انشاء</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الإسم الكامل</th>
                    <th>البريد الإلكتروني</th>
                    <th>الدور</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles[0]->name ?? '' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.user.edit' , ['user' => $user]) }}" class="btn btn-success">تعديل</a>
                                <form action="{{ route('admin.user.destroy' , ['user' => $user]) }}" method="post">
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
        {{ $users->links() }}
    </div>
@endsection

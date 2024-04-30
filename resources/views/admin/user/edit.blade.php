@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.user.update' , ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="form-label" for="name">الإسم الكامل</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="email">الإيميل</label>
            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="password">كلمة المرور</label>
            <input class="form-control" type="text" name="password" value="{{ $user->password }}">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="role">الدور</label>
            <select class="form-control" name="role">
                @foreach (\Spatie\Permission\Models\Role::all() as $role)
                    <option @selected($user->hasRole($role->name)) value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">حفظ</button>
    </form>
@endsection

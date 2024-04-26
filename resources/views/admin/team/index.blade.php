{{-- <a href="{{ route('admin.team.create') }}">إنشاء</a> --}}
<form action="{{ route('admin.team.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="file">
    <button>رفع البيانات</button>
</form>
{{-- @dd(json_decode(\App\Models\Team::first()->students)) --}}
{{-- <table>
    <thead>
        <tr>
            <th>الإسم الكامل</th>
            <th>الهاتف</th>
            <th>رقم الهوية</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teames as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->phone }}</td>
                <td>{{ $team->eID }}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}

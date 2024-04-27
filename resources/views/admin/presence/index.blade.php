@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الفريق</th>
                    <th>تاريخ الحضور</th>
                    <th>وقت الحضور</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presences as $presence)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $presence->team->team_name }}</td>
                        <td>{{ $presence->created_at->format('d-m-Y')}}</td>
                        <td>{{ $presence->created_at->translatedFormat('g:i A') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.presence.destroy' , ['presence' => $presence]) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $presences->links() }}
    </div>
@endsection

@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-12 col-md-6">
                <img src="{{ asset('assets/guest/logo.png') }}" />
                <h3>تسجيلات الحضور</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>الأحد</td>
                            <td>
                                @if (\App\Models\Presence::whereDate('created_at', \Carbon\Carbon::create(2024, 04, 28)->toDateTimeString())->where('team_id', $team->id)->count() > 0)
                                    <span class="badge bg-success">مسجل</span>
                                @else
                                    <span class="badge bg-danger">غير مسجل</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>الإتنين</td>
                            <td>
                                @if (\App\Models\Presence::whereDate('created_at', \Carbon\Carbon::create(2024, 04, 29)->toDateTimeString())->where('team_id', $team->id)->count() > 0)
                                    <span class="badge bg-success">مسجل</span>
                                @else
                                    <span class="badge bg-danger">غير مسجل</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-6" dir="ltr">
                <div class="d-flex flex-column align-items-center align-items-md-start">
                    <div class="qr-code">
                        {!! $qrcode !!}
                    </div>
                    <h1 class="team-name">{{ $team->team_name }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>معلومات عن الفريق</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">الرقم</div>
                            {{ $team->team_eID }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">الفئة</div>
                            {{ $team->team_category }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">الادارة التعليمية</div>
                            {{ $team->team_administration }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">اسم الفريق</div>
                            {{ $team->team_name }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">اسم المدرسة</div>
                            {{ $team->school_name }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">اسم المدرب</div>
                            {{ $team->coach_name }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">رقم المدرب</div>
                            {{ $team->coach_phone }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">هوية المدرب</div>
                            {{ $team->coach_eID }}
                        </div>
                    </li>
                    @foreach (json_decode($team->students) as $student)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $student->label }}</div>
                                {{ $student->name }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>معلومات عن المسابقة</h3>
                <article>
                    <p>بطولة عالمية تجمع بين إثارة الروبوتات وتحديات حل المشكلات العملية في العالم الحقيقي.</p>
                    <p>مهمتنا هي إلهام عقول الشباب وتنمية شغفهم بالعلوم والتكنولوجيا والهندسة والرياضيات (STEM) من خلال عالم
                        المنافسات والروبوتات المبدع.</p>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>أين تقع المسابقة</h3>
                <div class="competition-location">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2051.7715411386034!2d-8.010005646668901!3d31.641482371555806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee86746aaaab%3A0x3d12e04dd028b415!2sEcole%20Akenssouss!5e0!3m2!1sen!2sma!4v1714225574238!5m2!1sen!2sma"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <input id="uuid" type="hidden" name="uuid" value="{{ $team->uuid }}">
@endsection

@section('scripts')
    <script type="module">
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('6cb5805c21bb060d38e2', {
            cluster: 'ap3'
        });

        var channel = pusher.subscribe('team-scanned');
        channel.bind('App\\Events\\TeamScannedEvent', function(data) {
            var team = data.team;
            var uuid = document.querySelector('#uuid').value;
            if(team.uuid == uuid){
                alert('تم تسجيل الحضور بنجاح');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        });
        // var channel = Echo.channel('team-scanned');
        // channel.listen('team-scanned-event', function(data) {
        //  alert('Done');
        // });
    </script>
@endsection

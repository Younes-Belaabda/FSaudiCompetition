<form action="{{ route('admin.team.update' , ['coach' => $coach]) }}">
    @method('PUT')
    @csrf
    <label for="">الإسم الكامل</label>
    <input type="text" name="name" value="{{ $coach->name }}">
    <label for="">الهاتف</label>
    <input type="text" name="phone" value="{{ $coach->phone }}">
    <label for="">رقم الهوية</label>
    <input type="text" name="eID" value="{{ $coach->eID }}">
    <button>حفظ</button>
</form>

<form action="{{ route('admin.team.store') }}" method="post">
    @csrf
    <label for="">الإسم الكامل</label>
    <input type="text" name="name">
    <label for="">الهاتف</label>
    <input type="text" name="phone">
    <label for="">رقم الهوية</label>
    <input type="text" name="eID">
    <button>حفظ</button>
</form>

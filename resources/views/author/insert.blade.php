<form method="POST" enctype="multipart/form-data" action="{{ route('authors.insert.verify') }}">
    {{ @csrf_field() }}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    <input type="hidden" name="id">

    <label for="">Author Name</label>
    <input type="text" name="name">

    <label for="">Date Of Birth</label>
    <input type="date" name="dob">

    <label for="">Author Country</label>
    <input type="text" name="country">

    <input type="submit" value="Insert Author">
</form>
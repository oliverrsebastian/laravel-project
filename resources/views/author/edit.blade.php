<form method="POST" enctype="multipart/form-data" action="">
    {{ @csrf_field() }}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    <input type="hidden" name="id" value="{{ $author->id }}">

    <label for="">Author Name</label>
    <input type="text" name="name" value="{{ $author->name }}">

    <label for="">Date Of Birth</label>
    <input type="date" name="dob" value="{{ $author->dob }}">

    <label for="">Author Country</label>
    <input type="text" name="country" value="{{ $author->country }}">

    <input type="submit" value="Update Author">
</form>
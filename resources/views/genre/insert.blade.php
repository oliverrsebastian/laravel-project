<form method="POST" enctype="multipart/form-data" action="{{ route('genres.insert.verify') }}">
    {{ @csrf_field() }}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    <input type="hidden" name="id">

    <label for="">Genre Name</label>
    <input type="text" name="name">

    <input type="submit" value="Insert Genre">
</form>
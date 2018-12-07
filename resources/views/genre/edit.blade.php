<form method="POST" enctype="multipart/form-data" action="{{ route('genres.edit.verify') }}">
    {{ @csrf_field() }}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    <input type="hidden" name="id" value="{{ $book->id }}">

    <label for="">Genre Name</label>
    <input type="text" name="name" value="{{ $genre->name }}">

    <input type="submit" value="Update Genre">
</form>
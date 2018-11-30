<form method="POST" enctype="multipart/form-data" action="{{ route('books.edit.verify') }}">
	{{ @csrf_field() }}
  @foreach($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
	<input type="hidden" name="id" value="{{ $book->id }}">

	<label for="">Book Name</label>
	<input type="text" name="name" value="{{ $book->name }}">

	<label for="">Genre</label>
	<input type="text" name="genre" value="{{ $book->genre }}">

	<label for="">Author</label>
	<input type="text" name="author" value="{{ $book->author }}">

	<label for="">Price</label>
	<input type="text" name="price" value="{{ $book->price }}">

	<label for="">Description</label>
	<textarea name="description">{{ $book->description }}</textarea>

	<label for="">Stock</label>
	<input type="text" name="stock" value="{{ $book->stock }}">

	<label for="">Picture</label>
	<input type="file" name="image">

	<input type="submit" value="Update Book">
</form>
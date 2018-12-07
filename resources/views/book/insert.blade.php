<form method="POST" enctype="multipart/form-data" action="{{ route('books.insert.verify') }}">
	{{ @csrf_field() }}
  @foreach($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
	<input type="hidden" name="id">

	<label for="">Book Name</label>
	<input type="text" name="name">

	<label for="">Genre</label>
	<select name="genre">
		@foreach($genres as $genre)
			<option value="{{$genre->name}}">{{$genre->name}}</option>
		@endforeach
	</select>

	<label for="">Author</label>
	<select name="author">
		@foreach($authors as $author)
			<option value="{{$author->name}}">{{$author->name}}</option>
		@endforeach
	</select>

	<label for="">Price</label>
	<input type="text" name="price">

	<label for="">Description</label>
	<textarea name="description"></textarea>

	<label for="">Stock</label>
	<input type="text" name="stock">

	<label for="">Picture</label>
	<input type="file" name="image">

  <input type="submit" value="Insert Book">
</form>
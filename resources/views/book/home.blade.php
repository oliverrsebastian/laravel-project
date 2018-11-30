<a href="{{ route('books.insert') }}">Create Book</a>

@if(isset($success))
<div>{{ $success }}</div>
@endif

<table>
	<tr>
		<th>Name</th>
		<th>Genre</th>
		<th>Author</th>
		<th>Price</th>
		<th>Description</th>
		<th>Stock</th>
		<th>Image</th>
		<th>Rating</th>
	</tr>
@foreach($books as $book)
	<tr>
		<td>{{ $book->name }}</td>
		<td>{{ $book->genre }}</td>
		<td>{{ $book->author }}</td>
		<td>{{ $book->price }}</td>
		<td>{{ $book->description }}</td>
		<td>{{ $book->stock }}</td>
		<td>{{ $book->image }}</td>
		<td>{{ $book->rating }}</td>
		<td><a href="{{ route('books.detail', $book->id) }}">Show</a></td>
		<td><a href="{{ route('books.edit', $book->id) }}">Edit</a></td>
	</tr>
@endforeach
</table>
{{ $books->links() }}
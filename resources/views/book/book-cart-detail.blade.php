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
    <tr>
        <td>{{ $book->name }}</td>
        <td>{{ $book->genre }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->description }}</td>
        <td>{{ $book->stock }}</td>
        <td><img src="{{ asset('storage/'.$book->image) }}"></td>
        <td>{{ $book->rating }}</td>
    </tr>
</table>
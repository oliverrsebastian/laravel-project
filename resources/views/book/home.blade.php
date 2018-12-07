@extends('layouts.app')

@section('content')
  <a href="{{ route('books.insert') }}">Create Book</a>

  @if(isset($success))
  <div>{{ $success }}</div>
  @endif

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Genre</th>
        <th>Author</th>
        <th>Price</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Rating</th>
        <th>Show</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
        <tr>
          <td>{{ $book->name }}</td>
          <td>{{ $book->genre }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->price }}</td>
          <td>{{ $book->description }}</td>
          <td>{{ $book->stock }}</td>
          <td>{{ $book->image }}</td>
          <td>{{ $book->rating }}0</td>
          <td><a href="{{ route('books.detail', $book->id) }}">Show</a></td>
          <td><a href="{{ route('books.edit', $book->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $books->links() }}

@endsection
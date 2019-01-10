@extends('layout.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/book.home.css')}}">
@endsection

@section('content')

  @if(isset($success))
  <div>{{ $success }}</div>
  @endif

  <div class="container-fluid mt-5 mb-5">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form class="form-inline justify-content-center">
              <input class="form-control mr-sm-2" name="book_name" type="search" placeholder="Search Book" aria-label="Search">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <table class="table table-striped mt-3">
              <thead>
                <tr class="text-center">
                  <th>Name</th>
                  <th>Genre</th>
                  <th>Author</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Stock</th>
                  <th>Image</th>
                  <th colspan="2">Actions</th>
                  @if(Session::has('user'))
                  @if(Session::get('user')->role == 1)
                  <th></th>
                  @endif
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($books as $book)
                  <tr>
                    <td rowspan="3">{{ $book->name }}</td>
                    <td rowspan="3">{{ $book->genre }}</td>
                    <td rowspan="3">{{ $book->author }}</td>
                    <td rowspan="3">{{ $book->price }}</td>
                    <td rowspan="3">{{ $book->description }}</td>
                    <td rowspan="3">{{ $book->stock }}</td>
                    <td rowspan="3">
                      <img style="width: 200px; height: 200px;" src="{{ asset('storage/'.$book->image) }}">
                    </td>
                    <td rowspan="3" align="center">
                      <a href="{{ route('books.detail', $book->id) }}" ><button class="btn btn-success mt-5">Show</button></a>
                    </td>
                    @if(Session::has('user'))
                    @if(Session::get('user')->role == 0)
                    <td rowspan="3" align="center">
                      <a href="{{ route('cart.insert', $book->id) }}"><button class="btn btn-primary mt-5">Buy</button></a>
                    </td>
                    @endif
                    @endif
                    @if(Session::has('user'))
                    @if(Session::get('user')->role == 1)
                    <td rowspan="3" align="center" ><a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning mt-5">Edit</a></td>
                    <td rowspan="3" align="center"><a href="{{ route('books.delete.verify', $book->id) }}" class="btn btn-danger mt-5">Delete</a></td>
                    @endif
                    @endif
                  </tr>
                  <tr></tr><tr></tr>
                @endforeach
              </tbody>
            </table>
            {{ $books->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
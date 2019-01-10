@extends('layout.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/genre.home.css')}}">
@endsection

@section('content')
    @if(isset($success))
        <div>{{ $success }}</div>
    @endif

    <div class="container mt-5 text-center">
        <div class="row justify-content-center">
            @foreach($genres as $genre)
            <div class="col-sm-12 col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>ID : {{ $genre->id }}</h3>
                        <h3 class="text-info">{{ $genre->name }}</h3>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-success mt-2">Update</a>
                        <a href="{{ route('genres.delete.verify', $genre->id) }}" class="btn btn-danger mt-2">Remove</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
                <td><a href="{{ route('genres.edit', $genre->id) }}">Update</a></td>
                <td><a href="{{ route('genres.delete.verify', $genre->id) }}">Remove</a></td>
            </tr>
        @endforeach
    </table> --}}
    {{ $genres->links() }}
@endsection
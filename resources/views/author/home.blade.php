@extends('layout.app')

@section('css')
	<link rel="stylesheet" href="{{asset('')}}">
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="thead-dark">
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Country</th>
                                <th colspan="2">Actions</th>
                            </thead>
                            @foreach($authors as $author)
                                <tbody>
                                    <tr>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->dob }}</td>
                                        <td>{{ $author->country }}</td>
                                        <td><a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Update</a></td>
                                        <td><a href="{{ route('authors.delete.verify', $author->id) }}" class="btn btn-danger">Remove</a></td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $authors->links() }}
    </div>

    
@endsection
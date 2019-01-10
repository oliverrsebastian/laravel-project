@extends('layout.app')

@section('css')
	<link rel="stylesheet" href="{{asset('')}}">
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="thead-dark">
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th colspan="2">Action</th>
                            </thead>
                            @foreach($users as $user)
                                <tbody>
                                    <td>
                                        <img style="width: 200px; height: 200px;" src="{{ asset('storage/'.$user->picture) }}">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td> 
                                        <a href="{{ route('users.edit', $user->id) }}}" class="btn btn-warning">Update</a>
                                    </td>
                                    <td> 
                                        <a href="{{ route('users.delete.verify', $user->id) }}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
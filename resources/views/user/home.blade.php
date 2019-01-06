@extends('layout.app')

@section('css')
	<link rel="stylesheet" href="{{asset('')}}">
@endsection

@section('content')

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection
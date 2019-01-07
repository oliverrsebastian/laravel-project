@extends('layout.app')

@section('css')

@endsection

@section('content')

  @if(isset($success))
  <div>{{ $success }}</div>
  @endif
  
  <h2>My Profile</h2>
	
	@if(Session::get('user')->role == 1)
		ADMIN
	@elseif(Session::get('user')->role == 0)
		MEMBER
	@endif
  {{$user->name}}
  {{$user->email}}

@endsection
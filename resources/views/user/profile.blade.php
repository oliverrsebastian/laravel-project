@extends('layout.app')

@section('css')

@endsection

@section('content')

  @if(isset($success))
  <div>{{ $success }}</div>
  @endif
  
  <h2>My Profile</h2>

  {{$user->name}}
  {{$user->email}}

@endsection
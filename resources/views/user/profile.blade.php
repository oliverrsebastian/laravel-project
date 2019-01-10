@extends('layout.app')

@section('css')

@endsection

@section('content')

  @if(isset($success))
  <div>{{ $success }}</div>
  @endif

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header bg-info text-white">
            <h2>My Profile</h2>
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="#">
              {{ @csrf_field() }}
              @foreach($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach

              <div class="form-group">
                <label for="">Fullname</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Picture</label>
                <input type="file" name="image" class="form-control">
              </div>

              <input type="submit" value="Update Profile" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


	
	{{-- @if(Session::get('user')->role == 1)
		ADMIN
	@elseif(Session::get('user')->role == 0)
		MEMBER
	@endif
  {{$user->name}}
  {{$user->email}} --}}

@endsection
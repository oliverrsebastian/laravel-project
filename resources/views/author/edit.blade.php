@extends('layout.app')

@section('css')

@endsection

@section('content')
	<form method="POST" enctype="multipart/form-data" action="{{ route('authors.edit.verify') }}">
	    {{ @csrf_field() }}
	    @foreach($errors->all() as $error)
	        <div>{{ $error }}</div>
	    @endforeach

			<h2>Edit Author - {{ $author->name }}</h2>
	    <input type="hidden" name="id" value="{{ $author->id }}">

    	<div class="form-group">
		    <label for="">Author Name</label>
		    <input type="text" name="name" value="{{ $author->name }}" class="form-control">
	    </div>
	    
	    <div class="form-group">
		    <label for="">Author DOB</label>
		    <input type="text" name="dob" class="form-control" placeholder="mm/dd/yyyy">
		  </div>

	    <div class="form-group">
		    <label for="">Author Nationality</label>
		    <input type="text" name="country" class="form-control">
		  </div>

    	<input type="submit" value="Update Author" class="btn btn-primary">
	</form>
@endsection
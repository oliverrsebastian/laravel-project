@extends('layout.app')

@section('css')

@endsection

@section('content')

	<div class="container">
		<div class="row mt-5 justify-content-center">
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">
						<h2>Edit User - {{ $user->name }}</h2>
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" action="{{ route('users.edit.verify') }}">
							{{ @csrf_field() }}
							@foreach($errors->all() as $error)
									<div>{{ $error }}</div>
							@endforeach

							<div class="form-group">
								<input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
							</div>

							<div class="form-group">
								<label for="">User Name</label>
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
								<textarea name="address" class="form-control">{{ $user->address }}</textarea>
							</div>

              <div class="form-group{{ $errors->has('picture ') ? ' has-error' : '' }}">
                  <label for="picture" class="control-label">Picture</label>

                  <div>
                      <input id="picture" type="file" class="form-control" name="picture" value="{{ old('picture') }}" required>

                      @if ($errors->has('picture'))
                          <span class="help-block">
                              <strong>{{ $errors->first('picture') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>


							<div class="form-group">
								<input type="submit" value="Update User" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- <form method="POST" enctype="multipart/form-data" action="{{ route('books.edit.verify') }}">
		{{ @csrf_field() }}
	  @foreach($errors->all() as $error)
	      <div>{{ $error }}</div>
	  @endforeach

		<h2>Edit Book - {{ $book->name }}</h2>

    <div class="form-group">
			<input type="hidden" name="id" value="{{ $book->id }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Book Name</label>
			<input type="text" name="name" value="{{ $book->name }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Genre</label>
			<input type="text" name="genre" value="{{ $book->genre }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Author</label>
			<input type="text" name="author" value="{{ $book->author }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Price</label>
			<input type="text" name="price" value="{{ $book->price }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Description</label>
			<textarea name="description" class="form-control">{{ $book->description }}</textarea>
		</div>

    <div class="form-group">
			<label for="">Stock</label>
			<input type="text" name="stock" value="{{ $book->stock }}" class="form-control">
		</div>

    <div class="form-group">
			<label for="">Picture</label>
			<input type="file" name="image" class="form-control">
		</div>

    <div class="form-group">
			<input type="submit" value="Update Book" class="btn btn-primary">
		</div>
	</form> --}}
@endsection
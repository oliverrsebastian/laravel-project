@extends('layout.app')

@section('css')
@endsection

@section('content')
	<div class="container">
		<div class="row mt-5 justify-content-center">
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">
						<h3>Insert New Author</h3>
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" action="{{ route('authors.insert.verify') }}">
							{{ @csrf_field() }}
							@foreach($errors->all() as $error)
								<div>{{ $error }}</div>
							@endforeach
							<input type="hidden" name="id">

							<div class="form-group">
								<label for="">Author Name</label>
								<input type="text" class="form-control" name="name">
							</div>

							<div class="form-group">
								<label for="">Date of Birth</label>
								<input type="text" class="form-control" name="dob">
							</div>

							<div class="form-group">
								<label for="">Country</label>
								<input type="text" class="form-control" name="country">
							</div>
							<input type="submit" value="Insert Author" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
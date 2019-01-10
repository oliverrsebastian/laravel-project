@extends('layout.app')

@section('css')

@endsection

@section('content')
	<div class="container">
		<div class="row mt-5 justify-content-center">
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header bg-info text-white">
						<h3>Insert New Genre</h3>
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" action="{{ route('genres.insert.verify') }}">
							{{ @csrf_field() }}
							@foreach($errors->all() as $error)
								<div>{{ $error }}</div>
							@endforeach
							<input type="hidden" name="id">

							<div class="form-group">
								<label for="">Genre Name</label>
								<input type="text" class="form-control" name="name">
							</div>
							<input type="submit" value="Insert Genre" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@extends('layout.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/book.detail.css') }}">
@endsection

@section('content')

	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-12">
				<div class="book-details">
					<div class="s1">
						<div class="details">
							<div class="details-primary">
								<h2 class="details-price">IDR. {{ $book['price'] }}</h2>
								<h2 class="details-stock">{{ $book['stock'] }} left</h2>
								<h2 class="details-rating">{{ $book['rating'] }}★</h2>
							</div>
							<h1 class="details-title">{{ $book['name'] }}</h1>
							<p><strong>Description:</strong> {{ $book['description'] }}</p>
							<p><strong>Genre:</strong> {{ $book['genre'] }}</p>
							<p><strong>Author:</strong> {{ $book['author'] }}</p>

							@if(Session::has('user'))
							@if($book['isAbleToRate'] == true)
      				@if(Session::get('user')->role == 0)
							<form method="POST" action="{{route('ratings.insert.verify', $book['id'])}}">
								{{ csrf_field() }}
								<input type="hidden" name="book_id" value="{{$book['id']}}">
								<label for="rating">
									<strong> Rating : </strong>
								</label>
								<label>
									Rating only from 1-5
								</label>
								<input type="text" class="form-control col-sm-6" name="rating">
								<button type="submit" class="btn btn-primary pl-3 pr-3 mt-2">Rate</button>
							</form>
							@endif
							@endif
							@endif
						</div>
					</div>
					<div class="s2">
						<img src="{{ asset('storage/'.$book['image']) }}">
					</div>
				</div>
			</div>
		</div>
	
@endsection
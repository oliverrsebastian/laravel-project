
@extends('layout.app')

@section('css')
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/book.home.css')}}"> --}}
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead c>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </thead>
                            @php 
                                $totalPrice = 0;
                            @endphp
                            @foreach($carts as $cart)
                                @if($cart->user_id == Session::get('user')->id)
                                    @php
                                        $bookController = new \App\Http\Controllers\BookController();
                                        $book = $bookController->findById($cart->book_id);
                                        $totalPrice += $cart->price;
                                    @endphp
                                    <tr>
                                        <td>{{ $book->name }}</td>
                                        <td>
                                            <img style="width: 200px; height: 200px;" src="{{ asset('storage/'.$book->image) }}">
                                        </td>
                                        <td>{{ $cart->price }}</td>
                                        <td>{{ $cart->qty }}</td>
                                        <td><a href="{{route('cart.delete', $cart->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            <td colspan="2" class="text-center font-weight-bold">
                                SUBTOTAL
                            </td>
                            <td class="font-weight-bold">{{$totalPrice}}</td>
                            <td></td>
                            <td><a href="{{route('transaction.insert')}}" class="btn btn-success">Checkout</a></td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <table>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Qty</th>
            <th></th>
        </tr>
        @php 
            $totalPrice = 0;
        @endphp
        @foreach($carts as $cart)
            @if($cart->user_id == Session::get('user')->id)
                @php
                    $bookController = new \App\Http\Controllers\BookController();
                    $book = $bookController->findById($cart->book_id);
                    $totalPrice += $cart->price;
                @endphp
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>
                        <img style="width: 200px; height: 200px;" src="{{ asset('storage/'.$book->image) }}">
                    </td>
                    <td>{{ $cart->price }}</td>
                    <td>{{ $cart->qty }}</td>
                    <td><a href="{{route('cart.delete', $cart->id)}}">Delete</a></td>
                </tr>
            @endif
        @endforeach
        <td colspan="2">
            SUBTOTAL
        </td>
        <td>{{$totalPrice}}</td>
        <td></td>
        <a href="{{route('transaction.insert')}}">Checkout</a>
    </table> --}}

@endsection
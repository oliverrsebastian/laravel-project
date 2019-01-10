{{--<a href="{{ route('transaction.insert') }}">Create Transaction</a>--}}

@extends('layout.app')

@section('css')

@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                    @foreach($transactions as $transaction)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="col-sm-6">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>: {{ $transaction->id }}</th>
                                        </tr>
                                        <tr>
                                            <th>Transaction Date</th>
                                            <th>: {{ $transaction->transactionDate }}</th>
                                        </tr>
                                        <tr>
                                            <th>User</th>
                                            @php
                                                $userController = new \App\Http\Controllers\UserController();
                                                $user = $userController->getUser($transaction->user_id);
                                            @endphp
                                            <th>: {{ $user->name }}</th><br>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            @php
                                $total = 0;
                                $cartController = new \App\Http\Controllers\CartController();
                                $carts = $cartController->findAll($transaction->id);
                            @endphp
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                @foreach($carts as $cart)
                                @php
                                    $bookController = new \App\Http\Controllers\BookController();
                                    $book = $bookController->getBook($cart->book_id);
                                @endphp
                                <tbody>
                                    <tr>
                                        <td><img src="{{ asset('storage/'.$book->image)}}" style="width:300px; height:300px;"></td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->stock }}</td>
                                        <td>{{ $book->price }}</td>
                                        @php
                                            $total += ($book->stock * $book->price);
                                        @endphp
                                    </tr>
                                </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>Total Price :</strong></td>
                                        <td><strong>{{$total}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

@endsection

{{--{{ $transactions->links() }}--}}
{{--<a href="{{ route('transaction.insert') }}">Create Transaction</a>--}}

@extends('layout.app')

@section('css')

@endsection

@section('content')

    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Transaction Date</th>
            <th>User</th>
        </tr>
        @foreach($transactions as $transaction)
            @if($transaction->user_id == Session::get('user')->id || Session::get('user')->role == 1)
            <tr>
                <td>
                    {{ $transaction->id }}
                </td>
                <td>
                    {{ $transaction->transactionDate }}
                </td>
                <td>
                    {{ \Illuminate\Support\Facades\Session::get('user')->id }}
                </td>
            </tr>
            @php
                $cartController = new \App\Http\Controllers\CartController();
                $carts = $cartController->findAll($transaction->id);
            @endphp
            @foreach($carts as $cart)
                @php
                    $bookController = new \App\Http\Controllers\BookController();
                    $book = $bookController->getBook($cart->book_id);
                @endphp
                <tr>
                    <td colspan="3" align="center">{{$book->name}}</td>
                </tr>
                <tr>
                    <td colspan="3" align="center">{{$cart->price}}</td>
                </tr>
                <tr>
                    <td colspan="3" align="center">{{$cart->qty}}</td>
                </tr>
            @endforeach
            @endif
        @endforeach
    </table>

@endsection

{{--{{ $transactions->links() }}--}}
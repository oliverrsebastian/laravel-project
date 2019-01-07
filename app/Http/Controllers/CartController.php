<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('transaction_id', null)->get();
        return view('cart.home', compact('carts'));
    }

    public function insert($bookId)
    {
        $bookController = new BookController();
        $book = $bookController->findById($bookId);
        if($book->stock < 0)
            return redirect(route('books.all'))->with('error', 'Stock Abis');
        return view('cart.insert', compact('book'));
    }

    public function save(Request $request)
    {
        $bookController = new BookController();
        $book = $bookController->findById($request->bookId);
        $cart = new Cart();
        $cart->book_id = $request->bookId;
        $cart->qty = $request->qty;
        $cart->user_id = Auth::user()->id;
        $cart->price = ($cart->qty * $book->price);

        if($book->stock - $cart->qty < 0)
            return redirect()->back()->with('error', 'Stock tidak mencukupi');

        $cart->save();
        return redirect(route('cart'))->with('success', 'Add to cart success!');
    }

    public function findAll($transactionId)
    {
        return Cart::where('transaction_id', $transactionId)->get();
    }


    public function checkout($transactionId)
    {
        $carts = Cart::where('transaction_id', null)->get();
        $bookController = new BookController();
        foreach ($carts as $cart) {
            if($cart->user_id == Session::get('user')->id){
                $cart->transaction_id = $transactionId;
                $bookController->reduceQty($cart->book_id, $cart->qty);
                $cart->save();
            }
        }
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return $this->index();
    }
}

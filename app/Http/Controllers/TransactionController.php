<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $cartController = new CartController();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('transaction.home', compact('transactions'));
    }

    public function save()
    {
        $transactionDate = Carbon::now()->toDateString();
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->transactionDate = $transactionDate;
        $transaction->save();
        $cartController = new CartController();
        $cartController->checkout($transaction->id);
        return redirect('/transactions')->with('success', 'Transaction successfully added');
    }
}

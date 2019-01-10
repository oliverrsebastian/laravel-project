<?php

namespace App\Http\Controllers;

use App\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class BookRatingController extends Controller
{
    public function __construct(){
        // new BookRatingController();
    }

    public function store(Request $request)
    {
        $rules = [
            'book_id' => 'required | integer',
            'rating' => 'required | integer | between:1,5'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect(route('books.detail', $request->book_id))->withErrors($validator->errors());
        }
        $rating = BookRating::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->count();
        if ($rating > 0) {
            return redirect(route('books.detail', $request->book_id))->with('error', 'User rating already exist');
        }
        $bookRating = new BookRating();
        $bookRating->book_id = $request->book_id;
        $bookRating->user_id = Auth::user()->id;
        $bookRating->rating = $request->rating;
        $bookRating->save();
        return redirect(route('books.detail', $request->book_id))->with('success', 'Rating has been added');
    }
}

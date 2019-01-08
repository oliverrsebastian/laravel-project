<?php

namespace App\Http\Controllers;

use App\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookRatingController extends Controller
{

    public function store(Request $request)
    {
        $rules = [
            'book_id' => 'required | integer',
            'rating' => 'required | numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $rating = BookRating::where('book_id', $request->book_id)->where('user_id', Auth::user()->id)->count();
        if ($rating > 0)
            return redirect()->back()->with('error', 'User rating already exist');
        $bookRating = new BookRating();
        $bookRating->book_id = $request->book_id;
        $bookRating->user_id = Auth::user()->id;
        $bookRating->rating = $request->rating;
        $bookRating->save();
        return redirect()->back()->with('success', 'Rating has been added');
    }
}

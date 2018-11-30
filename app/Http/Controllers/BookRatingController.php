<?php

namespace App\Http\Controllers;

use App\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookRatingController extends Controller
{
    public function getRating($bookId)
    {
        $listOfRatings = BookRating::where('book_id', $bookId);
        $ratingCount = $listOfRatings->count();
        $totalRating = 0;
        foreach ($listOfRatings as $rating) {
            $totalRating += $rating->rating;
        }
        $ratings = [
            $ratingCount, $totalRating
        ];
        return $ratings;
    }

    public function store(Request $request)
    {
        $rules = [
            'book_id' => 'required | integer',
            'user_id' => 'required | integer',
            'rating' => 'required | float'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());
        $bookRating = new BookRating();
        $bookRating->book_id = $request->book_id;
        $bookRating->user_id = $request->user_id;
        $bookRating->rating = $request->rating;
        $bookRating->save();
        return redirect()->back()->with('success', 'Rating has been added');
    }
}

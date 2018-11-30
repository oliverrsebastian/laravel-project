<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->paginate(8);
        return view('books', compact('books'));
    }

    public function create()
    {
        return view('createBook');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('book', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('editBook', 'book');
    }

    public function update(Request $request, $id)
    {
        $rules = $this->getValidationRule();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $book = Book::find($id);
        $this->saveBookData($book, $request);
        return view('books')->with('success', 'Book has been edited');
    }

    /**
     * @return array
     */
    private function getValidationRule(): array
    {
        $rules = [
            'name' => 'min:3 | required',
            'genre' => 'required',
            'author' => 'required',
            'price' => 'min:5001 | required | integer',
            'description' => 'between:20,200 | required',
            'stock' => 'min:1 | required | integer',
            'image' => 'mimes:jpeg, jpg, png  | required'
        ];
        return $rules;
    }

    /**
     * @param Request $request
     */
    private function saveBookData(Book $book, Request $request)
    {
        $book->name = $request->name;
        $book->genre = $request->genre;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->stock = $request->stock;
        $book->image = $request->image;
        if ($book->rating < 0 | $book->rating == null)
            $book->rating = 0.0;
        $book->save();
    }

    public function addRating($id)
    {

    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return view('book')->with('success', 'Book has been deleted');
    }

    public function store(Request $request)
    {
        $rules = $this->getValidationRule();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $book = new Book();
        $this->saveBookData($book, $request);
        return view('books')->with('success', 'Book has been added');
    }
}

<?php

namespace App\Http\Controllers;

use Gate;
use Validator;
use Storage;
use Illuminate\Http\Request;
use App\Book;
use App\Page;

class BookController extends Controller
{

		public function __construct(){
			// $this->middleware();
		}

    public function index(){
    	$page_key = 'page_home'; 
    	$page = Page::where('page_key', $page_key)->get()->first();
    	if(Gate::denies('show-page', $page)){
        // abort(403, 'Sorry, not sorry.');
        if(1 != $page->guest) return redirect()->route('login');
    	}
      $books = Book::paginate(8);
    	return view('book.home', compact('books'));
    }

    public function insert()
    {
        return view('book.insert');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('book.home-detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit')->with('book', $book);
    }

    public function update(Request $request)
    {
        $rules = $this->getValidationRule();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $book_id = $request->id;
        $book = Book::find($book_id);
        $this->saveBookData($book, $request);
				return redirect('/')->with('success', 'Book has been updated');
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
            'price' => 'integer | min:5000 | required',
            'description' => 'between:20,200 | required',
            'stock' => 'min:1 | required | integer',
            'image' => 'mimes:jpeg,jpg,png | required'
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
				$filename = $request->file('image')->getClientOriginalName();
				Storage::putFileAs('public', $request->file('image'), $filename);
        $book->image = $filename;
        $book->rating = 0;
        $book->save();
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
        return redirect('/')->with('success', 'Book has been added');
        
    }

}

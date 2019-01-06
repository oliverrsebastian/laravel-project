<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(8);
        return view('author.home', compact('authors'));
    }

    public function insert()
    {
        return view('author.insert');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('author.edit', compact('author'));
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->back()->with('success', 'Author has been deleted');
    }

    public function update(Request $request)
    {
        $rules = $this->getValidationRules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $author_id = $request->id;
        $author = Author::find($author_id);
        $this->saveAuthorData($author, $request);

        return redirect(route('authors.all'))->with('success', 'Author has been edited');
    }

    private function getValidationRules(): array
    {
        $rules = [
            'name' => 'required | unique:authors| min:5',
            'dob' => 'required | date_format:d/m/Y',
            'country' => 'required'
        ];
        return $rules;
    }

    private function saveAuthorData(Author $author, Request $request)
    {
        $author->name = $request->name;
        $author->dob = $request->dob;
        $author->country = $request->country;
        $author->save();
    }

    public function store(Request $request)
    {
        $rules = $this->getValidationRules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $author = new Author();
        $this->saveAuthorData($author, $request);

        return redirect(route('authors.all'))->with('success', 'Author has been added');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Storage;
use Validator;

class UserController extends Controller
{
    public function index(){
    	$user = Session::get('user');
    	return view('user.profile', compact('user'));
    }

    public function manageUser(){
    	$users = User::all();
    	return view('user.home', compact('users'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
    	return view('user.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $rules = $this->getValidationRule();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());
        $user_id = $request->id;
        $user = User::find($user_id);
        $this->saveUserData($user, $request);
        return redirect(route('users.all'))->with('success', 'User has been updated');
    }
    private function getValidationRule(): array
    {
        $rules = [
            'name' => 'min:5 | max:50 | required',
            'email' => 'required | email | unique:users',
            'phone' => 'digits:12 | required',
            'address' => 'min:10 | required',
            'picture' => 'mimes:jpeg,jpg,png | required',
        ];
        return $rules;
    }
    private function saveUserData(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $filename = $request->file('picture')->getClientOriginalName();
        Storage::putFileAs('public', $request->file('picture'), $filename);
        $user->picture = $filename;
        $user->save();
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User has been deleted');
    }

    public function getUser($id){
        return User::find($id);
    }
}

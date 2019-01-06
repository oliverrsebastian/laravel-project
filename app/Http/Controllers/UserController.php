<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function update(){

    }
    public function delete(){

    }
}

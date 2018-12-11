<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Gate;

class CartController extends Controller
{
    public function index(){
    	$page_key = 'page_cart'; 
    	$page = Page::where('page_key', $page_key)->get()->first();

    	// if($user = Gate::denies('show-page', $page)){
    		// abort(403, 'Sorry, not sorry.');
    	// }
  		return view('cart.mycart');

      // if(!$user) return redirect()->route('books.all');
    }
}

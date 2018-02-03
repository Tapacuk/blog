<?php namespace App\Http\Controllers;

class PagesController extends Controller {
  public function home()
  {
   return view('welcome'); 
  }
  public function about()
  {
   return view('about'); 
  }
  public function contact()
  {
   return view('tickets.create'); 
  }
  public function create()
  {
  	return view('tickets.create');
  }
}

?>
<?php

namespace App\Http\Controllers\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class MarketController extends Controller
{
    public function index()
    {
    		$products = Product::all();
    		return view('market.index', compact('products'));
    }
    
    public function show($slug)
    {
    		$product = Product::where('slug', '=', $slug)->first();
    		return view('market.show', compact('product'));
    }
}

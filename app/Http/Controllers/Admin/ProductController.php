<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Product;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function index()
    {
    		$products = Product::all();
    		return view('backend.products.index', compact('products'));
    }
    
    public function create()
    {
    		return view('backend.products.create');
    }
    
    public function store(ProductFormRequest $request)
    {
    		$avatar = $request->file('avatar');
		    $filename = time() . '.' . $avatar->getClientOriginalExtension();
		    Image::make($avatar)->save( public_path('/uploads/market/' . $filename) );
    
    		$product = new Product(array(
		    				'name' => $request->get('name'),
		    				'description' => $request->get('description'),
		    				'slug' => Str::slug($request->get('name'), '-'),
		    				'avatar' => $filename,
		    				'price' => $request->get('price'),
		    				'priceText' => $request->get('priceTxt'),
		    		));
		    		
		    $product->save();
		    
		    return redirect('/admin/products/create')->with('status', 'The product has been created!');				
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Product;
use App\Pcategory;
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
    		$categories = Pcategory::all();
    		return view('backend.products.create', compact('categories'));
    }
    
    public function store(ProductFormRequest $request)
    {
    		$avatar = $request->file('avatar');
		    $filename = time() . '.' . 'png';
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
		    $product->pcategories()->sync($request->get('categories'));
		    
		    return redirect('/admin/products/create')->with('status', 'The product has been created!');				
    }
    
    public function edit($slug)
    {
    		$product = Product::where('slug', '=', $slug)->firstOrFail();
    		$categories = Pcategory::all();
    		$selectedCategories = $product->pcategories->pluck('id')->toArray();
    		
    		return view('backend.products.edit', compact('product', 'categories', 'selectedCategories'));
    }
    
    public function update($slug, ProductFormRequest $request)
    {
    		$product = Product::where('slug', '=', $slug)->firstOrFail();
    		$product->name = $request->get('name');
    		$product->description = $request->get('description');
    		if($request->hasFile('avatar')){
    				$avatar = $request->file('avatar');
		    		$filename = time() . '.' . 'png';
		    		Image::make($avatar)->save( public_path('/uploads/market/' . $filename) );
		    			$product->avatar = $filename;
    		}
    		
    		$product->slug = Str::slug($request->get('name'), '-');
    		
    		$product->save();
						$product->pcategories()->sync($request->get('categories'));
						
						return redirect(action('Admin\ProductController@edit', $product->slug))->with('status', 'The product had been updated!');
    }
}

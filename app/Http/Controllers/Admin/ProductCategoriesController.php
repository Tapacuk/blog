<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pcategory;
use App\Http\Requests\CategoryFormRequest;

class ProductCategoriesController extends Controller
{
    public function create()
    {
    		return view('backend.categories.market_create');
    }
    
    public function store(CategoryFormRequest $request)
    {
    		$category = new Pcategory(array(
    				'name' => $request->get('name'),
    		));

    		$category->save();
    		
    		return redirect('/admin/products/categories/create')->with('status', 'A new category	has been created!');	
    }
    
    public function index()
    {
    		$categories = Pcategory::all();
    		return view('backend.categories.market_index', compact('categories'));
    }
}

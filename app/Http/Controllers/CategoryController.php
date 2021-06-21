<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat_id)
    {
        $products_of_category = Category::findOrFail($cat_id)::with('products.images')->get();
        return response()->json($products_of_category);
    }


     /**
     * get product details
     *
     */
    public function getProductDetails($id)
    {
        $product = Product::with('images')->find($id);
        return response()->json($product);
    }

}

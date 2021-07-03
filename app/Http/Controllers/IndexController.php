<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
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
    public function index() 
    {
        $products_of_categories = Category::with(['products.images'])->get()->take(6);
        return response()->json($products_of_categories);
    }

    /**
     * Display searched products.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchProducts($name)
    {
        $result = Product::where('name', '=', $name)->with('images')->get();
        if($result){
            return response()->json($result, 200);
        }else{
            return response()->json('Products not found', 404);
        }
        
    }

}

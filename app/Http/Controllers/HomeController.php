<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        return response()->json([
            'logged' => true,
            'email' => $user->email
            ]);
    }

    /**
     * display 4 posts from random category;
     */
    public function showPosts(){
        $rand_category = rand(1,6);
        $rand_product = rand(1, 11);
        $products_of_category = Category::findOrFail($rand_category)::with('products.images')->take(4)->get();
        $products_to_send = [];
        foreach($products_of_category as $category){
            $products_to_send[] = $category['products'][$rand_product];
        }
        return response()->json($products_to_send, 200);
    }

     /**
     * display 4 posts from random category;
     */
    public function showSinglePost(){
        $rand_category = rand(1,6);
        $rand_product = rand(1, 11);
        $products_of_category = Category::findOrFail($rand_category)::with('products.images')->take(1)->get();
        $product_to_send = [];
        foreach($products_of_category as $category){
            $product_to_send[] = $category['products'][$rand_product];
        }
        return response()->json($product_to_send, 200);
    }
}

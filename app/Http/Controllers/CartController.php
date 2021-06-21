<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;



class CartController extends Controller
{

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:sanctum');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = $request->post();
        $user = Auth::user();       
        foreach($products as $product){
            if($product !== null){
                $product_id = $product["product_id"];
                $product_quantity =$product["pivot"]["quantity"];                  
                $user->products()->syncWithoutDetaching([$product_id => ['quantity'=>$product_quantity]]);                
            }            
        }
        return response()->json(['products_added']);
    }

    /*check user cart (quantity of products) */
    public function checkIfProductsInCartExists(){
        $user = Auth::user();
        
        if($user){
            $products = $user->products()->get();
            return response()->json(['cart_products' => $products]);
        }else{
            return response()->json(['You are not login']);
        }
        
    }

    /*remove all products from cart*/
    public function removeAllProductsFromCart(){
        $user = Auth::user();
        $user_id = $user;
        DB::table('product_user')->whereIn('user_id', $user_id)->delete();
        return response()->json(['cart_products_of_user_removed' => $user_id]);
    }
}

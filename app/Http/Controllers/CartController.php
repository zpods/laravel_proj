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
    public function createCart(Request $request)
    {
        $products = $request->post();
        //return($products);
        $user = Auth::user();  
        if($products){
            foreach($products['cart'] as $product){
                if($product !== null){
                    $product_id = $product["product_id"];
                    $product_quantity =$product["ordered"];                  
                    $user->products()->syncWithoutDetaching([$product_id => ['quantity'=>$product_quantity]]);                
                }            
            }
        }else{
            $products = $user->products()->get();
            foreach ($products as $product) {
                $user->products()->detach($product->product_id);
            }
            return response()->json(['products_removed']);
        }    
        
        return response()->json(['products_added']);
    }

    /*check user cart (quantity of products) */
    public function getCart(){
        $response = [];
        $user = Auth::user();
        
        if($user){
            $products = $user->products()->get();
            foreach($products as $product){
                $images = $product->images()->get();
                $result = $product;
                $product['images'] = $images;
                array_push($response, $result);
            }
            return response()->json(['cart_products' => $response]);
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

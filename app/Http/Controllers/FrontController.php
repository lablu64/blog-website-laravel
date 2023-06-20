<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function ProductDetails($id){
        $product = Product::findOrFail($id);

        $product->views += 1;
        $product->save();
    
        $reletade_product = Product::where('category_id',$product->category_id)
                            ->where('status','active')
                            ->latest()
                            ->get();
        return view('frontend.product-details',compact('product','reletade_product'));
    }
   public function cart(){
    return view('frontend.cart');
   }



}

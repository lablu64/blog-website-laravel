<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    public function ProductDetails($slug){
        $product = Product::where('slug',$slug)->first();
        

        // $product->views += 1;
        $product->save();
        // dd($product);
        // die();
    
        $reletade_product = Product::where('slug',$product->slug)
                            ->latest()
                            ->get();
        return view('frontend.sigle_page',compact('product','reletade_product'));
    }

    public function categorytDetails($slug){
        $category= Category::where('slug',$slug)->first();
        
        if($category){
         
         $product = Product::where('category_id',$category->id)->paginate(10);
          return view('frontend.category',compact('category','product'));


        }
       
      
    }
}

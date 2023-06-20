<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        // print_r($products);
        // die();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::where('status','active')->get();
       

        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product_name' => 'required|unique:products',
            'category_id' => 'required',
            'long_des' => 'required',
            'photo' => 'required',
            
        ]);
      
        $models = new Product;
        $models->product_name  = $request->product_name  ;
        $models->category_id  = $request->category_id  ;
        $models->long_des  = $request->long_des  ;
        // $models->status  = $request->status  ;
        $models->slug = strtolower(str_replace(' ','-',$request->product_name));  ;
      
        $image =$request->file('photo');
        $img_name=hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        $request->photo->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;
        $models->photo = $img_url; 
        
        $models->save();
        $notification = array(
            'message' => 'Post Created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.post.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category= Category::where('status','active')->get();
        return view('admin.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'category_id' => 'required',
            'long_des' => 'required',
          
            
        ]);
   
      
        $models = Product::findOrFail($id);
        $models->product_name  = $request->product_name  ;
        $models->category_id  = $request->category_id  ;
        $models->long_des  = $request->long_des  ;
        // $models->status  = $request->status  ;
        $models->slug = strtolower(str_replace(' ','-',$request->product_name)); 
    
        // $request->validate([
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $id=$request->id;
        // $image =$request->file('photo');
        // $img_name=hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        // $request->photo->move(public_path('upload'),$img_name);
        // $img_url = 'upload/' . $img_name;
        
        // Product::findOrFail($id)->update([
        //     'photo' => $img_url,

        // ]);
        // $models->photo ;
        if($request->hasFile('photo')){
                $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $id=$request->id;
            $image =$request->file('photo');
            $img_name=hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            $request->photo->move(public_path('upload'),$img_name);
            $img_url = 'upload/' . $img_name;
            
           
            // Old FIle Deleted 
            if ($request->old_photo) {
                $path = public_path().'/'.$request->old_photo;
            //     dd($path);
            //   die();
                unlink($path);
            }

            Product::findOrFail($id)->update([
                'photo' => $img_url,

            ]);
            $models->photo ;

          

        }
        
       
       $models->save();
    //    dd($models);
    //   die();
    $notification = array(
        'message' => 'Post updated successfully!',
        'alert-type' => 'success'
    );
     return redirect()->route('admin.post.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       
        $product = Product::find($id);
	     $product->delete();
        $notification = array(
            'message' => 'Post deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.post.index')->with($notification);
    }
 
}

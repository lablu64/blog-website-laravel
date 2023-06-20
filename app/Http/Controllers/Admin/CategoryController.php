<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:categories|max:255',
            'status' => 'required',
            
        ],[
            'category_name.required' => 'A category name is required',
            'category_name.unique' => 'A category name is already exit',
            'status.required' => 'A status is required',
        ]);
        $model = new Category();
        $model->category_name = $request->category_name;
        $model->status = $request->status;
        $model->slug = strtolower(str_replace(' ','-',$request->category_name));
        $model->save();
        // $notification = array(
        //     'message' => 'Category created successfully!',
        //     'alert-type' => 'success'
        // );
        return redirect()->route('admin.category.index')->with('message','category added Successfully');

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
        $category =Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category =Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->save();
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification = array(
            'message' => 'category deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }

    // public function getSubcategory(Request $request)
    // {
    //     $data['states'] = SubCategory::where('status','active')->where("category_id", $request->category_id)
    //                             ->get();
  
    //     return response()->json($data);
    // }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\MetaDes;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MetaDescription extends Controller
{
   
    public function edit($id)
    {
        $metas =DB::table('metadecriptions')->where('id',$id)->first();
       
        return view('admin.metadescription.edit',compact('metas'));
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
        // $metas =MetaDes::find($id);
        // $metas->metades;
     
        // $metas->save();

        $data=array();
        $data['metades'] = $request->metades;
       DB::table('metadecriptions')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Meta Description updated successfully!',
            'alert-type' => 'success'
        );

         
        return back()->with($notification);
    }

 
}

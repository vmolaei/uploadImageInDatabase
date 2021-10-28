<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function uoload(){
        $imgs = Image::all();
        return view("upload",["imgs"=>$imgs]);
    }
    public function save_image(Request $request){
        if($request->hasFile('img_src')){
            $image = $request->file('img_src');
            $reimage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('imgs');
            $image->move($dest,$reimage);
            //save data
            $image = new Image();
            $image->img_alt = $request->img_alt;
            $image->img_src = $reimage;
            $image->save();
            return redirect("image/upload")->with("success","image has been uploaded");


        }else{
            return redirect("image/upload")->with("msg","please choose file");
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MainController extends Controller
{
    public function add(Request $request){
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["category_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["category_pic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
  
    }
    //  dd($uploadOk);
    if($uploadOk == 1):
        move_uploaded_file($_FILES["category_pic"]["tmp_name"], $target_file);
    endif;
    
   DB::table('blog')->insert([
           "blog_title"=>$request->input('title'),
           "blog_contents"=>$request->input('editor1'),
           "blog_slug"=>str_slug($request->input('title'),'-'),
           "blog_pic"=>basename($_FILES["category_pic"]["name"]),
           "category_id"=>$request->input('category'),
        ]);
        return back()->with('status','Add with success');
    }
    public function addctg(Request $request){
        //dd($request->all());
        $slug = str_slug($request->input('ctg'),'-');
        DB::table('category')->insert([
                "category_name"=>$request->input('ctg') ,                          
                "category_slug"=>$slug                      
            ]);
        return back()->with('status','Add with success');
    }
    public function details($slug){
        $blog = DB::table('blog')->where('blog_slug',$slug)->join('category','category.category_id','=','blog.category_id')->first();
        if(empty($blog)):
            return back()->with('status','article not found');
        endif;
        $blog->blog_pic = asset('uploads/'.$blog->blog_pic);
        //dd($blog);
        return view('details',compact('blog'));
    }
}

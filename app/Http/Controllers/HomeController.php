<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
public function welcome(){
    $blogs = DB::table('blog')->orderBy('created_at','DESC')->get();
    foreach($blogs as $item):
        $item->blog_pic = asset('uploads/'.$item->blog_pic);
        $item->blog_contents = strip_tags($item->blog_contents);
    endforeach;
    //dd($blogs);
    return view('welcome',compact('blogs'));
}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctgs = DB::table('category')->orderBy('category_id','ASC')->get();
        //  dd($ctgs);
        return view('home',compact('ctgs'));
    }
}

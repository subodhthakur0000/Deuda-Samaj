<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\About;
use App\Gallery;
use App\Contactdetail;
use App\Seo;
use App\Traits\Validation;
use Carbon\Carbon;
use DB;

class FrontendController extends Controller
{
	use Validation;
    public function index()
    {
    	$banner = Banner::where('status','Active')->orderBy('created_at', 'desc')->get()->first();
    	$about = About::where('status','Active')->orderBy('created_at','desc')->get()->first();
    	$gallery = Gallery::where('status','Active')->orderBy('created_at','desc')->get()->take(4);
    	$contactdetail = Contactdetail::orderBy('created_at','desc')->get()->first();
        $seo = Seo::where('pagetitle','Home')->orderBy('created_at','desc')->get()->first();
    	return view('home.home',compact('banner','about','gallery','contactdetail','seo'));	
    }

    public function storecontact()
    {
    	$a=[];
	   $test=$this->contactvalidation();
	   $a['created_at'] = Carbon::now('Asia/Kathmandu');
	   $merge = array_merge($test,$a);
	   DB::table('contacts')->insert($merge);
	   return redirect('/')->with('success','Message Sent Successfully');
    }
}

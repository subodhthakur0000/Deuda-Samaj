<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Traits\Validation;
use Illuminate\Http\UploadedFile;
use DB;
class BannerController extends Controller
{
  use Validation;
  public function index()
  {
    $data = Banner::orderby('created_at','desc')->get();
    return view('cd-admin.banner.banner',compact('data'));
  }

  public function create()
  {
    return view('cd-admin.banner.create-banner');
  }

  public function store(Banner $b)
  {
    $test=$this->bannervalidation();
    $b->storebanner($test);
    return redirect('/banner')->with('success','Inserted Successfully');
  }

  public function edit($id)
  {
    $data = DB::table('banners')->where('id',$id)->get()->first();
    return view('cd-admin.banner.edit-banner',compact('data'));
  }

  public function update(Banner $b,$id)
  {
    $test = $this->bannerupdatevalidation();
    $b->updatebanner($test,$id);
    return redirect('/banner')->with('success','Updated Successfully');
  }

  public function updatestatus(Banner $b,$id)
  {
    $b->updatestatus($id); 
    return redirect('/banner')->with('success','Status Updated Successfully');

  }

  public function destroy(Banner $b,$id)
  {
    $b->deletebanner($id);
    return redirect('/banner')->with('error','Deleted Successfully');
  }
}


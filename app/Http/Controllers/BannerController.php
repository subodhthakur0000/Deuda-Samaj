<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use DB;

class BannerController extends Controller
{
    use Validation;
    use Imagetrait;

    public function index()
    {
        $data = Banner::orderby('created_at','desc')->get();
        return view('cd-admin.banner.banner',compact('data'));
    }

    public function create()
    {
        return view('cd-admin.banner.create-banner');
    }

    public function store()
    {
        $a=[];
        $test=$this->bannervalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['image'] = $this->imageupload($test['image']);
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('banners')->insert($merge);
        return redirect('/banner')->with('success','Inserted Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('banners')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('banners')->where('slug',$slug)->update($a);
      return redirect('/banner')->with('success','Status Updated Successfully');

     }

     public function destroy($slug)
    {
      $imageunlink = DB::table('banners')->where('slug',$slug)->get()->first();
      if(file_exists('public/uploads/'.$imageunlink->image))
      {
        unlink('public/uploads/'.$imageunlink->image);
      }
        DB::table('banners')->where('slug',$slug)->delete();
        return redirect('/banner')->with('error','Deleted Successfully');
    }
}


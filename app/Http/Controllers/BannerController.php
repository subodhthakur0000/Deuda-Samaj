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

     public function edit($id)
      {
          $data = DB::table('banners')->where('id',$id)->get()->first();
          return view('cd-admin.banner.edit-banner',compact('data'));
      }

       public function update($id)
          {
              $a = [];
              $test = $this->bannerupdatevalidation();
              $a['updated_at'] = Carbon::now();
              $a['slug'] = str_slug($test['title']);  
             $image = DB::table('banners')->where('id',$id)->get()->first();
               if(!empty($test['image']))
               {
                unlink('public/uploads/'.$image->image);
                $a['image'] = $this->imageupload($test['image']);
              }
              else{

                $a['image'] = $image->image;

              }

              $merge = array_merge($test,$a);

          DB::table('banners')->where('id',$id)->update($merge);
          return redirect('/banner')->with('success','Updated Successfully');
      }

    public function updatestatus($id)
    {
      $a = [];
      $data = DB::table('banners')->where('id',$id)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('banners')->where('id',$id)->update($a);
      return redirect('/banner')->with('success','Status Updated Successfully');

     }

     public function destroy($id)
    {
      $imageunlink = DB::table('banners')->where('id',$id)->get()->first();
      if(file_exists('public/uploads/'.$imageunlink->image))
      {
        unlink('public/uploads/'.$imageunlink->image);
      }
        DB::table('banners')->where('id',$id)->delete();
        return redirect('/banner')->with('error','Deleted Successfully');
    }
}


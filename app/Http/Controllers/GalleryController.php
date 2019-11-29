<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use DB;

class GalleryController extends Controller
{
   use Validation;
    use Imagetrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gallery::orderby('created_at','desc')->get();
        return view('cd-admin.Gallery.view-gallery',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cd-admin.Gallery.create-gallery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $a=[];
        $test=$this->galleryvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['image'] = $this->imageupload($test['image']);
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('galleries')->insert($merge);
        return redirect('/galleries')->with('success','Inserted Successfully');
    }


    public function updatestatus($id)
    {
      $a = [];
      $data = DB::table('galleries')->where('id',$id)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('galleries')->where('id',$id)->update($a);
      return redirect('/galleries')->with('success','Status Updated Successfully');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageunlink = DB::table('galleries')->where('id',$id)->get()->first();
            if(file_exists('public/uploads'.$imageunlink->image))
            {
                unlink('public/uploads'.$test->imageunlink);
            }
        DB::table('galleries')->where('id',$id)->delete();
        return redirect('/galleries')->with('error','Deleted Successfully');
    }
}

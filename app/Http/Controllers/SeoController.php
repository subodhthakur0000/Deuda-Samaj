<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;

class SeoController extends Controller
{
	use Validation;

    public function index()
  {
    $seo = Seo::orderBy('created_at', 'desc')->get();
    return view('cd-admin.seo.view-seo',compact('seo'));


  }

  public function insertform()
  {
    return view('cd-admin.seo.add-seo');
  }

  public function store()
  {
   $a=[];
   $test=$this->seovalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('seos')->insert($merge);
   return redirect('/viewseo')->with('success','Inserted Successfully');
 }

 public function edit($id)
 {
  $seo = Seo::findorfail($id);

  return view('cd-admin.seo.edit-seo',compact('seo'));
}

public function update($id)
{
 $a=[];
 $test=$this->seoupdatevalidation();
 $a['updated_at'] = Carbon::now('Asia/Kathmandu');
 $merge =  array_merge($test,$a);
 DB::table('seos')->where('id',$id)->update($merge);
 return redirect('/viewseo')->with('success','Updated Successfully');
}

public function delete($id)
{
  DB::table('seos')->where('id',$id)->delete();
  return redirect('/viewseo')->with('error','Deleted Successfully');
}

}

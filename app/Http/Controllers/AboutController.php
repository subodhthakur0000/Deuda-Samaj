<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use DB;
use App\About;
use Carbon\Carbon;

class AboutController extends Controller
{
   use Validation;
	    use Imagetrait;

        public function index()
	    {
	         $data = About::all();
	        return view('cd-admin.About.about',compact('data'));
	    }


	     public function create()
		    {
		         return view ('cd-admin.About.create-about');
		    }

		public function store()
	    {
	        $a=[];
	        $test = $this->aboutvalidation();
	        $a['created_at'] = Carbon::now('Asia/Kathmandu');
       		$a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);
	        DB::table('abouts')->insert($merge);
	        return redirect('/abouts')->with('success','Inserted Successfully');
	    }

	    public function edit($slug)
	    {
	        $data = DB::table('abouts')->where('slug',$slug)->get()->first();
	        return view('cd-admin.About.edit-about',compact('data'));
	    }

	     public function update($slug)
	    {
	        $a = [];
	        $test = $this->aboutupdatevalidation();
	        $a['updated_at'] = Carbon::now();
	        $a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);

	        $imageunlink = DB::table('abouts')->where('slug',$slug)->get()->first();
			if(file_exists('public/uploads'.$imageunlink->image))
			{
				unlink('public/uploads'.$test->imageunlink);
			}


	        DB::table('abouts')->where('slug',$slug)->update($merge);
	        return redirect('/abouts')->with('success','Updated Successfully');
	    }

	     public function updatestatus($slug)
	    {
	      $a = [];
	      $data = DB::table('abouts')->where('slug',$slug)->get()->first();
	      if($data->status=='Active')
	      {
	        $a['status'] = 'Inactive';
	      }
	      else
	      {
	        $a['status'] = 'Active'; 
	      }
	      DB::table('abouts')->where('slug',$slug)->update($a);
	      return redirect('/abouts')->with('success','Status Updated Successfully');

	     }

	      public function destroy($slug)
		  {
		  	$imageunlink = DB::table('abouts')->where('slug',$slug)->get()->first();
			if(file_exists('public/uploads'.$imageunlink->image))
			{
				unlink('public/uploads'.$test->imageunlink);
			}
		    DB::table('abouts')->where('slug',$slug)->delete();
		    return redirect('/abouts')->with('error','Deleted Successfully');
		  }
}

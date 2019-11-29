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

	public function store(About $a)
	{
		$test = $this->aboutvalidation();
		$a->store($test);
		return redirect('/abouts')->with('success','Inserted Successfully');
	}

	public function edit($id)
	{
		$data = DB::table('abouts')->where('id',$id)->get()->first();
		return view('cd-admin.About.edit-about',compact('data'));
	}

	public function update(About $a,$id)
	{
		$test = $this->aboutupdatevalidation();
		$a->updateabout($id,$test);
		return redirect('/abouts')->with('success','Updated Successfully');
	}

	public function updatestatus($id)
	{
		$a = [];
		$data = DB::table('abouts')->where('id',$id)->get()->first();
		if($data->status=='Active')
		{
			$a['status'] = 'Inactive';
		}
		else
		{
			$a['status'] = 'Active'; 
		}
		DB::table('abouts')->where('id',$id)->update($a);
		return redirect('/abouts')->with('success','Status Updated Successfully');

	}

	public function destroy($id)
	{
		$imageunlink = DB::table('abouts')->where('id',$id)->get()->first();
		if(file_exists('public/uploads/'.$imageunlink->image))
		{
			unlink('public/uploads/'.$imageunlink->image);
		}
		DB::table('abouts')->where('id',$id)->delete();
		return redirect('/abouts')->with('error','Deleted Successfully');
	}
}

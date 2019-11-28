<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactdetail;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;

class ContactdetailController extends Controller
{
	use Validation;

	public function index()
	{
		$contactdetail = Contactdetail::orderBy('created_at', 'desc')->get();
		return view('cd-admin.contact.contactdetail.view-contactdetail',compact('contactdetail'));


	}

	public function insertform()
	{
		return view('cd-admin.contact.contactdetail.add-contactdetail');
	}

	public function store()
	{

		$a=[];
		$test=$this->contactdetailvalidation();
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$merge = array_merge($test,$a);
		DB::table('contactdetails')->insert($merge);
		return redirect('/viewcontactdetail')->with('success','Inserted Successfully');
	}

	public function edit($id)
	{
		$contactdetail = Contactdetail::where('id',$id)->get()->first();
		return view('cd-admin.contact.contactdetail.edit-contactdetail',compact('contactdetail'));
	}

	public function update($id)
	{
		$a=[];
		$test=$this->contactdetailupdatevalidation();
		$a['updated_at'] = Carbon::now('Asia/Kathmandu');
		$merge =  array_merge($test,$a);
		DB::table('contactdetails')->where('id',$id)->update($merge);
		return redirect('/viewcontactdetail')->with('success','Updated Successfully');
	}

	public function delete($id)
	{
		DB::table('contactdetails')->where('id',$id)->delete();
		return redirect('/viewcontactdetail')->with('error','Deleted Successfully');
	}

}
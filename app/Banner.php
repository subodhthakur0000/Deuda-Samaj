<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Banner;
use App\Traits\Imagetrait;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use DB;

class Banner extends Model
{
	use Imagetrait;
	protected $guarded =[];
	public function storebanner($test)
	{
		$a=[];
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$a['image'] = $this->imageupload($test['image']);
		$a['slug'] = str_slug($test['title']);
		$merge = array_merge($test,$a);
		DB::table('banners')->insert($merge);
	}

	public function updatebanner($test,$id)
	{
		$a = [];
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
	}

	public function deletebanner($id)
	{
		$imageunlink = DB::table('banners')->where('id',$id)->get()->first();
		if(file_exists('public/uploads/'.$imageunlink->image))
		{
			unlink('public/uploads/'.$imageunlink->image);
		}
		DB::table('banners')->where('id',$id)->delete();
	}
}

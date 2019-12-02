<?php

namespace App;
use App\About;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Imagetrait;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;

class About extends Model
{
	use Imagetrait;
	protected $guarded =[];

    public function store($test)
    {
    	$a=[];
	    $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['image'] = $this->imageupload($test['image']);
        $a['slug'] = str_slug($test['title']);
	    $merge = array_merge($test,$a);
	    DB::table('abouts')->insert($merge);
    }

    public function updateabout($id,$test)
    {
    	$a = [];
		$a['updated_at'] = Carbon::now();
		$image = DB::table('abouts')->where('id',$id)->get()->first();
		if(!empty($test['image']))
		{
			unlink('public/uploads/'.$image->image);
			$a['image'] = $this->imageupload($test['image']);
		}
		else{

			$a['image'] = $image->image;

		}
		$a['slug'] = str_slug($test['title']);
		$merge = array_merge($test,$a);
		DB::table('abouts')->where('id',$id)->update($merge);
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
    }

    public function deleteabout($id)
    {
    	$imageunlink = DB::table('abouts')->where('id',$id)->get()->first();
		if(file_exists('public/uploads/'.$imageunlink->image))
		{
			unlink('public/uploads/'.$imageunlink->image);
		}
		DB::table('abouts')->where('id',$id)->delete();
    }
}

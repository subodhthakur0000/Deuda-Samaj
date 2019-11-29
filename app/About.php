<?php

namespace App;

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

    public function updateabout($slug,$test)
    {
    	$a = [];
		$a['updated_at'] = Carbon::now();
		$image = DB::table('abouts')->where('slug',$slug)->get()->first();
		if(!empty($test['image']))
		{
			unlink('public/uploads/'.$image['image']);
			$a['image'] = $this->imageupload($test['image']);
		}
		else{

			$a['image'] = $image['image'];

		}
		$a['slug'] = str_slug($test['title']);
		$merge = array_merge($test,$a);
		DB::table('abouts')->where('slug',$slug)->update($merge);
    }
}

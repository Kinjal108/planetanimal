<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earthling extends Model
{
    protected $table = 'earthling_videos';

    protected $fillable = ['sports_cat_id','video_title','video_slug','video_image'];


	public $timestamps = false;
 
	 
	
	public static function getSportsInfo($id,$field_name) 
    { 
		$sports_info = Earthling::where('status','1')->where('id',$id)->first();
		
		if($sports_info)
		{
			return  $sports_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earthling_category extends Model
{
    protected $table = 'earthling_category';

    protected $fillable = ['category_name','category_slug'];


	public $timestamps = false;
 
	 
	
	public static function getSportsCategoryInfo($id,$field_name) 
    { 
		$cat_info = Earthling_category::where('status','1')->where('id',$id)->first();
		
		if($cat_info)
		{
			return  $cat_info->$field_name;
		}
		else
		{
			return  '';
		}
	}
}

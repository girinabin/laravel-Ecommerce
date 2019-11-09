<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $fillable = ['title','slug','cat_id','sub_cat','summary','description','price','discount','thumb','brand','is_trending','is_featured','status','seotitle','seokeyword','seodescription'];

    

    public function postRules()
    {
    	return [

    		'title'=>'required|string',
    		'cat_id'=>'required',
    		'sub_cat'=> 'sometimes',
    		'summary' =>'required|string',
    		'description' =>'required|string',
    		'price' => 'required',
    		'discount' => 'sometimes',
    		'thumb'=> 'sometimes|image|',
    		'other_image[]' => 'sometimes|image',
    		'brand' => 'sometimes|string',
    		'is_trending'=>'string|in:yes,no',
    		'is_featured'=>'string|in:yes,no',
    		'status'=>'string|in:active,inactive',
    		'seotitle' => 'required|string|max:65',
            'seokeyword' => 'required|string|max:65',
            'seodescription' => 'required|string|max:180'



    	];
    }

    public function getSlug($title)
    {
    	$slug = str_slug($title);
    	$found = $this->where('slug',$slug)->first();
    	if($found)
    	{
    		$slug.="-".date('Ymdhis').rand(0,99);
    	}
    	return $slug;
    }

    public function saveChild($relation)
    {
    	$obj = DB::table('product_images')->where('product_id',$relation['product_id'])->first();
    	if($obj)
    	{
    		return DB::table('product_images')->where('id',$obj->id)->update($relation);


    	}else{

    		$images= $relation['other_image[]'];
    		$img = json_encode($images);
    		$FinalData = [];
    		$FinalData['product_id'] = $relation['product_id'];
    		$FinalData['image_name'] = $img;
    		return DB::table('product_images')->insert($FinalData);

    		

    	}	
    }
}

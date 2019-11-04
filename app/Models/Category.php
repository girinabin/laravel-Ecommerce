<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $fillable = ['title','summary','status','show_in_menu','seotitle','seokeyword','seodescription'];

    public function postRules()
    {
    	return [
    		'title' => 'required|string',
    		'summary' => 'sometimes|string',
    		'status' => 'string|in:active,inactive',
    		'show_in_menu' => 'sometimes',
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
    	 	$slug .="-".date('Ymdhis').rand(0,99);
    	 }
    	 return $slug;
    }

    public function saveChild($relation)
    {     
         $obj = DB::table('category_relation')->where('parent_id',$relation['parent_id'])->where('child_id',$relation['child_id'])->first();
         if($obj)
         {
            return DB::table('category_relation')->where('id',$obj->id)->update($relation);


          }else{
                
             return DB::table('category_relation')->insert($relation);


                }
     }

     public function isChild($cat_id)
    {
        $result = DB::table('category_relation')->where('child_id',$cat_id)->first();
        return $result;
    }

    public function getAllParents()
    {
         $a = [];
         $result = $this->get();
         foreach($result as $re)
         {
             $ischild = $this->isChild($re->id);
             if(!$ischild)
             {
                 $a[] = $re;
              }
          }

          return $a;
     }
}

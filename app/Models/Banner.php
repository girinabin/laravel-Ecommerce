<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title','image','link','status','added_by','seotitle','seokeyword','seodescription'];

    public function getAddRules()
    {
    	return [
    		'title' => 'required|string',
    		'status' => 'string|in:active,inactive',
    		'link' => 'sometimes|url',
    		'image' => 'sometimes|required|image|max:5000',
    		'seotitle' => 'required|string|max:65',
            'seokeyword' => 'required|string|max:65',
            'seodescription' => 'required|string|max:180'
    	];
    }
}

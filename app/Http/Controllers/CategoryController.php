<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use DB;
use Session;

class CategoryController extends Controller
{
	protected $category = null;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}
    public function listCategory()
    {
    	$categories = $this->category->get();
    	if($categories){
    		foreach($categories as $key=>$category){
    			$child_cat = $this->category->isChild($category->id);
    			if(!$child_cat){
    				$categories[$key]->is_parent = 'yes';
    				$categories[$key]->parent= '';

    			}else{
    				$categories[$key]->is_parent = 'no';
    				$categories[$key]->parent = $this->category->find($child_cat->parent_id);

    			}
    		}
    	}
    	return view('cd-admin.home.category.index',compact('categories'))->with('_title','Category listing');
    }

    public function addCategory(Category $cat)
    {
    	$parent_category = $this->category->getAllParents();

    	if($cat->id)
         {
             $act = "Update";
    		$child_cat = $this->category->isChild($cat->id);
    		if(!$child_cat)
    		{
    			$cat->is_parent = 'yes';
    			$cat->parent = '';
    		}else{

    			$cat->is_parent = 'no';
    			$cat->parent = $child_cat->parent_id;
    		}

          }else{
                  $act = "Add";
                }
    	return view('cd-admin.home.category.create',compact('cat','parent_category'))->with('_title',$act.' Category');
    }

    public function postCategory(Category $cat)
    {
    	$request = Request()->all();
    	$a = [];
    	$rules = $this->category->postRules();
    	$data = Request()->validate($rules);
    	if(isset($cat->id))
         {
             $act = 'updat';
            $a['updated_at'] = Carbon::now();
             
          }else
          { 
             $act = 'add';

            $a['created_at'] = Carbon::now();
           $a['slug'] = $this->category->getSlug($data['title']);


           }

           $final = array_merge($data,$a);
           if(isset($cat->id))
           {
             $success = DB::table('categories')->where('id',$cat->id)->update($final);
           	$a = DB::table('categories')->orderBy('id','desc')->first();


       }else{


           $success = DB::table('categories')->insert($final);
           $a = DB::table('categories')->orderBy('id','desc')->first();



       }	

         
           if($success==true){
           if(!isset($request['is_parent']))
           {
           	  $relation = array(

           	  		'parent_id' => $request['sub_category'],

           	  		'child_id' => $a->id,

           	  );

           	   $this->category->saveChild($relation);


           	  
           }elseif(isset($request['is_parent']) && $act == 'updat')
           {
           	  $this->category->shiftChild($cat->id);
           }

           Session::flash('success','Category '.$act.'ed successfully');

       }else{

           		Session::flash('error','Sorry! Category couldnot be '.$act.'ed this moment');
           }
       
           return redirect()->route('list-category');
    }

    Public function deleteCategory(Category $cat)
    {
    	$success = $cat->delete();
    	if($success)
    	{
    		Session::flash('success','Category deleted successfully!');
    	}else
    	{
    		Session::flash('error','Sorry! Category couldnot be deleted at this moment');
    	}

    	return redirect()->route('list-category');
}

	public function statusCategory(Category $cat)
	{
		if($cat->status=='active')
       {
         $cat->update(['status'=>'inactive']);
        }else{
                $cat->update(['status'=>'active']);
              }
      return redirect()->route('list-category');
	}

  public function getChildByParent(Request $request)
  {
      $this->category = $this->category->getChildByParent($request->cat_id);
      return response()->json(['status'=>'true','data'=>$this->category]);
   }

}

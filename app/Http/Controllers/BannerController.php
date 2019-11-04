<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use DB;
use Session;
class BannerController extends Controller
{
	private $banner = null;
	public function __construct(Banner $banner)
	{  
		$this->banner = new Banner();
	}

    public function listBanner()
    {
    	$banners = $this->banner->get();
    	return view('cd-admin.home.banner.index',compact('banners'))->with('_title','Banner listing');
    }

    public function addBanner(Banner $ban)
    {   
         if($ban->id)
         {
             $act = "Update";
          }else{
                  $act = "Add";
                }
    	return view('cd-admin.home.banner.create',compact('ban'))->with('_title',$act.' Banner');
    }

    public function postBanner(Banner $ban)
    {
         $request = Request()->all();
         $a=[];
         $rules = $this->banner->getAddRules();
         $data = Request()->validate($rules);
        
         if(isset($ban->id))
         {
             $act = 'updat';
            $a['updated_at'] = Carbon::now();
             
          }else
          { 
             $act = 'add';

            $a['created_at'] = Carbon::now();

           }
         
         if(isset($request['image']))
         {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/banner');
             $file->move($des,$fileName);

             if(isset($ban->image) && !empty($ban->image) && file_exists(public_path('uploads/banner/'.$ban->image)))
             {
                unlink(public_path('uploads/banner/'.$ban->image));
            }

             $a['image'] = $fileName;

          }
          $final = array_merge($data,$a);
          if(isset($ban->id))
          {
             $success = DB::table('banners')->where('id',$ban->id)->update($final);
           }else
           {
             $success = DB::table('banners')->insert($final);
            }
          if($success)
          {
             Session::flash('success','Banner '.$act.'ed Successfully');
           }else{
                  Session::flash('error','Banner could not '.$act.'ed this moment!');
                 }
           return redirect()->route('banner-list');      
     }

     public function deleteBanner(Banner $del)
     {
       $success = $del->delete();
       if($success)
       {
         if(file_exists(public_path('uploads/banner/'.$del->image)))
         {
             unlink(public_path('uploads/banner/'.$del->image));
          
               
              Session::flash('success','Banner deleted successfully!');  

          }

         }else{
              Session::flash('error','Banner couldnot be deleted at this moment!');  
        }

        return redirect()->route('banner-list');
      
     }

     public function statusBanner(Banner $ban)
     {
       if($ban->status=='active')
       {
         $ban->update(['status'=>'inactive']);
        }else{
                $ban->update(['status'=>'active']);
              }
      return redirect()->route('banner-list');

      }

 }

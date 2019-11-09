<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;


class ProductController extends Controller
{
	protected $product = null;
	protected $category = null;

	public function __construct(Product $product, Category $category)
	{
		$this->product = $product;
		$this->category = $category;
	}

    public function listProduct()
    {	

    	$products = $this->product->get();
    	return view('cd-admin.home.product.index',compact('products'))->with('_title','Product Listing');
    }

    public function addProduct(Product $pro)
    {
    	if($pro->id)
    	{
    		$act='Update';
    	}else{

    		$act='Add';

    		$allparentscategory = $this->category->getAllParents();

    	}
    	return view('cd-admin.home.product.create',compact('pro','allparentscategory'))->with('_title', $act.' Product');
    }

    public function postProduct(Request $request)
    {
         $rules = $this->product->postRules();
         $request->validate($rules);
         $data = $request->except(['_token','other_image']);
         $data['slug'] = $this->product->getSlug($request->title);
         if(isset($request['image']))
         {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/product');
             $file->move($des,$fileName);

             if(isset($this->product->image) && !empty($this->product->image) && file_exists(public_path('uploads/product/'.$this->product->image)))
             {
                unlink(public_path('uploads/product/'.$this->product->image));
            }

             $data['thumb'] = $fileName;

          }
          $this->product->fill($data);
          $success = $this->product->save();

          if($success==true)
          {
             if(isset($request->other_image))
             {  
                 $images = $request->other_image;
                 foreach($images as $img)
                 {
                     $fileName = time().$img->getClientOriginalName();
                     $destination = public_path('uploads/products');
                     $img->move($destination,$fileName);
                     $a[] = $fileName;
                  }

                 $relation = array(
                                      'product_id' => $this->product->id,
                                      'other_image[]' => $a,

                                   );
                 
                 $this->product->saveChild($relation);
              }

              Session::flash('success','Product Added Successfully');

           }

       return redirect()->route('list-product');                
     }
}

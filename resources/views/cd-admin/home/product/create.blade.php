@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Product</li>
				<li>{{$_title}}</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto">
			<div class="card-header">
				<h3 class="card-title text-center">{{$_title}}</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			@if(isset($pro->id))
			<form role="form" action="{{ route('update-product',$pro->id) }}" method="POST" enctype="multipart/form-data">
				@else
				<form role="form" action="{{ route('post-product') }} " method="POST" enctype="multipart/form-data">
					@endif
					
					@csrf
					<div class="row">
						<div class="col-md-2"></div>
						<div class="card-body col-md-8">
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('title')}}</div>
								<label for="title">Product Title</label>
								<input type="text" class="form-control" id="title" placeholder="Enter Product title" name="title" value="{{old('title') ?? $pro->title }}" >
							</div>
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('summary')}}</div>
								<label for="link">Product Summary</label>
								<textarea class= "form-control " name="summary" id="summary" cols="30" rows="5">
								{{old('summary') ?? $pro->summary}}
								</textarea>
								
							</div>
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('description')}}</div>
								<label for="link">Product Description</label>
								<textarea class= "form-control summernote" name="description" id="description" cols="30" rows="5">
								{{old('description') ?? $pro->description}}
								</textarea>
								
							</div>
							<div class="form-group ">
								<div class="text text-danger">{{$errors->first('cat_id')}}</div>
								
								<label for="link">Category</label>
								<div class="row">
									<div class="col-md-12" id="parent_cat_div">
										<select class="form-control " name="cat_id" id="category">
											<option value="" disabled selected>--Select Any One--</option>
											@if($allparentscategory)
											@foreach($allparentscategory as $key=>$category)
											<option value="{{$category->id}}">{{$category->title}}</option>
											@endforeach
											@endif
										</select>
									</div>
									<div class="col-md-6 d-none" id="child_cat_div">
										<select class="form-control" name="sub_cat" id="sub_cat">
											<option value="" disabled selected >--Select Any One --</option>
										</select>
									</div>
									
								</div>
								
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('price')}}</div>
										<label for="price">Price</label>
									</div>
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('discount')}}</div>
										<label for="discount">Discount(%)</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="number" class="form-control" name="price" id="price" value="{{old('price')}}" >
									</div>
									<div class="col-md-6">
										<input type="number" class="form-control" name="discount" id="discount" value="{{old('discount')}}" min="0" max="70">
									</div>
								</div>
							</div>
							
							
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('status')}}</div>
										<label for="status">Product Status</label>
									</div>
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('brand')}}</div>
										<label for="discount">Brand</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<select class="form-control" name="status" id="status">
											<option value="" disabled selected >--Select Product Status--</option>
											@if($pro->status)
											<option value="active"{{$pro->status=='active'?'selected':'' }}>Active</option>
											<option value="inactive"{{$pro->status=='inactive'?'selected':'' }}>Inactive</option>
											@else
											<option value="active"{{old('status')=='active'?'selected':'' }}>Active</option>
											<option value="inactive"{{old('status')=='inactive'?'selected':'' }}>Inactive</option>
											@endif
											
											
										</select>
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" id="brand" name="brand" value="{{old('brand')}}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('is_trending')}}</div>
										<label for="is_trending">Is Trending</label>
									</div>
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('is_featured')}}</div>
										<label for="is_featured">Is Featured</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="radio" name="is_trending" value="yes" {{(old('is_trending'))=='yes'?'checked':''}} id="is_trending"> Yes
										<input type="radio" name="is_trending" value="no" {{(old('is_trending'))=='no'?'checked':''}} id="is_trending"> No
									</div>
									<div class="col-md-6">
										<input type="radio" name="is_featured" value="yes" {{(old('is_featured'))=='yes'?'checked':''}} id="is_featured"> Yes
										<input type="radio" name="is_featured" value="no" {{(old('is_featured'))=='no'?'checked':''}} id="is_featured"> No
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('seotitle')}}</div>
										<label for="seotitle">Seo Title</label>
									</div>
									<div class="col-md-6">
										<div class="text text-danger">{{$errors->first('seokeyword')}}</div>
										<label for="seokeyword">Seo Keyword</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{old('seotitle') ?? $pro->seotitle}}" placeholder="Enter Seo title : not more than 60 character" >
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{old('seokeyword') ?? $pro->seokeyword}}" placeholder="Enter Seo keyword : not more than 60 character" >
									</div>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('seodescription')}}</div>
								<label for="name">Seo Description</label>
								<textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character" >{{$pro->seodescription}}</textarea>
							</div>
							


								<div class="form-group">
									<div class="field" align="left">
										<div class="text text-danger">{{$errors->first('image')}}</div>
										
										<label for="file">Product Image</label>
										<input style="padding-bottom: 35px;" class="form-control btn btn-secondary" type="file" id="imageUploader" name="image"  />
									</div>
								</div>
								
								
								@if(isset($pro->image) && file_exists(public_path('uploads/product/'.$pro->image)))
								
								<div id="imgViewer">
									<img src="{{ asset('uploads/product/'.$pro->image) }}" alt="" style="width: 200px;height: 200px;">
								</div>
								
								
								@else
								<div id="imgViewer"></div>
								
								@endif
							
								


								<div class="form-group">
									<div class="field" align="left">
										<div class="text text-danger">{{$errors->first('image')}}</div>
										
										<label for="file">Other Image</label>
										<input style="padding-bottom: 35px;" class="form-control btn btn-secondary " type="file" id="otherImage" name="other_image[]" multiple  />
									</div>
								</div>
								
								
								@if(isset($pro->image) && file_exists(public_path('uploads/products/'.$pro->image)))
								
								<div id="imgViewers">
									<img src="{{ asset('uploads/products/'.$pro->image) }}" alt="" style="width: 200px;height: 200px;">
								</div>
								
								
								@else
								<div id="imgViewers"></div>
								
								@endif
							</div>
								
							
							
							
						</div>
						<div class="col-md-2"></div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer text-center">
						<button type="submit" class="btn btn-primary float-left">{{$_title}}</button>
						<a href="{{ URL()->previous() }}" class=" btn btn-default float-right">
						<i class="fas fa-list"></i>Go Back</a>
					</div>
				</form>
				
			</div>
			
		</div>
	</div>
	@endsection
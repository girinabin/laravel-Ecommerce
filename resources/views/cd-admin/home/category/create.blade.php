@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Category</li>
				<li>{{$_title}}</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">{{$_title}}</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			@if(isset($cat->id))
			<form role="form" action="{{ route('update-category',$cat->id) }}" method="POST" enctype="multipart/form-data">
			@else
			<form role="form" action="{{ route('post-category') }} " method="POST" enctype="multipart/form-data">
			@endif
			
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('title')}}</div>
						<label for="title">Category Title</label>
						<input type="text" class="form-control" id="title" placeholder="Enter Category title" name="title" value="{{old('title') ?? $cat->title }}" >
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('summary')}}</div>
						<label for="link">Category Summary</label>
						<textarea class= "form-control summernote" name="summary" id="summary" cols="30" rows="5">
							{{old('summary') ?? $cat->summary}}
						</textarea>
						
					</div>
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('status')}}</div>
						<label>Category Status</label>
						<select class="form-control" name="status" id="status">
							<option value="">Select Category Status</option>
							@if($cat->status)
							<option value="active"{{$cat->status=='active'?'selected':'' }}>Active</option>

							<option value="inactive"{{$cat->status=='inactive'?'selected':'' }}>Inactive</option>
							@else
							<option value="active"{{old('status')=='active'?'selected':'' }}>Active</option>

							<option value="inactive"{{old('status')=='inactive'?'selected':'' }}>Inactive</option>
							@endif
							
							
						</select>
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('show_in_menu')}}</div>
						<label for="show_in_menu">Show in Menu</label><br>
						@if($cat->show_in_menu)
						<input type="radio" name="show_in_menu" id="show_in_menu" value="yes"  {{($cat->show_in_menu)=='yes'?'checked':''}} > Yes
						<input type="radio" name="show_in_menu" id="show_in_menu" value="no"  {{($cat->show_in_menu)=='no'?'checked':''}} > No
						
						@else
						<input type="radio" name="show_in_menu" id="show_in_menu" value="yes"  {{(old('show_in_menu'))=='yes'?'checked':''}} > Yes
						<input type="radio" name="show_in_menu" id="show_in_menu" value="no" {{(old('show_in_menu'))=='no'?'checked':''}} > No

						
						@endif


					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('is_parent')}}</div>
						<label for="is_parent">Is Parent</label><br>
						
						<input type="checkbox" name="is_parent" id="is_parent" value="1" {{isset($cat->is_parent) && $cat->is_parent=='yes' ? 'checked' : ''}}  >
						

					</div>


					<div class="form-group {{isset($cat->is_parent) && $cat->is_parent=='yes' ? 'd-none' :''}}" id="sub_cat">
						<div class="text text-danger">{{$errors->first('sub_category')}}</div>
						<label>Sub_Category</label>
						<select class="form-control" name="sub_category" id="sub_category">
							<option value="" selected disabled>--Select Any One--</option>
							@foreach($parent_category as $parent)
							<option value="{{$parent->id}}" {{ isset($cat->parent) && $cat->parent==$parent->id ? 'selected': '' }}>{{$parent['title']}}</option>
							@endforeach
							
							
							
						</select>
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('seotitle')}}</div>
						<label for="seotitle">Seo Title</label>
						<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{old('seotitle') ?? $cat->seotitle}}" placeholder="Enter Seo title : not more than 60 character" >
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('seokeyword')}}</div>
						<label for="seokeyword">Seo Keyword</label>
						<input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{old('seokeyword') ?? $cat->seokeyword}}" placeholder="Enter Seo keyword : not more than 60 character" >
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('seodescription')}}</div>
						<label for="name">Seo Description</label>
						<textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character" >{{$cat->seodescription}}</textarea>
					</div>

					
				</div>
				<!-- /.card-body -->
				<div class="card-footer text-center">
					<button type="submit" class="btn btn-primary float-left">{{$_title}}</button>
					<a href="{{ URL()->previous() }}" class="btn btn-danger float-right">Go Back</a>
				</div>
			</form>
			
		</div>
		
	</div>
</div>
@endsection

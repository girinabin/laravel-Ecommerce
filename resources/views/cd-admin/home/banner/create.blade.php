@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Banner</li>
				<li>{{$_title}}</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">{{$_title}}</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			@if($ban->id)
			<form role="form" action="{{ route('update-banner',$ban->id) }}" method="POST" enctype="multipart/form-data">
				@else
				<form role="form" action="{{ route('post-banner') }}" method="POST" enctype="multipart/form-data">
					@endif
					{{-- <form role="form" action="{{ route('post-banner') }}" method="POST" enctype="multipart/form-data"> --}}
						@csrf
						<div class="row">
							<div class="col-md-2"></div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Banner Title</label>
									<div class="text text-danger">{{$errors->first('title')}}</div>
									<input type="text" class="form-control" id="title" placeholder="Enter Banner title" name="title" value="{{old('title') ?? $ban->title }}" >
								</div>
								<div class="form-group">
									<label for="link">Banner Link</label>
									<div class="text text-danger">{{$errors->first('link')}}</div>
									<input type="url" class="form-control" id="link" placeholder="Enter Banner Url" name="link" value="{{old('link') ?? $ban->link}}">
								</div>
								
								
								
								
								
								<div class="form-group">
									<label>Banner  Status</label>
									<div class="text text-danger">{{$errors->first('status')}}</div>
									<select class="form-control" name="status" id="status">
										<option value="">Select Banner Status</option>
										@if($ban->status)
										<option value="active"{{$ban->status=='active'?'selected':'' }}>Active</option>
										<option value="inactive"{{$ban->status=='inactive'?'selected':'' }}>Inactive</option>
										@else
										<option value="active"{{old('status')=='active'?'selected':'' }}>Active</option>
										<option value="inactive"{{old('status')=='inactive'?'selected':'' }}>Inactive</option>
										@endif
										
										
									</select>
								</div>
								
								<div class="form-group">
									<label for="seotitle">Seo Title</label>
									<div class="text text-danger">{{$errors->first('seotitle')}}</div>
									<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{old('seotitle') ?? $ban->seotitle}}" placeholder="Enter Seo title : not more than 60 character" >
								</div>
								<div class="form-group">
									<label for="seokeyword">Seo Keyword</label>
									<div class="text text-danger">{{$errors->first('seokeyword')}}</div>
									<input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{old('seokeyword') ?? $ban->seokeyword}}" placeholder="Enter Seo keyword : not more than 60 character" >
								</div>
								<div class="form-group">
									<label for="name">Seo Description</label>
									<div class="text text-danger">{{$errors->first('seodescription')}}</div>
									<textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character" >{{$ban->seodescription}}</textarea>
								</div>
								
								
								
								<div class="form-group">
									<div class="field" align="left">
										<div class="text text-danger">{{$errors->first('image')}}</div>
										
										<label for="file">Banner Image</label>
										<input style="padding-bottom: 35px;" class="form-control btn btn-secondary" type="file" id="imageUploader" name="image"  />
									</div>
								</div>
								
								
								@if(isset($ban->image) && file_exists(public_path('uploads/banner/'.$ban->image)))
								
								<div id="imgViewer">
									<img src="{{ asset('uploads/banner/'.$ban->image) }}" alt="" style="width: 200px;height: 200px;">
								</div>
								
								
								@else
								<div id="imgViewer"></div>
								
								@endif
							</div>
								
								
								<div class="col-md-2"></div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer text-center">
								<button type="submit" class="btn btn-primary float-left">{{$_title}}</button>
								<a href="{{ URL()->previous() }}" class="btn btn-default float-right"><i class="fas fa-list"></i>Go Back</a>
							</div>
						</form>
						
					</div>
					
				</div>
			</div>
			@endsection
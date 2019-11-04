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
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('title')}}</div>
						<label for="title">Banner Title</label>
						<input type="text" class="form-control" id="title" placeholder="Enter Banner title" name="title" value="{{old('title') ?? $ban->title }}" >
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('link')}}</div>
						<label for="link">Banner Link</label>
						<input type="url" class="form-control" id="link" placeholder="Enter Banner Url" name="link" value="{{old('link') ?? $ban->link}}">
					</div>
					
					
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('status')}}</div>
						<label>Banner  Status</label>
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
						<div class="text text-danger">{{$errors->first('seotitle')}}</div>
						<label for="seotitle">Seo Title</label>
						<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{old('seotitle') ?? $ban->seotitle}}" placeholder="Enter Seo title : not more than 60 character" >
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('seokeyword')}}</div>
						<label for="seokeyword">Seo Keyword</label>
						<input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{old('seokeyword') ?? $ban->seokeyword}}" placeholder="Enter Seo keyword : not more than 60 character" >
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('seodescription')}}</div>
						<label for="name">Seo Description</label>
						<textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character" >{{$ban->seodescription}}</textarea>
					</div>

					<div class="form-group ">
						<div class="text text-danger">{{$errors->first('image')}}</div>
						<label for="image">Banner Image</label>
						<div class="input-group">
							<div class="custom-file col-md-">
								<input type="file" class="custom-file-input preview " id="image" name="image"  onchange="readUrl(this,'thumb')" {{isset ($ban->image)?'':'required'
								    
								}}>
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							<div class="col-md-3 ">
								@if(isset($ban->image) && file_exists(public_path('uploads/banner/'.$ban->image)))
							
								<img src="{{ asset('uploads/banner/'.$ban->image) }}" alt="" class="img img-fluid img-thumbnail" id="thumb" style="height: 350px;width: 350px;">
									
								@else
								
								<img src="" alt="" class="img img-fluid img-thumbnail" id="thumb" style="height: 350px;width: 350px;">
								@endif	
								
							</div>
							
						</div>
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

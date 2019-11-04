@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Category</li>
        <li>View Category</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">{{$_title}}</h3>
          <a href="{{ route('add-category') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Category</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-4">
          <table class="table " id="table_id">
            <thead>
              <tr>
                
                <th>Title</th>
                <th>Show in Menu</th>
                <th>Is Parent</th>
                <th>Parent</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($categories)
              @foreach($categories as $key=>$category)
              <tr>
                <td >{{$category['title']}}</td>
                <td >{{ucfirst($category['show_in_menu'])}}</td>
                <td >{{ucfirst($category['is_parent'])}}</td>
                <td >{{($category['parent']) ? $category->parent->title :'-'}}</td>

                
                
                <td>
                  <div class="btn-group">
                    @if($category->status=='active')
                    <button type="button" class="btn btn-success bsize" >{{ucfirst($category->status)}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{ucfirst($category->status)}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('status-category',$category->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$category->status =='active' ? 'inactive' : 'Active'}}</button>
                        
                      </form>
                    </div>
                  </div>
                </td>
                
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Action</button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <a class="dropdown-item  " href="{{ route('edit-category',$category->id) }}"  ><i class="fas fa-edit"></i>Edit</a>
                      {{-- <a class="dropdown-item  " href="{{ route('category.show',$category->id) }}"><i class="fas fa-eye"></i>View</a> --}}
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$category->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
                    </div>
                  </div>
                </td>
              </tr>
              
              
            </tbody>
            @endforeach
            @endif
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
      <!-- /.card -->
    </div>
    
    
    
    
    
  </div>
</div>


{{-- delete modal --}}
@foreach($categories as $category)
<div class="modal fade" id="delete{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$category->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('delete-category',$category->id) }}" method="GET">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Category</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Product</li>
        <li>View Product</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">{{$_title}}</h3>
          <a href="{{ route('add-product') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Product</i></b></button>
          </a>

          <a href="{{ URL()->previous() }}" class="btn btn-default float-right"><i class="fas fa-list"></i>Go Back</a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-4">
          <table class="table " id="table_id">
            <thead>
              <tr>
                
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Trending</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($products)
              @foreach($products as $key=>$product)
              <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->title}}</td>
                
                
                <td>
                  <div class="btn-group">
                    @if($product->status=='active')
                    <button type="button" class="btn btn-success bsize" >{{ucfirst($product->status)}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{ucfirst($product->status)}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('status-product',$product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$product->status =='active' ? 'inactive' : 'Active'}}</button>
                        
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
                      <a class="dropdown-item  " href="{{ route('edit-product',$product->id) }}"  ><i class="fas fa-edit"></i>Edit</a>
                      {{-- <a class="dropdown-item  " href="{{ route('product.show',$product->id) }}"><i class="fas fa-eye"></i>View</a> --}}
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$product->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
                    </div>
                  </div>
                </td>
              </tr>
              
              
            @endforeach
            </tbody>
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
@foreach($products as $product)
<div class="modal fade" id="delete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$product->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('delete-product',$product->id) }}" method="GET">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
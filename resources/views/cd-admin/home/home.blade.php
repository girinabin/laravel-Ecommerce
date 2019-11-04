@extends('cd-admin.home-master')
@section('homecontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{-- {{ route('home') }} --}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              {{-- <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$services}}</h3>
                      <p>Services</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('service.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$testpreparation}}<sup style="font-size: 20px"></sup></h3>
                      <p>Test Preparation</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('testp.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$event}}</h3>
                      <p>Events</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('event.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$gallery}}</h3>
                      <p>Gallery</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('album.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-6 ">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Quick Mail</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="{{ route('eregister.reply1') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <div class="text text-danger"></div>
                          <input class="form-control" placeholder="To:" value="" name="emailto">
                        </div>
                        <div class="form-group">
                          <div class="text text-danger"></div>
                          <input class="form-control" placeholder="Subject:" value="" name="subject">
                        </div>
                        <div class="form-group">
                          <div class="text text-danger"></div>
                          <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote" ></textarea>
                        </div>
                        
                        
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                          
                          
                          <button type="submit" class="btn btn-primary float-right"><i class="fas fa-envelope"></i> Send</button>
                          
                          
                        </div>
                      </form>
                      <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Quick/Compose Reply Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      
                      <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Email to</th>
                      <th>Subject</th>
                      <th>Message</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($composes as $compose)
                    <tr>
                      <td>{{e($compose->emailto)}}</td>
                      <td>{{e(str_limit($compose->subject,$limits='15'))}}</td>
                      <td>{!!str_limit($compose->message,$limits='15') !!}</td>
                      
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div> --}}
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
              
              
            </div>
          </section>
        </div>
        @endsection
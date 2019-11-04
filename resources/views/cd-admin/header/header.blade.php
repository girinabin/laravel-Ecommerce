<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #063A6E ; ">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
      

    <div class="ml-auto">
            <ul class="nav navbar-nav">
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('img/man.png')}}" style="height: 40px;width: 40px;" alt="User Image">
                        
                        
                    
                        <span class="hidden-xs"></span>
                        
                    </a>
                    <ul class="dropdown-menu" style="margin-left: -90px;">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('img/man.png')}}" style="height: 70px;width: 70px; margin-left: 45px;"  alt="User Image" class="float">

                            <p class="text-center">
                                <?php $user = Auth::user();
                                ?>
                           
                                <small>{{$user['name']}}</small><br>
                                <small>Superadmin</small>

                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            {{-- <div class="pull-left">
                                <a href="#" class="btn btn-info btn-flat">Profile</a>
                            </div> --}}
                            <div class="float-right pr-1">
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-flat">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                
            </ul>
    </div>

   
</nav>



  
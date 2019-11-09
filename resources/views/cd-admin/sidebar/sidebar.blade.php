<div >


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--  --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/ecommerce.jpg') }}" class="img-circle elevation-2" alt="logo">
        </div>
        <div class="info">
          
          <a href="#" class="d-block">Ecommerce</a>
        </div>
      </div>


      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
                
          <li class="nav-item has-treeview ">
            <a href="{{-- {{ route('dashboard') }} --}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{ route('banner-list') }}" class="nav-link ">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Banner
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{ route('list-category') }}" class="nav-link ">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Category
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{ route('list-product') }}" class="nav-link ">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Product
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{ route('banner-list') }}" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Order
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{ route('banner-list') }}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                
              </p>
            </a>
            
          </li>

         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

    
    @yield('homecontent')
  
</div>







<div class="container-fluid" style="padding-left: 300px;">
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <div >

  	{{session('success')}}
  </div>
  
  		
  
 </div>

@endif
</div>


<div class="container-fluid" style="padding-left: 300px;">
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <div >

  	{{session('success')}}
  </div>
  
  		
  
 </div>

@endif
</div>
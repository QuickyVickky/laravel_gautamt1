<!-- Header -->
<div class="header"> 
  <!-- Logo -->
  <div class="header-left"> <a href="javascript:void(0)" class="logo"> <img src='{{ asset('logo.jpg') }}'  alt="Logo"> </a> <a href="javascript:void(0)" class="logo logo-small"> <img src='{{ asset('logo.jpg') }}' alt="Logo" width="30" height="30"> </a> </div>
  <!-- /Logo --> 

  <!-- Mobile Menu Toggle --> 
  <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a> 
  <!-- /Mobile Menu Toggle --> 
  
  <!-- Header Menu -->
  <ul class="nav user-menu">
    

    <!-- User Menu -->
    <li class="nav-item dropdown has-arrow main-drop"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"> 
    <!--img src="{{ asset('admin_assets/assets/img/logo.png') }}" alt=""--> <span class="status online"></span> </span> <span>{{ Session::get('adminfullname') }}</span> </a>
      <div class="dropdown-menu"> 
      <a class="dropdown-item" href="{{ route('log-out') }}"><i data-feather="log-out" class="mr-1"></i> Logout</a>
       </div>
    </li>
    
    <!-- /User Menu -->
    
  </ul>
  <!-- /Header Menu --> 
  
</div>
<!-- /Header --> 
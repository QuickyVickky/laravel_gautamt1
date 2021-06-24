<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title"><span>Employee Management</span></li>
        <li class='{{ (request()->is(env("ADMINBASE_NAME")."/employee-list")) ? "active" : "" }}'> <a href="{{ route('employee-list') }}" ><i data-feather="home"></i> <span>Employee List</span></a> </li>
      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar --> 
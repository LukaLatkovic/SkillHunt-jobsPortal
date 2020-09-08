<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
    <p class="brand-text font-weight-light">JobPortal | Admin Page</p>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{!! route('statistic') !!}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Statistics
            </p>
          </a>
        <li class="nav-item">
          <a href="{!! route('userlist') !!}" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p>Manage users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('clientlist') !!}" class="nav-link">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>Manage clients</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('jobslist') !!}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Manage jobs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('categoriesList') !!}" class="nav-link">
            <i class="nav-icon fas fa-stream"></i>
            <p>Category list</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

@section('jsplugins')
<script type="text/javascript">
  $('.nav-item').on('click', function() {
    $(this).addClass('active').siblings('li').removeClass('active');
  });
</script>
@endsection
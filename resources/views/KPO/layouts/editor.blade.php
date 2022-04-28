<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Sharina World | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend_assets/dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/codemirror/theme/monokai.css')}}">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/simplemde/simplemde.min.css')}}">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
  <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link">Home</a>
        </li>
       
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
         
        </li>        
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend_assets/dist/img/sw-logo.png')}}" alt="sw-logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-white">Sharina World</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend_assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search Here" aria-label="Search">
          
        </div>
      </div>

    <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Vendors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>See All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Material
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-copy nav-icon"></i>
                  <p>See All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add Material</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Sub Material
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-stream nav-icon"></i>
                      <p>See All</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="business.html" class="nav-link">
                      <i class="fas fa-plus-square nav-icon"></i>
                      <p>Add Sub Material</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!---------Main Content Starts---------->
                @section('content')
                @show
  <!---------Main Content Ends------------>  
    
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>Copyright &copy; <a href="#">Sharina World</a>.</strong>
    All rights reserved.
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
<!-- Bootstrap 4 -->
<script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend_assets/dist/js/adminlte.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('backend_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- CodeMirror -->
<script src="{{ asset('backend_assets/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{ asset('backend_assets/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{ asset('backend_assets/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{ asset('backend_assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend_assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->



<script>

  $(function () {


    // Summernote
    $('#summernote').summernote({
      height:300,
    });

  })


</script>
<!-- 
<script type="text/javascript">


    $(document).ready(function(){
    


        $('#material_id').change(function() {
        $('#sub_matetial_id').html('<option disabled selected>=== Select Sub Material ===</option>');
      
   

  
      let dist = {!! json_encode($sub_material->toArray(), JSON_HEX_TAG) !!};
     
     
      jQuery.each(dist, function(value, key) {

        if(key.material_id){
          if(key.material_id == $('#material_id').children("option:selected").val()) {
       
          $('#sub_matetial_id').append('<option value='+key.id+'>'+key.name+'</option>');

        }

        }

        
    
      });
    });
  });

</script> -->
</body>
</html>

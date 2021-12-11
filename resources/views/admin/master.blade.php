<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.partials.meta")
    @yield('meta-tags')
    <title>{{site()->name}} @yield('title',site()->title)</title>
     <link rel='shortcut icon' type='image/vnd.microsoft.icon' href='{{asset(site()->favicon)}}'> <!-- IE -->
      <link rel='apple-touch-icon' type='image/png' href='{{asset(site()->favicon)}}'> <!-- iPhone -->
      <link rel='apple-touch-icon' type='image/png' sizes='72x72' href='{{asset(site()->favicon)}}'> <!-- iPad -->
      <link rel='apple-touch-icon' type='image/png' sizes='114x114' href='{{asset(site()->favicon)}}'> <!-- iPhone4 -->
      <link rel='icon' type='image/png' href='{{asset(site()->favicon)}}'> <!-- Opera Speed Dial, at least 144×114 px -->
     
    <script src="{{asset('js/app.js')}}" defer></script>
    @include("admin.partials.css")
    @yield('css')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include("admin.partials.preloader")
    @include("admin.partials.navbar")
  <!-- Main Sidebar Container -->
 
@include("admin.partials.sidebar")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @include("admin.partials.breadcrumb")
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 @include("admin.partials.footer")
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 @include("admin.partials.js")
 @yield('js')
@livewireScripts

 

</body>
</html>

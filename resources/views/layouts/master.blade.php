<!DOCTYPE html>
<html lang="en">
@include('menu.head._head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('menu.navbar')
    @include('menu.sidebar')
    <div class="content-wrapper">
     @include('menu.content_header')
     <!-- Main content -->
{{--           @include('dashboard') --}}
<br>
          @yield('content')
     <!-- /.content -->
   </div>
   <aside class="control-sidebar control-sidebar-dark">
   </aside>
   @include('menu.footer')
 </div>
 @include('menu.script._script')
</body>
</html>

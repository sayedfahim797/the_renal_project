<!DOCTYPE html>
<html lang="en">

<head>
<!-- Bootstrap core Favicon --> 
@include('backend.admin.includes.meta')
<!-- Bootstrap core Title --> 
@yield('backend-title')
<!-- Bootstrap core CSS -->  
@include('backend.admin.includes.css')
</head>

<body> 

<!--preloader start-->
@include('backend.admin.includes.preloader')
<!--preloader end-->

<section id="container" class="">
<!--header start-->
@include('backend.admin.includes.header')
<!--header end-->

<!--sidebar start-->
@include('backend.admin.includes.leftsidebar')
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--yield overview start-->
      @yield('dashboard-content')
      @if (session()->has('success'))
        <script type="text/javascript">
            $(function(){
                $.notify("{{ Session::get('success') }}", {globalPosition: 'top right',className: 'success'});
            });
        </script>
      @endif
  </section>
</section>
<!--main content end-->

<!--footer start-->
@include('backend.admin.includes.footer')
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
@include('backend.admin.includes.script')

</body>
    
</html>
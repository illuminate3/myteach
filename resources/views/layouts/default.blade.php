<!DOCTYPE html>
<html lang="en">
@include('layouts.partial.head')
@yield('head')
<body>
<!-- Fixed navbar -->
@include('layouts.partial.navbar')
<!-- /.navbar -->
<!-- header -->
@include('layouts.partial.header')
<!-- /.header -->
    <!-- container -->
    <section class="container">
        <div class="row">
            @yield('container')
        </div>
    </section>
    <!-- /container -->
  @include('layouts.partial.footer')

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    @yield('footer')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
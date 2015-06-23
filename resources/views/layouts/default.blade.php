<!DOCTYPE html>
<html lang="en" ng-app="teacherApp">
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
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/angular-route.min.js')}}"></script>
    <script src="{{asset('js/angular-sanitize.min.js')}}"></script>
    <script src="{{asset('js/app/app.js')}}"></script>
    @yield('footer')
    {{--<script src="js/custom.js"></script>--}}
</body>
</html>
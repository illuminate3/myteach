@extends('layouts.default')

@section('container')

    <div ng-view></div>


@stop

@section('footer')
    <script src="{{asset('js/app/controller/HomeController.js')}}"></script>
    <script src="{{asset('js/app/controller/NewsController.js')}}"></script>
@stop
@extends('layouts.default')

@section('container')

    <div ng-view></div>


@stop

@section('footer')
    <script src="{{asset('js/app/controller/ExamsController.js')}}"></script>
@stop
@extends('admin.layouts.default')
@section('container')
<div class="row" style="margin-top:1em;">
    <div class="col-sm-12">

            <div ng-view></div>
            {{--<div class="panel panel-default">--}}
              {{--<div class="panel-heading">--}}
                {{--Latest News--}}
              {{--</div>--}}

              {{--<div class="panel-body" >--}}
                    {{--<input type="text" ng-model="ali"/>--}}

              {{--</div>--}}
            </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/booksFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/coursesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/booksController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/coursesController.js')}}"></script>
    <script src="{{asset('js/admin/app/services/messageFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/booksEditController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/coursesEditController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/coursesEmailController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/booksCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/coursesCreateController.js')}}"></script>
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/tinyeditor.js')}}"></script>
@endsection
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

@section('css')
    <link href="{{asset('css/admin/angular-pickadate.css')}}" rel="stylesheet">
    <link href="{{asset('css/ngDialog.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/ngDialog-theme-default.min.css')}}" rel="stylesheet">
@endsection
@section('js')
    {{--<script src="{{asset('js/admin/app/services/homeworksFactory.js')}}"></script>--}}
    <script src="{{asset('js/admin/app/services/messageFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/coursesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/examsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/studentsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/examsController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/examsEditController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/examsGradesController.js')}}"></script>
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/tinyeditor.js')}}"></script>
@endsection
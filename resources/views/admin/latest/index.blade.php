@extends('admin.layouts.default')
@section('container')
<div class="row" style="margin-top:1em;">
    <div class="col-sm-12">

            <div class="panel panel-default">
              <div class="panel-heading">
                Latest News
              </div>

              <div class="panel-body" >
                    {{--<input type="text" ng-model="ali"/>--}}
                    <div ng-view></div>
              </div>

            </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/newsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/messageFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/newsEditController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/newsCreateController.js')}}"></script>
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/tinyeditor.js')}}"></script>
@endsection
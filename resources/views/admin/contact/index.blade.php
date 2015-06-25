@extends('admin.layouts.default')

@section('container')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Messages
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li>--}}
                    {{--<i class="fa fa-dashboard"></i>  <a href="/adminmaster">Main page </a>--}}
                {{--</li>--}}
            {{--</ol>--}}
        </div>
    </div>

    <div ng-view></div>
<!-- /.row -->
@endsection


@section('js')
{{--    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/admin/tinyeditor.js')}}"></script>--}}
    <script src="{{asset('js/admin/app/services/messageFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/ContactFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/contactController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/contactViewController.js')}}"></script>

@endsection
@extends('admin.layouts.default')

@section('container')
<div class="row">
    <div class="col-sm-12">
        <form method="POST" action="{!! url('/admin') !!}">
         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">

                <textarea name="editor1" id="editor1" rows="10" cols="80">
                   @if($page)
                        {{ $page->description }}
                   @endif
                </textarea>
                <input type="submit" class="btn btn-primary btn-lg " value="Submit" style="margin-top: 1.3em;"/>

        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/tinyeditor.js')}}"></script>
@endsection
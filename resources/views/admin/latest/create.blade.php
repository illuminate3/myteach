@extends('admin.layouts.default')
@section('container')
<div class="row" style="margin-top:1em;">
    <div class="col-sm-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            Latest News
          </div>
          <div class="panel-body">

                <form role="form">

                    <div class="form-group">
                        <label>Title of news : </label>
                        <input class="form-control">
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>

                    <div class="form-group">
                        <label>Small description : </label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description : </label>
                        <textarea class="form-control" rows="10" name="editor1" id="editor1"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                </form>
          </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/tinyeditor.js')}}"></script>
@endsection
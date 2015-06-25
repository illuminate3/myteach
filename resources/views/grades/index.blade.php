@extends('layouts.default')

@section('container')

<div class="col-md-8 col-md-offset-2" style="margin-top:3em">
    <div class="panel panel-default">
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row" style="margin-bottom: 3em;padding-bottom: 2em;border-bottom: 1px dashed #333">
                <p class="lead text text-danger col-sm-offset-2"> If you don't have password for this course enter your email and then submit, The Password will send to your Email</p>
                <form class="form-horizontal" role="form" method="POST" action="/courses/grades/getPassword/{{$id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group col-sm-9" >
                        <label class="col-sm-4 control-label">E-Mail </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Get Password!
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="/courses/grades/{{$id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p class="lead text text-danger col-sm-offset-2"> Enter your Email and Password in this course to see your grades!</p>
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail </label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

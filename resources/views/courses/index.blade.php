@extends('layouts.default')

@section('container')

    <div ng-view></div>


@stop

@section('footer')
    <script src="{{asset('js/app/controller/CoursesController.js')}}"></script>
    <script src="{{asset('js/app/controller/HomeworksController.js')}}"></script>
    <script src="{{asset('js/app/controller/ExerciseController.js')}}"></script>
    <script src="{{asset('js/app/controller/LessonController.js')}}"></script>
@stop
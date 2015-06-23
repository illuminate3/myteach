@extends('layouts.default')

@section('head')
    {{--<link rel="stylesheet" href="{{asset('css/isotope.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}">--}}
@stop
@section('container')

    <section class="container" style="margin: 3em 0;">
        <div class="col-md-12">
            <div class="row">
                <div class="portfolio-items isotopeWrapper clearfix" id="3">
                    @foreach(array_chunk($gallery,3) as $image)
                    <div class="row">
                    @foreach($image as $photo)
                    <article class="col-sm-4 isotopeItem webdesign">
                        <div class="portfolio-item">
                            <img src="{{asset($photo['photo'])}}" alt="" />
                            <div class="portfolio-desc align-center">
                                <div class="folio-info">
                                    <a href="assets/images/portfolio/img1.jpg" class="fancybox">
                                        <h5>Project Title</h5>
                                        <i class="fa fa-link fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')
{{--<script src="{{asset('js/jquery.cslider.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.isotope.min.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>--}}
{{--<script src="{{asset('js/custom.js')}}"></script>--}}
@stop
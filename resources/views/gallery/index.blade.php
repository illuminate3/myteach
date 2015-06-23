@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
@stop
@section('container')

    <section class="container" style="margin: 3em 0;">
        <div class="col-md-12">
            <div class="row" >
                <div class=" clearfix">
                    @foreach(array_chunk($gallery,3) as $image)
                    <div class="row" style="margin-bottom: 2em;">
                        @foreach($image as $photo)
                        <div class="col-sm-4  "  >
                                <a class="popup-link" href="{{asset($photo['photo'])}}"><img src="{{asset($photo['photo'])}}" alt="" /></a>

                        </div>
                        @endforeach

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

<script>

    jQuery(document).ready(function() {
    (function(){
        //window.setInterval(function(){
            jQuery('.popup-link').magnificPopup(
                    {
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        fixedContentPos: true,
                        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                        image: {
                            verticalFit: true
                        },
                        zoom: {
                            enabled: true,
                            duration: 300 // don't foget to change the duration also in CSS
                        }
                    });
        //}, 600);


    })();

       });

</script>

@stop
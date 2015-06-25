@extends('layouts.default')

@section('container')

<!-- container -->
<div class="container">
            <div class="row" style="margin: 1em">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error </strong>Your data is not correct! <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3 class="section-title">Your Message</h3>
                    <p>
                    Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the is dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>

                    <form action="/contact" class="form-light mt-20" role="form" method="POST">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" required="true" name="name" class="form-control" placeholder="Your name">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required="true" name="email" class="form-control" placeholder="Email address">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" required="true" name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" required="true" name="message" id="message" placeholder="Write you message here..." style="height:100px;"></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-two">Send message</button><p><br/></p>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="section-title">Office Address</h3>
                            <div class="contact-info">
                                <h5>Address</h5>
                                <p>5th Street, Carl View - United States</p>

                                <h5>Email</h5>
                                <p>info@webthemez.com</p>

                                <h5>Phone</h5>
                                <p>+09 123 1234 123</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- /container -->


@stop

@section('footer')
    {{--<script src="{{asset('js/app/controller/CoursesController.js')}}"></script>--}}
@stop
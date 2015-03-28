@extends('layouts.default')

@section('container')
<!-- main content -->
            <section class="col-sm-8 maincontent">
            @if($page)
                {!! $page->description !!}
            @endif
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right">

                <div class="panel">
                    <h4>Latest News</h4>
                    <ul class="list-unstyled list-spaces">
                        <li><a href="">Responsive Design</a><br>
                            <span class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, laborum.</span></li>
                        <li><a href="">HTML5, CSS3 and JavaScript</a><br>
                            <span class="small text-muted">Consequuntur eius repellendus eos aliquid molestiae ea laborum ex quibusdam</span></li>
                        <li><a href="">Bootstrap</a><br>
                            <span class="small text-muted">Eveniet, consequuntur eius repellendus eos aliquid molestiae ea</span></li>
                        <li><a href="">Clean Template</a><br>
                            <span class="small text-muted">Sed, mollitia earum debitis est itaque esse reiciendis amet cupiditate.</span></li>
                        <li><a href="">Premium Quality</a><br>
                            <span class="small text-muted">Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.</span></li>
                    </ul>
                </div>

            </aside>
            <!-- /Sidebar -->
             <div class="row">
                            <div class="col-md-12">
                                <h3>Our Team</h3>
                                <p>Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.</p>
                                <br />
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <!-- Team Member -->
                                <div class="team-member">
                                    <!-- Image Hover Block -->
                                    <div class="member-img">
                                        <!-- Image  -->
                                        <img class="img-responsive" src="images/photo-1.jpg" alt="">
                                    </div>
                                    <!-- Member Details -->
                                    <h4>John Doe</h4>
                                    <!-- Designation -->
                                    <span class="pos">CEO</span>
                                    <div class="team-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <!-- Team Member -->
                                <div class="team-member pDark">
                                    <!-- Image Hover Block -->
                                    <div class="member-img">
                                        <!-- Image  -->
                                        <img class="img-responsive" src="images/photo-2.jpg" alt="">
                                    </div>
                                    <!-- Member Details -->
                                    <h4>Larry Doe</h4>
                                    <!-- Designation -->
                                    <span class="pos">Director</span>
                                    <div class="team-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <!-- Team Member -->
                                <div class="team-member pDark">
                                    <!-- Image Hover Block -->
                                    <div class="member-img">
                                        <!-- Image  -->
                                        <img class="img-responsive" src="images/photo-3.jpg" alt="">
                                    </div>
                                    <!-- Member Details -->
                                    <h4>Ranith Kays</h4>
                                    <!-- Designation -->
                                    <span class="pos">Manager</span>
                                    <div class="team-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <!-- Team Member -->
                                <div class="team-member pDark">
                                    <!-- Image Hover Block -->
                                    <div class="member-img">
                                        <!-- Image  -->
                                        <img class="img-responsive" src="images/photo-4.jpg" alt="">
                                    </div>
                                    <!-- Member Details -->
                                    <h4>Joan Ray</h4>
                                    <!-- Designation -->
                                    <span class="pos">Creative</span>
                                    <div class="team-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

@stop
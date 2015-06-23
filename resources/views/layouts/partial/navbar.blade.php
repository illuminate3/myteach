  <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="/#/">
                    <img height="60px"  src="{{asset('images/logo.gif')}}" alt="Masoomeh Dahshtdar Academic Homepage"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li {{\Request::is('/') ? 'class=active' : ''}}><a href="/#/">Home</a></li>
					<li {{\Request::is('courses') ? 'class=active' : ''}}><a href="/courses/#courses" >Courses</a></li>
                    <li {{\Request::is('gallery') ? 'class=active' : ''}}><a href="/gallery">Gallery</a></li>
                    <li {{\Request::is('cv') ? 'class=active' : ''}}><a href="/cv/#/resume">Cv</a></li>
                   	<li {{\Request::is('persian') ? 'class=active' : ''}}><a href="/persian/#/farsi">پارسی</a></li>
					<li><a href="videos.html">Videos</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="#">Dummy Link1</a></li>
                            <li><a href="#">Dummy Link2</a></li>
                            <li><a href="#">Dummy Link3</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
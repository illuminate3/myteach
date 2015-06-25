 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li >
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Homepage <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li {{\Request::is('admin') ? 'class=active' : ''}} {{\Request::is('admin/latest') ? 'class=active' : ''}}>
                                    <a href="/admin" {{\Request::is('admin/#') ? 'class=active' : ''}}>Personal</a>
                                </li>
                                <li>
                                    <a href="/admin/latest/#/news" {{\Request::is('admin/latest') ? 'class=active' : ''}} >Latest News</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#courses"><i class="fa fa-fw fa-arrows-v"></i> Courses <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="courses" class="collapse">
                                <li >
                                    <a href="/admin/courses/#/books" {{\Request::is('admin/courses') ? 'class=active' : ''}}>Books</a>
                                </li>
                                <li>
                                    <a href="/admin/courses/#/courses" {{Request::is('admin/courses') ? 'class=active' : ''}}>Courses</a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a href="/admin/exercises/#/homeworks" {{\Request::is('admin/exercises') ? 'class=active' : ''}}>Homeworks </a>
                        </li>

                        <li>
                            <a href="/admin/students/#/students" {{\Request::is('admin/students') ? 'class=active' : ''}} >Students </a>
                        </li>
                        <li>
                            <a href="/admin/exams/#/exams" {{\Request::is('admin/exams') ? 'class=active' : ''}} >Exams </a>
                        </li>
                        <li>
                            <a href="/admin/gallery/#/photos" {{\Request::is('admin/gallery') ? 'class=active' : ''}} >Gallery </a>
                        </li>
                        <li>
                            <a href="/admin/cv/#/resume" {{\Request::is('admin/cv') ? 'class=active' : ''}} >Cv </a>
                        </li>
                        <li>
                            <a href="/admin/persian/#/farsi" {{\Request::is('admin/persian') ? 'class=active' : ''}} >Parsi </a>
                        </li>
                        <li>
                            <a href="/admin/contact/#/messages" {{\Request::is('admin/contact') ? 'class=active' : ''}} >Messages <span class=" label label-danger pull-right"> {{\App\Contact::whereChecked('0')->count() ?: '0' }} </span> </a>
                        </li>

                    </ul>
                </div>
</div>
</nav>
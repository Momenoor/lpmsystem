<header class="header-style-1">
    <div class="header-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span
                                    class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span></button>
                            <a class="navbar-brand" href="index.html"><img src="{{asset('storage/'.setting('site_logo'))}}"
                                                                           width="150px" alt=""></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="/">{{__('homepage')}}</a>
                                </li>
                                <li><a href="aboutus.html">من نحن </a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="event-grid.html">Events Grid</a></li>
                                        <li><a href="event-list.html">Events List</a></li>
                                        <li><a href="single-event.html">Event Single</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Course <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="course-grid.html">Course Grid 4 Col</a></li>
                                        <li><a href="course-grid-3col.html">Course Grid 3 Col</a></li>
                                        <li><a href="course-grid-3col-v2.html">Course Grid 3 Col-V2</a></li>
                                        <li><a href="course-grid-2col.html">Course Grid 2 Col</a></li>
                                        <li><a href="course-list.html">Course List With Sidebar</a></li>
                                        <li><a href="course-list-2.html">Course List V2</a></li>
                                        <li><a href="course-single.html">Course Single</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="{{route('blogs.index')}}" >Blog</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Team</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="team-1.html">Team One</a></li>
                                                <li><a href="team-2.html">Team Two</a></li>
                                                <li><a href="team-3.html">Team Three</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Gallery</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="gallery.html">Normal Gallery</a></li>
                                                <li><a href="gallery-modern.html">Modern Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="page-404.html">Page 404</a></li>
                                        <li><a href="coming-soon.html" target="_blank">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3">
                    <ul class="search-cart">
                        <li class="search-icon">
                            <div class="btn-group">
                                <a class="sicon-btn" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"> <i class="fas fa-times"></i> <i class="fas fa-search"></i></a>
                                <div class="dropdown-menu">
                                    <form class="search-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="cart-icon">
                            <div class="btn-group">
                                <a class="vcart-btn" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"> <span class="pcount">2</span> <i
                                        class="fas fa-shopping-cart"></i> Your Cart</a>
                                <div class="dropdown-menu cart-box" role="menu">
                                    Recently added item(s)
                                    <ul class="list">
                                        <li class="item">
                                            <a href="#" class="preview-image"><img class="preview" src="images/pro.jpg"
                                                                                   alt=""></a>
                                            <div class="description"><a href="#">Sample Course</a> <strong
                                                    class="price">1 x $44.95</strong></div>
                                        </li>
                                        <li class="item">
                                            <a href="#" class="preview-image"><img class="preview" src="images/pro.jpg"
                                                                                   alt=""></a>
                                            <div class="description"><a href="#">Sample Course</a> <strong
                                                    class="price">1 x $44.95</strong></div>
                                        </li>
                                    </ul>
                                    <div class="total">Total: <strong>$44.95</strong></div>
                                    <div class="view-link"><a href="#">Proceed to Checkout</a> <a href="#">View
                                            cart </a></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--My Account Button Start-->
                    <div class="my-account">
                        <div class="btn-group">
                            <button type="button" class="acc-btn" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="far fa-user"></i> My Account <span
                                    class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Login Account</a></li>
                                <li><a href="#">Register Account</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--My Account Button End-->
                </div>
            </div>
        </div>
    </div>
</header>

@extends('layouts.app')
@section('content')
    @include('layouts.slider')
    <!--Welcome Start-->
    <div class="h1-welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="welcome-box">
                        <div class="welcome-title">
                            <strong>{{__("About Us")}}</strong>
                            <h1>{{setting('about_us_title')}}</h1>
                        </div>
                        <p> {{setting('about_us_description')}} </p>
                        <a class="btn-style-1" href="#">{{__("More About")}}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @foreach(setting('icon_boxes') as $icon_box)
                            <div class="col-md-6 col-sm-6">
                                <!--Icon Box Start-->
                                <div class="icon-box mb-40">
                                    <img src="{{asset('storage/'.$icon_box['image'])}}" width="100" alt="">
                                    <h5>{{$icon_box['title']}}</h5>
                                    <p>{{$icon_box['description']}}</p>
                                </div>
                                <!--Icon Box End-->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Welcome End-->
    <!--Campus + Achievements Start-->
    <div class="campus-achievements">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 pr0">
                    <div class="campus-box">
                        <div class="cb-cap">
                            <a href="#"><span class="icon-play"></span></a>
                            <h4>Campus Tour</h4>
                            <em>Explore the university</em>
                        </div>
                        <img src="{{asset('images/campus.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 plr0">
                    <ul class="achievements">
                        <li><i class="icon-facts1"></i> <strong>90+</strong> <span class="title">National Awards</span>
                        </li>
                        <li><i class="icon-facts2"></i> <strong>48+</strong> <span class="title">Best Teachers</span>
                        </li>
                        <li><i class="icon-facts3"></i> <strong>2078+</strong> <span
                                class="title">Students Enrolled</span></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 pl0">
                    <div class="tweets-bg">
                        <div class="tweets">
                            <span class="tw-meta"> <a href="#"><i class="fas fa-reply"></i></a> <a href="#"><i
                                        class="fas fa-heart"></i></a> </span>
                            <h4>John Smith</h4>
                            <p>We are proud of our diverse University community which attracts students. @GramoTech
                                #themeforest</p>
                            <span>about 2 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Campus + Achievements End-->
    <!--Departments Start-->
    <div class="home1-departments">
        <div class="container">
            <h2 class="stitle">Edugrade Departments</h2>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="dprt-box c1">
                        <i class="icon-dep1"></i>
                        <h5>Graphic & <br>
                            Web Design
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="dprt-box c2">
                        <i class="icon-dep2"></i>
                        <h5>Business & <br>
                            Management
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="dprt-box c3">
                        <i class="icon-dep3"></i>
                        <h5>Programming <br>
                            Courses
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="dprt-box c4">
                        <i class="icon-dep4"></i>
                        <h5>Foreign <br>
                            Language
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Departments end-->
    <!--News Section Start-->
    <div class="home1-news portfolio filter-news">
        <div class="container">
            <h2 class="stitle">Latest News</h2>
            <a class="more-news" href="#">More News</a>
            <div class="isotope items">
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box img-post">
                        <div class="news-thumb">
                            <div class="img-caption">
                                <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                                <h4><a href="#">Consider MBA Programs That Offer Summer Prep</a></h4>
                            </div>
                            <img src="{{asset('images/h1news-thumb1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box">
                        <div class="news-excerpt">
                            <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                            <h4><a href="single.html">Extra-curricular activities can fulfil</a></h4>
                            <p>Learning to live, study and work in a thriving business capital is exciting, Ut enim
                                ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                        <a class="news-details" href="#">News Detail</a>
                    </div>
                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box">
                        <div class="news-thumb"><img src="{{asset('images/h1news-thumb2.jpg')}}" alt=""></div>
                        <div class="news-excerpt">
                            <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                            <h4><a href="single.html">WordPress: Make A custom Plugins </a></h4>
                        </div>
                        <a class="news-details" href="#">News Detail</a>
                    </div>

                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box">
                        <div class="news-thumb"><img src="{{asset('images/h1news-thumb3.jpg')}}" alt=""></div>
                        <div class="news-excerpt">
                            <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                            <h4><a href="single.html">Students work together to solve a problem</a></h4>
                            <p>Learning to live, study and work in a thriving business capital is exciting, Ut enim
                                ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                        <a class="news-details" href="#">News Detail</a>
                    </div>
                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box active">
                        <div class="news-excerpt">
                            <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                            <h4><a href="single.html">https://themeforest.net/user/profile/portfolio</a></h4>
                        </div>
                        <a class="news-details" href="#">News Detail</a>
                    </div>
                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box">
                        <div class="news-excerpt">
                            <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                            <h4><a href="single.html">Students work together to solve a problem</a></h4>
                            <p>Learning to live, study and work in a thriving business capital is exciting, Ut enim
                                ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                        <a class="news-details" href="#">News Detail</a>
                    </div>
                </div>
                <!--Item End-->
                <!--Item Start-->
                <div class="item col-md-4">
                    <div class="news-box img-post">
                        <div class="news-thumb">
                            <div class="img-caption">
                                <span class="post-date"><i class="far fa-calendar-alt"></i> Aug 22, 2018</span>
                                <h4><a href="#">Consider MBA Programs That Offer Summer Prep</a></h4>
                            </div>
                            <img src="{{asset('images/h1news-thumb4.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Item End-->
            </div>
        </div>
    </div>
    <!--News Section End-->
    <!--Upcoming Events Start-->
    <div class="up-events">
        <div class="container">
            <h2 class="stitle">Upcoming Events</h2>
            <div class="row">
                <!--Event Box Start-->
                <div class="col-md-4 col-sm-4">
                    <div class="event-box">
                        <div class="event-thumb">
                            <div class="edate"> Jun <strong>16</strong></div>
                            <span class="etime"><i class="far fa-clock"></i> 10:00am - 5:00pm</span> <img
                                src="{{asset('images/h1-event1.jpg')}}" alt="">
                        </div>
                        <div class="event-excerpt">
                            <h4><a href="#">Consider MBA Programs That Offer Summer Prep</a></h4>
                            <span><i class="fas fa-map-marker-alt"></i> Hall - A | Broklyn Audiitorium</span>
                        </div>
                    </div>
                </div>
                <!--Event Box End-->
                <!--Event Box Start-->
                <div class="col-md-4 col-sm-4">
                    <div class="event-box">
                        <div class="event-thumb">
                            <div class="edate"> Jun <strong>16</strong></div>
                            <span class="etime"><i class="far fa-clock"></i> 10:00am - 5:00pm</span> <img
                                src="{{asset('images/h1-event2.jpg')}}" alt="">
                        </div>
                        <div class="event-excerpt">
                            <h4><a href="#">Conference, Events and Hospitality</a></h4>
                            <span><i class="fas fa-map-marker-alt"></i> Hall - A | Broklyn Audiitorium</span>
                        </div>
                    </div>
                </div>
                <!--Event Box End-->
                <!--Event Box Start-->
                <div class="col-md-4 col-sm-4">
                    <div class="event-box">
                        <div class="event-thumb">
                            <div class="edate"> Jun <strong>16</strong></div>
                            <span class="etime"><i class="far fa-clock"></i> 10:00am - 5:00pm</span> <img
                                src="{{asset('images/h1-event3.jpg')}}" alt="">
                        </div>
                        <div class="event-excerpt">
                            <h4><a href="#">Seminar with Professor Adam Arvidsson 2018</a></h4>
                            <span><i class="fas fa-map-marker-alt"></i> Hall - A | Broklyn Audiitorium</span>
                        </div>
                    </div>
                </div>
                <!--Event Box End-->
            </div>
        </div>
    </div>
    <!--Upcoming Events End-->
    <!--Meet Our Professors Start-->
    <div class="meet-professors">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="stitle">Meet Our Professors</h2>
                    <div class="row">
                        <!--professors start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <div class="team-img">
                                    <div class="team-caption">
                                        <p>John is Professor of Biotechnology and Bioengineering at the Department of
                                            Biosystems Science and Engineering (D-BSSE) of the Edugrade in new york.</p>
                                        <ul class="team-social">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                    <span class="plus"> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i> </span>
                                    <img src="{{asset('images/professor1.jpg')}}" alt="">
                                </div>
                                <div class="team-name">
                                    <h5>Andre Smith</h5>
                                    <strong>Senior Lecturer</strong>
                                </div>
                            </div>
                        </div>
                        <!--professors End-->
                        <!--professors start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <div class="team-img">
                                    <div class="team-caption">
                                        <p>John is Professor of Biotechnology and Bioengineering at the Department of
                                            Biosystems Science and Engineering (D-BSSE) of the Edugrade in new york.</p>
                                        <ul class="team-social">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                    <span class="plus"> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i> </span>
                                    <img src="{{asset('images/professor2.jpg')}}" alt="">
                                </div>
                                <div class="team-name">
                                    <h5>John Smith</h5>
                                    <strong>Biology Professor</strong>
                                </div>
                            </div>
                        </div>
                        <!--professors End-->
                        <!--professors start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="team-box">
                                <div class="team-img">
                                    <div class="team-caption">
                                        <p>John is Professor of Biotechnology and Bioengineering at the Department of
                                            Biosystems Science and Engineering (D-BSSE) of the Edugrade in new york.</p>
                                        <ul class="team-social">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                    <span class="plus"> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i> </span>
                                    <img src="{{asset('images/professor3.jpg')}}" alt="">
                                </div>
                                <div class="team-name">
                                    <h5>Alizeh Anderson</h5>
                                    <strong>English Lecturer</strong>
                                </div>
                            </div>
                        </div>
                        <!--professors End-->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="other-members">
                        <h3 class="stitle2">Other Members</h3>
                        <ul>
                            <li><a href="#">Henry Hill</a></li>
                            <li><a href="#">Cassandra Mueller</a></li>
                            <li><a href="#">Judith Scheetz</a></li>
                            <li><a href="#">Nancy Robinson</a></li>
                            <li><a href="#">Stephen Reilly</a></li>
                            <li><a href="#">Jason Bushey</a></li>
                            <li><a href="#">Eric Haynes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Meet Our Professors End-->
    <!--Home Contact Panel Start-->
    <div class="home-contact-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="ci-box c1">
                        <div class="hcp-icon"><i class="fas fa-phone"></i></div>
                        <strong><a href="#">Telephone Directory</a></strong>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="ci-box c2">
                        <div class="hcp-icon"><i class="fas fa-play-circle"></i></div>
                        <strong><a href="#">Video Portal</a></strong>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="ci-box c3">
                        <div class="hcp-icon"><i class="far fa-newspaper"></i></div>
                        <strong><a href="#">News Portal</a></strong>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="ci-box c4">
                        <div class="hcp-icon"><i class="fas fa-graduation-cap"></i></div>
                        <strong><a href="#">Scholarships</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Home Contact Panel End-->
@endsection

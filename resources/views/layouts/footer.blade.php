<footer class="footer ">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="widget textwidget">
                    <img src="{{asset('storage/'.setting('site_logo'))}}" height="100px" alt="">
                    <p>{{setting('footer_text')}}.</p>
                </div>
            </div>
            <div class="col-md-2 col-md-6">
                <div class="widget">
                    <h4>Information</h4>
                    <ul class="quick-links">
                        <li><a href="#">Campus Tour</a></li>
                        <li><a href="#">Student Life</a></li>
                        <li><a href="#">Scholarship</a></li>
                        <li><a href="#">Admission</a></li>
                        <li><a href="#">Leadership</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="widget">
                    <h4>Courses</h4>
                    <ul class="quick-links">
                        <li><a href="#">Masters Degree</a></li>
                        <li><a href="#">Post Graduate</a></li>
                        <li><a href="#">Undergraduste</a></li>
                        <li><a href="#">Engineering</a></li>
                        <li><a href="#">Ph.D Degree</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget">
                    <h4>Contact us</h4>
                    <address>
                        <ul>
                            <li><i class="fas fa-home"></i> {{setting('address')}}</li>
                            <li><i class="fas fa-phone"></i> {{setting('phone')}}</li>
                            <li><i class="fas fa-envelope"></i> {{setting('email')}}</li>
                            <li><i class="fas fa-globe"></i> {{env('APP_URL')}}</li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights mb-10">
        <div class="container">
            <div class="row">
                <div class="col-md-6">{!! setting('copyright') !!} </div>
                <div class="col-md-6">
                    <ul class="footer-social">
                        @foreach(setting('social_links') as $link)
                            <li>
                                <a href="{{$link['url']}}">
                                    <i class="{{\App\Enums\SocialLinkIcons::from($link['platform'])->icon()}}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

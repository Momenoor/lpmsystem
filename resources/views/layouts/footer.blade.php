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
                            <li><i class="fas fa-home"></i> Kings Avanue Littel Next Street, Nova Land Tile Newyork, USA
                            </li>
                            <li><i class="fas fa-phone"></i> +44 6589 9874</li>
                            <li><i class="fas fa-envelope"></i> info@edugrade.com</li>
                            <li><i class="fas fa-globe"></i> www.edugrade.com</li>
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
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

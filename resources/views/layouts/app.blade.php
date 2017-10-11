<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Around | Blog</title>
    <!-- bootstrap-css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <!-- //font -->
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--animate-->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
</head>
<body>
<!-- header -->
<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="top-header-info">
                <div class="top-header-left wow fadeInLeft animated" data-wow-delay=".5s">
                    <p>More than 10 new destinations for your trip</p>
                </div>
                <div class="top-header-right wow fadeInRight animated" data-wow-delay=".5s">
                    <div class="top-header-right-info">
                        <ul>
                            @if (Auth::guest())

                                <li><a href="{{ route('loginX') }}">Войти</a></li>
                                <li><a href="{{ route('registerX') }}">Регистрация</a></li>

                            @else
                        </ul>
                    </div>
                    <div class="social-icons">
                        <ul>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="twitter facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter google" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="logo wow fadeInDown animated" data-wow-delay=".5s">
                <h1><a href="{{ url('/') }}"><img src="images/logo.jpg" alt="" /></a></h1>
            </div>
            <div class="top-nav wow fadeInRight animated" data-wow-delay=".5s">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('contact') }}">About</a></li>
                            <li><a href="codes.html">Codes</a></li>
                            <li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="hvr-bounce-to-bottom" href="gallery1.html">Gallery1</a></li>
                                    <li><a class="hvr-bounce-to-bottom" href="gallery2.html">Gallery2</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html" class="active">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- //header -->

<!-- blog -->
<div class="blog">
    <!-- container -->
    <div class="container">
        <div class="blog-heading">
            <h2 class="wow fadeInDown animated" data-wow-delay=".5s">Blog</h2>
            <p class="wow fadeInUp animated" data-wow-delay=".5s">Vivamus efficitur scelerisque nulla nec lobortis. Nullam ornare metus vel dolor feugiat maximus.Aenean nec nunc et metus volutpat dapibus ac vitae ipsum. Pellentesque sed rhoncus nibh</p>
        </div>
        <div class="blog-top-grids">
            <div class="col-md-8 blog-top-left-grid">

                @if(count($errors) > 0)

                    <div class="alert alert-danger">
                        <ul>

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>

                @endif

                @yield('content')
                <nav>
                    <ul class="pagination wow fadeInUp animated" data-wow-delay=".5s">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-4 blog-top-right-grid">
                <div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
                    <h3>Категории:</h3>
                    <ul>
                        @if (!empty($categories))

                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('articleByCategory',['categoryId' => $category->id]) }}"
                                       class="btn btn-menu">{{ $category->name_category }}</a>
                                </li>
                            @endforeach

                        @endif
                    </ul>
                </div>
                <div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
                    <h3>Archive</h3>
                    <ul class="marked-list offs1">
                        <li><a href="#">May 2016 (7)</a></li>
                        <li><a href="#">April 2016 (11)</a></li>
                        <li><a href="#">March 2016 (12)</a></li>
                        <li><a href="#">February 2016 (14)</a> </li>
                        <li><a href="#">January 2016 (10)</a></li>
                        <li><a href="#">December 2016 (12)</a></li>
                        <li><a href="#">November 2016 (8)</a></li>
                        <li><a href="#">October 2016 (7)</a> </li>
                        <li><a href="#">September 2016 (8)</a></li>
                        <li><a href="#">August 2016 (6)</a></li>
                    </ul>
                </div>
                <div class="comments">
                    <h3 class="wow fadeInUp animated" data-wow-delay=".5s">Recent Comments</h3>
                    <div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="col-md-3 comments-left">
                            <img src="images/t1.jpg" alt="" />
                        </div>
                        <div class="col-md-9 comments-right">
                            <h5>Admin</h5>
                            <a href="#">Phasellus sem leointerdum risus</a>
                            <p>March 16,2016 6:09:pm</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="col-md-3 comments-left">
                            <img src="images/t2.jpg" alt="" />
                        </div>
                        <div class="col-md-9 comments-right">
                            <h5>Admin</h5>
                            <a href="#">Phasellus sem leointerdum risus</a>
                            <p>March 16,2016 6:09:pm</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="col-md-3 comments-left">
                            <img src="images/t3.jpg" alt="" />
                        </div>
                        <div class="col-md-9 comments-right">
                            <h5>Admin</h5>
                            <a href="#">Phasellus sem leointerdum risus</a>
                            <p>March 16,2016 6:09:pm</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //container -->
</div>
<!-- //blog -->

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-nav wow fadeInLeft animated" data-wow-delay=".5s">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="gallery1.html">Gallery</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-5 footer-nav wow fadeInUp animated" data-wow-delay=".5s">
                <h4>Newsletter</h4>
                <p>Nunc non feugiat quam, vitae placerat ipsum. Cras at felis congue, volutpat neque eget</p>
                <form>
                    <input type="email" id="mc4wp_email" name="EMAIL" placeholder="Enter your email here" required="">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-4 footer-nav wow fadeInRight animated" data-wow-delay=".5s">
                <h4>Latest News</h4>
                <div class="news-grids">
                    <div class="news-grid">
                        <h6>09/01/2016 : <a href="single.html">Cras at felis congue</a></h6>
                        <h6>13/07/2016 : <a href="single.html">Volutpat neque eget</a></h6>
                        <h6>13/02/2016 : <a href="single.html">Agittis tellus ut dictum</a></h6>
                        <h6>28/11/2016 : <a href="single.html">Habitant morbi et netus</a></h6>
                        <h6>19/01/2016 : <a href="single.html">pellentesque habitant morbi</a></h6>
                        <h6>23/02/2016 : <a href="single.html">Maecenas volutpat lacus</a></h6>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="copyright wow fadeInUp animated" data-wow-delay=".5s">
            <p>© 2016 Around . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //footer -->
</body>
</html>
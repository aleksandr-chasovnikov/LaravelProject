<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Around | Blog</title>
    <!-- bootstrap-css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <!--// bootstrap-css -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic'
          rel='stylesheet' type='text/css'>
    <!-- //font -->
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{ asset('css/component.css') }}" type="text/css" media="all"/>
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
</head>
<body>
<div class="banner" id="home">
    <!--carbonads-container-->
    <div class="content">
        <div class="w3_agile_menu">
            <div class="agileits_w3layouts_nav">
                <div id="toggle_m_nav">
                    <div id="m_nav_menu" class="m_nav">
                        <div class="m_nav_ham w3_agileits_ham" id="m_ham_1"></div>
                        <div class="m_nav_ham" id="m_ham_2"></div>
                        <div class="m_nav_ham" id="m_ham_3"></div>
                    </div>
                </div>
                <div id="m_nav_container" class="m_nav wthree_bg">
                    <nav class="menu menu--sebastian">
                        <ul id="m_nav_list" class="m_nav menu__list">
                            <li class="m_nav_item active" id="m_nav_item_1"><a href="index.html"
                                                                               class="link link--kumya"><i
                                            class="fa fa-home" aria-hidden="true"></i><span
                                            data-letters="Home">Home</span></a></li>
                            <li class="m_nav_item" id="moble_nav_item_2"><a href="typography.html"
                                                                            class="link link--kumya scroll"><i
                                            class="fa fa-cog" aria-hidden="true"></i><span
                                            data-letters="Services">Services</span></a></li>
                            <li class="m_nav_item" id="moble_nav_item_3"><a href="blog.html"
                                                                            class="link link--kumya scroll"><i
                                            class="fa fa-info-circle" aria-hidden="true"></i><span
                                            data-letters="Blog">Blog</span></a></li>
                            <li class="m_nav_item" id="moble_nav_item_5"><a href="gallery.html"
                                                                            class="link link--kumya scroll"><i
                                            class="fa fa-picture-o" aria-hidden="true"></i><span
                                            data-letters="Gallery">Gallery</span></a></li>
                            <li class="m_nav_item" id="moble_nav_item_6"><a href="contact.html"
                                                                            class="link link--kumya scroll"><i
                                            class="fa fa-envelope-o" aria-hidden="true"></i><span
                                            data-letters="Contact Us">Contact Us</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <h1 class="title wow fadeInDown animated animated" data-wow-delay=".3s"><a
                    class="link link--takiri" href="index.html">Go Easy On<span
                        class="wow fadeInUp animated animated" data-wow-delay=".5s">Where do you want to be?</span></a>
        </h1>

    </div>

</div>
</div>
<!--/start-inner-content-->
<!-- blog -->
<div class="blog">
    <!-- container -->
    <div class="container">
        <div class="blog-info wow fadeInDown animated animated" data-wow-delay=".5s">
            <h2 class="tittle">Our Blog</h2>
        </div>
        <div class="blog-top-grids">

            @if(!empty($errors))

                <div class="alert alert-danger">
                    <ul>

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>

            @endif

            @yield('content')


            <div class="col-md-4 blog-top-right-grid">
                <div class="categories">
                    <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                        categories</h3>
                    <ul>

                        @if ( !empty($category) )

                            @foreach ($category as $cat)
                                <li class="wow fadeInLeft animated animated" data-wow-delay=".5s">
                                    <a href="#">{{$cat->title}}</a>
                                </li>
                            @endforeach

                        @endif
                    </ul>
                </div>

                @if ( !empty($comments) )
                    <div class="comments">
                        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Последние
                            комментарии</h3>

                        @foreach ($comments as $comment)
                            <div class="comments-text wow fadeInLeft animated animated"
                                 data-wow-delay=".5s">
                                <div class="col-md-3 comments-left">
                                    <img src="images/t3.jpg" alt=""/>
                                </div>
                                <div class="col-md-9 comments-right">
                                    <h5>Admin</h5>
                                    <a href="#">Phasellus sem leointerdum risus</a>
                                    <p>March 16,2014 6:09:pm</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach

                    </div>
                @endif


            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //container -->
</div>
<!-- //blog -->
<!--//end-inner-content-->

<!--copy-right-->
<div class="copy">
    <p class="wow fadeInUp animated animated" data-wow-delay=".5s">&copy; 2016 Go Easy On . All
        Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
<!--//copy-right-->
<!--//footer-->
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover"
                                                                         style="opacity: 1;"> </span></a>
<!--/script-->
<script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
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
<!-- gallery Modals -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
        });
    });
</script>
<!--start-smooth-scrolling-->
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed:1000,
            easingType: 'linear'
         };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- for bootstrap working -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->


</body>
</html>
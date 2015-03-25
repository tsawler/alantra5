<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Alantra: @yield('browser-title')</title>
    <meta name="keywords" content="{{ $meta_tags }}" />
    <meta name="description" content="{{ $meta }}" />
    <meta name="Author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <!-- WEB FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/sky-forms.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/line-icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/owl-carousel/owl.pack.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/flexslider.css" rel="stylesheet" type="text/css" />

    <!-- REVOLUTION SLIDER -->
    <link href="/assets/css/revolution-slider.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layerslider.css" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/header-default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/footer-default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/color_scheme/red.css" rel="stylesheet" type="text/css" id="color_scheme" />
    <link href="/assets/css/color_scheme/darkblue.css" rel="stylesheet" type="text/css" id="color_scheme">

    <!-- Morenizr -->
    <script type="text/javascript" src="/assets/plugins/modernizr.min.js"></script>

    <!--[if lte IE 8]>
    <script src="/assets/plugins/respond.js"></script>
    <![endif]-->
    @include("vcms5::public.partials.vcms-css")
</head>

<body class="smoothscroll">

<div id="wrapper">

    <!-- Top Bar -->
    <header id="topBar">
        <div class="container">

            <div class="pull-right fsize13 margin-top10 hide_mobile">
                <!-- mail , phone -->
                <a href="mailto:info@alantraleasing.com">info@alantraleasing.com</a> &bull; 800-456-1800
                @include('vcms5::public.partials.language-menu')
                <div class="block text-right"><!-- social -->
                    <a href="https://twitter.com/AlantraLeasing" target="_blank"  class="social fa fa-twitter"></a>
                    <a href="https://www.facebook.com/alantratrailers" target="_blank"  class="social fa fa-facebook"></a>
                    <a href="https://www.linkedin.com/company/5065231" target="_blank" class="social fa fa-linkedin"></a>
                </div><!-- /social -->
            </div>

            <!-- Logo -->
            <a class="logo" href="/">
                <img src="/assets/images/alantra-logo.png" height="75" alt="" />
            </a>

        </div><!-- /.container -->
    </header>
    <!-- /Top Bar -->

@include('vcms5::public.partials.top-menu')

    <!-- PAGE TOP -->
    <section class="page-title">
        <div class="container">

            <header>

                <ul class="breadcrumb pull-right"><!-- breadcrumb -->
                    <li><a href="/">{{ Lang::get('vcms5::vcms5.home') }}</a> </li>
                    @yield('breadcrumb')
                </ul><!-- /breadcrumb -->

                <h2><!-- Page Title -->
                    @yield('title')
                </h2><!-- /Page Title -->

            </header>

        </div>
    </section>
    <!-- /PAGE TOP -->

    @yield('banner')

    <!-- CONTENT -->
    <section>
        <div class="container">

            @yield('content')

        </div>
    </section>
    <!-- /CONTENT -->

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">

            <div class="row">

                <!-- col #1 -->
                <div class="spaced col-md-3 col-sm-4 hidden-xs dark">

                    <h4>Contact <strong>Alantra</strong></h4>
                    <p class="block">
                        98 Cougle Road<br>
                        Sussex NB E4E 5L5<br>
                        Email: info@alantraleasing.com<br>
                        Toll Free: 800-456-1800<br>
                        Phone: 506-443-3757<br>
                        Fax: 506-432-9076<br>
                    </p>

                    <p class="block"><!-- social -->
                        <a href="https://twitter.com/AlantraLeasing" target="_blank" class="social fa fa-twitter"></a>
                        <a href="https://www.facebook.com/alantratrailers" target="_blank"  class="social fa fa-facebook"></a>
                        <a href="https://www.linkedin.com/company/5065231" target="_blank" class="social fa fa-linkedin"></a>
                    </p><!-- /social -->
                </div>
                <!-- /col #1 -->

                <!-- col #2 -->
                <div class="spaced col-md-3 col-sm-4 hidden-xs">

                </div>
                <!-- /col #2 -->

                <!-- col #3 -->
                <div class="spaced col-md-3 col-sm-4 hidden-xs">
                    <h4>Customer <strong>Testimonials</strong></h4>
                    <ul class="list-unstyled fsize13">
                        <?php
                        $tests = \App\Models\Testimonial::orderByRaw("RANDOM()")->take(3)->get();
                        ?>
                        @foreach($tests as $t)
                            <?php
                            if (strlen($t->testimonial) > 40){
                                $test_short = substr(strip_tags($t->testimonial), 0, 145) . "...";
                            } else {
                                $test_short = strip_tags($t->testimonial);
                            }
                            ?>
                            <li>
                                <i class="fa fa-user"></i>&nbsp;&nbsp;{{ $test_short }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /col #3 -->

                <!-- col #4 -->
                <div class="spaced col-md-3 col-sm-4">
                    <h4>Subscribe to our <strong>Newsletter</strong></h4>
                    <form method="post" action="/subscribe" class="input-group">
                        <input required type="email" class="form-control" name="email" id="newsletter_email" value="" placeholder="E-mail Address">
								<span class="input-group-btn">
									<button class="btn btn-primary">SUBMIT</button>
								</span>
                    </form>

                </div>
                <!-- /col #4 -->

            </div>

        </div>

        <hr />

        <div class="copyright">
            <div class="container text-center fsize12">
                All Right Reserved &copy; {{ date('Y') }} Alantra Leasing Inc. &nbsp;
                <a href="/privacy-policy" class="fsize11">Privacy Policy</a> &bull;
                <a href="/sitemap">Sitemap</a>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <a href="#" id="toTop"></a>

</div><!-- /#wrapper -->

<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="/assets/plugins/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/scripts.js"></script>
@include("vcms5::public.partials.vcms-js")
@include('vcms5::partials.messages')
@yield('bottom-js')
</body>
</html>

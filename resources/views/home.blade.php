<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Alantra Leasing</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="Author" content="" />

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
    <!--<link href="/assets/css/layout-dark.css" rel="stylesheet" type="text/css"  />-->
    <link href="/assets/css/color_scheme/darkblue.css" rel="stylesheet" type="text/css" id="color_scheme">

    <!-- Modernizer -->
    <script type="text/javascript" src="/assets/plugins/modernizr.min.js"></script>

    <!--[if lte IE 8]>
    <script src="/assets/plugins/respond.js"></script>
    <![endif]-->
    @include("vcms5::public.partials.vcms-css")

    <style>
        #home-content{
            margin-top: 20px;
            z-index: 999;
            position: relative;
        }
        /* home widgets */
        .homewidget {
            position: relative;
            border: 1px solid silver;
            top: 0px;
            z-index: 999;
            background: transparent;

        }
        @media(max-width:767px){
            .homewidget {
                position: relative;
                border: 1px solid silver;
                top: 0;
                z-index: 999;
                background: transparent;
            }
        }
        #home-content .panel-body {
            height: 340px;
        }
        #home-content .panel-body > img {
            width: 100%;
        }
        .homewidget-inner .panel-default {
            margin: 2px;
            background-color: black;
            opacity: 0.75;
            height: 100%;
        }

        .panel-default > .panel-heading {
            color: #333;
            background-color: black;
            opacity: 0.75;
            border-color: transparent;
        }

        .homewidget h3 {
            color: white;
            text-transform: uppercase;
            font-family: futura_ltcn_btlight;
            font-size: 20pt;
            text-align: center;
        }

        .homewidget h4 {
            color: black;
            text-transform: uppercase;
            font-family: futura_ltcn_btlight;
            font-size: 16pt;
            text-align: center;
        }
        .homewidget a {
            text-decoration: none;
        }
        .homewidget a:hover {
            color: black;
        }
        .homewidget p {
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
            line-height: 140%;
            color: black;
        }
        #topNav form.search {
            float:right;
            max-width:160px;
            margin:12px 0 0 0;
            padding:0;
        }
    </style>
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


    <!-- REVOLUTION SLIDER -->
    <div class="slider fullwidthbanner-container roundedcorners">
        <div class="fullwidthbanner">
            <ul class="hide">

                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="14"  data-masterspeed="300" data-delay="10000">

                    <!-- COVER IMAGE -->
                    <img src="/assets/images/1x1.png" data-lazyload="/assets/custom/images/rotating/a.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />

                    <div class="tp-caption large_text block_styleColor block_black lft tp-resizeme start"
                         data-x="60"
                         data-y="200"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">EASTERN CANADA'S LEADER FOR...
                    </div>

                    <div class="tp-caption medium_text block_styleColor sft stb"
                         data-x="60"
                         data-y="280"
                         data-speed="300"
                         data-start="1000"
                         data-easing="easeOutExpo">Office Trailers.<br>Modular Structures.<br>Custom Builds.
                    </div>

                </li>

                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="14"  data-masterspeed="300" data-delay="10000">

                    <!-- COVER IMAGE -->
                    <img src="/assets/images/1x1.png" data-lazyload="/assets/custom/images/rotating/b.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />

                    <div class="tp-caption large_text block_styleColor block_black lft tp-resizeme start"
                         data-x="760"
                         data-y="200"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Fully Featured Units
                    </div>

                </li>

                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="14"  data-masterspeed="300" data-delay="10000">

                    <!-- COVER IMAGE -->
                    <img src="/assets/images/1x1.png" data-lazyload="/assets/custom/images/rotating/c.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />


                    <div class="tp-caption large_text block_styleColor block_black lft tp-resizeme start"
                         data-x="760"
                         data-y="200"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Trusted Quality.
                    </div>

                    <div class="tp-caption medium_text block_styleColor sft stb"
                         data-x="760"
                         data-y="280"
                         data-speed="300"
                         data-start="1000"
                         data-easing="easeOutExpo">Service Excellence.
                    </div>



                </li>

                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="14"  data-masterspeed="300" data-delay="10000">

                    <!-- COVER IMAGE -->
                    <img src="/assets/images/1x1.png" data-lazyload="/assets/custom/images/rotating/d.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />

                    <div class="tp-caption large_text block_styleColor block_black lft tp-resizeme start"
                         data-x="760"
                         data-y="200"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Comfort.
                    </div>

                    <div class="tp-caption medium_text block_styleColor sft stb"
                         data-x="760"
                         data-y="280"
                         data-speed="300"
                         data-start="1000"
                         data-easing="easeOutExpo">Durability in the most remote locations.
                    </div>
                </li>

            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!-- /REVOLUTION SLIDER -->


    <!-- main page content -->
    <div class="row"  id="home-content">
        <div class="col-lg-2 hidden-sm hidden-md hidden-xs">
            &nbsp;
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">

            <div class="panel panel-default homewidget">
                <div class="panel-heading homewidget-inner">
                    <h3 class="panel-title">Products</h3>
                </div>
                <div class="panel-body">
                    <a href="/superior-quality-fully-featured-diverse"><img class="img-responsive" src="/assets/custom/images/products.jpg" alt=""></a>
                    <p>
                        The unit you need. When you need it.
                        From offices to wash cars, modular structures and more,
                        Alantra has what your project needs.
                    </p>
                </div>
                <div class="panel-footer hidden-md hidden-sm hidden-xs">
                    <h4><a href="/superior-quality-fully-featured-diverse">Read More</a></h4>
                </div>
            </div>

        </div>

        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default homewidget">
                <div class="panel-heading homewidget-inner">
                    <h3 class="panel-title">Service</h3>
                </div>
                <div class="panel-body">
                    <a href="/one-stop-shop"><img class="img-responsive" src="/assets/custom/images/service.jpg" alt=""></a>
                    <p>
                        With Alantra, you can depend on our turn-on-a dime service and support.
                    </p>
                </div>
                <div class="panel-footer hidden-md hidden-sm hidden-xs">
                    <h4><a href="/one-stop-shop">Read More</a></h4>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default homewidget">
                <div class="panel-heading homewidget-inner">
                    <h3 class="panel-title">Locations</h3>
                </div>
                <div class="panel-body">
                    <a href="/contact"><img class="img-responsive" src="/assets/custom/images/locations.jpg" alt=""></a>
                    <p>
                        Our locations, team members and units cover eastern Canada.
                    </p>
                </div>
                <div class="panel-footer hidden-md hidden-sm hidden-xs">
                    <h4><a href="/contact">Read More</a></h4>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">

            <div class="panel panel-default homewidget">
                <div class="panel-heading homewidget-inner">
                    <h3 class="panel-title">Quote</h3>
                </div>
                <div class="panel-body">
                    <a href="/quote"><img class="img-responsive" src="/assets/custom/images/quote.jpg" alt=""></a>
                    <p>
                        Just send along your project’s requirements, any challenges you may be facing and we’ll take it from there.
                    </p>
                </div>
                <div class="panel-footer hidden-md hidden-sm hidden-xs">
                    <h4><a href="/quote">Read More</a></h4>
                </div>
            </div>

        </div>


        <div class="col-lg-2 hidden-sm hidden-md hidden-xs">
            &nbsp;
        </div>

    </div>


    <!-- WELCOME -->
    <section>
        <div class="container">
            <header>
                <h2>
                    Welcome to 
							<span class="word-rotator" data-delay="2000"><!-- word rotator - default delay: 2000. Change rotating delay: data-delay="5000" -->
								<span class="items bold">
									<span><em>Alantra</em></span>
									<span><em>Quality</em></span>
									<span><em>Service</em></span>
                                    <span><em>Professionalism</em></span>
								</span>
							</span><!-- /word rotator -->
                </h2>
                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                    {!! Form::open(array('url' => '/page/savefragment', 'id' => 'savefrag1', 'name' => 'savefrag1')) !!}
                    <h1><span class="editablecontenttitle" id="thetitle1">{!! $fragments[0]->fragment_title_fr !!}</span></h1>
                    <article class="editablefragment" id="f1" data-id="4">
                        {!! $fragments[0]->fragment_text_fr !!}
                    </article>
                    <article class="admin-hidden">
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="saveEditedFragment(1)">Save</a>
                        <a class="btn btn-info" href="javascript:void(0)" onclick="turnOffEditing()">Cancel</a>
                        &nbsp;&nbsp;&nbsp;
                    </article>
                    <input type="hidden" name="fid" value="{!! $fragments[0]->id !!}">
                    <input type="hidden" name="thedata" id="thedata1">
                    <input type="hidden" name="thetitle" id="thetitledata1">
                    {!! Form::close() !!}
                @else
                    {!! Form::open(array('url' => '/page/savefragment', 'id' => 'savefrag1', 'name' => 'savefrag1')) !!}
                    <h1><span class="editablecontenttitle" id="thetitle1">{!! $fragments[0]->fragment_title !!}</span></h1>
                    <article class="editablefragment" id="f1" data-id="4">
                        {!! $fragments[0]->fragment_text !!}
                    </article>
                    <article class="admin-hidden">
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="saveEditedFragment(1)">Save</a>
                        <a class="btn btn-info" href="javascript:void(0)" onclick="turnOffEditing()">Cancel</a>
                        &nbsp;&nbsp;&nbsp;
                    </article>
                    <input type="hidden" name="fid" value="{!! $fragments[0]->id !!}">
                    <input type="hidden" name="thedata" id="thedata1">
                    <input type="hidden" name="thetitle" id="thetitledata1">
                    {!! Form::close() !!}
                @endif

            </header>
        </div>
    </section>
    <!-- /WELCOME -->

    <!-- DARK CALLOUT -->
    <div class="callout dark arrow-down">
        <div class="container text-center">

            <h2>Why Choose Alantra?</h2>

        </div>
    </div>
    <!-- /DARK CALLOUT -->


    <!-- TESTIMONIALS -->
    <section>
        <div class="container">


            <header class="text-center">
                <h2>Just Listen to What Our Customers Have to Say</h2>
                <blockquote class="noborder nopadding nomargin">
                    The testimonials speak for themselves
                </blockquote>

                <div class="divider half-margins"><!-- divider --></div>

            </header>


            <div class="row">
                @foreach($testimonials as $t)
                    <div class="col-md-4">
                        <div class="testimonial classic male animate_from_bottom">
                            {!! $t->testimonial !!}
                            <cite><strong>{!! $t->person !!}</strong></cite><br><cite>{!! $t->company !!}</cite>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- /TESTIMONIALS -->


    <!-- CALLOUT -->
    <div class="callout styleBackgroundColor">
        <div class="container">

            <div class="row">

                <div class="col-md-9">
                    <h3>Interested?</h3>
                    <p>If so, request a <strong>no obligation</strong> quote.</p>
                </div>

                <div class="col-md-3"><!-- button -->
                    <a href="/quote" rel="nofollow" class="btn btn-primary btn-lg">Request a Quote</a>
                </div>

            </div>

        </div>
    </div>
    <!-- /CALLOUT -->

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
                                    <i class="fa fa-user"></i>&nbsp;&nbsp;{!! $test_short !!}
                                </li>
                            @endforeach
                        </ul>
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
                All Right Reserved &copy; {11 date('Y') !!} Alantra Leasing Inc. &nbsp;
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
<script type="text/javascript" src="/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/assets/js/scripts.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="/assets/plugins/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/plugins/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/js/revolution_slider.js"></script>


@include("vcms5::public.partials.vcms-js")
@include('vcms5::partials.messages')
@yield('bottom-js')
</body>
</html>
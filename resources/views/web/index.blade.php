<!DOCTYPE html>
<html>
<head>
    <title>Wlog - Blog and Magazine HTML template </title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Blog">
    <meta name="keywords" content="">
    <meta name="author" content="kamleshyadav">
    <meta name="MobileOptimized" content="320">
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/swiper/swiper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/plugins/magnific/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>
<body>
<div id="blog_preloader_wrapper">
    <div id="blog_preloader_box">
        <div class="blog_loader">
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<div class="blog_main_wrapper">

    <div class="blog_main_wrapper blog_toppadder60 blog_bottompadder60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="blog_technology blog_topheading_slider_nav">
                        <div class="blog_main_heading_div wow fadeInUp">
                            <span style="margin-left: 10px !important;">UniNews</span>
                            {{--                            <nav class="blog_tab_nav blog_color_darkblue">--}}
                            {{--                                <div class="nav nav-tabs" id="nav-tab4" role="tablist">--}}
                            {{--                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-technologyall"--}}
                            {{--                                       role="tab" aria-selected="true">All</a>--}}
                            {{--                                    <a class="nav-item nav-link" data-toggle="tab" href="#technology1" role="tab"--}}
                            {{--                                       aria-selected="false">Creative</a>--}}
                            {{--                                    <a class="nav-item nav-link" data-toggle="tab" href="#technology2" role="tab"--}}
                            {{--                                       aria-selected="false">Phone</a>--}}
                            {{--                                    <a class="nav-item nav-link" data-toggle="tab" href="#technology3" role="tab"--}}
                            {{--                                       aria-selected="false">World</a>--}}
                            {{--                                    <a class="nav-item nav-link" data-toggle="tab" href="#technology4" role="tab"--}}
                            {{--                                       aria-controls="nav-america" aria-selected="false">Apps</a>--}}
                            {{--                                </div>--}}
                            {{--                            </nav>--}}
                            <div class="tab_toggle_menu">
                                <a href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13px" height="14px">
                                        <path fill-rule="evenodd" fill="rgb(0, 0, 0)"
                                              d="M0.001,10.115 L0.001,7.969 L13.000,7.969 L13.000,10.115 L0.001,10.115 ZM3.649,6.028 L3.649,3.881 L12.992,3.881 L12.992,6.028 L3.649,6.028 ZM0.001,-0.002 L13.000,-0.002 L13.000,2.145 L0.001,2.145 L0.001,-0.002 ZM12.992,13.998 L3.649,13.998 L3.649,11.853 L12.992,11.853 L12.992,13.998 Z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active tabslider wow fadeInUp" id="nav-technologyall"
                                 role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="blog_technology_slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @foreach($news as $single_news)

                                                        <div class="swiper-slide">
                                                            <div class="blog_post_style2" dir="rtl">

                                                                <div class="blog_post_style2_content">
                                                                    <h3>{{$single_news->title}}</h3>
                                                                    <p>{{$single_news->body}}</p>
                                                                    <a href="{{route('news.details', $single_news->id)}}" class="blog_readmore"> بیشتر بخوانید
                                                                        <svg style="rotate: 180deg;"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             width="13px"
                                                                             height="6px">
                                                                            <path fill-rule="evenodd"
                                                                                  fill="rgb(255, 54, 87)"
                                                                                  d="M12.924,2.786 L10.035,0.042 C9.955,-0.026 9.867,-0.039 9.772,0.003 C9.677,0.045 9.629,0.120 9.629,0.230 L9.629,1.986 L0.242,1.986 C0.172,1.986 0.114,2.010 0.069,2.057 C0.024,2.104 0.001,2.164 0.001,2.237 L0.001,3.743 C0.001,3.816 0.024,3.876 0.069,3.923 C0.114,3.970 0.172,3.994 0.242,3.994 L9.629,3.994 L9.629,5.750 C9.629,5.854 9.677,5.930 9.772,5.977 C9.867,6.019 9.955,6.003 10.035,5.930 L12.924,3.154 C12.974,3.102 12.999,3.039 12.999,2.966 C12.999,2.899 12.974,2.839 12.924,2.786 Z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="blog_post_style2_img">
                                                                    <img src="{{$single_news->pic}}"
                                                                         class="img-fluid" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="technology-swiper-button-next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8px" height="13px">
                                                        <path fill-rule="evenodd" fill="rgb(34, 34, 34)"
                                                              d="M7.782,5.992 L1.722,0.206 C1.582,0.073 1.395,-0.001 1.196,-0.001 C0.996,-0.001 0.809,0.073 0.669,0.206 L0.223,0.633 C-0.068,0.910 -0.068,1.361 0.223,1.639 L5.311,6.496 L0.217,11.360 C0.077,11.494 -0.001,11.672 -0.001,11.863 C-0.001,12.053 0.077,12.231 0.217,12.366 L0.663,12.791 C0.804,12.925 0.991,12.999 1.190,12.999 C1.390,12.999 1.577,12.925 1.717,12.791 L7.782,7.001 C7.923,6.867 8.000,6.688 8.000,6.497 C8.000,6.305 7.923,6.126 7.782,5.992 Z"/>
                                                    </svg>
                                                </div>
                                                <div class="technology-swiper-button-prev">
                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="8px"
                                                         height="13px">
                                                        <path fill-rule="evenodd" fill="rgb(34, 34, 34)"
                                                              d="M0.218,5.992 L6.277,0.206 C6.418,0.073 6.605,-0.001 6.804,-0.001 C7.004,-0.001 7.191,0.073 7.331,0.206 L7.777,0.633 C8.068,0.910 8.068,1.361 7.777,1.639 L2.689,6.496 L7.783,11.360 C7.923,11.494 8.000,11.672 8.000,11.863 C8.000,12.053 7.923,12.231 7.783,12.366 L7.337,12.791 C7.196,12.925 7.009,12.999 6.810,12.999 C6.610,12.999 6.423,12.925 6.283,12.791 L0.218,7.001 C0.077,6.867 -0.000,6.688 0.000,6.497 C-0.000,6.305 0.077,6.126 0.218,5.992 Z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Main js file Style-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
<script src="{{asset('js/plugins/swiper/swiper.min.js')}}"></script>
<script src="{{asset('js/plugins/magnific/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!--Main js file Style-->
</body>
</html>

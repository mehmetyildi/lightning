<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <!-- Stylesheets -->
    <!-- bootstrap v3.3.6 css -->
    <link href="/creative_template/css/bootstrap.css" rel="stylesheet">
    <!-- font-awesome css -->
    <link href="/creative_template/css/font-awesome.css" rel="stylesheet">
    <!-- flaticon css -->
    <link href="/creative_template/css/flaticon.css" rel="stylesheet">
    <!-- animate css -->
    <link href="/creative_template/css/animate.css" rel="stylesheet">
    <!-- owl.carousel css -->
    <link href="/creative_template/css/owl.css" rel="stylesheet">
    <!-- fancybox css -->
    <link href="/creative_template/css/jquery.fancybox.css" rel="stylesheet">
    <link href="/creative_template/css/hover.css" rel="stylesheet">
    <!-- style css -->
    <link href="/creative_template/css/style.css" rel="stylesheet">
    <!-- revolution slider css -->
    @yield('seo')
    <link rel="stylesheet" type="text/css" href="/creative_template/css/revolution/settings.css">
    <link rel="stylesheet" type="text/css" href="/creative_template/css/revolution/layers.css">
    <link rel="stylesheet" type="text/css" href="/creative_template/css/revolution/navigation.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="/creative_template/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/creative_template/images/favicon.ico" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="/creative_template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    @yield('style')
</head>
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <div class="topborder"></div>
        <!--Logo-Header-->
        <div class="logoheader logo-top">
            <div class="logo">
                Lorem
                <a href="/"><img src="{{$hp->logo}}" style="width:160px; height: 90px;"  alt="image" /></a>
            </div>
        </div>
        <!--Logo-Header end-->

        <!-- Main Header -->
        <header class="site-header header-second">

            <div class="header-main">
                <div class="container">
                    <div class="nav-outer clearfix">

                        <!--social-links-->
                        <ul class="social-links">
                            <li><a href="{{$hp->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$hp->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$hp->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            
                        </ul>

                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li><a href="/">ANASAYFA </a></li>
                                    <li><a href="/about">HAKKIMIZDA</a></li>
                                    <li class="dropdown"><a href="">BLOG</a>
                                        <ul>
                                            @foreach($categories as $category)
                                            <li ><a href="/category/{{$category->url}}/posts/index">{{$category->title}}</a>

                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="">ETKİNLİK</a>
                                        <ul>
                                            @foreach($activitytypes as $activitytype)
                                            <li ><a href="/activity/{{$activitytype->url}}/index">{{$activitytype->type_name}}</a>
                                                <ul>
                                                    <li><a href="post-detail-sidebar.html">Sidebar Version</a></li>
                                                    <li><a href="post-detail-fullwidth.html">Full Width Version</a></li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="">KÜTÜPHANE</a>
                                        <ul>
                                            @foreach($booktypes as $booktype)
                                            <li ><a href="/book/{{$booktype->url}}/index">{{$booktype->type_name}}</a>
                                                <ul>
                                                    <li><a href="post-detail-sidebar.html">Sidebar Version</a></li>
                                                    <li><a href="post-detail-fullwidth.html">Full Width Version</a></li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown">  <a href="">VİDEO</a>
                                        <ul>
                                            @foreach($categories_video as $category)
                                            <li ><a href="/category/{{$category->url}}/videos/index">{{$category->title}}</a>
                                                <!-- <ul>
                                                    <li><a href="post-detail-sidebar.html">Sidebar Version</a></li>
                                                    <li><a href="post-detail-fullwidth.html">Full Width Version</a></li>
                                                </ul> -->
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    @guest
                                    <li><a class="nav-link ml-auto" href="{{ route('login') }}">Giriş</a></li>
                                    <li><a class="nav-link ml-auto" href="{{ route('register') }}">Kaydol</a>
                                    </li>
                                    @else

                                    <li class="dropdown" >
                                        <a>{{ Auth::user()->name }}</a>
                                        <ul>
                                            <li>
                                              <a  href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              Çıkış
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                      </li>
                                  </ul>
                              </li>





                              @endguest
                              @guest
                              @else
                              @if(auth()->user()->hasRole('admin'))
                              <li><a href="/admin">Admin Panel</a></li>
                              @endif
                              @endguest
                          </ul>


                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </header>

  <!-- Main Header end -->

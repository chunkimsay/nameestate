<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('backend/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/app-blue.css') }}">
        <link rel="stylesheet" href="fontawsome/css/fontawesome.css">

        <link rel="stylesheet" href="{{asset('backend/css/component-chosen.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
        <!-- Theme initialization -->

    </head>
    <body>

        <div class="main-wrapper" >
            <div class="app" id="app">
                <header class="header" style="background-color: rgb(0, 0, 48) !important; color:white !important;">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-search">
                        @yield('header')
                    </div>

                    <div class="header-block header-block-nav" >
                        <ul class="nav-profile">

                            <li class="profile dropdown" style="">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="border-radius: 50%;background-image: url({{asset(@Auth::user()->photo)}})">
                                    </div>
                                <span class="name" style="color:white !important"> {{@Auth::user()->name}}</span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{ route('user.reset',Auth::user()->id) }}">

                                        <i class="fa fa-gear icon"></i> Reset Password </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('user.logout')}}">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                {{-- <a href="/admin" class="logo" style="vertical-align: top;" link="">
                                    <img style="border-radius: 0%" src="{{ asset('') }}" alt="" width="110%" >
                                </a>  --}}
                                ADMIN-REALESTATE
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class='dash_menu' id="dash_menu">
                                    <a href="{{ url('admin') }}">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                               <li id="menu_banner">
                                    <a href="{{route('banner.index')}}">
                                        <i class="fa fa-th-large"></i> Banner </a>
                                </li>
                                <li id="menu_company">
                                    <a href="{{route('company.index')}}">
                                        <i class="fa fa-bell"></i> Company </a>
                                </li>
                                <li id="menu_config">
                                    <a href="{{url('admin/user')}}">
                                        <i class="fa fa-lock"></i>User Admin<i class="fa arrow"></i>
                                    </a>
                                    {{-- <ul class="sidebar-nav" id="collapse_config" >
                                        <li id="user_menu">
                                            <a href="{{url('admin/user')}}"><i class="fa fa-user"> User</i></a>
                                        </li>

                                    </ul> --}}
                                </li>
                                <li id="menu_post">
                                    <a href="">
                                        <i class="fa fa-rss"> </i> Post <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav" id="collapse_post" >
                                        <li id="plot_menu">
                                            <a href="{{route('plot.index')}}"><i class="fa fa-spinner"></i> Plot </a>
                                        </li>
                                        <li class="" id="apart_menu">
                                        <a href="{{route('apartment.index')}}"><i class="fa fa-puzzle-piece"></i> Apartment </a>
                                        </li>
                                        <li class="" id="farm_menu">
                                            <a href="{{route('farmland.index')}}"><i class="fa fa-leaf"></i> Farmland </a>
                                            </li>
                                            <li class="" id="home_menu">
                                                <a href="{{route('home.index')}}"><i class="fa fa-home"></i> House </a>
                                                </li>
                                                <li class="" id="condo_menu">
                                                    <a href="{{route('condo.index')}}"><i class="fa fa-star"></i> Condo </a>
                                                </li>
                                    </ul>
                                </li>
                                <li id="menu_agency">
                                    <a href="{{route('agency.index')}}">
                                        <i class="fa fa-group"></i> Agency </a>
                                </li>
                                <li id="menu_location">
                                    <a href="{{route('location.index')}}">
                                        <i class="fa fa-map-marker"></i>Location </a>
                                </li>


                            </ul>
                        </nav>
                    </div>

                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    <section class="section">
                       @yield('content')
                    </section>

                </article>
                <footer class="footer">

                    <div class="footer-block author">
                        <ul>
                            <li> created by <a href="#">Saly Tech Co,.Ltd</a>
                            </li>

                        </ul>
                    </div>
                </footer>

            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="{{ asset('backend/js/vendor.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="{{ asset('backend/js/chosen.jquery.min.js') }}">S</script>
        <script>
            $(".chosen-select").chosen();
      </script>
        @yield('js')
    </body>
</html>

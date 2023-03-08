<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="GainsSchool">
    <meta name="author" content="GainsSchool">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/fav.png') }}">

    <link href="{{ asset('assets/frontend/fonts.googleapis.com/cssccc8.css?family=Roboto:400,700,500') }}"
        rel='stylesheet'>
    <link href="{{ asset('assets/frontend/vendor/unicons-2.0.1/css/unicons.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/frontend/css/vertical-responsive-menu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/night-mode.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/semantic/semantic.min.css') }}">
    <link href="{{ asset('assets/frontend/select2/css/select2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/dropify/css/dropify.min.css') }}">

    @yield('css')

</head>

<body>
    <header class="header clearfix">
        <button type="button" id="toggleMenu" class="toggle_menu">
            <i class='uil uil-bars'></i>
        </button>
        <button id="collapse_menu" class="collapse_menu bg-success">
            <i class="uil uil-bars collapse_menu--icon "></i>
            <span class="collapse_menu--label"></span>
        </button>
        <div class="main_logo" id="logo">
            <a href="{{ route('welcome') }}"><img style="height: 50px; width: 140px;"
                    src="{{ asset('assets/backend/logo.png') }}" alt=""></a>
            <a href="{{ route('welcome') }}"><img style="height: 50px; width: 140px;" class="logo-inverse"
                    src="{{ asset('assets/backend/logo.png') }}" alt=""></a>
        </div>
        <div class="top-category">
            <div class="ui compact menu cate-dpdwn">
                <div class="ui simple dropdown item">
                    <a href="#" class="option_links p-0" title="categories"><i class="uil uil-apps"></i></a>
                    <div class="menu dropdown_category5">
                        @foreach ($categories as $category)
                            <a href="{{ route('category_course', $category->id) }}"
                                class="item channel_item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('search.course') }}" method="POST">
            @csrf
            <div class="search120 mt-3">
                <div class="ui search">
                    <div class="ui left icon input swdh10">
                        <input class="prompt srch10" name="term" type="text"
                            placeholder="Search for Tuts Videos, Tutors, Tests and more..">
                        <i class='uil uil-search-alt icon icon1'></i>
                    </div>
                </div>
                <!-- <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button> -->
            </div>


            <div class="header_right">
                <ul>
                    <li>
                        <button class="btn btn-success">Search</button>
                        <!-- if user is logged in show logout -->
                        @if (Auth::check())
                            <a href="{{ route('student-logout') }}" class="btn btn-success" title="Logout">Logout</a>
                        @else
                            <a href="{{ route('student-signin') }}" class="btn btn-success"
                                title="Exibitions">Login</a>
                            <a href="{{ route('student-signup') }}" class="btn btn-success"
                                title="Exibitions">Register</a>
                        @endif
                    </li>


                    <li class="ui dropdown">
                        <a href="#" class="opts_account" title="Account">
                            @if (Auth::check('phone'))
                                    <img src="{{ asset('assets/frontend/images/hd.jpg') }}" alt="">
                            @else
                                <img src="{{ asset('assets/frontend/images/hd.jpg') }}" alt="">
                            @endif
                                
                            
                        </a>
                        <div class="menu dropdown_account">
                            <div class="channel_my">
                                <div class="profile_link">
                                    @if (Auth::check('phone'))
                                        <img src="{{ asset('assets/frontend/images/hd.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset('assets/frontend/images/hd.jpg') }}" alt="#">
                                    @endif
                                    <div class="pd_content">
                                        <div class="rhte85">
                                            <!-- check if user role == user and if he logged in -->
                                            @if (Auth::check())
                                                <h5> {{ Auth::user()->phone }}</h5>
                                            @else
                                                <h5>Guest</h5>
                                            @endif

                                            <div class="mef78" title="Verify">
                                                <i class='uil uil-check-circle'></i>
                                            </div>
                                        </div>
                                        @if (Auth::check('email'))
                                            <span>{{ Auth::user()->email }}</span>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('artist.profile') }}" class="dp_link_12">View Profile</a>
                            </div>
                            <div class="night_mode_switch__btn">
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="uil uil-moon"></i> Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </div>
                            <a href="#" class="item channel_item">Cursus dashboard</a>
                            <a href="#" class="item channel_item">Help</a>
                            <a href="#" class="item channel_item">Send Feedback</a>
                            <a href="{{ route('student-logout') }}" class="item channel_item">Sign Out</a>
                        </div>
                    </li>

                </ul>
            </div>
        </form>
    </header>


    <nav class="vertical_nav">
        <div class="left_section menu_left" id="js-menu">
            <div class="left_section">
                <ul>
                    <li class="menu--item">
                        <a href="{{ route('welcome') }}" class="menu--link active" title="Home">
                            <i class='uil uil-home-alt menu--icon'></i>
                            <span class="menu--label">Home</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="{{ route('exhibitor.create') }}" class="menu--link"
                            title="Exibition Registration">
                            <i class='uil uil-home-alt menu--icon'></i>
                            <span class="menu--label">Exhibition Registration</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="https://gainsgroup.com.bd/life-of-sundarbans/" class="menu--link"
                            title="Exibitions">
                            <i class='uil uil-home-alt menu--icon'></i>
                            <span class="menu--label">Exhibitions</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Live Streams">
                            <i class='uil uil-kayak menu--icon'></i>
                            <span class="menu--label">Live Streams</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Explore">
                            <i class='uil uil-search menu--icon'></i>
                            <span class="menu--label">Explore</span>
                        </a>
                    </li>
                    <li class="menu--item menu--item__has_sub_menu">
                        <label class="menu--link" title="Categories">
                            <i class='uil uil-layers menu--icon'></i>
                            <span class="menu--label">Categories</span>
                        </label>
                        <ul class="sub_menu">

                            @foreach ($categories as $category)
                                <li class="sub_menu--item">
                                    <a href="{{ route('category_course', $category->id) }}"
                                        class="sub_menu--link">{{ $category->name }}</a>
                                </li>
                            @endforeach



                        </ul>
                    </li>

                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Saved Courses">
                            <i class="uil uil-heart-alt menu--icon"></i>
                            <span class="menu--label">Saved Courses</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="left_section pt-2">
                <ul>

                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Help">
                            <i class='uil uil-question-circle menu--icon'></i>
                            <span class="menu--label">Help</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Report History">
                            <i class='uil uil-windsock menu--icon'></i>
                            <span class="menu--label">Report History</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="#" class="menu--link" title="Send Feedback">
                            <i class='uil uil-comment-alt-exclamation menu--icon'></i>
                            <span class="menu--label">Send Feedback</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="left_footer">
                <ul>
                    <li><a href="{{ route('front.about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('footer.blog') }}">Blog</a></li>
                    <li><a href="{{ route('help') }}">Help</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms.condition') }}">Terms</a></li>
                </ul>
                <div class="left_footer_content">
                    <p>&copy;
                        <script>
                            document.write(/\d{4}/.exec(Date())[0])
                        </script> <strong>Gainsschool</strong>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        @yield('content')
    </div>

    <div class="wrapper">
        <footer class="footer mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="item_f1">
                            <a href="{{ route('front.about') }}">About</a>
                            <a href="{{ route('footer.blog') }}">Blog</a>
                            <a href="{{ route('career') }}">Careers</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="item_f1">
                            <a href="{{ route('help') }}">Help</a>
                            <a href="{{ route('contact') }}">Contact Us</a>
                            <a href="{{ route('press') }}">Press</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="item_f1">

                            <a href="{{ route('terms.condition') }}">Terms</a>
                            <a href="{{ route('privacy') }}">Privacy Policy</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="item_f3">
                            <a href="#" class="btn1542">Teach on Gains School</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="footer_bottm">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="fotb_left">
                                        <li>
                                            <a href="index.html">
                                                <div class="footer_logo">
                                                    <img src="{{ asset('assets/frontend/images/logo1.svg') }}"
                                                        alt="">
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p>© 2022 <strong>Gains School</strong>. All Rights Reserved.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="edu_social_links">
                                        <a href="https://www.facebook.com/gainsgroup.com.bd"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <img src="{{ asset('assets/frontend/images/payment.jpeg') }}" alt="image"
                                        width="100%" height="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script data-cfasync="false"
        src="{{ asset('assets/frontend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vertical-responsive-menu.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/night-mode.js') }}"></script>
    <script src="{{ asset('assets/frontend/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/frontend/dropify/js/dropify.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    @yield('script')
</body>

</html>

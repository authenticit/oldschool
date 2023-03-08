<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from gambolthemes.net/html-items/cursus_main_demo/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jun 2022 12:33:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="GainsSchool">
    <meta name="author" content="GainsSchool">
    <title>Gains School - Sign In</title>

    <link rel="icon" type="image/png" href="images/fav.png">

    <link href="../../../fonts.googleapis.com/cssccc8.css?family=Roboto:400,700,500" rel='stylesheet'>
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
</head>

<body>
    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                <div class="col-lg-12">
                    <div class="main_logo25" id="logo">
                        <a href="index.html"><img src="images/logo.svg" alt=""></a>
                        <a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sign_form">
                        <h2>Welcome to Gains School</h2>
                        <p>Sign Up and Start Learning!</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="name" value=""
                                        id="id_fullname" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="email" name="email" value=""
                                        id="id_email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="number" name="phone" value=""
                                        id="id_email" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password" value=""
                                        id="password" placeholder="Password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" type="password"
                                        name="password_confirmation" required id="password_confirmation"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            <button class="login-btn" type="submit">Next</button>
                        </form>
                        <p class="sgntrm145">By signing up, you agree to our <a href="terms_of_use.html">Terms of
                                Use</a> and <a href="terms_of_use.html">Privacy Policy</a>.</p>
                        <p class="mb-0 mt-30">Already have an account? <a href="{{ route('login') }}">Log In</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">&copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <strong><a href="https://gainsschool.com/">Gains
                                School</a></strong>. All
                        Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/frontendjs/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/frontendjs/custom.js') }}"></script>
    <script src="{{ asset('assets/frontendjs/night-mode.js') }}"></script>
</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_main_demo/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jun 2022 12:33:16 GMT -->

</html>

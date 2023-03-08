<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="GainsSchool">
    <meta name="author" content="GainsSchool">
    <title>Gains School | Registration Info </title>
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
                        <p>Registration your info!</p>
                        <form method="POST">
                            @csrf
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="name" value=""
                                        id="name" required="" placeholder="Full name">
                                </div>
                            </div>



                            <div class="ui search focus mt-4">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password" value=""
                                        id="password" required="" placeholder="Enter password">
                                </div>
                            </div>
                            <button class="login-btn" type="submit">Save</button>
                        </form>
                        <p class="sgntrm145">By signing up, you agree to our <a href="terms_of_use.html">Terms of
                                Use</a> and <a href="terms_of_use.html">Privacy Policy</a>.</p>
                        <p class="mb-0 mt-30">Already have an account? <a href="{{ route('student-signin') }}">Log
                                In</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">&copy;
                        <script>
                            document.write(/\d{4}/.exec(Date())[0])
                        </script> <strong>Gains School</strong>. All
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

</html>

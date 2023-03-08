@extends('layouts.account')
@section('title', $title)
@section('content')

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
                        <h2>Log In</h2>
                        <p>Log In to Your GainsSchool+ Account!</p>

                        <form id="product_form" method="POST" action="{{ route('custom-signin') }}">
                            @csrf
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="phone" value=""
                                        id="id_fullname" required="" placeholder="Phone Number or Email Address">
                                </div>
                            </div>

                            <div class="ui search focus mt-3">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password" value=""
                                        id="id_fullname" required="" maxlength="24" placeholder="password">
                                </div>
                            </div>

                            <button onclick="add_more_field()" class="login-btn" type="submit">Sign In</button>

                        </form>
                        <p class="sgntrm145">Or <a href="{{ route('student.forget.password') }}">Forgot Password</a>.</p>
                        <p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="{{ route('student-signup') }}">Sign
                                Up</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>.
                        All
                        Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>

@endsection

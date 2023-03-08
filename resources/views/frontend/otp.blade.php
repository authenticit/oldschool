@extends('layouts.account')
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
                        <h2>Welcome Back</h2>
                        <p>Verify your OTP Code!</p>
                        <form method="POST">
                            @csrf
                            @php
                                $phone = session()->get('user')->phone;
                                $email = session()->get('user')->email;
                            @endphp
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh95">

                                    @if($phone)
                                    <input class="prompt srch_explore" type="number" name="phone"
                                        value="{{ $phone }}" readonly>
                                    @else
                                    <input class="prompt srch_explore" type="email" name="email"
                                        value="{{ $email }}" readonly>
                                    @endif
                                    <i class="uil uil-phone icon icon2"></i>
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh95">
                                    <input class="prompt srch_explore" type="number" name="code" value=""
                                        id="code" required="" maxlength="64" placeholder="Otp Code">
                                    <i class="uil uil-phone icon icon2"></i>
                                    <!-- otp icon -->

                                </div>
                            </div>
                            <button class="login-btn" type="submit">Next</button>
                        </form>
                        <p class="sgntrm145">Or <a href="forgot_password.html">Forgot Password</a>.</p>
                        <p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="{{ route('student-signup') }}">Sign Up</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020
                        <strong>Cursus</strong>. All
                        Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

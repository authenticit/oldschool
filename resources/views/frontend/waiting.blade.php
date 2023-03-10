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
                        <h2>Forget Password</h2>
						<p>
							Please check your email or phone for a verification link. If you did not receive the email, please check your spam folder.
						</p>

                        <p class="mb-0 mt-30 hvsng145">Go back to? <a href="{{ route('student-signin') }}">Log
                                In</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2022 <strong>Cursus</strong>.
                        All
                        Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>

@endsection

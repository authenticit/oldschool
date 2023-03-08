
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
						<h2>Welcome Back</h2>
						<p>Do you want to continue with existing account !</p>
						<a href="{{ route('artist.profile') }}">
							<button class="login-btn" type="submit">Yes</button>
						</a>
						<p class="sgntrm145">Or <a href="{{ route('artist.verify') }}">Forgot Password</a>.</p>
						<p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="{{ route('student-signup') }}">Sign Up</a></p>
					</div>
					<div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>. All
						Rights Reserved.</div>
				</div>
			</div>
		</div>
	</div>

@endsection

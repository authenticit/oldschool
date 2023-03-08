
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
						<h2>Sign Up</h2>
						<p>Signup to Your Artist+ Account!</p>
						
						<form id="product_form" method="POST" action="{{ route('artist.signup') }}">
							@csrf
							<div class="ui search focus">
								<div class="ui left icon input swdh11 swdh19">
									<input class="prompt srch_explore" type="text" name="phone"
										id="id_fullname" required="" placeholder="Phone Number">
								</div>
							</div>

							<div class="ui search focus mt-3">
								<div class="ui left icon input swdh11 swdh19">
									<input class="prompt srch_explore" type="password" name="password" value=""
										id="id_fullname" required="" maxlength="24" placeholder="password">
								</div>
							</div>
							
							<button onclick="add_more_field()" class="login-btn" type="submit">Sign Up</button>
					
						</form>

						<p class="sgntrm145">Or <a href="{{ route('artist.verify') }}">Forgot Password</a>.</p>
						<p class="mb-0 mt-30 hvsng145">Already Have an account ? <a href="{{ route('artist.login') }}">Sign In</a></p>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection

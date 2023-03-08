@extends('layouts.front')

@section('title')
Login
@endsection

@section('content')


<!-- Login Area Start -->
<section class="new-login new-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="new-login-box">

					<div class="right-content">

						<div class="login-area">
							<div class="login-form signup-form">
								<div class="login">
									<form id="login_form" action="{{route('student.login.submit')}}" method="POST">

										@csrf

										<div class="form-group">
											<div class="form-input">
												<input type="text" placeholder="{{__('মোবাইল নাম্বার/ইমেইল')}}" name="email" id="email">
												<i class="fas fa-phone"></i>
											</div>
											<small style="color: red" id="email_error"></small>
										</div>
										<button id="register_button" class="submit-btn">{{ __('এগিয়ে যান') }}</button>
									</form>
								</div>
								<div id="otp_div" class="mt-5" style="display: none;">
									<p>ফোনে পাঠানো OTP নিচে লিখুন</p>
									<form id="verify_form" action="{{route('student.verify.submit')}}" method="POST">

										@csrf
										<input type="hidden" name="email" id="user_email">

										<div class="userInput">
											<input name="code_1" type="text" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
											<input name="code_2" type="text" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
											<input name="code_3" type="text" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
											<input name="code_4" type="text" id="fourth" maxlength="1">
										</div>
										<small style="color: red" id="code_error"></small>
										<div class="text-right">
											<a href="">পুনরায় OTP পাঠান</a>
										</div>
										<button class="submit-btn">{{ __('এগিয়ে যান') }}</button>
									</form>
								</div>

								<div id="info_div" class="mt-5" style="display: none;">
									<p>নাম এবং পাসওয়ারর্ড লিখুন</p>
									<form id="info_form" action="{{route('student.info.add')}}" method="POST">

										@csrf
										<input type="hidden" name="email" id="info_mail">
										@if(isset($_GET['course_id']))
										<input type="hidden" name="course_id" value="{{ $_GET['course_id'] }}">
										@endif

										<div class="form-group">
											<div class="form-input">
												<input type="text" placeholder="{{__('সম্পূর্ণ নাম')}}" name="name">
												<i class="fas fa-user"></i>
											</div>
											<small style="color: red" id="name_error"></small>
										</div>
										<div class="form-group">
											<div class="form-input">
												<input type="password" placeholder="{{__('পাসওয়ার্ড')}}" name="password">
												<i class="fas fa-lock"></i>
											</div>
											<small style="color: red" id="password_error"></small>
										</div>

										<button class="submit-btn">{{ __('এগিয়ে যান') }}</button>
									</form>
								</div>

								<div id="password_div" class="mt-5" style="display: none;">
									<p>আপনার পাসওয়ার্ড দিন</p>
									<form id="password_form" action="{{route('student.password.submit')}}" method="POST">

										@csrf
										<input type="hidden" name="email" id="password_email">
										@if(isset($_GET['course_id']))
										<input type="hidden" name="course_id" value="{{ $_GET['course_id'] }}">
										@endif
										@if(isset($_GET['book_id']))
										<input type="hidden" name="book_id" value="{{ $_GET['book_id'] }}">
										@endif

										<div class="form-group">
											<div class="form-input">
												<input type="password" placeholder="{{__('পাসওয়ার্ড')}}" name="password">
												<i class="fas fa-lock"></i>
											</div>
											<small style="color: red" id="login_password_error"></small>
										</div>

										<button class="submit-btn">{{ __('এগিয়ে যান') }}</button>
									</form>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Login Area End -->

@endsection

@section('scripts')
<script>
	function clickEvent(first,last){
		if(first.value.length){
			document.getElementById(last).focus();
		}
	}

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#login_form").on('submit', function (e) {
		e.preventDefault();
		var email = $('#email').val();
		$.ajax({
			url: $(this).prop('action'),
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: "json",
			beforeSend: function(){
				$('#register_button').html('এগিয়ে যান...');
			},
			success: function (data) {

				if (data.errors) {
					$('#email_error').html(data.errors.email);
				} 
				
				if(data.registration){
					$('#register_button').hide();
					$('#user_email').val(email);
					$('#otp_div').show();
				}

				if(data.success){
					$('#register_button').hide();
					$('#password_email').val(email);
					$('#password_div').show();
				}
			}

		});

	});

	$("#verify_form").on('submit', function (e) {
		e.preventDefault();
		var email = $('#email').val();
		$.ajax({
			url: $(this).prop('action'),
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: "json",
			
			success: function (data) {

				if (data.code) {
					$('#code_error').html(data.code);
				} 
				if(data.verify){

					$('#otp_div').hide();
					$('#info_mail').val(email);
					$('#info_div').show();
				}
				
			}

		});

	});


	// register new account and login
	$("#info_form").on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).prop('action'),
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: "json",
			
			success: function (data) {

				if (data.errors) {
					$('#name_error').html(data.errors.name);
					$('#password_error').html(data.errors.password);
				}

				if(data.route){
					window.location = data.route;
				}

				if(data.success){
					window.location = "{{ route('front.index')}}";
					
				}
				
			}

		});

	});


	// login old account
	$("#password_form").on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).prop('action'),
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: "json",
			
			success: function (data) {

				if (data.errors) {
					$('#login_password_error').html(data.errors.password);
				}

				if(data.route){
					window.location = data.route;
				}

				if(data.success){
					window.location = "{{ route('front.index')}}";
				}
				
			}

		});

	});
</script>
@endsection
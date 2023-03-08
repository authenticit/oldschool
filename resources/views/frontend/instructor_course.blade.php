@extends('layouts.front')
@section('title', $title)
@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-9 col-lg-8">

				<div class="section3125 mt-30">
					<h4 class="item_title">Newest Courses</h4>
					<a href="#" class="see150">See all</a>
					<div class="la5lo1">
						<div class="owl-carousel featured_courses owl-theme">

							@foreach ($courses as $c)
							<div class="item">
								<div class="fcrse_1 mb-20">
									<a href="course_detail_view.html" class="fcrse_img">
										<img src="{{  url('assets/images/courses', $c->photo)  }}" alt="">
										<div class="course-overlay">
											<span class="play_btn1"><i class="uil uil-play"></i></span>
											<div class="crse_timer">
												12 hours
											</div>
										</div>
									</a>
									<div class="fcrse_content">
										<div class="eps_dots more_dropdown">
											<a href="#"><i class='uil uil-ellipsis-v'></i></a>
											<div class="dropdown-content">
												<span><i class='uil uil-share-alt'></i>Share</span>
												<span><i class="uil uil-heart"></i>Save</span>
												<span><i class='uil uil-ban'></i>Not Interested</span>
												<span><i class="uil uil-windsock"></i>Report</span>
											</div>
										</div>
										<div class="vdtodt">
											<span class="vdt14">15 views</span>
											<span class="vdt14">10 min ago</span>
										</div>
										<a href="{{ route('course-detail', $c->id) }}" class="crse14s">
											{{ $c->title }}
										</a>
										<a href="#" class="crse-cate">{{ $c->category->name }} | CSS</a>
										<div class="auth1lnkprce">
											<p class="cr1fot">By <a href="#">{{ $c->user->name }}</a>
											</p>
											<div class="prce142">${{ $c->discount_price }}</div>
											<button class="shrt-cart-btn" title="cart"><i class="uil uil-shopping-cart-alt"></i></button>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>



		

			<div class="section3126">
				<div class="row">
					<div class="col-xl-6 col-lg-12 col-md-6">
						<div class="value_props">
							<div class="value_icon">
								<i class='uil uil-history'></i>
							</div>
							<div class="value_content">
								<h4>Go at your own pace</h4>
								<p>Enjoy lifetime access to courses on Edututs+'s website</p>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 col-md-6">
						<div class="value_props">
							<div class="value_icon">
								<i class='uil uil-user-check'></i>
							</div>
							<div class="value_content">
								<h4>Learn from industry experts</h4>
								<p>Select from top instructors around the world</p>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 col-md-6">
						<div class="value_props">
							<div class="value_icon">
								<i class='uil uil-play-circle'></i>
							</div>
							<div class="value_content">
								<h4>Find video courses on almost any topic</h4>
								<p>Build your library for your career and personal growth</p>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 col-md-6">
						<div class="value_props">
							<div class="value_icon">
								<i class='uil uil-presentation-play'></i>
							</div>
							<div class="value_content">
								<h4>100,000 online courses</h4>
								<p>Explore a variety of fresh topics</p>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="col-xl-12 col-lg-12">
				<div class="section3125 mt-30">
					<h4 class="item_title">What Our Student Have Today</h4>
					<div class="la5lo1">
						<div class="owl-carousel Student_says owl-theme">
							<div class="item">
								<div class="fcrse_4 mb-20">
									<div class="say_content">
										<p>"Donec ac ex eu arcu euismod feugiat. In venenatis bibendum nisi, in
											placerat eros ultricies vitae. Praesent pellentesque blandit
											scelerisque. Suspendisse potenti."</p>
									</div>
									<div class="st_group">
										<div class="stud_img">
											<img src="{{ asset('assets/frontend/images/left-imgs/img-4.jpg') }}" alt="">
										</div>
										<h4>Jassica William</h4>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="fcrse_4 mb-20">
									<div class="say_content">
										<p>"Cras id enim lectus. Fusce at arcu tincidunt, iaculis libero quis,
											vulputate mauris. Morbi facilisis vitae ligula id aliquam. Nunc
											consectetur malesuada bibendum."</p>
									</div>
									<div class="st_group">
										<div class="stud_img">
											<img src="{{ asset('assets/frontend/images/left-imgs/img-1.jpg') }}" alt="">
										</div>
										<h4>Rock Smith</h4>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="fcrse_4 mb-20">
									<div class="say_content">
										<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class
											aptent taciti sociosqu ad litora torquent per conubia nostra, per
											inceptos himenaeos eros ac, sagittis orci."</p>
									</div>
									<div class="st_group">
										<div class="stud_img">
											<img src="{{ asset('assets/frontend/images/left-imgs/img-7.jpg') }}" alt="">
										</div>
										<h4>Luoci Marchant</h4>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="fcrse_4 mb-20">
									<div class="say_content">
										<p>"Nulla bibendum lectus pharetra, tempus eros ac, sagittis orci.
											Suspendisse posuere dolor neque, at finibus mauris lobortis in.
											Pellentesque vitae laoreet tortor."</p>
									</div>
									<div class="st_group">
										<div class="stud_img">
											<img src="{{ asset('assets/frontend/images/left-imgs/img-6.jpg') }}" alt="">
										</div>
										<h4>Poonam Sharma</h4>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="fcrse_4 mb-20">
									<div class="say_content">
										<p>"Curabitur placerat justo ac mauris condimentum ultricies. In magna
											tellus, eleifend et volutpat id, sagittis vitae est. Pellentesque
											vitae laoreet tortor."</p>
									</div>
									<div class="st_group">
										<div class="stud_img">
											<img src="{{ asset('assets/frontend/images/left-imgs/img-3.jpg') }}" alt="">
										</div>
										<h4>Davinder Singh</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>





@endsection
@extends('layouts.front')
@section('title', $title)

@section('content')


<div class="wrapper _bg4586 _new89">
		<div class="_215b15">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title125">
							<div class="titleleft">
								<div class="ttl121">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.html">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
										</ol>
									</nav>
								</div>
							</div>
							<div class="titleright">
								<a href="index.html" class="blog_link"><i class="uil uil-angle-double-left"></i>Back to
									Home</a>
							</div>
						</div>
						<div class="title126">
							<h2>Contact Us</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="contact1256">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<a href="help.html" class="contact_link_step">
							<img src="{{ asset('assets/frontend/images/help_icon.svg') }}" alt="">
							<h4>Help Center</h4>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="our_blog.html" class="contact_link_step">
							<img src="{{ asset('assets/frontend/images/blog_icon.svg') }}" alt="">
							<h4>Blog</h4>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="career.html" class="contact_link_step">
							<img src="{{ asset('assets/frontend/images/career_icon.svg') }}" alt="">
							<h4>Careers</h4>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="coming_soon.html" class="contact_link_step">
							<img src="{{ asset('assets/frontend/images/developer_icon.svg') }}" alt="">
							<h4>Developer Area</h4>
						</a>
					</div>
					<div class="col-lg-8">
						<div class="contact_map">
							<div id="map"></div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="contact_info">
							<div class="checkout_title">
								<h4>Contact Information</h4>
								<img src="images/line.svg" alt="">
							</div>
							<ul class="contact_list_info">
								<li>
									<div class="txt_cntct"><span class="cntct_895"><i
												class="uil uil-location-point"></i>Main Address :</span>
										<p>#House Number: 665/1, Islamnagar,Behind the Khan Jahan Ali Hall,
                                            Hall Road, Khulna University.
										</p>
									</div>
								</li>
								<li>
									<div class="txt_cntct"><span class="cntct_895"><i class="uil uil-envelope"></i>Email
											Address :</span>
											<p>support@gainsgroup.com.bd</p>
										</p>
									</div>
								</li>
								<li>
									<div class="txt_cntct"><span class="cntct_895"><i
												class="uil uil-mobile-android-alt"></i>Phone Number :</span>
										<p>+880175 612 0009</p>
									</div>
								</li>
							</ul>
							<div class="edututs_links_social">
								<ul class="tutor_social_links">
									<li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#" class="ln"><i class="fab fa-linkedin-in"></i></a></li>
									<li><a href="#" class="yu"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
</div>

@endsection
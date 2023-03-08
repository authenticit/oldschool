@extends('frontend.artist.base')
@section('title', $title)


@section('css')

<link rel="stylesheet" href="{{ asset('assets/artist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/xzoom.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/responsive.css') }}">

@endsection

@section('content')

<section class="artwork-collect-area bg-area">
	
		<div class="row pl-4">
			<!-- lrft -->
			<div class="col-lg-3 col-md-12 col-sm-12 mb-4">
				<div class="clear-all">
					<a href="#">Clear All</a>
				</div>
				<div class="artist-category-group">
					<div class="accordion" id="accordionPanelsStayOpenExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
										Availability
								</button>
							</h2>
							<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
								<div class="accordion-body">
									<div class="items">
										<label for=""> 
												<input type="checkbox" name="status" value="7">
												<span>For Sale</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="8">
												<span>Sold</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="9">
												<span>Reserved</span>
											</label>
										<label for=""> 
											<input type="checkbox" name="status" value="10">
											<span>Not For Sale</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- chategory -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
									Chategory
								</button>
							</h2>
							<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
								<div class="accordion-body">
									<div class="items">
										<label for=""> 
											<!-- <input type="checkbox" name="status" value="7"> -->
										  <input type="" value="" placeholder="Search Category" class="category-search">
										</label>
										<label for=""> 
												<input type="checkbox" name="status" value="7">
												<span>Architecture</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="8">
												<span>Craft</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="9">
												<span>College</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="10">
												<span>Calligraphy</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="11">
												<span>Ceramics</span>
											</label>
										<label for=""> 
												<input type="checkbox" name="status" value="12">
												<span>Digital Or New Media</span>
											</label>
										<label for=""> 
											<input type="checkbox" name="status" value="13">
											<span>Fasion Design</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- medium  -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
								  Medium
								</button>
							</h2>
							<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
								<div class="accordion-body">
									<div class="items">
										<label for=""> 
											<input type="checkbox" name="status" value="6">
										  Select Category First
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- country -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingFour">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
								  Country
								</button>
							</h2>
							<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
								<div class="accordion-body">
									<div class="items">
										<label for=""> 
											<!-- <input type="checkbox" name="status" value="7"> -->
										  <input type="" value="" placeholder="Search Country" class="country-search">
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="6">
											Argentina
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="7">
											<span>Atghanistan</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="8">
											<span>Albania</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="9">
											<span>Algeria</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="10">
											<span>American Samoa</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="11">
											<span>Andorra</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="12">
											<span>Angola</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="13">
											<span>Anguilla</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="14">
											<span>Antarctica</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="15">
											<span>Antigua And Barbuda</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="16">
											<span>Armenia</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="17">
											<span>Aruba</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="18">
											<span>Australia</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="19">
											<span>Austria</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="20">
											<span>Azerbaijan</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="21">
											<span>Bahamas</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="22">
											<span>Bahrain</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="23">
											<span>Bangladesh</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="24">
											<span>Barbados</span>
										</label>
										<label for=""> 
											<input type="checkbox" name="status" value="25">
											<span>Belarus</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- top category  -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingFive">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
								  Top Categories
								</button>
							</h2>
							<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
								<div class="accordion-body top-category-header">
									<div class="items">
										<label for=""> 
											<!-- <input type="checkbox" name="status" value="6"> -->
											<div class="top-category-img">
											   <a href="#">
												<img src="images/top-category.jpg" alt="top-category">
											   </a>
											</div>
											<div class="top-category-content">
												<div class="top-category-art">
													<a href="#">glass art</a>
												</div>
												<div class="top-category-follow">
													<a href="#">Follow</a>
												</div>
											</div>
										</label>
										<label for=""> 
											<!-- <input type="checkbox" name="status" value="6"> -->
											<div class="top-category-img">
											   <a href="#">
												<img src="images/top-category.jpg" alt="top-category">
											   </a>
											</div>
											<div class="top-category-content">
												<div class="top-category-art">
													<a href="#">glass art</a>
												</div>
												<div class="top-category-follow">
													<a href="#">Follow</a>
												</div>
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- right -->
			<div class="col-lg-9 col-md-912-col-sm-12">
				<div class="row">
					@foreach($artworks as $artwork)
					<div class="col-lg-4 col-md-4 col-sm-12 mb-4">
						<div class="art-category">
							<div class="art-category-img">
								<a href="{{ route('artist.artwork.details', $artwork->id) }}">
									@if($artwork->image)
									<img src="{{ url('/images/artist/art_work', $artwork->image ) }}" alt="artwork-right-img">
									@else
									<img src="" alt="artwork-right-img">
									@endif
								</a>
							</div>
							<div class="art-work-content">
								<a href="{{ route('artist.artwork.details', $artwork->id) }}">
									{{$artwork->title}}
								</a>
								<span>{{$artwork->price}}</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	
</section>

@endsection



@section('script')

<script src="{{ asset('assets/artist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/jqueryall.2.2.4.js') }}"></script>
<script src="{{ asset('assets/artist/js/xzoom.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection
@extends('layouts.front')

@section('og')
<meta property="og:title" content="{{ $book->name }}" />
<meta property="og:description" content="Online learnign platform of Gain's Group" />
<meta property="og:image" content="{{ url('assets/images/book/', $book->og_image) }}" />
@endsection

@section('title', 'Book List')

@section('content')

<!-- Book Area Start -->
<section class="product-section pb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2 class="title">{{  __('নতুন বই সমূহ')  }}
					</h2>
				</div>
			</div>
		</div>
		<div class="row single-book">
			
			<div class="col-lg-9">
				<div class="row no-gutters book-details">
					<div class="col-lg-5">
						<div class="img">
							<img src="{{asset('assets/images/book/'.$book->image)}}" alt="course">
						</div>
					</div>
					<div class="col-lg-7 details">
						<h3 class="title">{{ $book->name }}</h3>
						<p class="author">
							@if($book->user_id != 0)
							@if($book->owner['photo'] == '')
							<img src="{{ $book->owner->getUrlfriendlyAvatar($size=300) }}" alt="">
							@else
							<img src="{{ asset('assets/images/users/'.$book->owner->photo) }}" alt="">
							@endif
							@else
							<img src="{{ asset('assets/images/admins/'.$book->author->photo) }}" alt="">
							@endif
							<a href="{{!empty($book->owner) ? route('instructor.details',$book->owner->instructor_slug) : route('instructor.details', $book->author->slug)}}">
								{{ !empty($book->owner) ? $book->owner->instructor_name : $book->author->name }}
							</a>
						</p>
						<p>Category: <a href="">{{ $book->category['name'] }}</a></p>
						<p class="price">
							৳{{ $book->price }} @if($book->actual_price != null)<span><del>৳{{ $book->actual_price}}</del></span>@endif
						</p>
						{!! $book->description !!}
						@if(Auth::check())
						<a href="{{ route('book.auth.order',$book->id) }}" class="buy-now" >{{ __(' অর্ডার করুন ') }}<i class="fas fa-arrow-right"></i></a>
						@else
						<a href="{{ route('student.login') }}?book_id={{ $book->id }}" class="buy-now" >{{ __('  অর্ডার করুন ') }}<i class="fas fa-arrow-right"></i></a>
						@endif
					</div>
				</div>
				
			</div>
			<div class="col-3 sidebar-info p-4">
			    <h4 class="text-center"  style="margin-top: 150px">Share this</h4>
				<!-- AddToAny BEGIN -->
						<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
							<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
							<a class="a2a_button_facebook"></a>
							<a class="a2a_button_facebook_messenger"></a>
							<a class="a2a_button_whatsapp"></a>
							<a class="a2a_button_linkedin"></a>
							<a class="a2a_button_twitter"></a>
						</div>
						<script async src="https://static.addtoany.com/menu/page.js"></script>
						<!-- AddToAny END -->
				<!-- something -->
			</div>

		</div>

	</div>
</section>
<!-- Book Area End -->


<!-- Book Area Start -->
<section class="product-section pb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-heading">
					<h2 class="title">{{  __('রিলেটিড বই সমূহ')  }}
					</h2>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($books as $book)
			<div class="col-lg-3 col-md-6">
				<div class="book mb-30">
					<div class="img">
						<img src="{{asset('assets/images/book/'.$book->image)}}" alt="course">
					</div>
					<div class="content">
						<p class="author">
							@if($book->user_id != 0)
							@if($book->owner['photo'] == '')
							<img src="{{ $book->owner->getUrlfriendlyAvatar($size=300) }}" alt="">
							@else
							<img src="{{ asset('assets/images/users/'.$book->owner->photo) }}" alt="">
							@endif
							@else
							<img src="{{ asset('assets/images/admins/'.$book->author->photo) }}" alt="">
							@endif
							<a href="{{!empty($book->owner) ? route('instructor.details',$book->owner->instructor_slug) : route('instructor.details', $book->author->slug)}}">
								{{ !empty($book->owner) ? $book->owner->instructor_name : $book->author->name }}
							</a>
						</p>
						<a href="{{route('book.show',$book->slug)}}">
							<h4 class="title">
								{{ str_limit($book->name, 40,'...') }}
							</h4>
						</a>


						

						<div class="botttom-area">
							<div class="left">
								

								<p class="price">
									{{ $curr->sign }}{{ round($book->price,2) }} <del>{{ $curr->sign }}{{ round($book->actual_price,2) }}</del>
								</p>

								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		
	</div>
</section>
<!-- Book Area End -->


@endsection

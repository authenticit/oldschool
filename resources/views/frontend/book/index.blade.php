@extends('layouts.front')

@section('og')
<meta property="og:title" content="{{ $gs->title }}" />
<meta property="og:description" content="Online learnign platform of Gain's Group" />
<meta property="og:image" content="{{ url('assets/front/images/gainsgroup.jpg') }}" />
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

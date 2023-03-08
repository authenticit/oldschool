@extends('layouts.front')
@section('title', $title)

@section('content')


<div class="wrapper _bg4586 _new89">
		
		<div class="faq1256">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-8">
						<div class="bg_blog2">
							<img src="{{ url('uploads/images/blog', $blog->image) }}" alt="">
						</div>

						<div class="vew120 mt-35 mb-30">
							<h4>{{$blog->title}}</h4>
							<p>{!! $blog->description !!}</p>
							
						</div>
						
						
					</div>
					
				</div>
			</div>
		</div>
		
	</div>

@endsection
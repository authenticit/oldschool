@foreach($courses as $course)

	<div class="docname">
		<a href="{{ route('front.course', $course->slug) }}">
			<img src="{{ asset('assets/images/courses/'.$course->photo) }}" alt="">
			<div class="search-content">
				<p>{!! mb_strlen($course->title,'UTF-8') > 66 ? str_replace($slug,'<b>'.$slug.'</b>',mb_substr($course->title,0,66,'UTF-8')).'...' : str_replace($slug,'<b>'.$slug.'</b>',$course->title)  !!} </p>
				<span style="font-size: 14px; font-weight:600; display:block;">{{ $course->price == 0 ? __('Free') : $curr->sign.round(($course->price * $curr->value),2)}}</span>
			</div>
		</a>
	</div> 

@endforeach
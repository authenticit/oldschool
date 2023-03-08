@foreach($items as $item)

@if(isset($item['id']['videoId']))
	<div class="docname">
	<input type="hidden" class="link" value="https://www.youtube.com/watch?v={{ $item['id']['videoId'] }}">
		<img src="{{ $item['snippet']['thumbnails']['default']['url'] }}" alt="">
		<div class="search-content">
			<p>{{ $item['snippet']['title'] }}</p>
		</div>
	</div> 

@endif

@endforeach
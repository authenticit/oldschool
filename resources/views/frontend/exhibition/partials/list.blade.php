<div class="row exhibitor">
	@if($exhibitors->count()>0)
	@foreach($exhibitors as $exhibitor)
	<div class="col-lg-6">
		<div class="card">
			<div class="body">
				<div class="box">
					<div class="image-box frame-item">
						<div class="image">
							<img src="{{ url('uploads/images', $exhibitor->image)}}" class="img-thumbnail">
						</div>
					</div>
					<div class="text-box">
						<small>Artist</small>
						<h4>{{ $exhibitor->name }}</h4>
						<!--<p>{{ $exhibitor->email }}</p>-->
						<!--<p>{{ $exhibitor->phone }}</p>-->
						<p>{{ $exhibitor->date_of_birth }}</p>
						<p>{{ $exhibitor->country['name'] }}</p>
						{{-- <p>{{ $exhibitor->groupName['name']}}</p> --}}
					</div>
				</div>

				<div class="box">


					<div class="text-box">
						<small>Artwork</small>
						<h4>{{ $exhibitor->artwork_name }}</h4>
						<p>Media: {{ $exhibitor->media }}</p>
						<p>Size: {{ $exhibitor->size }}</p>
						<p>Year: {{ $exhibitor->year }}</p>
					</div>

					<div class="image-box frame-item">
						<div class="image">
							<img src="{{ url('uploads/images', $exhibitor->artwork)}}" alt="image">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	@endforeach
	@else
	<div class="col-md-12">
		<h2 class="text-center">No Exhibitor Found!</h2>
	</div>
	@endif

	@if(count($exhibitors)>0)
	<div class="col-lg-12 text-center mt-60">
		{!! $exhibitors->links() !!}
	</div>
	@endif
</div>
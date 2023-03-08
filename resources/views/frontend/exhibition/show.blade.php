@extends('layouts.front')
@section('title')
      {{ $exhibition->title }}
@endsection
@section('class', 'artwork-page')
@section('content')
<div class="exhibition mt-120 mb-120">
	<div class="container">
		<div class="row mb-30 justify-content-center">
			@foreach($groups as $group)
			<div class="col-lg-2 col-mg-4 col-6 mb-30">
				<a class="group_data" href="javascript:void(0)" data-id="{{ $group->id }}" >
					<div class="card">
						<div class="body p-3 text-center">
							<h4>{{ $group->name }}</h4>
							<p>({{ $group->renge }})</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-lg-12 border-bottom mb-80">
				<div class="search-form search-field d-flex justify-content-between">
					<input type="text" name="search" class="form-control searchTerm">
					<button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                              </button>
				</div>
			</div>
			<div class="col-lg-12">
				<div id="exhibitor_data">
					@include('frontend.exhibition.partials.list')
				</div>
				<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	function fetch_data(page, query)
	{
		$.ajax({
			url:"/get/exhibition/fetch-data?page="+page,
			data: {
				exhibition_id: '{{ $exhibition->id}}',
				group: query,
			},
			beforeSend: function(){
				$('#loader').show();
			},
			success:function(data)
			{
				$('#loader').hide();
				$('#exhibitor_data').html('');

				$('#exhibitor_data').html(data);
			}

		});
	}
	$(document).on('click', '.pagination a', function(event){
		event.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);


		var query = $(this).attr('data-id');

		$('li').removeClass('active');
		$(this).parent().addClass('active');
		fetch_data(page, query);
	});
	$(document).on('click', '.group_data', function(){
		$('.group_data').removeClass('active');
		$(this).addClass('active');

		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);
		var query = $(this).attr('data-id');
		fetch_data(page, query);
	});
</script>
@endsection

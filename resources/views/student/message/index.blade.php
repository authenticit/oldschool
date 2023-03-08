@extends('layouts.front')

@section('title')
My Messages
@endsection


@section('styles')


<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- User Dashboard Area Start -->
<section class="user-dashboard">
	<div class="user-dashboard-menu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="heading-title">
						{{__('My Messages')}}
					</h4>
					@include('student.includes.nav')
				</div>
			</div>
		</div>
	</div>
	<div class="user-dashboard-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="purchase-list">
						<div class="table-responsive">

							<table id="myTable" class="table table-bordered">
								<thead>
									<tr>
										<th>{{ __('Name') }}</th>
										<th>{{ __('Message') }}</th>
										<th>{{ __('Send') }}</th>
										<th>{{ __('Options') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($convs as $conv)
									<tr class="conv">
										<input type="hidden" value="{{$conv->id}}">
										<td>{{ Auth::user()->name }}</td>
										<td>{{$conv->subject}}</td>
										<td>{{$conv->created_at->diffForHumans()}}</td>
										<td>
											<a href="{{route('student-message',$conv->id)}}" class="btn btn-primary view"><i class="fa fa-eye"></i></a>
											<a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" data-href="{{route('student-message-delete',$conv->id)}}" class="btn btn-danger remove"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- User Dashboard Area End -->

{{-- MESSAGE MODAL --}}
<div class="message-modal">
	<div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="vendorformLabel">{{ __('Send Message') }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid p-0">
						<div class="row">
							<div class="col-md-12">
								<div class="contact-form">
									<form id="emailreply" method="post">
										{{csrf_field()}}
										<ul>
											<li>
												<input type="text" name="subject" placeholder="{{ __('Subject')}}*" required class="input-field">
											</li>

											<li>
												<textarea class="input-field textarea" name="message" id="msg" placeholder="{{ __('Your Message') }} *" required=""></textarea>
											</li>

											<input type="hidden" name="name" value="{{ Auth::guard('web')->user()->name }}">
											<input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">

										</ul>
										<button class="btn btn-success" id="emlsub" type="submit">{{ __('Send Message') }}</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- MESSAGE MODAL ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header d-block text-center">
				<h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-center">{{ __('You are about to delete this Conversation.') }}</p>
				<p class="text-center">{{ __('Do you want to proceed?') }}</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancle') }}</button>
				<a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
			</div>
		</div>
	</div>
</div>


{{-- DELETE MODAL ENDS --}}

@endsection

@section('scripts')


<script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/front/js/student.js')}}"></script>


<script type="text/javascript">

	$('#myTable').DataTable({
		ordering: false,

	});


	$(function() {
		$(".btn-area").append('<div class="col-sm-12 col-md-4 text-right">'+
			'<a class="btn btn-primary" data-toggle="modal" data-target="#vendorform" href="javascript:;">{{__("Compose Message")}}</a>'+
			'</div>');
	});

	$(document).on("submit", "#emailreply" , function(){
		var token = $(this).find('input[name=_token]').val();
		var subject = $(this).find('input[name=subject]').val();
		var message =  $(this).find('textarea[name=message]').val();
		var email = $(this).find('input[name=email]').val();
		var name = $(this).find('input[name=name]').val();
		var user_id = $(this).find('input[name=user_id]').val();
		$('#eml').prop('disabled', true);
		$('#subj').prop('disabled', true);
		$('#msg').prop('disabled', true);
		$('#emlsub').prop('disabled', true);
		$.ajax({
			type: 'post',
			url: "{{route('student-contact')}}",
			data: {
				'_token': token,
				'subject'   : subject,
				'message'  : message,
				'email'   : email,
				'name'  : name,
				'user_id'   : user_id
			},
			success: function( data) {
				$('#eml').prop('disabled', false);
				$('#subj').prop('disabled', false);
				$('#msg').prop('disabled', false);
				$('#subj').val('');
				$('#msg').val('');
				$('#emlsub').prop('disabled', false);

				if(data == 0)
					toastr.error("{{ __('Email Not Found') }}");
				else
					toastr.success("{{ __('Message Sent Successfully') }}");

				$('.close').click();
			}
		});
		return false;
	});

</script>
@endsection

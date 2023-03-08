@extends('layouts.front')

@section('title')
Referral Program
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
                            {{__('Referral Program')}}
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
                            @if($refer != null)
                            <p class="mb-4">
                                <b>{{ __('Current Discount') }}:</b> {{ $refer->discount }}%
                            </p>
                            @endif
							<div class="table-responsive">

								<table id="myTable" class="table table-bordered">
									<thead>
										<tr>
											<th>{{ __('Title') }}</th>
											<th>{{ __('Times') }}(#)</th>
											<th>{{ __('Discount') }}(%)</th>
										</tr>
									</thead>
									<tbody>
										@foreach($refers as $ref)
										  <tr class="conv">
                                            <td>{{$ref->title}}</td>
                                            <td>{{$ref->times}}</td>
                                            <td>{{$ref->discount}}</td>
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




@endsection

@section('scripts')


<script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>



<script type="text/javascript">

$('#myTable').DataTable({
			   ordering: false,

            });


            $(function() {
            $(".btn-area").append('<div class="col-sm-12 col-md-4 pr-3 text-right">'+
              '<a class="btn btn-primary"  href="{{ route('student-affilate-history') }}">{{__("Referral History")}}</a>'+
            '</div>');
        });



</script>
@endsection

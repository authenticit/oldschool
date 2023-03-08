@extends('layouts.front')

@section('title')
Referral History
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
                            {{__('Referral History')}}
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
											<th>{{ __('User Name') }}</th>
											<th>{{ __('Course') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach($refers as $ref)
										  <tr>
                                            <td>{{$ref->affilate->showName()}}</td>
                                            <td><a href="{{ route("front.course",$ref->course->slug) }}">{{ $ref->course->title }}</a></td>
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




</script>
@endsection

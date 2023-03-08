@extends('layouts.front')

@section('title')
Referral Links
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
                            
							<div class="table-responsive">

								<table id="myTable" class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 80%">{{ __('Link') }}</th>
											<th>{{ __('Action') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach($enrolled_courses as $course)
										  <tr class="conv">
                                            <td>{{$course->title}}</td>
                                            <td>
                                                <a href="javascript:;" data-href="{{ 'https://gainsschool.com/course/'.$course->slug.'?ref='.Auth::user()->affilate_code }}" class="btn btn-primary add-wishlist add-to-affilate"><i class="fas fa-link"></i>{{ __('Copy Affiliate Link') }}</a>
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

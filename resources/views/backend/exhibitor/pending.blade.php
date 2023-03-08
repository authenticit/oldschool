@extends('layouts.admin')
@section('title', $title)
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrants's List</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Registrants's list
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $count = 1; @endphp
									@foreach($exhibitions as $exhibition)
									<tr>
										<td>{!! $count++ !!}</td>
										<td>{!! $exhibition->name !!}</td>

										<td>{!! $exhibition->phone !!}</td>
										<td>{!! $exhibition->email !!}</td>
										<td>
											<!-- approve status -->
											@if($exhibition->status == 0)

											<a href="{{ route('exhibitor.approve', $exhibition->id) }}" class="btn btn-success btn-sm">
												<i class="fa fa-check"></i>
											</a>

											@endif
											<a href="{{ route('exhibitor.single', $exhibition->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>

											<form class="delete" action="{{ route('exhibitor.destroy', $exhibition->id) }}" method="POST">
												<input type="hidden" name="_method" value="DELETE">
												@csrf
												<button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
											</form>




										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
@section('script')
<!-- DataTables JavaScript -->
<script src="{{ asset('back/js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>
<script>
	$(".delete").on("submit", function() {
		return confirm("Are you sure?");
	});
</script>

@endsection
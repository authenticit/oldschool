@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <form action="{{ route('enroll.search') }}" method="POST">
                    @csrf
                    <div class="row clearfix mt-1">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by User Name ...">
                        </div>
                    </div>
                    <button class="btn btn-primary h-20">Search</button>
                    
                </form>
            </div>
        </div>
    </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="exhibition_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Course</th>
                                            <th>User</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($enrolled_courses as $b)
										<tr>
                                            <td>{{ $b->id }}</td>
                                            @if($b->order)
											<td>{{ $b->order->order_number }}</td>
											@else
											<td></td>
											@endif
											<td>{{ $b->course->title }}</td>
											<td>{{ $b->user->name }}</td>
                                            @if ($b->status == 1)
                                                <td><span class="badge badge-secondary">Completed</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Pending</span></td>
                                            @endif
  
											
										</tr>
										@endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            {!! $enrolled_courses->links( ) !!}

        </div>
    </div>

   
@endsection


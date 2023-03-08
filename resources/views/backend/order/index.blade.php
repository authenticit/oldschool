@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <form action="{{ route('order.search') }}" method="POST">
                    @csrf
                    <div class="row clearfix mt-1">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by Order No...">
                        </div>
                    </div>
                    <button class="btn btn-primary h-20">Search</button>
                    
                </form>
            </div>
        </div>
    </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="exhibition_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Order No</th>
                                            <th>User - id</th>
                                            <th>Course - id</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($orders as $b)
										<tr>

											<td>{{ $b->id }}</td>
											<td>{{ $b->order_number }}</td>
											<td>{{ $b->user->name }} - {{$b->user->id }}</td>
											<td>{{ $b->course->title }} - {{ $b->course->id }}</td>
                                            
                                            {{-- @if ($b->status == 'Completed') --}}
                                                <td><span class="badge badge-secondary">{{ $b->status }}</span></td>
                                            {{-- @else
                                                <form action="{{ route('course.approve', $b->id) }}" method="POST">
                                                    @csrf
                                                    <td><button type="submit" class="btn btn-success">Approve</button></td>
                                                </form> --}}
                                            {{-- @endif --}}
                                            
											
											
											
										</tr>
										@endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        {{ $orders->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Dropify -->
    <script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('#image').dropify();
    </script>
@endsection

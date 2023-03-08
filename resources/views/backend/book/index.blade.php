@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->

        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <form action="{{ route('book.search') }}" method="POST">
                    @csrf
                    <div class="row clearfix mt-1">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by Book Name ...">
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
                                            <th width="10%">#</th>
                                            <th style="text-align: left;" width="15%">Book Name</th>
                                            <th width="15%">Category</th>
                                            <th width="15%">Instructor</th>
                                            <th width="15%">Actual Price</th>
                                            <th width="10%">Image</th>
											<th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($books as $b)
										<tr>
											<td>{{ $b->id }}</td>
											<td>{{ $b->name }}</td>
                                            <td>{{ $b->bookCategory->name }}</td>
											<td>{{ $b->user->name }}</td>
                                            <td>{{ $b->actual_price }}</td>
                                            @if ($b->image)
                                                <td><img src="{{ url('uploads/images/book', $b->image) }}" width="60px" height="50px"></td>
                                            @else
                                                <td>No Image</td>
                                            @endif
											<td>
												<a href="{{ route('book.edit', $b->id) }}" class="btn btn-primary btn-sm">Edit</a>
												<form action="{{ route('book.destroy', $b->id) }}" method="POST" style="display: inline-block;">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure delete this book?')">Delete</button>
												</form>
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
    </div>

    
@endsection


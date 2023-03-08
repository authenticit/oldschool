@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->

        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <form action="{{ route('instructor.search') }}" method="POST">
                    @csrf
                    <div class="row clearfix mt-1">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by Instructor Name ...">
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
                                            <th style="text-align: left;" width="20%">Full Name</th>
                                            <th width="15%">Email</th>
                                            <th width="15%">Phone</th>
                                            <th width="15%">Image</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instructors as $s)
                                            <tr>
                                                <td>{{ $s->id }}</td>
                                                <td>{{ $s->name }}</a>
                                                </td>
                                                <td>{{ $s->email }}</td>
                                                <td>{{ $s->phone }}</td>
                                                @if ($s->image)
                                                    <td>
                                                        <img src="{{ url('assets/images/users/', $s->image) }}"
                                                            style="width: 60px" height="50px">
                                                    </td>
                                                @else
                                                    <td>
                                                        <img src="{{ asset('assets/frontend/images/hd_dp.jpg') }}"
                                                            style="width: 60px" height="50px">
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('instructor.edit', $s->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('instructor.delete',$s->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

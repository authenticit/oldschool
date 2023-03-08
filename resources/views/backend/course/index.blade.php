@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->

        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <form action="{{ route('course.search') }}" method="POST">
                    @csrf
                    <div class="row clearfix mt-1">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by Course Title ...">
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

                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Instructor</th>
                                            <th>Photo</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $b)
                                            <tr>

                                                <td>{{ $b->title }}</td>
                                                <td>{{ $b->category->name }}</td>
                                                <td>{{ $b->user->name }}</td>
                                                @if ($b->photo)
                                                    <td><img src="{{ url('assets/images/courses', $b->photo) }}"
                                                            width="60px" height="50px"></td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>&#x9F3;{{ $b->price }}</td>

                                                <td>
                                                    <a href="{{ route('course.edit', $b->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('course.delete', $b->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure delete this course?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        {{ $courses->links() }}
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

@extends('frontend.instructor.instructor_dashboard')
@section('title', $title)
@section('content')
    <div class="container-fluid">
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
                                                    <td><img src="{{ url('assets/images/course', $b->photo) }}"
                                                            width="60px" height="50px"></td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>{{ $b->price }}</td>

                                                <td>
                                                    <a href="{{ route('instructor.edit.course', $b->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        
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

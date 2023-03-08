@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2><strong>Artist</strong> List </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="category_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artists as $artist)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            
                                            <td>
                                            @if ($artist->image)
                                            <img height="70px" src="{{ url('/images/artist/profile', $artist->image ) }}" alt="admin img">
                                            @else
                                            <img  src="{{ asset('assets/frontend/artist/images/avator.png') }}" alt="admin img">
                                            @endif
                                            </td>
                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->email }}</td>
                                            <td>{{ $artist->phone }}</td>
                                            <td>
                                               <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                               </a>
                                            <form action="{{ route('artist.destroy', $artist->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure delete this artist?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
    
@endsection

@section('scripts')
    @include('backend.partials.datatable.js')
    <!-- Dropify -->
    <script src="{{ asset('assets/backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#category_table').DataTable();
        $('#image').dropify();
        $('#title').keyup(function(e) {
            if ($(this).val() != '') {
                $('#title_error').html('');
            }
        });
        $('#image').change(function(e) {
            if ($(this).val() != '') {
                $('#image_error').html('');
            }
        });
        var medium_id;
        $(document).on('click', '.delete', function() {
            medium_id = $(this).attr('id');
            $('#confirm_modal').modal('show');
        });
    </script>
@endsection

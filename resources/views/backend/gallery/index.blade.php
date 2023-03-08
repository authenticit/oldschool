@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('gallery.create') }}" class="btn btn-success btn-icon float-right" style="color: #fff;"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-between">
                    @foreach($galleries as $gallery)
                    <div class="card-body">
                        <a href="javascript:void(0);" class="file">
                            <div class="p-2 hover">
                                    <button onclick="location.href='{{ route('gallery.edit', $gallery->id)}}'"  type="submit" class="btn btn-icon btn-icon-mini btn-round btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button onclick="location.href='{{ route('gallery.destroy', $gallery->id)}}'"  type="submit" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                            </div>
                            <div class="image">
                                <img src="{{ url('upload/images', $gallery->image)}}" alt="img" class="img-fluid">
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">{{ $gallery->title }}</p>
                                <small>Size: 
                                    @php
                                    $file_size = File::size(public_path('upload/images/'. $gallery->image));

                                    $file_size = number_format($file_size / 1048576,2);
                                    @endphp

                                    {{ $file_size }} MB
                                    <span class="date">{{ date('F d, Y', strtotime($gallery->created_at)) }}</span></small>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="confirm_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loader-popup" style="display: none;">
                    <img src="{{ url('assets/backend/images/loader.gif') }}">
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.partials.datatable.js')
    <!-- Bootstrap Tags Input Plugin Js --> 
    <script src="{{ asset('assets/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> 
    <script>
        $('#tag_table').DataTable();
        $('#name').tagsinput({
            allowDuplicates: false,
        });
    </script>
@endsection
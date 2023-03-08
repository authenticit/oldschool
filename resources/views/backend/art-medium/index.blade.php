@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Medium</strong> Create </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('medium.store') }}" method="post">
                        @csrf
                        <div class="form-group form-float">
                            <label>Medium</label>
                            <input type="text" class="form-control" placeholder="Medium" id="name" name="name" title="Please enter medium">
                            @if ($errors->has('name'))
                            <span id="title_error" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label>Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" selected disabled>--select category--</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span id="slug_error" style="color: red">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Save</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Medium</strong> List </h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="category_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="35%">Medium</th>
                                    <th width="35%">Category</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach($mediums as $medium)
                                <tr>
                                    <td>{!! $count++ !!}</td>
                                    <td>{!! $medium->name !!}</td>
                                    <td>{!! $medium->category['name'] !!}</td>
                                    <td>
                                        <a href="{{ route('medium.edit', $medium->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" id="{!! $medium->id !!}" class="delete btn btn-danger waves-effect waves-float btn-xl waves-red"><i
                                                                class="fa fa-trash"></i></button>
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

<div id="confirm_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="loader-popup" style="display: none;">
                <img src="{{ url('backend/images/loader.gif') }}">
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

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#category_table').DataTable();

    $("#name").on('keyup blur', function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });

    $('#name').keyup(function(e) {
        if ($(this).val() != '') {
            $('#title_error').html('');
            $('#slug_error').html('');
        }
    });

    $('#slug').keyup(function(e) {
        if ($(this).val() != '') {
            $('#slug_error').html('');
        }
    });

    var medium_id;

    $(document).on('click', '.delete', function() {
        medium_id = $(this).attr('id');
        $('#confirm_modal').modal('show');
    });

</script>
@endsection
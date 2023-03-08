@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>SEO</strong> Edit </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('seo.update', $seoData->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <label for="title">Google Analytics</label>
                            <!-- if seo has google analytics value then show its value otherwise show input field -->
                            <input type="text" class="form-control" name="google_analytics" value="{{ $seoData->google_analytics }}">
							@if ($errors->has('google_analytics'))
                            <span id="title_error" style="color: red">{{ $errors->first('google_analytics') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-float">
                            <label for="meta_keys">meta_keys</label>
                            <textarea name="meta_keys" class="input-field summernote" placeholder="{{ __('meta_keys') }}" cols="30" rows="10" required>
								{!! $seoData->meta_keys !!}
							</textarea>
                            @if ($errors->has('meta_keys'))
                            <span id="title_error" style="color: red">{{ $errors->first('meta_keys') }}</span>
                            @endif
                        </div>
                        <button type="submit" name="action_button" id="action_button" class="btn btn-primary waves-effect">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
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
<script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#image').dropify();

    $('#exhibition_table').DataTable();

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







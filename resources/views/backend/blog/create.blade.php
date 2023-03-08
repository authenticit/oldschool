@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Blog</strong> Create </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group" id="set-picture">
                            <label>{{ __('Set Feature Image') }} <small class="small-font">({{ __('Maximum size is 2 MB. Image size 322px/421px') }})</small></label>
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="img-upload-1"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input required id="img-upload-1" type="file" class="image-upload" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('image'))
                            <span id="image_error" style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="title">Blog Title</label>
                            <input required type="text" class="form-control" placeholder="Blog Title" id="title" name="title">
                            @if ($errors->has('title'))
                            <span id="title_error" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="blog_category_id">{{ __('Category') }}</label>
                            <select required id="blog_category_id" name="blog_category_id" class="form-control" required>
                                <option disabled selected>{{ __('Select a category') }}</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                                @if ($errors->has('category_id'))
                                <span id="title_error" style="color: red">{{ $errors->first('category_id') }}</span>
                                @endif
                            </select>

                        </div>

            

                        <div class="form-group form-float">
                            <label for="description">Description</label>
                            <textarea name="description" class="input-field summernote" placeholder="{{ __('Description') }}" cols="30" rows="10" required></textarea>
                            @if ($errors->has('description'))
                            <span id="title_error" style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

						<div class="form-group">
                            <label>{{ __('Tags') }}</label>
                            <input type="text" id="tags" class="mytags" name="tags" placeholder="{{ __('Tags') }}" value="">
                            @if ($errors->has('tags'))
                            <span id="title_error" style="color: red">{{ $errors->first('tags') }}</span>
                            @endif
                        </div>

						<div class="form-group form-float">
                            <label for="source">Source</label>
                            <input required type="text" class="form-control" placeholder="Source" id="name" name="source">
                            @if ($errors->has('source'))
                            <span id="title_error" style="color: red">{{ $errors->first('source') }}</span>
                            @endif
                        </div>


                       



                        <p style="text-align: center; margin-top: 20px">---------------SEO---------------</p>
                        <hr>


                        <div class="form-group">
                            <label>{{ __('Meta Keywords') }}</label>
                            <input type="text" id="tags" class="mytags" name="meta_keywords" placeholder="{{ __('Meta Keywords') }}" value="">
                            @if ($errors->has('meta_keywords'))
                            <span id="title_error" style="color: red">{{ $errors->first('meta_keywords') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="input-field summernote" placeholder="{{ __('meta_description') }}" cols="30" rows="10" required></textarea>
                            @if ($errors->has('bio'))
                            <span id="title_error" style="color: red">{{ $errors->first('meta_description') }}</span>
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
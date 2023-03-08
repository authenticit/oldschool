@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Lesson</strong> Create </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group" id="set-picture">
                            <label>{{ __('File') }} <small class="small-font">({{ __('Maximum size is 2 MB. Image size 322px/421px') }})</small></label>
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="img-upload-1"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="img-upload-1" type="file" class="image-upload" name="file" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('file'))
                            <span id="image_error" style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

            

                        <div class="form-group form-float">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" placeholder="Title" id="name" name="title">
                            @if ($errors->has('title'))
                            <span id="title_error" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

						<div class="form-group form-float">
                            <label for="type">{{ __('Type') }}</label>
                            <select id="type" name="type" class="form-control">
                                <option disabled selected>{{ __('Select Course') }}</option>
                               
                                <option value="lesson"> Lesson </option>
                                <option value="quiz"> Quiz </option>
                                   
                                
                                @if ($errors->has('type'))
                                <span id="title_error" style="color: red">{{ $errors->first('course_id') }}</span>
                                @endif
                            </select>

                        </div>

                        <div class="form-group form-float">
                            <label for="section_id">{{ __('Course') }}</label>
                            <select id="section_id" name="course_id" class="form-control">
                                <option disabled selected>{{ __('Select Course') }}</option>
                                @foreach($course as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->title }}
                                </option>
                                @endforeach
                                @if ($errors->has('course_id'))
                                <span id="title_error" style="color: red">{{ $errors->first('section_id') }}</span>
                                @endif
                            </select>

                        </div>


                        <div class="form-group form-float">
                            <label for="section_id">{{ __('Section') }}</label>
                            <select id="section_id" name="section_id" class="form-control">
                                <option disabled selected>{{ __('Select Section') }}</option>
                                @foreach($sections as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->title }}
                                </option>
                                @endforeach
                                @if ($errors->has('section_id'))
                                <span id="title_error" style="color: red">{{ $errors->first('section_id') }}</span>
                                @endif
                            </select>

                        </div>

                        <div class="form-group form-float">
                            <label for="name">Duration</label>
                            <input type="text" class="form-control" placeholder="00:00" id="name" name="duration">
                            @if ($errors->has('duration'))
                            <span id="title_error" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="name">POS</label>
                            <input type="text" class="form-control" placeholder="0" id="name" name="pos">
                            @if ($errors->has('pos'))
                            <span id="title_error" style="color: red">{{ $errors->first('pos') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="name">Iframe Code</label>
                            <input type="text" class="form-control" placeholder="0" id="name" name="iframe_code">
                            @if ($errors->has('iframe_code'))
                            <span id="title_error" style="color: red">{{ $errors->first('iframe_code') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                                <label>Url</label>
                                <input type="text" class="input-field" name="url"
                                                    placeholder="https://www.youtube.com/watch?v=AXrHbrMrun0"
                                                     value="">
                        </div>

                        <div class="form-group form-float">
                                <label>Details</label>
                                <textarea class="input-field" name="details" placeholder="{{ __('Description') }}" cols="30"
                                                    rows="10"></textarea>
                                @if ($errors->has('name'))
                                    <span id="title_error" style="color: red">{{ $errors->first('name') }}</span>
                                @endif
                        </div>

                        <div class="form-group" id="set-picture">
                            <label>{{ __('Video File') }} <small class="small-font">({{ __('Maximum size is 2 MB. Image size 322px/421px') }})</small></label>
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="img-upload-1"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="img-upload-1" type="file" class="image-upload" name="video_file" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('video_file'))
                            <span id="image_error" style="color: red">{{ $errors->first('video_file') }}</span>
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
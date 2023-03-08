@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="form-row clearfix">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="ie: First Plantation" id="title" name="title" title="Please enter Gallery title">
                            @if ($errors->has('title'))
                            <span id="title_error" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-float">
                            <label>Artist</label>
                            <select class="form-control" name="artist_id" id="artist_id">
                                <option value="" selected disabled>--select artist--</option>
                                @foreach($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('artist_id'))
                            <span id="artist_id_error" style="color: red">{{ $errors->first('artist_id') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Size in Inc.</label>
                                    <input type="text" class="form-control" placeholder="ie: 60 x 40 in" id="size_inc" name="size_inc">
                                    @if ($errors->has('size_inc'))
                                    <span id="size_inc_error" style="color: red">{{ $errors->first('size_inc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Size in cm.</label>
                                    <input type="text" class="form-control" placeholder="ie: 119.4 x 302.3 cm" id="size_cm" name="size_cm">
                                    @if ($errors->has('size_cm'))
                                    <span id="size_cm_error" style="color: red">{{ $errors->first('size_cm') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="" selected disabled>--select category--</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                    <span id="category_id_error" style="color: red">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Medium</label>
                                    <select class="form-control" name="medium_id" id="medium_id">
                                        <option value="" selected disabled>nothing to show</option>
                                    </select>
                                    @if ($errors->has('medium_id'))
                                    <span id="medium_id_error" style="color: red">{{ $errors->first('medium_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <?php $years = range(1800, strftime("%Y", time())); ?>
                                    <label for="year">Year<span style="color: red">*</span></label>
                                    <select class="form-control validate[required]" name="year" id="year">
                                        <option value="" selected disabled>--select year--</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('year'))
                                    <span id="art_year_error" style="color: red">{{ $errors->first('year')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label for="copyright">Artwork Rights</label>
                                    <input type="text" name="copyright" id="copyright" class="form-control" value="{{ old('copyright')}}" placeholder="ie: S.M.Sultan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Image</label>
                                    <input type="file" name="image" id="image" data-max-file-size="200K" data-height="300">
                                    <small>Image size must be 780px X 320px</small><br>
                                    @if ($errors->has('image'))
                                    <span id="image_error" style="color: red">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-float">
                                    <label>Short Description</label>
                                    <textarea name="details" id="details"></textarea>
                                    @if ($errors->has('details'))
                                    <span id="details_error" style="color: red">{{ $errors->first('details') }}</span>
                                    @endif
                                    <small class="float-right">  Character :  <span id="details_count">0</span></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="action_button" id="action_button"
                        class="btn btn-primary waves-effect">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Dropify -->
<script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->
<script>
    $('#details').summernote({
        height: 200,
        focus: false,
        callbacks: {
            onKeydown: function(e) {
                var caracteres = $(".note-editable").text();
                var totalCaracteres = caracteres.length;

                $("#details_count").html(totalCaracteres);

            },
            onKeyup: function(e) {
                setTimeout(function(){
                    $("#details_error").html('');
                },200);
            }
        },
        onpaste: function() {
            alert('You have pasted something to the editor');
        }
    });


    $('#category_id').change(function(event) {
        if ($(this).val() != '') {
            $('#category_id_error').html('');
        }
        var category_id = $(this).val();
        $.ajax({
            url: '',
            data:{
                data: category_id,
            },
            type: 'get',
            success:function(data){
                $('#medium_id').html('');
                $('#medium_id').append('<option value="" selected disabled>--select medium--</option>');
                $('#medium_id').append(data.medium);
                //console.log(data.medium);
            }
        })
    });
    
    $('#image').dropify();

    $('#title').keyup(function(e) {
        if ($(this).val() != '') {
            $('#title_error').html('');
        }
    });

    $('#size_inc').keyup(function(e) {
        if ($(this).val() != '') {
            $('#size_inc_error').html('');
        }
    });

    $('#size_cm').keyup(function(e) {
        if ($(this).val() != '') {
            $('#size_cm_error').html('');
        }
    });

    $('#medium_id').change(function(e) {
        if ($(this).val() != '') {
            $('#medium_id_error').html('');
        }
    });

    $('#year').change(function(e) {
        if ($(this).val() != '') {
            $('#art_year_error').html('');
        }
    });

    $("#image").on('change', function() {
        if ($(this).val() != '') {
            $('#image_error').html('');
        }
    });

    

</script>
@endsection
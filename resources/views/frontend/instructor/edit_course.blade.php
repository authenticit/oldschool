@extends('frontend.instructor.instructor_dashboard')
@section('title', $title)
@section('content')

    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Course') }} <a class="btn btn-primary btn-rounded btn-sm"
                    href="{{ route('course.index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">{{ __('Manage Courses') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.edit', $course->id) }}">{{ __('Edit Course') }}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Course Form') }}</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('instructor.update.course', $course->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate>
                        @include('includes.admin.form-both')
                        @csrf
                        @method('PUT')
                        <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                            <div id="tabs">

                                <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link bsc active" data-toggle="pill"
                                            href="#basic">{{ __('Basic') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link req" data-toggle="pill"
                                            href="#req">{{ __('Requirements') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link out" data-toggle="pill" href="#out">{{ __('Outcomes') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link include" data-toggle="pill"
                                            href="#include">{{ __('Includes') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link prc" data-toggle="pill" href="#pric">{{ __('Pricing') }}</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link med" data-toggle="pill" href="#media">{{ __('Media') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link seo" data-toggle="pill" href="#seo">{{ __('Seo') }}</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="basic" class="container tab-pane active"><br>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Language') }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <select name="language_id" class="input-field" required>
                                                    @foreach (DB::table('languages')->where('register_id', 0)->get() as $language)
                                                        <option value="{{ $language->id }}">{{ $language->language }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Course Title') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="title"
                                                    placeholder="{{ __('Course Title') }}" required=""
                                                    value="{{ $course->title }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Slug') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="slug"
                                                    placeholder="{{ __('Course Slug') }}" required=""
                                                    value="{{ $course->slug }}">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Category') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <select id="cat" name="category_id" class="input-field" required>
                                                    <option value="">{{ __('Select a category') }}</option>
                                                    @foreach (DB::table('categories')->get() as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ $course->category_id == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Time (Total Hour)') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="time"
                                                    placeholder="{{ __('Total Hour') }}" required=""
                                                    value="{{ $course->time }}">
                                            </div>
                                        </div>

                                       


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Level') }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <select name="level" class="input-field" required>
                                                    <option value="Beginner"
                                                        {{ $course->level == 'Beginner' ? 'selected' : '' }}>
                                                        {{ __('Beginner') }}</option>
                                                    <option value="Intermediate"
                                                        {{ $course->category_id == 'Intermediate' ? 'selected' : '' }}>
                                                        {{ __('Intermediate') }}</option>
                                                    <option
                                                        value="Advanced"{{ $course->category_id == 'Advanced' ? 'selected' : '' }}>
                                                        {{ __('Advanced') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Short Description') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea name="short_description" class="input-field" placeholder="{{ __('Short Description') }}" cols="30"
                                                    rows="5" required>{{ $course->short_description }}</textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Description') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea name="description" class="input-field summernote" placeholder="{{ __('Description') }}" cols="30"
                                                    rows="10" required>{{ $course->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-3 is_top">
                                            <div class="col-lg-3">
                                                <div class="left-area">

                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <input type="checkbox" name="is_top" class="form-check-input"
                                                        value="1" id="is_top"
                                                        {{ $course->is_top == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="is_top">{{ __('Check if this course is top course') }}</label>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".req"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div id="req" class="container tab-pane"><br>


                                        <div class="row">

                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Requirements') }} *</h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div id="requirement_area">

                                                   
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 pr-3">
                                                                <div class="form-group mb-1">
                                                                    <input type="text" class="input-field"
                                                                        name="requirements[]"
                                                                        placeholder="{{ __('Provide requirements') }}"
                                                                        value="{{ $course->requirements }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                @if ($course->first)
                                                                    <button type="button"
                                                                        class="btn btn-success btn-sm add-req"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-out"> <i
                                                                            class="fa fa-minus"></i> </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                   

                                                </div>
                                            </div>

                                        </div>

                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".bsc"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".out"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div id="out" class="container tab-pane"><br>

                                        <div class="row">

                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Outcomes') }} *</h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div id="outcomes_area">

                                                    
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 pr-3">
                                                                <div class="form-group mb-1">
                                                                    <input type="text" class="input-field"
                                                                        name="outcomes[]"
                                                                        placeholder="{{ __('Provide Outcomes') }}"
                                                                        value="{{ $course->outcomes }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                @if ($course->first)
                                                                    <button type="button"
                                                                        class="btn btn-success btn-sm add-out"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-out"> <i
                                                                            class="fa fa-minus"></i> </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                   

                                                </div>
                                            </div>

                                        </div>

                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".req"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".prc"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div id="include" class="container tab-pane"><br>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Includes') }} *</h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div id="include_area">

                                                    
                                                        <div class="d-flex">
                                                            <div class="">
                                                                <div class="form-group mr-4">
                                                                    <button class="btn btn-primary icon-picker"
                                                                        name="include_icon[]"
                                                                        data-icon="{{ $course->include_icon }}"
                                                                        id="icon-picker"></button>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 pr-3">
                                                                <div class="form-group mb-1">
                                                                    <input type="text" class="input-field"
                                                                        name="include_text[]"
                                                                        placeholder="{{ __('Include Text') }}"
                                                                        value="{{ $course->include_text }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                @if ($course->first)
                                                                    <button type="button"
                                                                        class="btn btn-success btn-sm add-include"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-include"> <i
                                                                            class="fa fa-minus"></i> </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                   
                                                </div>
                                            </div>

                                        </div>

                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".req"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".prc"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div id="pric" class="container tab-pane"><br>

                                        <div class="row mb-3 is_free">
                                            <div class="col-lg-3">
                                                <div class="left-area">

                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <input type="checkbox" name="is_free" class="form-check-input"
                                                        id="is_free" value="1"
                                                        {{ $course->is_free == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="is_free">{{ __('Check if this course is free course') }}</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row f-course {{ $course->is_free == 1 ? 'd-none' : '' }}">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Course price') }} 
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="number" class="input-field f-course-field" name="price"
                                                    placeholder="{{ __('Course price') }}" value="{{ $course->price }}"
                                                    step="0.1" autocomplete="off"
                                                    {{ $course->is_free == 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        

                                        <div class="row f-course {{ $course->is_free == 1 ? 'd-none' : '' }}">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Discount price') }} 
                                                    </h4>
                                                    <p class="sub-heading">
                                                        {{ __("Set 0 if you don't want to adddiscount price") }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="number" class="input-field f-course-field"
                                                    name="discount_price" placeholder="{{ __('Discount price') }}"
                                                    value="{{ $course->discount_price }}" step="0.1"
                                                    autocomplete="off" {{ $course->is_free == 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="row f-course {{ $course->is_free == 1 ? 'd-none' : '' }}">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Instructor Percentage') }} (%)</h4>
                                                    <p class="sub-heading">
                                                        {{ __("Set 0 if you don't want to add percentage") }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="number" class="input-field f-course-field"
                                                    name="percentage" placeholder="{{ __('Instructor Percentage') }}"
                                                    value="{{ $course->percentage }}" step="0.1" autocomplete="off">
                                            </div>
                                        </div>


                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".out"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".med"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    


                                    <div id="media" class="container tab-pane"><br>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Course Overview Type') }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <select name="course_overview_type" class="input-field" required>
                                                    <option value="Youtube"
                                                        {{ $course->course_overview_type == 'Youtube' ? 'selected' : '' }}>
                                                        {{ __('Youtube') }}</option>
                                                    <option value="Vimeo"
                                                        {{ $course->course_overview_type == 'Vimeo' ? 'selected' : '' }}>
                                                        {{ __('Vimeo') }}</option>
                                                    <option value="Html5"
                                                        {{ $course->course_overview_type == 'Html5' ? 'selected' : '' }}>
                                                        {{ __('Html5') }}</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Course Overview Url') }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="course_overview_url"
                                                    placeholder="https://www.youtube.com/watch?v=AXrHbrMrun0"
                                                    required="" value="{{ $course->course_overview_url }}">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Course Thumbnail') }}</h4>
                                                    <p class="sub-heading">({{ 'Preferred Size 800 x 450' }})</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="wrapper-image-preview">
                                                    <div class="box">
                                                        <div class="back-preview-image"
                                                            style="background-image: url({{ $course->image ? asset('assets/images/courses/' . $course->image) : asset('assets/images/placeholder.jpg') }});">
                                                        </div>
                                                        <div class="upload-options">
                                                            <label class="img-upload-label" for="img-upload"> <i
                                                                    class="fas fa-camera"></i> {{ __('Upload Picture') }}
                                                            </label>
                                                            <input id="img-upload" type="file" class="image-upload"
                                                                name="photo" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".prc"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".seo"
                                                    class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div id="seo" class="container tab-pane"><br>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Meta Keywords') }}</h4>
                                                    <p class="sub-heading">{{ __('Seperated By Comma(,)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" id="tags" class="mytags" name="meta_keywords"
                                                    placeholder="{{ __('Meta Keywords') }}"
                                                    value="{{ $course->meta_keywords }}">
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Meta Description') }}</h4>

                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea class="input-field" name="meta_description" placeholder="{{ __('Meta Description') }}" cols="30"
                                                    rows="10">{{ $course->meta_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-3">
                                            <button type="submit" id="submit-btn"
                                                class="btn btn-primary text-center">{{ __('Submit') }}</button>
                                        </div>

                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".med"
                                                    class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                            </li>
                                        </ul>


                                    </div>

                                </div>

                            </div>

                        </div>

                </div>

                </form>
            </div>
        </div>

        <!-- Form Sizing -->

        <!-- Horizontal Form -->

    </div>

    </div>
    <!--Row-->

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            $('.add-req').on('click', function() {

                $('#requirement_area').append('' +
                    '<div class="d-flex">' +
                    '<div class="flex-grow-1 pr-3">' +
                    '<div class="form-group mb-1">' +
                    '<input type="text" class="input-field" name="requirements[]" placeholder="{{ __('Provide requirements') }}" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="">' +
                    '<button type="button" class="btn btn-danger btn-sm remove-req"> <i class="fa fa-minus"></i> </button>' +
                    '</div>' +
                    '</div>'
                );

            });


            $(document).on('click', '.remove-req', function() {

                $(this).parent().parent().remove();

            });


            $('.add-out').on('click', function() {

                $('#outcomes_area').append('' +
                    '<div class="d-flex">' +
                    '<div class="flex-grow-1 pr-3">' +
                    '<div class="form-group mb-1">' +
                    '<input type="text" class="input-field" name="outcomes[]" placeholder="{{ __('Provide outcomes') }}" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="">' +
                    '<button type="button" class="btn btn-danger btn-sm remove-out"> <i class="fa fa-minus"></i> </button>' +
                    '</div>' +
                    '</div>'
                );

            });


            $(document).on('click', '.remove-out', function() {

                $(this).parent().parent().remove();

            });

            $('.add-include').on('click', function() {

                $('#include_area').append('' +
                    '<div class="d-flex">' +
                    '<div class="">' +
                    '<div class="form-group mr-4">' +
                    '<button class="btn btn-primary icon-picker" name="include_icon[]" data-icon="fab fa-font-awesome"></button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="flex-grow-1 pr-3">' +
                    '<div class="form-group mb-1">' +
                    '<input type="text" class="input-field" name="include_text[]" placeholder="{{ __('Include Text') }}" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="">' +
                    '<button type="button" class="btn btn-danger btn-sm remove-include"> <i class="fa fa-minus"></i> </button>' +
                    '</div>' +
                    '</div>'
                );

                $('.icon-picker').iconpicker();



            });


            $(document).on('click', '.remove-include', function() {

                $(this).parent().parent().remove();

            });


            $("#is_free").change(function() {
                if (this.checked) {
                    $('.f-course').addClass('d-none');
                    $('.f-course-field').prop('disabled', true);
                } else {
                    $('.f-course').removeClass('d-none');
                    $('.f-course-field').prop('disabled', false);
                }
            });

            // Display Subcategories
            $(document).on('change', '#cat', function() {
                var link = $(this).find(':selected').attr('data-href');
                if (link != "") {
                    $('#subcat').load(link);
                    $('#subcat').prop('disabled', false);
                }

            });
            // Display Subcategories Ends


        });


        $('.icon-picker').iconpicker({

        });
    </script>

@endsection

@extends('layouts.admin')
@section('title', $title)
@section('content')

    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Instructor') }} <a class="btn btn-primary btn-rounded btn-sm"
                    href="{{ route('instructor.index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('instructor.index') }}">{{ __('Manage Instructors') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('instructor.edit', $instructor->id) }}">{{ __('Edit Instructor') }}</a></li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Instructor Form') }}</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('instructor.update', $instructor->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate>
                        @include('includes.admin.form-both')
                        @csrf
                        @method('PUT')
                        <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                            <div id="tabs">
                                <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link bsc active" data-toggle="pill"
                                            href="#basic">{{ __('Basic Information') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link req" data-toggle="pill"
                                            href="#req">{{ __('Login credentials') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link out" data-toggle="pill"
                                            href="#out">{{ __('Social information') }}</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="basic" class="container tab-pane active"><br>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Full Name') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="name"
                                                    placeholder="{{ __('Full Name') }}" required=""
                                                    value="{{ $instructor->name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Instructor Name') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="instructor_name"
                                                    placeholder="{{ __('Instructor Name') }}" required=""
                                                    value="{{ $instructor->instructor_name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Address') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="address"
                                                    placeholder="{{ __('Address') }}" required=""
                                                    value="{{ $instructor->address }}">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Phone') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="phone"
                                                    placeholder="{{ __('Phone') }}" required=""
                                                    value="{{ $instructor->phone }}">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Biography') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea name="bio" class="input-field summernote" placeholder="{{ __('Biography') }}" cols="30"
                                                    rows="10" required>{{ $instructor->bio }}</textarea>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('User image') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">

                                                <div class="form-group">
                                                    <label><small
                                                            class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
                                                    <div class="wrapper-image-preview">
                                                        <div class="box">
                                                            <div class="back-preview-image"
                                                                style="background-image: url({{ $instructor->image ? asset('assets/images/users/' . $instructor->image) : asset('assets/images/placeholder.jpg') }});">
                                                            </div>
                                                            <div class="upload-options">
                                                                <label class="img-upload-label" for="img-upload"> <i
                                                                        class="fas fa-camera"></i>
                                                                    {{ __('Upload Picture') }} </label>
                                                                <input id="img-upload" type="file"
                                                                    class="image-upload" name="photo" accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <h4 class="heading">{{ __('Email') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="email"
                                                    placeholder="{{ __('Email') }}" required=""
                                                    value="{{ $instructor->email }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Password') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="password" class="input-field" name="password"
                                                    placeholder="{{ __('Password') }}" value="">
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
                                                    <h4 class="heading">{{ __('Facebook') }} </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="facebook_url"
                                                    placeholder="{{ __('Facebook') }}"
                                                    value="{{ $instructor->facebook }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Twitter') }} </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="twitter_url"
                                                    placeholder="{{ __('Twitter') }}"
                                                    value="{{ $instructor->twitter }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Linkedin') }} </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="linkedin_url"
                                                    placeholder="{{ __('Linkedin') }}"
                                                    value="{{ $instructor->linkedin }}">
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-3">
                                            <button type="submit" id="submit-btn"
                                                class="btn btn-primary text-center">{{ __('Submit') }}</button>
                                        </div>

                                        <ul class="list-inline mt-3 mb-0  text-center">
                                            <li class="list-inline-item">
                                                <a href="javascript:;" data-href=".req"
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
    </div>
</div>
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


            $("#is_free").change(function() {
                if (this.checked) {
                    $('.f-course').addClass('d-none');
                    $('.f-course-field').prop('disabled', true);
                } else {
                    $('.f-course').removeClass('d-none');
                    $('.f-course-field').prop('disabled', false);
                }
            });

        });
    </script>
@endsection

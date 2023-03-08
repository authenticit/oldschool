@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Hero Section') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Home Page Setting') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('page-setting.hero-section') }}">{{ __('Hero Section') }}</a></li>
    </ol>
    </div>
</div>
<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Hero Section') }}</h6>
      </div>

      <div class="card-body">
        <form action="{{ route('page-setting.update') }}" method="POST" enctype="multipart/form-data">
            @include('includes.admin.form-both')
            @csrf
            <div class="form-group">
                <label>{{ __('Set Background Image') }} <small class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
                <div class="wrapper-image-preview">
                    <div class="box full-width">
                        <div class="back-preview-image" style="background-image: url({{ $ps->hero_bg ? asset('assets/images/'.$ps->hero_bg) : asset('assets/images/placeholder.jpg') }});"></div>
                        <div class="upload-options">
                            <label class="img-upload-label full-width" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                            <input id="img-upload" type="file" class="image-upload" name="hero_bg" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="title">{{ __('Hero Section Title') }} *</label>
              <input type="text" class="form-control" id="title" name="hero_title"  placeholder="{{ __('Hero Section Title') }}" value="{{ $ps->hero_title }}" required>
          </div>
          <div class="form-group">
            <label for="text">{{ __('Hero Section Text') }} *</label>
            <input type="text" class="form-control" id="text" name="hero_text"  placeholder="{{ __('Hero Section Text') }}" value="{{ $ps->hero_text }}" required>
          </div>
            <div class="form-group">
              <label for="btn">{{ __('Hero Section Button Text') }} *</label>
              <input type="text" class="form-control" id="btn" name="hero_btn_text"  placeholder="{{ __('Newsletter Title') }}" value="{{ $ps->hero_btn_text }}" required>
          </div>
          <div class="form-group">
            <label for="link">{{ __('Hero Section Button Url') }} *</label>
            <input type="text" class="form-control" id="link" name="hero_btn_url"  placeholder="{{ __('Hero Section Button Url') }}" value="{{ $ps->hero_btn_url }}" required>
          </div>
            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

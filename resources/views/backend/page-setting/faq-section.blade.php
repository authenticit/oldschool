@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Faq Section') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Home Page Setting') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('page-setting.faq-section') }}">{{ __('FAQ Section') }}</a></li>
    </ol>
    </div>
</div>
<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Faq Section Form') }}</h6>
      </div>

      <div class="card-body">
        <form action="{{ route('page-setting.update') }}" method="POST" enctype="multipart/form-data">
            @include('includes.admin.form-both')
            @csrf
            <div class="form-group" id="set-picture">
                <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
                <div class="wrapper-image-preview">
                    <div class="box">
                        <div class="back-preview-image" style="background-image: url({{ $ps->faq_image ? asset('assets/images/'.$ps->faq_image) : asset('assets/images/placeholder.jpg') }});"></div>
                        <div class="upload-options">
                            <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                            <input id="img-upload" type="file" class="image-upload" name="faq_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="link">{{ __('Faq Video Link') }} *</label>
                <input type="text" class="form-control" id="link" name="faq_link"  placeholder="{{ __('Faq Video Link') }}" value="{{ $ps->faq_link }}" required>
            </div>
            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

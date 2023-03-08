@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Contact Us') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Menu Page Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('page-setting.contact') }}">{{ __('Contact Us Page') }}</a></li>
    </ol>
    </div>
</div>
<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Contact Us') }}</h6>
      </div>

      <div class="card-body">
        <form action="{{ route('page-setting.update') }}" method="POST" enctype="multipart/form-data">
            @include('includes.admin.form-both')
            @csrf
            <div class="form-group">
              <label for="inp-title">{{  __('Contact Page')  }} </label>
              <div class="frm-btn btn-group mb-1">
                  <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-{{ $gs->is_contact == 1 ? 'success' : 'danger' }}" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ $gs->is_contact == 1 ? __('Activated') : __('Deactivated')}}
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="{{ __('Activated') }}" data-href="{{ route('general-setting.status',['is_contact',1]) }}">{{ __('Activate') }}</a>
                    <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="{{ __('Deactivated') }}" data-href="{{ route('general-setting.status',['is_contact',0]) }}">{{ __('Deactivate') }}</a>
                  </div>
                </div>
          </div>
        <div class="form-group">
            <label for="contact_email">{{ __('Contact Us Email Address') }} *</label>
            <input type="text" class="form-control" id="contact_email" name="contact_email"  placeholder="{{ __('Contact Us Email Address') }}" value="{{ $setting->contact_email }}" required>
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }} *</label>
            <input type="text" class="form-control" id="email" value="{{$setting->email}}" name="email"  placeholder="{{ __('Email') }}" required>
        </div>
        <div class="form-group">
            <label for="site">{{ __('Website') }} *</label>
            <input type="text" class="form-control" id="site" value="{{$setting->site}}" name="site"  placeholder="{{ __('Website') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Phone') }} *</label>
            <input type="text" class="form-control" id="phone" value="{{$setting->phone}}" name="phone"  placeholder="{{ __('Phone') }}" required>
        </div>
        <div class="form-group">
            <label for="fax">{{ __('Fax') }} </label>
            <input type="text" class="form-control" id="fax" value="{{$setting->fax}}" name="fax"  placeholder="{{ __('Fax') }}" >
        </div>

          <div class="form-group">
              <label for="street">{{ __('Street Address') }} *</label>
              <textarea class="form-control nic-edit"  id="street" name="street" required rows="3" placeholder="{{__('Street Address')}}">{{ $setting->street }}</textarea>
          </div>
            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

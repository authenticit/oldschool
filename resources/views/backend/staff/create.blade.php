@extends('layouts.admin')
@section('title', $title)
@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Staff') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('staff.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">{{ __('Manage Staff') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('staff.create') }}">{{ __('Add New Staff') }}</a></li>
        </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Staff Form') }}</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
            @include('includes.admin.form-both')
            @csrf
            <div class="form-group" id="set-picture">
                <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
                <div class="wrapper-image-preview">
                    <div class="box">
                        <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                        <div class="upload-options">
                            <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                            <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inp-name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}">
            </div>
            <div class="form-group">
                <label for="inp-name">{{ __('Username') }}</label>
                <input type="text" class="form-control" id="inp-name" name="username"  placeholder="{{ __('Enter Username') }}">
            </div>

            <div class="form-group">
                <label for="inp-name">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="inp-slug" name="slug"  placeholder="{{ __('Enter Slug') }}">
            </div>

            <div class="form-group">
                <label for="inp-email">{{ __('Email') }}</label>
                <input type="text" class="form-control" id="inp-email" name="email"  placeholder="{{ __('Enter Email') }}">
            </div>

            <div class="form-group">
                <label for="inp-phone">{{ __('Phone') }}</label>
                <input type="text" class="form-control" id="inp-phone" name="phone"  placeholder="{{ __('Enter Phone') }}">
            </div>

            <div class="form-group">
                <label for="inp-pass">{{ __('Password') }}</label>
                <input type="password" class="form-control" id="inp-pass" name="password"  placeholder="{{ __('Enter Password') }}">
            </div>

            <div class="form-group">
                <label for="details">{{ __('Biography ') }}</label>
                <textarea class="form-control summernote"  id="biography" name="biography" required rows="3" placeholder="{{__('Biography')}}"></textarea>
            </div>

            <div class="form-group">
                <label for="details">{{ __('Address ') }}</label>
                <textarea class="form-control"  id="address" name="address" required rows="3" placeholder="{{__('Address')}}"></textarea>
            </div>


            <div class="form-group">
                <label for="inp-name">{{ __('Select Role') }}</label>
                <select class="form-control mb-3" name="role_id">
                  <option value="">{{ __('Select Role') }}</option>
                  @foreach(DB::table('roles')->get() as $data)
                  <option value="{{ $data->id }}">{{ $data->name }}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
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

    });

</script>

@endsection

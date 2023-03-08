@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Page') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin-page-index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Menu Page Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin-page-index')}}">{{ __('Other Pages') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('page.edit',$setting->id)}}">{{ __('Edit Page') }}</a></li>
    </ol>
    </div>
</div>
<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Page Form') }}</h6>
      </div>
      <div class="card-body">
        <form action="{{route('page-update', $setting->id)}}" method="POST" enctype="multipart/form-data">
            @include('includes.admin.form-both')
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$setting->title}}"  placeholder="{{ __('Title') }}" value="" required>
            </div>

            <div class="form-group">
                <label for="inp-slug">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="inp-slug" value="{{$setting->slug}}" name="slug"  placeholder="{{ __('Enter Slug') }}" value="" required>
            </div>

            <div class="form-group">
              <label for="details">{{ __('Description') }}</label>
              <textarea class="form-control summernote"  id="details" name="details" required rows="3" placeholder="{{__('Description')}}">{{$setting->details}}</textarea>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="secheck" class="custom-control-input" {{ $setting->meta_tag != null || $setting->meta_description != null ? 'checked' : '' }} id="seo">
              <label class="custom-control-label" for="seo"> {{__('Allow Page SEO')}}</label>
            </div>
          </div>

          <div class="showbox d-none">
            <div class="form-group">
              <label for="meta_tag">{{ __('Meta Tags') }}</label>
              <input type="text" class="form-control" id="meta_tag" name="meta_tag" value="{{$setting->meta_tag}}" placeholder="{{ __('Meta Tags') }}">
            </div>

            <div class="form-group">
              <label for="meta_description">{{ __('Meta Description') }}</label>
              <textarea class="form-control"  id="meta_description" name="meta_description" rows="3"  placeholder="{{__('Meta Description')}}">{{$setting->meta_description}}</textarea>
          </div>
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

 $('#meta_tag').tagify();

 $(document).on('click','#seo',function(){
            if($(this).is(':checked')){
              $('.showbox').removeClass('d-none');
            }else{
              $('.showbox').addClass('d-none');
            }
  });


  $(document).ready(function(){
        if($('#seo').is(':checked')){
           $('.showbox').removeClass('d-none');
            }else{
                $('.showbox').addClass('d-none');
            }
    });


</script>
@endsection

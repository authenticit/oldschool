@extends('layouts.front')

@section('title', 'Verify')

@section('content')

<!--Main Breadcrumb Area Start -->
<div class="main-breadcrumb-area" style="background-image: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="pages">
          <li>
            <a href="{{route('front.index')}}">
              {{__('Home')}}
            </a>
          </li>
          <li class="active">
            <a href="{{route('student-forgot')}}">
              {{__('Verify')}}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Main Breadcrumb Area End -->




<!-- Login Area Start -->
<section class="new-login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="new-login-box">

          <div class="right-content">
            <ul class="nav" id="pills-tab" role="tablist">
              <li class="nav-item login">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false"><i class="fas fa-lock"></i>{{__('Vefiry Phone Number')}}</a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="login-area">
                  <div class="login-form signin-form">
                    @include('includes.admin.form-login')
                    <form id="verifyForm" action="{{ route('studentpass.verify.submit') }}"  method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="phone" value="{{ $student->phone }}">
                      <div class="form-input">
                        <input type="text" name="code" placeholder="{{__('Enter Verify Code')}}" value="" required="">
                        <i class="fas fa-check"></i>
                      </div>




                      <button type="submit" class="submit-btn">{{ __('Verify') }}</button>

                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Login Area End -->

@endsection


@section('scripts')
<script>
  $("#verifyForm").on('submit', function (e) {
    var $this = $(this).parent();
    e.preventDefault();
    $this.find('button.submit-btn').prop('disabled', true);
    $this.find('.alert-info').show();
    $this.find('.alert-info p').html(langg.processing);
    $.ajax({
      method: "POST",
      url: $(this).prop('action'),
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {

        if (data.status == 1) {
          window.location = data.route;
        } else {

          if ((data.errors)) {
            $this.find('.alert-success').hide();
            $this.find('.alert-info').hide();
            $this.find('.alert-danger').show();
            $this.find('.alert-danger ul').html('');
            for (var error in data.errors) {
              $this.find('.alert-danger p').html(data.errors[error]);
            }
            $this.find('button.submit-btn').prop('disabled', false);
          } else {
            $this.find('.alert-info').hide();
            $this.find('.alert-danger').hide();
            $this.find('.alert-success').show();
            $this.find('.alert-success p').html(data);
            $this.find('button.submit-btn').prop('disabled', false);
          }

        }
        $('.refresh_code').click();

      }

    });

  });
</script>
@endsection
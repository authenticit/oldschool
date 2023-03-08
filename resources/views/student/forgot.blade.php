@extends('layouts.front')

@section('title', 'Reset Password')

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
              {{__('Forgot Password?')}}
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
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false"><i class="fas fa-lock"></i>{{__('FORGOT PASSWORD')}}</a>
                </li>

              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="login-area">
                    <div class="login-form signin-form">
                      @include('includes.admin.form-login')
                      <form id="forgotform" action="{{ route('student-forgot-submit') }}"  method="POST">
                        {{ csrf_field() }}
                        <div class="form-input">
                          <input type="text" name="phone" placeholder="{{__('Type Phone Number')}}" value="" required="">
                          <i class="fas fa-phone"></i>
                        </div>

                        <div class="form-forgot-pass text-center">

                            <div class="right">
                              <a href="{{route('student.login')}}">
                              <i class="fas fa-user"></i>	{{__('Remember Password? Login')}}
                              </a>
                            </div>
                          </div>


                        <button type="submit" class="submit-btn">{{ __('Submit') }}</button>

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

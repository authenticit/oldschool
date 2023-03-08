@extends('layouts.front')

@section('title')
Reset Password
@endsection

@section('content')
    <!-- User Dashboard Area Start -->
<section class="user-dashboard">
    <div class="user-dashboard-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading-title">
                        {{__('Reset Password')}}
                    </h4>
                    @include('student.includes.nav')
                </div>
            </div>
        </div>
    </div>


    <div class="user-dashboard-content-area">
       <div class="user-profile-area">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-12 col-md-12">
                    <main>
                        <header>
                            <h4 class="title">{{__('Reset Password')}}</h4>
                        </header>
                        <div class="content">
                        <form action="{{route('student-account-update')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label>{{__('Password')}} :</label>
                                <input type="password" class="form-control" name="cpass" required  placeholder="{{__('Enter Curent Password')}}">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" name="newpass" required  placeholder="{{__('Enter New Password')}}">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" name="renewpass" required  placeholder="{{__('Re-type your Password')}}">
                              </div>

                                
                             
                                <button class="btn btn-success" type="submit">{{__('Update')}}</button>
                              </form>
                        </div>
                    </main>
                </div>
            </div>
        </div>
       </div>
    </div>
</section>
<!-- User Dashboard Area End -->

@endsection


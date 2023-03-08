@extends('layouts.front')

@section('title')
Profile
@endsection

@section('content')

<!-- User Dashboard Area Start -->
<section class="user-dashboard">
    <div class="user-dashboard-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading-title">
                        {{__('Profile')}}
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
                                <h4 class="title">{{__('Profile')}}</h4>
                            </header>
                            <div class="content">

                                <form id="userform"  action="{{route('student-profile-update')}}" method="POST">

                                    <div class="gocover"
                                    style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                </div>

                                @csrf
                                @include('includes.admin.form-both')
                                <div class="image text-center" >
                                    <img id="showimage" src="{{$student->photo ? url('assets/images/users/'.$student->photo) : $student->getUrlfriendlyAvatar($size=400)}}" alt="">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Full Name')}} * :</label>
                                    <input type="text" class="form-control" required name="name" value="{{$student->name}}"  placeholder="{{__('Full Name')}}">
                                </div>

                                <div class="form-group mb-4">
                                    <label>{{__('Phone')}} * :</label>
                                    <input type="text" class="form-control" required name="phone" value="{{ $student->phone }}">
                                </div>


                                <div class="form-group">
                                    <label>{{__('Profile Photo')}} :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo" id="image">
                                        <label class="custom-file-label" for="image">{{__('Choose Photo')}}</label>
                                    </div>
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

@extends('layouts.front')
@section('title', $title)
@section('content')

    <div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <iframe src="https://www.youtube.com/embed/Ohe_JzKksvA"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="_216b01">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="section3125 rpt145">
                        <div class="row">
                            <div class="col-lg-7">
                                <a href="#" class="_216b22">
                                    <span><i class="uil uil-cog"></i></span>Setting
                                </a>
                                <div class="dp_dt150">
                                    <div class="img148">
                                        @if ($user->image)
                                            <img src="{{ url('images/student/profile', $user->image) }}" alt="">
                                        @else
                                            <img src="{{ asset('assets/images/profile.png') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="prfledt1">
                                        @if (Auth::check())
                                            <h2>{{ $user->name }}</h2>
                                            <p>{{ $user->phone }}</p>
                                        @else
                                            <h2>{{ __('Guest') }}</h2>
                                        @endif
                                        <span>{{ $user->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="rgt-145">
                                    <ul class="tutor_social_links">
                                        <li><a href="{{ $user->facebook_url }}" class="fb"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $user->twitter_url }}" class="tw"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $user->linkedin_url }}" class="ln"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <ul class="_bty149">
                                    <a href="{{ route('student-edit-profile') }}">
                                        <li><button class="msg125 btn500">
                                                Edit
                                            </button></li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="_215b15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-course-tab" data-toggle="tab" href="#nav-course"
                                    role="tab" aria-selected="true">Course</a>
                                <a class="nav-item nav-link" id="nav-purchased-tab" data-toggle="tab" href="#nav-history"
                                    role="tab" aria-selected="false">Purchased History</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b17">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fadeshow active" id="nav-course" role="tabpanel">
                                <div class="crse_content">
                                    <h3>My courses ({{ count($enrolled_courses) }})</h3>
                                    <div class="_14d25">
                                        <div class="row">

                                            @foreach ($enrolled_courses as $course)
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="fcrse_1 mt-30">
                                                        <a href="#" class="fcrse_img">
                                                            <img src="{{ url('assets/images/courses/', $course->photo) }}"
                                                                alt="">

                                                        </a>
                                                        <div class="fcrse_content">


                                                            <a href="#" class="crse14s">
                                                                {{ $course->showTitle() }}
                                                            </a>
                                                            <div class="auth1lnkprce">
                                                                <p class="cr1fot">By <a
                                                                        href="#">{{ $course->user->name }}</a></p>

                                                            </div>
                                                            @if ($course->showLessons())
                                                                <a href="{{ route('student-course-curriculum-lesson', $course->id) }}"
                                                                    class="btn btn-primary">
                                                                    <span class="mt-2">
                                                                        Start Lesson
                                                                    </span>
                                                                </a>
                                                            @endif
                                                            @if (in_array($course->id, json_decode($certify, true)))
                                                                <a target="_blank"
                                                                    href="{{ route('student-enroll-cert-show', $course->id) }}"
                                                                    class="mybtn1">{{ __('Certificate') }}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade show" id="nav-history" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452">
                                        <h3>Purchased History</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Course</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($e_courses as $e)
                                                            <tr>
                                                                <th scope="row">{{ $e->id }}</th>

                                                                <td>{{ $e->order->order_number }}</td>
                                                                <td>{{ $e->course->title }}</td>

                                                                @if ($e->status == 1)
                                                                    <td class="badge badge-primary mt-2">
                                                                        Completed
                                                                    </td>
                                                                @else
                                                                    <td class="badge badge-danger mt-1">
                                                                        Pending
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

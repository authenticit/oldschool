@extends('layouts.front')
@section('title', $title)
@section('content')
    <div class="_216b01">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="section3125 rpt145">
                        <div class="row">
                            <div class="col-lg-7">
                                <a href="#" class="_216b22">
                                    <span><i class="uil uil-windsock"></i></span>Report Profile
                                </a>
                                <div class="dp_dt150">
                                    <div class="img148">
                                        <img src="{{ url('uploads/images/instructor/', $instructor->image) }}"
                                            alt="">
                                    </div>
                                    <div class="prfledt1">
                                        <h2>{{ $instructor->name }}</h2>
                                        <span>{{ $instructor->role }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <a href="#" class="_216b12">
                                    <span><i class="uil uil-windsock"></i></span>Report Profile
                                </a>
                                <div class="rgt-145">
                                    <ul class="tutor_social_links">
                                        <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" class="ln"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#" class="yu"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                                <ul class="_bty149">
                                    <li><button class="subscribe-btn btn500">Subscribe</button></li>
                                    <li><button class="msg125 btn500">Message</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about"
                                    role="tab" aria-selected="true">About</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses"
                                    role="tab" aria-selected="false">Courses</a>
                                <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews"
                                    role="tab" aria-selected="false">Discussion</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b17">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452">
                                        <h3>About Me</h3>
                                        <p>
                                            {!! $instructor->bio !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                                <div class="crse_content">
                                    <h3>My courses (8)</h3>
                                    <div class="_14d25">
                                        @foreach ($courses as $course)
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="fcrse_1 mt-30">
                                                        <a href="{{ route('front.course', $course->slug) }}" class="fcrse_img">
                                                            <img src="{{ asset('uploads/images/course/', $course->photo) }}" alt="">
                                                            <div class="course-overlay">
                                                                <div class="badge_seller">Bestseller</div>
                                                                <div class="crse_reviews">
                                                                    <i class="uil uil-star"></i>4.5
                                                                </div>
                                                                <span class="play_btn1"><i class="uil uil-play"></i></span>
                                                                <div class="crse_timer">
                                                                    25 hours
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel">
                                <div class="student_reviews">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="review_right">
                                                <div class="review_right_heading">
                                                    <h3>Discussions</h3>
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
    </div>
@endsection

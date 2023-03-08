@extends('layouts.front')
@section('title', $title)
@section('content')
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    
                    <div class="section3125 mt-50">
                        <h4 class="item_title">Featured Courses</h4>
                        <a href="#" class="see150">See all</a>
                        <div class="la5lo1">
                            <div class="owl-carousel featured_courses owl-theme">
                                @foreach ($courses as $c)
                                    <div class="item">
                                        <div class="fcrse_1 mb-20">
                                            <a href="{{ route('course-detail', $c->id) }}" class="fcrse_img">
                                                <img src="{{ url('assets/images/courses', $c->photo) }}"
                                                    alt="">
                                                <div class="course-overlay">
                                                    <span class="play_btn1"><i class="uil uil-play"></i></span>
                                                    <div class="crse_timer">
                                                        12 hours
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="fcrse_content">
                                                <div class="eps_dots more_dropdown">
                                                    <a href="#"><i class='uil uil-ellipsis-v'></i></a>
                                                    <div class="dropdown-content">
                                                        <span><i class='uil uil-share-alt'></i>Share</span>
                                                        <span><i class="uil uil-heart"></i>Save</span>
                                                        <span><i class='uil uil-ban'></i>Not Interested</span>
                                                        <span><i class="uil uil-windsock"></i>Report</span>
                                                    </div>
                                                </div>
                                                <div class="vdtodt">
                                                    <span class="vdt14">15 views</span>
                                                    <span class="vdt14">10 min ago</span>
                                                </div>
                                                <a href="{{ route('course-detail', $c->id) }}" class="crse14s">
                                                    {{ $c->title }}
                                                </a>
                                                <a href="#" class="crse-cate">{{ $c->category->name }} | CSS</a>
                                                <div class="auth1lnkprce">
                                                    <p class="cr1fot">By <a href="#">{{ $c->user->name }}</a>
                                                    </p>
                                                    <div class="prce142">৳{{ $c->price }}</div>
                                                    <button class="shrt-cart-btn" title="cart"><i
                                                            class="uil uil-shopping-cart-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                            
                    
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="right_side">
                        <div class="fcrse_3">
                            <div class="cater_ttle">
                                <h4>Live Streaming</h4>
                            </div>
                            <div class="live_text">
                                <div class="live_icon"><i class="uil uil-kayak"></i></div>
                                <div class="live-content">
                                    <p>Set up your channel and stream live to your students</p>
                                    <button class="live_link" onclick="window.location.href = 'add_streaming.html';">Get
                                        Started</button>
                                    <span class="livinfo">Info : This feature only for 'Instructors'.</span>
                                </div>
                            </div>
                        </div>
                        <div class="get1452">
                            <h4>Get personalized recommendations</h4>
                            <p>Answer a few questions for your top picks</p>
                            <button class="Get_btn" onclick="window.location.href = '#';">Get Started</button>
                        </div>
                        <div class="fcrse_3">
                            <div class="cater_ttle">
                                <h4>Top Categories</h4>
                            </div>
                            <ul class="allcate15">
                                @foreach($categories as $category)
                                <li><a href="#" class="ct_item"><i class='uil uil-arrow'></i>{{ $category->name }}</a></li>
                                @endforeach
                                </ul>
                        </div>
                        <div class="strttech120">
                            <h4>Become an Instructor</h4>
                            <p>Top instructors from around the world teach millions of students on Cursus. We
                                provide the tools and skills to teach what you love.</p>
                            <button class="Get_btn" onclick="window.location.href = '#';">Start Teaching</button>
                        </div>
                    </div>
                </div>

            </div>







            <div class="col-xl-12 col-lg-12">
                <div class="section3125 mt-30">
                    <h4 class="item_title">What Our Student Have Today</h4>
                    <div class="la5lo1">
                        <div class="owl-carousel Student_says owl-theme">
                            <div class="item">
                                <div class="fcrse_4 mb-20">
                                    <div class="say_content">
                                        <p>"Donec ac ex eu arcu euismod feugiat. In venenatis bibendum nisi, in
                                            placerat eros ultricies vitae. Praesent pellentesque blandit
                                            scelerisque. Suspendisse potenti."</p>
                                    </div>
                                    <div class="st_group">
                                        <div class="stud_img">
                                            <img src="{{ asset('assets/frontend/images/left-imgs/img-4.jpg') }}"
                                                alt="">
                                        </div>
                                        <h4>Jassica William</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="fcrse_4 mb-20">
                                    <div class="say_content">
                                        <p>"Cras id enim lectus. Fusce at arcu tincidunt, iaculis libero quis,
                                            vulputate mauris. Morbi facilisis vitae ligula id aliquam. Nunc
                                            consectetur malesuada bibendum."</p>
                                    </div>
                                    <div class="st_group">
                                        <div class="stud_img">
                                            <img src="{{ asset('assets/frontend/images/left-imgs/img-1.jpg') }}"
                                                alt="">
                                        </div>
                                        <h4>Rock Smith</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="fcrse_4 mb-20">
                                    <div class="say_content">
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class
                                            aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                            inceptos himenaeos eros ac, sagittis orci."</p>
                                    </div>
                                    <div class="st_group">
                                        <div class="stud_img">
                                            <img src="{{ asset('assets/frontend/images/left-imgs/img-7.jpg') }}"
                                                alt="">
                                        </div>
                                        <h4>Luoci Marchant</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="fcrse_4 mb-20">
                                    <div class="say_content">
                                        <p>"Nulla bibendum lectus pharetra, tempus eros ac, sagittis orci.
                                            Suspendisse posuere dolor neque, at finibus mauris lobortis in.
                                            Pellentesque vitae laoreet tortor."</p>
                                    </div>
                                    <div class="st_group">
                                        <div class="stud_img">
                                            <img src="{{ asset('assets/frontend/images/left-imgs/img-6.jpg') }}"
                                                alt="">
                                        </div>
                                        <h4>Poonam Sharma</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="fcrse_4 mb-20">
                                    <div class="say_content">
                                        <p>"Curabitur placerat justo ac mauris condimentum ultricies. In magna
                                            tellus, eleifend et volutpat id, sagittis vitae est. Pellentesque
                                            vitae laoreet tortor."</p>
                                    </div>
                                    <div class="st_group">
                                        <div class="stud_img">
                                            <img src="{{ asset('assets/frontend/images/left-imgs/img-3.jpg') }}"
                                                alt="">
                                        </div>
                                        <h4>Davinder Singh</h4>
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

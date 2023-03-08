@extends('layouts.front')

@section('content')
    <div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <iframe src="https://youtu.be/6VY248rY830"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    <div class="_215b01">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section3125">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="">
                                    <a href="#" class="fcrse_img" data-toggle="modal" data-target="#videoModal">
                                        <img src="{{ url('assets/images/courses', $course->photo) }}" alt="">
                                        <div class="course-overlay">
                                            <div class="badge_seller">Bestseller</div>
                                            <a style="padding: 100px;" href="{{$course->course_overview_url}}"><span class="_215b02">
                                                <button class="btn btn-success text-white">ফ্রি ক্লাস দেখুন</button>
                                            </span></a>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{ $course->title }}</h2>
                                    <span class="_215b04">{!! $course->short_description !!}</span>
                                </div>
                                
                                <div class="_215b06">
                                    <div class="_215b07">
                                        <span><i class='uil uil-clock'></i></span>
                                        Time - {{ $course->time }} hr
                                    </div>
                                    <div class="_215b08">
                                        <span><i class='uil uil-shop'></i></span>
                                        <span>
                                            Total Enrolled - {{$enrolled}} Person
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="_215b06">
                                    <div class="_215b07">
                                        <span><i class='uil uil-comment'></i></span>
                                        {{ $course->category->name }}
                                    </div>
                                    <div class="_215b08">
                                        <span><i class='uil uil-closed-captioning'></i></span>
                                        <span>Price - ৳{{ $course->price }}

                                        </span>
                                    </div>
                                </div>
                                
                                <ul class="_215b31">
                                    @if (Auth::check())
                                        <li><button class="btn btn-success text-white"><a class="text-white"
                                                    style="padding: 100px;"
                                                    href="{{ route('order.add', $course->id) }}">কোর্সটি শুরু করুন</a></button></li>
                                    @elseif (Auth::check() && $order->status == 'Completed')
                                        <li><button class="btn btn-success text-white"><a class="text-white"
                                                    style="padding: 100px;"
                                                    href="{{ route('order.add', $course->id) }}">কোর্সটি শুরু করুন</a></button></li>
                                    @else
                                        <li><button class="btn btn-success text-white"><a class="text-white"
                                                    style="padding: 100px;"
                                                    href="{{ route('student-signup') }}?course_id={{ $course->id }}">কোর্সটি শুরু করুন</a></button></li>
                                    @endif
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b15 _byt1458">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user_dt5">
                        <div class="user_dt_left">
                            <div class="live_user_dt">
                                <div class="user_img5">
                                    <a href="#"><img src="{{ asset('assets/frontend/images/left-imgs/img-1.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="user_cntnt">
                                    <a href="#"
                                        class="_df7852">{{ $course->user->name }}</a>
                                    <button class="subscribe-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                        <div class="user_dt_right">
                            <ul>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>1452</span></a>
                                </li>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>100</span></a>
                                </li>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-thumbs-down"></i><span>20</span></a>
                                </li>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-share-alt"></i><span>9</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab"
                                    href="#nav-about" role="tab" aria-selected="true">About</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses"
                                    role="tab" aria-selected="false">Courses Content</a>
                                
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
                            <div class="tab-pane fade show active" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452">
                                        <h3>Requirements</h3>
                                        <ul>
                                            <li><span class="_5f7g11">Have a computer with Internet</span></li>
                                            <li><span class="_5f7g11">Be ready to learn an insane amount of awesome
                                                    stuff</span></li>
                                            <li><span class="_5f7g11">Prepare to build real web apps!</span></li>
                                        </ul>
                                    </div>
                                    <div class="_htg452 mt-35">
                                        <h3>Description</h3>
                                        <span class="_abc123">
                                            {!! $course->description !!}
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                            <div class="crse_content">
										<h3>Course content</h3>
										
										<div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
                                            @foreach ($sections as $section)
											<a href="javascript:void(0)"
												class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
												<div class="section-header-left">
													<span class="section-title-wrapper">
														<i class='uil uil-presentation-play crse_icon'></i>
														<span class="section-title-text">{{$section->title}}</span>
															
													</span>
												</div>
												<div class="section-header-right">
                                                    <!-- showing total lessons -->
                                                    <span class="section-lesson-count">{{count($section->lessons)}} Lessons</span>
													
													
												</div>
											</a>
											<div
												class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
												
                                                @foreach ($section->lessons as $l)
                                               
                                                <div class="lecture-container">
													<div class="left-content">
														<i class='uil uil-file icon_142'></i>
														<div class="top">
															<div class="title">{{$l->title}}</div>
														</div>
													</div>
													
												</div>
                                                 
                                                @endforeach
												
												
												
												
												
											</div>
											@endforeach
											
									
										
										</div>
										<a class="btn1458" href="#"> Total - {{ count($sections) }} Sections</a>
									</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

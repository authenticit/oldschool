@extends('layouts.front')
@section('content')
    <!-- Course Videos Page Start -->

    <div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <iframe src="https://www.youtube.com/embed/6eN2PijBK1A"
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
                                        <img src="{{ url('assets/images/courses', $enroll->course->photo) }}" alt="">
                                        <div class="course-overlay">
                                            <div class="badge_seller">Bestseller</div>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="_215b10">
                                    <a href="#" class="_215b11">
                                        <span><i class="uil uil-heart"></i></span>Save
                                    </a>
                                    <a href="#" class="_215b12">
                                        <span><i class="uil uil-windsock"></i></span>Report abuse
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{ $enroll->course->title }}</h2>
                                    <span class="_215b04">{!! $enroll->course->short_description !!}</span>
                                </div>
                                <div class="_215b05">
                                    <div class="crse_reviews mr-2">
                                        <i class="uil uil-star"></i>4.5
                                    </div>
                                    (81,665 ratings)
                                </div>

                                <div class="_215b06">
                                    <div class="_215b07">
                                        <span><i class='uil uil-comment'></i></span>
                                        {{ $enroll->course->category->name }}
                                    </div>
                                    <div class="_215b08">
                                        <span><i class='uil uil-closed-captioning'></i></span>
                                        <span>Price - ৳{{ $enroll->course->price }}

                                        </span>
                                    </div>
                                </div>
                                <div class="_215b05">
                                    {{ $enroll->course->created_at }}
                                </div>
                               
                                <div class="_215fgt1">
                                    30-Day Money-Back Guarantee
                                </div>
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
                                        class="_df7852">{{ $enroll->course->user->name }}</a>
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
                                
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses"
                                    role="tab" aria-selected="false">Lessons Content</a>
                              
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
                            
                            <div class="tab-pane show active fade" id="nav-courses" role="tabpanel">
                                <div class="crse_content">
                                    <h3>Course content</h3>
                                    <div class="_112456">
                                        <ul class="accordion-expand-holder">
                                            <li><span class="accordion-expand-all _d1452">Expand all</span></li>
                                            <li><span class="_fgr123"> 402 lectures</span></li>
                                            <li><span class="_fgr123">47:06:29</span></li>
                                        </ul>
                                    </div>
                                    <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
                                        
                                        <div
                                            class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
                                          
                                            
                                            
                                           @foreach($lessons as $lesson)
                                            <div class="lecture-container">
                                                <div class="left-content">
                                                    <i class='uil uil-file icon_142'></i>
                                                    <div class="top">
                                                        <div class="title">{{$lesson->title}}</div>
                                                    </div>
                                                </div>
                                                <div class="details">
                                                    <a href="#" class="preview-text" data-toggle="modal" data-target="#videoModal">Preview</a>
                                                    <span class="content-summary">00:11</span>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                       
                                        
                                      
                                    
                                    </div>
                                    <a class="btn1458" href="#">20 More Sections</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Course Videos Page End -->
    <script>
        $('.get-started').on('click', function() {

            $('#quiz-header').addClass('d-none');
            $('#question-number-1').removeClass('d-none');

        });

        $('.next-btn').on('click', function() {

            var $this = $(this);
            var $class = $(this).data('class');

            if ($('.' + $class + ':checked').length == 0) {

                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                $('.alert-danger ul').append('{{ __('You have to select an option.') }}');

            } else {
                $('.alert-danger').hide();
                $this.parent().addClass('d-none');
                $this.parent().next().removeClass('d-none');

            }

        });

        $(document).on('change', '.form-check-input', function() {

            if (this.checked) {

                $(this).prev().val('1');

            } else {

                $(this).prev().val('0');

            }

        });
    </script>
@endsection

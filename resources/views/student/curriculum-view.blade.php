@extends('layouts.front')
@section('content')
    <!-- Course Videos Page Start -->

   


    <div class="_215b17">
        <div class="container-fluid">
            <div class="row">

            <div class="col-lg-5">
                <div class="course_tab_content">
                <div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <div class="modal-body">

                
                
                
                    
                <div class="course_tab_content">
					
                @foreach ($lesson as $l)
					<iframe id="lesson" width="560" height="315" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				@endforeach
					</div>
                
             
                
                
                
        
                    
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
                
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">
                            
                            <div class="tab-pane show active fade" id="nav-courses" role="tabpanel">
                                <div class="crse_content">
                                    <h3>Course content</h3>
                                    <div class="_112456">
                                      
                                    </div>
                                   

                                    <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
                                            @foreach ($sections as $l)
											<a href="javascript:void(0)"
												class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
												<div class="section-header-left">
													<span class="section-title-wrapper">
														<i class='uil uil-presentation-play crse_icon'></i>
														<span class="section-title-text">{{$l->title}}</span>
															
													</span>
												</div>
												<div class="section-header-right">
                                                    
                                                    
													<span class="num-items-in-section"></span>
													<span class="section-lesson-count">{{count($l->lessons)}} Lessons</span>
												</div>
											</a>
											<div
												class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
												
                                               @foreach ($l->lessons as $lesson)
                                                <div class="lecture-container">
													<div class="left-content">
														<i class='uil uil-file icon_142'></i>
														<div class="top">
															<div class="title">{{$lesson->title}}</div>
														</div>
													</div>
													<div class="details">
													    @if($lesson->url)
                                                        <span><a href="{{ route('student-lesson', $lesson->id) }}" class="preview-text">
                                                            <i class="fa fa-play" aria-hidden="true"> Preview </i>
                                                        </a></span>
														@else
														
														@endif
													</div>
												</div>
                                                @endforeach
                                                	
												
											</div>
											@endforeach
											
									
										
									</div>
                                    <a class="btn1458" href="#">
                                        <!-- total section count -->
                                        <span class="total-sections-count">Total - {{count($sections)}} Sections</span>
                                    </a>
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

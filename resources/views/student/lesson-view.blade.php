@extends('layouts.front')
@section('content')
<!-- Course Videos Page Start -->




<div class="_215b17">
    <div class="container-fluid">
        <div class="row align-items-start">


            <div class="col-lg-5">
                <div class="course_tab_content">


                    <iframe width="390" height="240" src="{{$lesson->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="course_tab_content">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane show active fade" id="nav-courses" role="tabpanel">
                            <div class="crse_content">
                                <h3>Lesson Content</h3>
                                


                                <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">

                                    <a href="javascript:void(0)" class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                        <div class="section-header-left">
                                            <span class="section-title-wrapper">
                                                <i class='uil uil-presentation-play crse_icon'></i>
                                                <span class="section-title-text">{{$lesson->section->title}}</span>

                                            </span>
                                        </div>
                                        
                                    </a>
                                    <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">

                                        <div class="lecture-container">
                                            <div class="left-content">
                                                <i class='uil uil-file icon_142'></i>
                                                <div class="top">
                                                    <div class="title">{{$lesson->title}}</div>
                                                </div>
                                            </div>
                                            <div class="details">
                                                @if($lesson->url)
                                                <span><a href="{{route('student-lesson', $lesson->id) }}" class="preview-text">
                                                    <i class="fa fa-play" aria-hidden="true"> Preview</i>

                                                    
                                                </a></span>
                                                @else
                                                
                                                @endif
                                            </div>
                                        </div>

                                    </div>




                                </div>

                                <a class="btn1458" href="{{ URL::previous() }}">
                                    <i class='uil uil-arrow-left'></i>Back
                                    
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
            $('.alert-danger ul').append('{{ __('
                You have to select an option.
                ') }}');

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
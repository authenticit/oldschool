
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $gs->title }}</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="{{asset('assets/images/'.$gs->favicon)}}" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">

</head>

<body>

	<!--Main Breadcrumb Area Start -->
	<div class="main-breadcrumb-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<ul class="pages">
						<li class="active">
							<a href="javascript:;">
								{{ $data->title }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->


	<!-- Course Videos Page Start -->
	<section class="course-video-page">
		<div class="row">

			<div class="col-lg-9 cv-pr">



				<div class="video-play-area">

                    @if($lsn->type == 'Lesson')

                    @if($lsn->url != null)
                        @if($lsn->video_file == 'youtube')

                        @if(strpos($lsn->url, 'https://www.youtube.com/watch?v') !== false)
                            <iframe width="560" height="315" src="{{ str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",strtok($lsn->url, '&') ) }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else 
                            <iframe width="560" height="315" src="{{ str_replace("https://youtu.be/","https://www.youtube.com/embed/",$lsn->url) }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif

                        @elseif($lsn->video_file == 'vimeo')

                        <iframe width="560" height="315" src="{{ str_replace("https://vimeo.com/","https://player.vimeo.com/video/",$lsn->url) }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @else

                        <iframe width="560" height="315" src="{{ $lsn->url }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @endif
                    @else
					<iframe width="560" height="315" src="{{ asset('assets/files/'.$lsn->file) }}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif

                    @else

                    <div class="text-center">
                        <div class="mt-5">
                            <div id="quiz-body">

                            @if(Session::has('result'))

                            @php

                                $result = Session::get('result');

                            @endphp
                                <div id="quiz-result" class="text-left">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card question-content mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ __('Review the course materials to expand your learning.') }}</h5>
                                                    <p class="card-text">{{ __('You got') }} {{ $result['correct_answers_count'] }} {{ __('Out of') }} {{ count($lsn->questions) }} {{ __('Correct.') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($lsn->questions()->oldest('pos')->get() as  $ans)

                                    @php

                                    $options = json_decode($ans->options,true)

                                    @endphp

                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <div class="card text-left card-with-no-color-no-border">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <img height="15" src="{{ $result['main_answers'][$loop->index] ? asset('assets/images/green-tick.png') : asset('assets/images/red-cross.png') }}" alt="">
                                                        {{ $ans->title }}
                                                    </h6>
                                                    @foreach($result['correct_answers'][$loop->index] as $opt)
                                                    <p class="card-text">
                                                        - {{ $options[$opt] }}
                                                        <img height="15" src="{{ asset('assets/images/green-circle-tick.png') }}" alt="">
                                                    </p>
                                                    @endforeach
                                                    <p class="card-text">
                                                        <strong>
                                                            {{ __('Submitted Answers') }}:
                                                        </strong>
                                                        [@foreach($result['submitted_answers'][$loop->index] as $sa)
                                                        {{ $options[$sa] }}{{ $loop->last ? '' : ',' }}
                                                        @endforeach]
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                    <div class="text-center">
                                        <a href="javascript:;" name="button" class="btn btn-danger mt-2 mb-3" onclick="location.reload();">{{ __('Take again') }}</a>
                                    </div>
                                </div>

                            @else

                            <div class="" id="quiz-header">
                                {{ __('Quiz Title') }} : <strong>{{ $lsn->title }} </strong><br>
                                {{ __('Number Of Questions') }} : <strong>{{ count($lsn->questions) }}</strong><br>
                                <button type="button" name="button" class="btn btn-danger mt-2 mb-3 get-started" >{{ __('Get started') }}</button>
                            </div>

                            <form id="quiz_form" action="{{ route('admin-course-quiz-result') }}" method="post">

                                {{ csrf_field() }}

                                <input type="hidden" name="lesson_id" value="{{ $lsn->id }}">

                                @include('includes.admin.form-error')

                                @foreach($lsn->questions()->oldest('pos')->get() as $qsn)

                                <div class="questions d-none" id="question-number-{{ $loop->index + 1 }}">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="card text-left">
                                                <div class="card-body question-content">
                                                    <h6 class="card-title">{{ __('Question') }} {{ $loop->index + 1 }} : <strong>{{ $qsn->title }}</strong></h6>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    @foreach(json_decode($qsn->options,true) as $opt)
                                                    <li class="list-group-item quiz-options">
                                                        <div class="form-check">
                                                            <input type="hidden" name="answers[{{ $loop->parent->index }}][]" value="0">
                                                            <input class="form-check-input ans-{{ $loop->parent->index + 1 }}" type="checkbox"  id="quiz-id-{{ $qsn->id }}-option-id-{{ $loop->index + 1 }}">
                                                            <label class="form-check-label" for="quiz-id-{{ $qsn->id }}-option-id-{{ $loop->index + 1 }}">
                                                                {{ $opt }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="{{ $loop->last ? 'submit' : 'button' }}" name="button" data-class="ans-{{ $loop->index + 1 }}" class="btn btn-primary mt-2 mb-2 {{ $loop->last ? 'final-btn' : 'next-btn' }}">
                                        {{ $loop->last ? __('Check Answers') :  __('Next')  }}
                                    </button>
                                </div>

                                @endforeach

                            </form>



                            @endif




                            </div>
                        </div>
                    </div>


                    @endif


                </div>



				<div class="course-information">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Description') }}:</h5>
                            <p class="card-text">
                                {!! $lsn->details !!}
                            </p>
                        </div>
                    </div>

				</div>
            </div>

			<div class="col-lg-3 cv-pl">
				<div class="course-video-list-area aside">
					<div class="content-accordion">
                            @foreach($data->sections()->oldest('pos')->get() as $section)
                                <div class="mycard">
                                    <div class="mycard-header" id="headingLeson{{ $section->id }}">
                                        <span class="header-title" data-toggle="collapse" data-target="#collapseLeson{{ $section->id }}" aria-expanded="{{ $lsn->section_id == $section->id ? 'true' : 'false' }}"
                                            aria-controls="collapseLeson{{ $section->id }}">
                                            <div class="left-area">
                                                <div class="content">
                                                    <div class="top-area">
                                                        <span class="seson">{{ __('Section') }} {{ $loop->index + 1 }}</span>
                                                    </div>
                                                    <h6 class="title">
                                                        {{ $section->title }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div id="collapseLeson{{ $section->id }}" class="collapse {{ $lsn->section_id == $section->id ? 'show' : '' }}" aria-labelledby="headingLeson{{ $section->id }}">

                                        @foreach($section->lessons()->oldest('pos')->get() as $lesson)
                                        <div class="mycard-body">
                                            <div class="single-video">
                                                <div class="top-heading-area">
                                                    <a href="{{ route('admin-course-curriculam-lesson',$lesson->id) }}" class="title {{ $lesson->id == $lsn->id ? 'active' : ''}}">
                                                        {{ $loop->parent->index + 1 }}.{{ $loop->index + 1 }} - {{ $lesson->title }}
                                                    </a>
                                                </div>
                                                    <div class="bottom-area">
                                                        @if($lesson->duration != null)
                                                            <i class="fas fa-play-circle"></i> {{ $lesson->duration }}
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
					</div>
				</div>
            </div>

		</div>
	</section>
	<!-- Course Videos Page End -->


	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->


	<script>
		mainurl = '{{route('front.index')}}';
	</script>

	<!-- jquery -->
	<script src="{{asset('assets/front/js/jquery.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- popper -->
	<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
	<!-- plugin js-->
	<script src="{{asset('assets/front/js/plugin.js')}}"></script>
	<!-- custom js-->
	<script src="{{asset('assets/front/js/custom.js')}}"></script>
	<!-- main -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>

    <script>


        $('.get-started').on('click',function(){

            $('#quiz-header').addClass('d-none');
            $('#question-number-1').removeClass('d-none');

        });

        $('.next-btn').on('click',function(){

            var $this = $(this);
            var $class = $(this).data('class');

            if( $('.'+$class+':checked').length == 0 ){

                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                $('.alert-danger ul').append('{{ __("You have to select an option.") }}');

            }else{
                $('.alert-danger').hide();
                $this.parent().addClass('d-none');
                $this.parent().next().removeClass('d-none');

            }

        });

$(document).on('change','.form-check-input',function(){

if(this.checked){

    $(this).prev().val('1');

}else{

    $(this).prev().val('0');

}

});


    </script>


</body>

</html>

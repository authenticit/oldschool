<div class="row all-videos">
    @foreach($enrolled_courses as $course)
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="single-course">

            <div class="img">
                <img src="{{asset('assets/images/courses/'.$course->photo)}}" alt="">
            </div>

            <div class="content">

                <h4 class="title">
                    {{ $course->showTitle() }}
                </h4>

                <div class="reating-area">
                    <div class="stars">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                            <div class="full-stars" style="width:{{ App\Models\Rating::ratings($course->id) }}%"></div>
                        </div>
                    </div>
                    <a href="{{ route('front.course',$course->slug) }}#reviewform" class="total-star">
                        {{ __('Edit Rating') }}
                    </a>
                </div>

                <div class="important-links">
                    <a href="{{ route('front.course',$course->slug) }}" class="mybtn1">{{ __('Details') }}</a>
                    @if($course->showLessons())
                    <a href="{{ route('student-course-curriculam-lesson',$course->sections()->with('lessons')->first()->lessons()->oldest('pos')->first()->id) }}" class="mybtn1">{{ __('Start Lesson') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="page-center mt-5">
    {!! $enrolled_courses->links() !!}
</div>

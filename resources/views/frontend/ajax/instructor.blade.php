<div class="row all-videos pb-0">
    <div class="col-lg-12">
        <div class="section-heading">
            <h2 class="title">{{__('All Courses')}}
            </h2>
        </div>
    </div>
    @foreach ($courses as $course)
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="single-course">
            <div class="img">
                <img src="{{asset('assets/images/courses/'.$course->photo)}}" alt="course">
            </div>
            <div class="content">
                <p class="author">
                    <a href="{{!empty($course->instructor) ? route('instructor.details',$course->instructor->instructor_slug) : route('instructor.details',DB::table('admins')->first()->slug)}}">
                        {{ !empty($course->instructor) ? $course->instructor->instructor_name : DB::table('admins')->first()->name }}
                    </a>

                </p>
                <a href="{{route('front.course',$course->slug)}}">
                    <h4 class="title">
                        {{ $course->showTitle() }}
                    </h4>
                </a>

                @if(App\Models\Rating::normalRating($course->id) != 0)
                <div class="reating-area">
                <span class="number">{{ App\Models\Rating::normalRating($course->id) }}</span>
                <div class="stars">
                    <div class="ratings">
                        <div class="empty-stars"></div>
                        <div class="full-stars" style="width:{{ App\Models\Rating::ratings($course->id) }}%"></div>
                        </div>
                </div>
                <div class="total-star">
                    ({{ App\Models\Rating::ratingCount($course->id) }})
                </div>
                </div>
                @endif
                @if($course->price == 0)

                <p class="price">
                  {{ __('Free') }}
                </p>

                @else

                <p class="price">
                    {{$curr->sign}}{{round(($course->price * $curr->value),2)}} <del>{{ $curr->sign }}{{ round(($course->discount_price * $curr->value),2) }}</del>
                </p>

                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>

<div class="page-center pb-5">

    {!! $courses->links() !!}

</div>

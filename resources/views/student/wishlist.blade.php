@extends('layouts.front')

@section('title')
Wishlist
@endsection

@section('content')

<!-- User Dashboard Area Start -->
<section class="user-dashboard">
    <div class="user-dashboard-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading-title">
                        {{__('My Wishlists')}}
                    </h4>
                    @include('student.includes.nav')
                </div>
            </div>
        </div>
    </div>

    <div class="user-dashboard-content-area">
        <div class="container" id="ajaxContent">

            <div class="row all-videos wishlists">

                @foreach($wishlists as $course)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="single-course">
                        <div class="img">
                            <img src="{{asset('assets/images/courses/'.$course->photo)}}" alt="course">
                            <a href="javascript:;" class="remove wishlist-remove" data-href="{{ route('student-wishlist-remove', App\Models\Wishlist::where('user_id','=',$user->id)->where('course_id','=',$course->id)->first()->id ) }}">
                                <i class="fas fa-times"></i>
                            </a>
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

                            <p class="price">
                                {{$curr->sign}}{{round(($course->price * $curr->value),2)}} <del>{{ $curr->sign }}{{ round(($course->discount_price * $curr->value),2) }}</del>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="page-center mt-5">
                {!! $wishlists->links() !!}
            </div>

        </div>
    </div>

</section>
<!-- User Dashboard Area End -->

@endsection

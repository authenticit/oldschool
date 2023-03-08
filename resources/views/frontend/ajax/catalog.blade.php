
              @foreach ($courses as $course)
              <a href="{{ route('front.course',$course->slug) }}" class="single-course-long">
                <div class="img">
                  <img src="{{asset('assets/images/courses/'.$course->photo)}}" alt="">
                </div>
                <div class="content">
                  <div class="left-area">
                    <p class="author">{{ !empty($course->instructor) ? $course->instructor->showName() : DB::table('admins')->first()->name }}</p>
                  <h4 class="title">
                    {{$course->title}}
                  </h4>
                  <p class="text">
                    {{$course->short_description}}
                  </p>
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
                  <ul class="short-info">
                    @if($course->convertTime() != '')
                    <li>
                      {{ $course->convertTime() }}
                    </li>
                    @endif
                    <li>
                      {{ $course->sections()->withCount('lessons')->get()->sum('lessons_count') }} {{ __('lecture(s)') }}
                    </li>
                    <li>
                        {{ $course->level }} {{ __('Level') }}
                    </li>
                  </ul>
                  </div>
                  <div class="right-area">
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
              </a>
              @endforeach

              <div class="page-center mt-5">
                {!! $courses->appends(['search' => request()->input('search')])->links() !!}
              </div>

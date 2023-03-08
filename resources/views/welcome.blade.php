@extends('layouts.front')
@section('title', $title)
@section('content')
<div class="sa4d25">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-lg-8">

                <div class="section3125">
                    <h4 class="item_title">Popular Instructors</h4>
                    <a href="live_streams.html" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel live_stream owl-theme">

                            @foreach($instructors as $instructor)
                            <div class="item">
                                <div class="stream_1">
                                    <a href="live_output.html" class="stream_bg">
                                        <img src="{{ asset('assets/frontend/images/hd.jpg') }}" alt="">
                                        <h4>{{$instructor->name}}</h4>
                                        <p>live<span></span></p>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="section3125 mt-50">
                    <h4 class="item_title">Featured Courses</h4>
                    <a href="#" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($top_courses as $c)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('course-detail', $c->slug) }}" class="fcrse_img">
                                        <img src="{{ url('assets/images/courses', $c->photo) }}" alt="">
                                        <div class="course-overlay">
                                            
                                            <div class="crse_timer">
                                                {{$c->time}} Hours
                                            </div>
                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        
                                        <div class="vdtodt">
                                            <span class="vdt14">15 views</span>
                                            <span class="vdt14">10 min ago</span>
                                        </div>
                                        <a href="{{ route('course-detail', $c->slug) }}" class="crse14s">
                                            {{ $c->title }}
                                        </a>
                                        <a href="#" class="crse-cate">{{ $c->category->name }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="#">{{ $c->user->name }}</a>
                                            </p>
                                            <div class="prce142">&#x9F3;{{ $c->price }}</div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="section3125 mt-30">
                    <h4 class="item_title">Newest Courses</h4>
                    <a href="#" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($courses as $c)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('course-detail', $c->slug) }}" class="fcrse_img">
                                        <img src="{{ url('assets/images/courses', $c->photo) }}" alt="">
                                        <div class="course-overlay">
                                            
                                            <div class="crse_timer">
                                            {{$c->time}} Hours
                                            </div>
                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        
                                        <div class="vdtodt">
                                            <span class="vdt14">15 views</span>
                                            <span class="vdt14">10 min ago</span>
                                        </div>
                                        <a href="{{ route('course-detail', $c->slug) }}" class="crse14s">
                                            {{ $c->title }}
                                        </a>
                                        <a href="#" class="crse-cate">{{ $c->category->name }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="#">{{ $c->user->name }}</a>
                                            </p>
                                            <div class="prce142">&#x9F3;{{ $c->price }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="section3125 mt-30">
                    <h4 class="item_title">Newest Books</h4>
                    <a href="#" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($books as $book)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('book-detail', $book->id) }}" class="fcrse_img">
                                        <img src="{{ url('uploads/images/book', $book->image) }}" alt="">

                                    </a>
                                    <div class="fcrse_content">

                                        
                                        <a href="{{ route('book-detail', $book->id) }}" class="crse14s">
                                            {{ $book->name }}

                                        </a>
                                        <a href="#" class="crse-cate">{{ $book->bookCategory->name }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="#">
                                                    {{ $book->user->name }}</a></p>
                                            <div class="prce142">&#x9F3;{{ $book->sale_price }}</div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="section3125 mt-50">
                    <h4 class="item_title">Featured Artist</h4>
                    <a href="#" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($artists as $c)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('artist.details', $c->id) }}" class="fcrse_img">
                                        <img src="{{ url('images/artist/profile', $c->image ) }}" height="250px" width="100px" alt="">
                                    </a>
                                    <div class="fcrse_content">
                                        <a href="{{ route('artist.details', $c->id) }}" class="crse14s">
                                            {{ $c->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="section3125 mt-50">
                    <h4 class="item_title">Featured ArtWork</h4>
                    <a href="#" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($art_works as $c)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('artist.artwork.details', $c->id) }}" class="fcrse_img">
                                        <img src="{{ url('/images/artist/art_work', $c->image ) }}" height="250px" width="100px" alt="">
                                    </a>
                                    <div class="fcrse_content">
                                        <a href="{{ route('artist.artwork.details', $c->id) }}" class="crse14s">
                                            {{$c->title}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="section3125 mt-50">
                    <h4 class="item_title">Newest Blog</h4>
                    <a href="all_instructor.html" class="see150">See all</a>
                    <div class="la5lo1">
                        <div class="owl-carousel featured_courses owl-theme">
                            @foreach ($blogs as $blog)
                            <div class="item">
                                <div class="fcrse_1 mb-20">
                                    <a href="{{ route('blog-details', $blog->id) }}" class="fcrse_img">
                                        <img src="{{ url('uploads/images/blog/'.$blog->image) }}" alt="">
                                    </a>
                                    <div class="fcrse_content">
                                        
                                        <a href="{{ route('blog-details', $blog->id) }}" class="crse14s">
                                            {{ $blog->title }}

                                        </a>
                                        
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
                        <a href="{{ route('instructor.login') }}">
                            <button class="btn btn-success" >Become Instructor</button>
                        </a> 
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
                                    <p>"হাতের লেখার কোর্সটি সত্যিই অসাধারণ। খুবই অল্প সময়ের ভিতর আমার হাতের লেখার পরিবর্তন হয়েছে।"</p>
                                </div>
                                <div class="st_group">
                                    <div class="stud_img">
                                        <img src="{{ asset('assets/frontend/images/left-imgs/img-4.jpg') }}" alt="">
                                    </div>
                                    <h4>Farzana Alam</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                        <div class="fcrse_4 mb-20">
                                <div class="say_content">
                                    <p>"অনলাইনের মাধ্যমে ও যে এত সহজে হাতের লেখা এত সহজে উন্নত করত পারবো তা কখনোই ভাবতে পারি নাই।"</p>
                                </div>
                                <div class="st_group">
                                    <div class="stud_img">
                                        <img src="{{ asset('assets/frontend/images/left-imgs/img-1.jpg') }}" alt="">
                                    </div>
                                    <h4>Md Nasir Khan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="fcrse_4 mb-20">
                                <div class="say_content">
                                    <p>"স্যারের আবিস্কৃত পদ্ধতিগুলো ব্যাবহার করে যে কোন বয়েসের মিক্ষার্থীরাই খুব সহজে হাতের লেখা সুন্দর করত পারবেন।"</p>
                                </div>
                                <div class="st_group">
                                    <div class="stud_img">
                                        <img src="{{ asset('assets/frontend/images/left-imgs/img-7.jpg') }}" alt="">
                                    </div>
                                    <h4>Sayed Shahadat</h4>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="fcrse_4 mb-20">
                                <div class="say_content">
                                    <p>"আমার মোনে হয় হাতের লেখা সুন্দর করার এর থেকে সহজ আর কোন কোর্স হত পার না। ধন্যবাদ স্যার"</p>
                                </div>
                                <div class="st_group">
                                    <div class="stud_img">
                                        <img src="{{ asset('assets/frontend/images/left-imgs/img-6.jpg') }}" alt="">
                                    </div>
                                    <h4>Poonam Sharma</h4>
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

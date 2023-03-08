@extends('layouts.front')
@section('title', $title)
@section('content')
    @foreach ($blogs as $blog)
        <div class="col-lg-9 col-md-7">
            <div class="blogbg_1 mt-50">
                <a href="{{ route('blog-details', $blog->id) }}" class="hf_img">
                    <img src="{{ asset('uploads/images/blog/' . $blog->image) }}" alt="">
                    <div class="course-overlay"></div>
                </a>
                <div class="hs_content">
                    
                    <a href="{{ route('blog-details', $blog->id) }}" class="crse14s title900">{{ $blog->title }}</a>
                    <p class="blog_des">{!! str_limit($blog->description, 200) !!} </p>
                    <a href="{{ route('blog-details', $blog->id) }}" class="view-blog-link">Read More<i class="uil uil-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

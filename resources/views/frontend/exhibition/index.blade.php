@extends('layouts.front')
@section('title', $title)

@section('css')

<link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/style.css') }}">

@endsection

@section('content')
<div class="bg-area">
        <div class="container mt-5">
            <div class="row">

            @foreach($exhibitors as $e)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="ex-card mt-4">
                        <div class="ex-img">
                            <img src="{{ url('upload/images/exhibition', $e->exhibition->image) }}" alt="Rectangle 15">
                        </div>
                        <div class="ex-text">
                            <h2>{{ $e->exhibition->title }}</h2>
                            <p>{{$e->art_name}}.</p>
                            <p>Year: {{$e->year}}</p>
                        </div>
                        <div class="instructor">
                            <img src="{{ url('uploads/images/', $e->image) }}" alt="Rectangle 15">
                            <div class="in-text">
                                <h3>
                                    <a href="#">{{$e->name}}</a>
                                </h3>
                                <p>{{$e->art_name}}</p>
                                <p>Bangladesh</p>
                            </div>
                        </div>
                        <div class="c-bottom">
                            <a href="#">
                                <i class="fas fa-thumbs-up"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-heart"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-smile"></i></a>
                            <a href="#">
                                <i class="fas fa-comment"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-share"></i>
                            </a>
                        </div>
                        <button class="ex-button">Buy now</button>
                        <div class="shaddow-btn">Buy now</div>
                    </div>
                </div>
            @endforeach
                
                
            </div>
        </div>
</div>

    @endsection

    @section('script')
    <script src="{{ asset('assets/frontend/exhibition/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/exhibition/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/exhibition/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/exhibition/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/exhibition/js/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/exhibition/js/custom.js') }}"></script>
    @endsection
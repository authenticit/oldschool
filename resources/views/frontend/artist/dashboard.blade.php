@extends('frontend.artist.base')
@section('title', $title)


@section('css')

<link rel="stylesheet" href="{{ asset('assets/artist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/xzoom.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/responsive.css') }}">

@endsection


@section('content')

<section class="artist-category-area bg-area">
    
        <div class="row pl-4">
            
            <!-- right -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    @foreach($artists as $a)
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                        <div class="art-category">
                            <div class="art-category-img">
                                @if($a->image)
                                    <a href="{{ route('artist.details', $a->id) }}">
                                    <img src="{{ asset('images/artist/profile/'.$a->image ) }}" alt="artist img">
                                    </a>
                                    @else
                                    <a href="{{ route('artist.details', $a->id) }}">
                                    <img src="{{ asset('assets/frontend/artist/images/avator.png') }}" alt="artist img">
                                    </a>
                                @endif
                            </div>
                            <div class="art-work-content">
                                <a href="{{ route('artist.details', $a->id) }}">
                                    {{$a->name}}
                                </a>
                                @if($a->is_public == 1)
                                <p class="mt-1">{{$a->phone}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    
</section>
    

@endsection


@section('script')

<script src="{{ asset('assets/artist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/jqueryall.2.2.4.js') }}"></script>
<script src="{{ asset('assets/artist/js/xzoom.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection
@extends('frontend.artist.base')
@section('title', $title)

@section('css')

<link rel="stylesheet" href="{{ asset('assets/artist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/responsive.css') }}">

@endsection

@section('content')



<!-- about section start  -->
<div class="about-area bg-area">
    
        <div class="row pl-5">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="about-details">
                    <h2>About</h2>
                    <p>
                        {{$artist->bio}}
                    </p>
                    <span>Details</span>
                    <p>
                        {{$artist->details}}
                    </p>
                    <span>Theme</span>
                    <p>
                        {{$artist->theme}}
                    </p>
                    <span>Future Plan</span>
                    <p>
                        {{$artist->future_plan}}
                    </p>
                    <span class="share">Share</span>
                    <div class="about-share">
                        <ul>
                            <li>
                                <a href="#" class="facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="messenger">
                                    <i class="fa-brands fa-facebook-messenger"></i>
                                    <span>Messenger</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="whatsapp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <span>Whatsapp</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="about-information">
                    <div class="about-profile">
                        <div class="about-profile-img">
                            <a href="#">
                                @if ($artist->image)
                                <img src="{{ url('/images/artist/profile', $artist->image ) }}" alt="admin img">
                                @else
                                <img src="{{ asset('assets/frontend/artist/images/avator.png') }}" width="50px" height="50px" alt="admin img">
                                @endif
                            </a>
                        </div>
                        <div class="about-profile-content">
                            <table>
                                <tr>
                                    <td>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{$artist->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td>{{$artist->email}}</td>
                                        </tr>
                                        @if ($artist->is_public == 1)
                                        <tr>
                                            <td><strong>Phone</strong></td>
                                            <td>{{$artist->phone}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Occupation</strong></td>
                                            <td>Professional Artist</td>
                                        </tr>
                                       
                                       @if ($artist->education)
                                       <tr>
                                        <td><strong>Education</strong></td>
                                        <td>{{$artist->education}}</td>
                                        </tr>
                                           
                                       @endif
                                        
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
<!-- about section end  -->

<!-- filter gallery section start  -->
<div class="filter-area bg-area">
    
        <div class="main pl-5">
            <h2>All ArtWork</h2>

            <!-- Portfolio Gallery Grid -->
            <div class="row">
                @foreach ($art_works as $art_work)
                <div class="column nature">
                    <div class="content">
                        <a href="{{ route('artist.artwork.details', $art_work->id) }}">
                            <div class="img">
                                <img src="{{ url('/images/artist/art_work', $art_work->image ) }}" alt="img" style="width:100%">
                                <i class="fa-solid fa-camera-viewfinder"></i>
                                <div class="overly"></div>
                            </div>
                        </a>
                        <div class="art-work-content">
                            <a href="{{ route('artist.artwork.details', $art_work->id) }}">
                                <h4>{{$art_work->title}}</h4>
                            </a>
                            <p>{{$art_work->media}}</p>
                            <p>{{$art_work->year}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

              
            </div>

            <!-- END MAIN -->
        </div>
    
</div>
<!-- filter gallery section end  -->





@endsection


@section('script')
<script src="{{ asset('assets/artist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/jqueryall.2.2.4.js') }}"></script>
<script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection
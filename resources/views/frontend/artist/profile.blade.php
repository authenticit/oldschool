@extends('frontend.artist.base')
@section('title', $title)

@section('css')

<link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/artist/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/exhibition/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/artist/css/style.css') }}">

@endsection

@section('content')

<section class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 min_h_100 mobile-sidebar">
                    <div class="left_sidebar bg_default">
                        <div class="left_body">
                            <div class="left_content ">
                                <div class="category">
                                    <h4>artist category</h4>
                                    <ul>
                                        <li><a href="#"><span>Painter</span></a></li>
                                        <li><a href="#"><span>Printmaker</span></a></li>
                                        <li><a href="#"><span>Sculptor</span></a></li>
                                        <li><a href="#"><span>Performance artist</span></a></li>
                                        <li><a href="#"><span>Singer</span></a></li>
                                        <li><a href="#"><span>Actor</span></a></li>
                                        <li><a href="#"><span>Caliographer</span></a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 min_h_100">
                    <div class="center_content bg_default">
                        <h4>Short Biodata</h4>
                        <p>{{$artist->bio}}.</p>
                        <h4>Details</h4>
                        <p>{{$artist->details}}</p>
                        <h4>Theme </h4>
                        <p>{{$artist->theme}}</p>
                        <h4>Future Plan</h4>
                        <p>{{$artist->future_plan}}</p>
                    </div>

                    
                </div>
                <div class="col-lg-3 col-md-4 order-first order-md-last">
                    <div class="right_side bg_default">
                        <div class="profile">
                            <div class="img_area">
                                <div class="img">
                                    @if ($artist->image)
                                    <img src="{{ url('/images/artist/profile', $artist->image ) }}" alt="admin img">
                                    @else
                                    <img src="{{ asset('assets/frontend/artist/images/avator.png') }}" alt="admin img">
                                    @endif
                                </div>
                            </div>
                            <div class="profile_content">
                                <div class="name">
                                    {{$artist->name}}
                                </div>
                                <div class="social">
                                    <a href="#"><img src="{{ asset('assets/frontend/artist/images/fb.png') }}" alt="fb"></a>
                                    <a href="#"><img src="{{ asset('assets/frontend/artist/images/tw.png') }}" alt="tw"></a>
                                    <a href="#"><img src="{{ asset('assets/frontend/artist/images/in.png') }}" alt="in"></a>
                                </div>
                            </div>
                        </div>
                        <ul class="born">
                            <li>
                                <span class="title">Name</span>
                                <span>{{$artist->name}}</span>
                            </li>
                            <li>
                                <span class="title">Email</span>
                                <span>{{$artist->email}}</span>
                            </li>
                            <li>
                                <span class="title">Phone</span>
                                <span>{{$artist->phone}}</span>
                            </li>
                            
                        </ul>
                        <div class="btn_area">
                        <a href="{{route('artist.edit.profile', $artist->id)}}" class="text-white">
                            <button class="btn btn-sm btn-primary btn-block">
                                Edit Profile
                            </button>
                        </a>
                        
                        <br>
                        <br>
                        <a href="{{ route('artist.artwork') }}">
                                <button class="ex-button btn btn-success btn-block">Add Art Work</button>
                        </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- filter gallery section start  -->
<div class="filter-area bg-area mt-4">
    
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
                        <div class="art-btn">
                            <!-- <input type="submit" value="Home">
                            <input type="submit" value="Home"> -->
                            <form action="{{ route('artist.delete.artwork', $art_work->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm me-2" onclick="return confirm('Are you sure delete this art work?')">Delete</button>
                            </form>

                            <a href="{{route('artist.edit.artwork', $art_work->id)}}">
                                <button class="btn btn-warning btn-sm me-4 right">Edit Now</button>
    
                                <br>
                                
                             </a>
                            <!-- <a href="#">Home</a>
                            <a href="#">Home</a> -->
                        </div>
                       
                    </div>
                </div>
                @endforeach

              
            </div>

            <!-- END MAIN -->

            <div class="tab-pane fade show" id="nav-history">
                <div class="_htg451">
                    <div class="_htg452">
                        <h3>Sale History</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order No</th>
                                            <th scope="col">Customer name</th>
                                            <th scope="col">Customer Phone</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($order_artworks->count() == 0)
                                            <tr>
                                                <td colspan="4" class="text-center">No Order Found</td>
                                            </tr>
                                        @else
                                        @foreach ($order_artworks as $key => $e)
                                            <tr>
                                                <th>{{ $key++ }}</th>
                                                <td>{{ $e->order_number }}</td>
                                                @if($e->user)
                                                <td>
                                                    {{$e->user->name}}
                                                </td>
                                                <td>{{$e->user->phone}}</td>
                                                @elseif($e->artist)
                                                <td>
                                                    {{$e->artist->name}}
                                                </td>
                                                <td>{{$e->artist->phone}}</td>
                                                @endif
                                                <td>{{ $e->artworks->title }}</td>
                                                <td>{{ $e->pay_amount }}</td>
                                                <td>
                                                    <span class="btn btn-sm btn-primary">
                                                        Completed

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
<!-- filter gallery section end  -->

        

   
  
    
@endsection


@section('script')

<script src="{{ asset('assets/frontend/artist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/artist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/artist/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/artist/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/artist/js/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/artist/js/custom.js') }}"></script>

    <script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection
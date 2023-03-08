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

    <!-- artwork img zoom section start  -->
    <section class="all-art-details-area bg-area xzoom-area">

        <div class="row  card-bottom pl-4">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ url('/images/artist/art_work', $art_work->image) }}" alt="" class="xzoom"
                    xoriginal="{{ url('/images/artist/art_work', $art_work->image) }}" id="xzoom-default">
                {{-- <div class="xzoom-thumbs">
                    <a href="{{ url('/images/artist/profile', $art_work->artist->image  ) }}">
                        <img src="{{ url('/images/artist/profile', $art_work->artist->image  ) }}" alt="" class="xzoom-gallery" width="80" height="90" xpreview="{{ url('/images/artist/profile', $art_work->artist->image  ) }}">
                    </a>
                    <a href="images/zoom-img-2.jpg">
                        <img src="images/zoom-img-2.jpg" alt="" class="xzoom-gallery" width="80" height="90">
                    </a>
                    <a href="images/zoom-img-3.jpg">
                        <img src="images/zoom-img-3.jpg" alt="" class="xzoom-gallery" width="80" height="90">
                    </a>
                    <a href="images/zoom-img-4.jpg">
                        <img src="images/zoom-img-4.jpg" alt="" class="xzoom-gallery" width="80" height="90">
                    </a>
                </div> --}}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="all-art-details">
                    <div class="all-art-details-content">
                        <h3>Artwork Details</h3>
                        <ul>
                            <li>Name:
                                <span>{{ $art_work->title }}</span>
                            </li>
                            <li>Media:
                                <span>{{ $art_work->media }}</span>
                            </li>
                            <li>Year:
                                <span>{{ $art_work->year }}</span>
                            </li>
                        </ul>
                        <div class="view-more">
                            <span class="art-details-price">৳{{ $art_work->price }}</span>

                            @if (Auth::check())
                                <a
                                        href="{{ route('artwork.order.add', $art_work->id) }}">Buy Now</a>
                            @else
                                <a class="text-white"
                                        href="{{ route('artist.register') }}">Buy Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- artwork img zoom section end  -->

    <!-- about the work section start  -->
    <div class="about-work-area bg-area">

        <div class="row pl-4">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="about-art-details">
                    <div class="about-work">
                        <span>
                            <a href="#">About the work</a>
                        </span>
                    </div>
                    <div class="about-art-work-top d-flex">
                        <div class="row">
                            <div class="col-4">
                                <!-- <div class="about-art-work-top-content">
                                        <span>Medium</span>
                                        <span>Medium</span>
                                    </div> -->
                                <ul class="about-art-work-top-content">
                                    <li>Media</li>
                                </ul>

                            </div>
                            <div class="col-8">
                                <ul>
                                    <li>{{ $art_work->media }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="about-work-content">
                        <p>
                            {{ $art_work->description }}
                        </p>
                    </div>
                </div>

                
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="about-information">
                    <div class="about-profile">
                        <div class="about-profile-img">
                            <a href="#">
                                <img src="{{ url('/images/artist/profile', $art_work->artist->image) }}" alt="Mohan">
                            </a>
                        </div>
                        <div class="about-profile-btn">
                            <a href="{{ URL::previous() }}">Artist</a>
                        </div>
                        <div class="about-profile-content">
                            <table>
                                <tr>
                                    <td>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td>{{ $art_work->artist->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ $art_work->artist->email }}</td>
                                </tr>
                                @if ($art_work->artist->is_public == 1)
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>{{ $art_work->artist->phone }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><strong>Occupation</strong></td>
                                    <td>Professional Artist</td>
                                </tr>
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- about the work section end  -->


    <!-- filter gallery section start  -->
    {{-- <div class="filter-area bg-area">
    <div class="container">
        <div class="main">
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
</div> --}}
    <!-- filter gallery section end  -->


@endsection


@section('script')
    <script src="{{ asset('assets/artist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/artist/js/jqueryall.2.2.4.js') }}"></script>
    <script src="{{ asset('assets/artist/js/xzoom.min.js') }}"></script>
    <script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection

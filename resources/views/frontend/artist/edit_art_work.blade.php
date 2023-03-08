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

@endsection

@section('content')
<section>
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
                <div class="setting_content bg_default h-100">


                    <h2 class="setting_heading">Art Work</h2>
                    <form action="{{ route('artist.update.artwork', $art_work->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="profile">

                                <div class="form-group text-center img_preview">
                                    @if ($art_work->image)
                                    <img src="{{ url('/images/artist/art_work', $art_work->image) }}" alt="art work">
                                    @else
                                    <img src="{{ asset('assets/frontend/artist/images/avator.png') }}" alt="admin">
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <label for="change_img" class="change_img btn btn-info">Change image</label>
                                    <input name="image" class="d-none" type="file" id="change_img">
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input value="{{$art_work->title}}" type="text" name="title" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input value="{{$art_work->price}}" type="number" name="price" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Media</label>
                                    <div class="col-sm-10">
                                        <input value="{{$art_work->media}}" type="text" name="media" class="form-control" id="">
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-10">
                                        <input value="{{$art_work->year}}" type="date" name="year" class="form-control" id="">
                                    </div>
                                </div>

								<div class="form-group row">
									<label for="address" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
										<textarea class="form-control" name="description" id="address" rows="3">
											{{$art_work->title}}
										</textarea>
                                    </div>
                                </div>

                                

                                <button type="submit" class="btn btn-primary">Next</button>
                                


                            </div>
                            


                        </div>
                    </form>

                    
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
                                <a href="{{ $artist->facebook_url }}"><img src="{{ asset('assets/frontend/artist/images/fb.png') }}" alt="fb"></a>
                                <a href="{{ $artist->twitter_url }}"><img src="{{ asset('assets/frontend/artist/images/tw.png') }}" alt="tw"></a>
                                <a href="{{ $artist->linkedin_url }}"><img src="{{ asset('assets/frontend/artist/images/in.png') }}" alt="in"></a>
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
                    <div class="famous_work">
                        <h4>Famous Works</h4>
                        <img src="{{ asset('assets/frontend/artist/images/demo_imgs.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection


@section('script')

<script src="{{ asset('assets/frontend/artist/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/artist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/artist/js/materialize.min.js') }}"></script>
<script src="{{ asset('assets/frontend/artist/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/artist/js/venobox.min.js') }}"></script>
<script src="{{ asset('assets/frontend/artist/js/custom.js') }}"></script>
@endsection
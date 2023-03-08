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


                    <ul class="nav nav-tabs setting_tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#description" role="tab">description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info" role="tab">Info</a>
                        </li>
                    </ul>
                    <form action="{{ route('artist.update.profile',$artist->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="profile">

                                <div class="form-group text-center img_preview">
                                    @if ($artist->image)
                                    <img src="{{ url('/images/artist/profile', $artist->image) }}" alt="admin" id="multiThmb">
                                    @else
                                    <img src="{{ asset('assets/frontend/artist/images/admin.png') }}"  alt="admin" id="multiThmb">
                                    
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <label for="image" class="change_img btn btn-info">Change image</label>
                                    <input name="image" class="d-none" type="file" id="image" accept=".png, .gif, .jpeg, .jpg" onChange="multiThumUrl(this)">
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Full name</label>
                                    <div class="col-sm-10">
                                        <input  value="{{ $artist->name }}" type="text" name="name" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input  value="{{ $artist->email }}" type="email" name="email" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input readonly value="{{ $artist->phone }}" type="number" name="phone" class="form-control" id="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input  value="{{ $artist->facebook_url }}" type="text" name="facebooklink" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input value="{{ $artist->twitter_url }}" type="text" name="twitterlink" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input value="{{ $artist->linkedin_url }}" type="text" name="linkedinlink" class="form-control" id="">
                                    </div>
                                </div>

                                <a class="nav-link" data-toggle="tab" href="#description" role="tab">
                                    <button type="button" class="btn btn-success">Next</button>
                                </a>


                            </div>
                            <div class="tab-pane fade" id="description">

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3">{{$artist->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="short_bio">Short Biodata</label>
                                    <textarea class="form-control" name="bio" id="short_bio" rows="3">{{$artist->bio }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea class="form-control" name="details" id="details" rows="3">{{ $artist->details}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="theme">Theme</label>
                                    <textarea class="form-control" name="theme" id="theme" rows="3">{{ $artist->theme}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="future_plan">Future Plane</label>
                                    <textarea class="form-control" name="future_plan" rows="3">{{ $artist->future_plan}}</textarea>
                                </div>
                                <a class="nav-link" data-toggle="tab" href="#info" role="tab">
                                    <button type="button" class="btn btn-success">Next</button>
                                </a>

                            </div>
                            <div class="tab-pane fade" id="info">


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Born</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <input value="{{ $artist->dob}}" type="date" name="dob" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Nationality</label>
                                    <div class="col-sm-10">
                                        <input value="{{ $artist->nationality}}"  type="text" name="nationality" class="form-control" placeholder="Nationality" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Education</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $artist->education}}" name="education" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Notable work</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $artist->notable_work}}" name="notable_work" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Awards</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $artist->awards}}" name="awards" class="form-control" id="">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label class="mr-3 col-sm-2 col-form-label">I'm a : </label>
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="gender" id="male"  {{ $artist['gender']== 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="0" name="gender" id="female" {{ $artist['gender']== 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Show number to public : </label>
                                    <div class="col-sm-8 pt-2">
                                        <input type="checkbox" name="is_public" id="" value="1" {{ $artist->is_public == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>

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

<script type="text/javascript">
    function multiThumUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#multiThmb').attr('src', e.target.result).width(80).height(80);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
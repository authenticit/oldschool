@extends('layouts.admin')
@section('title', 'Add Student')
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2><strong>Student</strong> Create </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" id="name"
                                    name="name">
                                @if ($errors->has('name'))
                                    <span id="title_error" style="color: red">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            

                            <div class="form-group form-float">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email"
                                    name="email">
                                @if ($errors->has('email'))
                                    <span id="title_error" style="color: red">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                                @if ($errors->has('bio'))
                                    <span id="title_error" style="color: red">{{ $errors->first('bio') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                            <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="Address" id="address"
                                    name="address">
                                @if ($errors->has('address'))
                                    <span id="title_error" style="color: red">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" placeholder="Phone" id="phone"
                                    name="phone">
                                @if ($errors->has('phone'))
                                    <span id="title_error" style="color: red">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="facebook_url">Facebook Url</label>
                                <input type="text" class="form-control" placeholder="Facebook Url" id="facebook_url"
                                    name="facebook_url">
                                @if ($errors->has('facebook_url'))
                                    <span id="title_error" style="color: red">{{ $errors->first('facebook_url') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="twitter_url">Twitter Url</label>
                                <input type="text" class="form-control" placeholder="Twitter Url" id="twitter_url"
                                    name="twitter_url">
                                @if ($errors->has('twitter_url'))
                                    <span id="title_error" style="color: red">{{ $errors->first('twitter_url') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="linkedin_url">Linkedin Url</label>
                                <input type="text" class="form-control" placeholder="Instagram Url" id="linkedin_url"
                                    name="linkedin_url">
                                @if ($errors->has('linkedin_url'))
                                    <span id="title_error" style="color: red">{{ $errors->first('linkedin_url') }}</span>
                                @endif
                            </div>
                            
                           
                            <div class="form-group form-float mt-2">
                                <label>Image</label>
                                <input type="file" name="image" id="image" data-max-file-size="700K"
                                    data-height="200">
                                <small>Image size must be 825px X 366px</small><br>
                                @if ($errors->has('image'))
                                    <span id="image_error" style="color: red">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                           
                            <div class="form-group form-float">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password"
                                    name="password" required>
                                @if ($errors->has('password'))
                                    <span id="title_error" style="color: red">{{ $errors->first('password') }}</span>
                                @endif
                            </div>


						
                            <button type="submit" name="action_button" id="action_button"
                                class="btn btn-primary waves-effect">Save</button>
                            <button type="button" name="action_button" id="action_button"
                                class="btn btn-primary waves-effect text-white"><a
                                    href="{{ route('student.index') }}">Back</a></button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div id="confirm_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loader-popup" style="display: none;">
                    <img src="{{ url('backend/images/loader.gif') }}">
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Dropify -->
    <script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('#image').dropify();
    </script>
@endsection


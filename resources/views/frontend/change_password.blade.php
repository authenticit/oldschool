@extends('layouts.front')
@section('title', $title)
@section('content')
    <section id="form" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="text-center">Change Password Form </h2>
                            
                        </div>
                        <div class="card-body">

                            <form action="{{ route('change.password.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name">Old Password<span style="color: red">*</span></label>
                                    <input type="password" class="form-control" placeholder="Enter your old password" name="old_password"
                                        id="name">
                                    @if ($errors->has('old_password'))
                                        <small style="color: red">{{ $errors->first('old_password') }}</small>
                                    @endif
                                </div>

								<div class="form-group">
                                    <label for="name">New Password<span style="color: red">*</span></label>
                                    <input type="password" class="form-control" placeholder="Enter your new password" name="new_password"
                                        id="name">
                                    @if ($errors->has('new_password'))
                                        <small style="color: red">{{ $errors->first('new_password') }}</small>
                                    @endif
                                </div>

								{{-- <div class="form-group">
                                    <label for="name">New Password<span style="color: red">*</span></label>
                                    <input type="password" class="form-control" placeholder="Enter your new password" name="confirm_password"
                                        id="name">
                                    @if ($errors->has('confirm_password'))
                                        <small style="color: red">{{ $errors->first('confirm_password') }}</small>
                                    @endif
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#country_id').select2();
        });

        $(document).ready(function() {
            $('#school_id').select2();
        });

        $('.image').dropify();

        @if ($errors->count() > 0)
            $('html, body').animate({
                scrollTop: $('#form').offset().top
            }, 'slow');
        @endif
    </script>
@endsection

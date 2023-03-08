@extends('layouts.account')
@section('title', $title)
@section('content')

    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                <div class="col-lg-12">
                    <div class="main_logo25" id="logo">
                        <a href="index.html"><img src="images/logo.svg" alt=""></a>
                        <a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sign_form">
                        <h2>Sign Up</h2>
                        <p>Sign Up and Start Learning!</p>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="email" value=""
                                        id="id_fullname" required="" placeholder="Phone Number or Email Address">
                                </div>
                            </div>
                            <button class="login-btn" type="submit">Next</button>
                        </form>
                        <p class="sgntrm145">By signing up, you agree to our <a href="{{ route('privacy') }}">Terms of
                                Use</a> and <a href="{{ route('privacy') }}">Privacy Policy</a>.</p>
                        <p class="mb-0 mt-30">Already have an account? <a href="/student/signin">Log In</a></p>
                    </div>
                    <div class="sign_footer"><img src="images/sign_logo.png" alt="">&copy;
                        <script>
                            document.write(/\d{4}/.exec(Date())[0])
                        </script> <strong>Gains School</strong>. All
                        Rights Reserved.
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

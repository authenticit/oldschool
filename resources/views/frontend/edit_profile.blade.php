@extends('layouts.front')
@section('title', $title)
@section('content')
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="setting_tabs">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-account-tab" data-toggle="pill" href="#pills-account"
                                    role="tab" aria-selected="true">Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                            aria-labelledby="pills-account-tab">

                            <form action="{{ route('student-edit-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="account_setting">
                                    <div class="basic_profile">
                                        <div class="basic_ptitle">
                                            <h4>Basic Profile</h4>
                                            <p>Add information about yourself</p>
                                        </div>
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">

                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="name" value="{{ Auth::user()->name }}"
                                                                        id="id[name]" maxlength="64"
                                                                        placeholder="Full Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="email"
                                                                        name="email" id="id[surname]"
                                                                        value="{{ Auth::user()->email }}" maxlength="64"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="number"
                                                                        name="phone" id="id[surname]"
                                                                        value="{{ Auth::user()->phone }}" maxlength="64"
                                                                        placeholder="Phone number">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="address" value="{{ Auth::user()->address }}"
                                                                        id="id_headline" maxlength="60"
                                                                        placeholder="Enter your address">

                                                                </div>
                                                                <div class="help-block">Add a your address</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="bio" id="id_about" placeholder="Write a little description about you...">
																		{{ Auth::user()->bio }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">Links and coupon codes are not
                                                                    permitted in this section.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="divider-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basic_profile1">
                                        <div class="basic_ptitle">
                                            <h4>Profile Links</h4>
                                        </div>
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon labeled input swdh11 swdh31">
                                                                    <div class="ui label lb12">
                                                                        http://facebook.com/
                                                                    </div>
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="facebooklink" id="id_facebook"
                                                                        value="{{ Auth::user()->facebook_url }}"
                                                                        placeholder="Facebook Profile">
                                                                </div>
                                                                <div class="help-block">Add your Facebook username (e.g.
                                                                    johndoe).</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon labeled input swdh11 swdh31">
                                                                    <div class="ui label lb12">
                                                                        http://twitter.com/
                                                                    </div>
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="twitterlink" id="id_twitter"
                                                                        value="{{ Auth::user()->twitter_url }}"
                                                                        placeholder="Twitter Profile">
                                                                </div>
                                                                <div class="help-block">Add your Twitter username (e.g.
                                                                    johndoe).</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon labeled input swdh11 swdh31">
                                                                    <div class="ui label lb12">
                                                                        http://www.linkedin.com/
                                                                    </div>
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="linkedinlink" id="id_linkedin"
                                                                        value="{{ Auth::user()->linkedin_url }}"
                                                                        placeholder="Linkedin Profile">
                                                                </div>
                                                                <div class="help-block">Input your LinkedIn resource id
                                                                    (e.g. in/johndoe).</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="file"
                                                                        name="image" id="id_headline">

                                                                </div>
                                                                <div class="help-block">Add a professional Image
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="save_btn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

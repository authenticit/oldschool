@extends('layouts.front')
@section('title', $title)
@section('content')



		<div class="sa4d25">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="st_title"><i class='uil uil-cog'></i> Setting</h2>
						<div class="setting_tabs">
							<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-account-tab" data-toggle="pill"
										href="#pills-account" role="tab" aria-selected="true">Account</a>
								</li>
							
							</ul>
						</div>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-account" role="tabpanel"
								aria-labelledby="pills-account-tab">

								<form action="{{ route('become-instructor-form') }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('POST')
								<div class="account_setting">
									<h4>Your Cursus Account</h4>
									<p>This is your public presence on Cursus. You need a account to upload your paid
										courses, comment on courses, purchased by students, or earning.</p>
									<div class="basic_profile">
										<div class="basic_ptitle">
											<h4>Basic Profile</h4>
											<p>Add information about yourself</p>
										</div>
										<div class="basic_form">
											<div class="row">
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	
																	<input class="prompt srch_explore" type="text"
																		name="name" value="" id="id[name]"
																		required="" maxlength="64"
																		placeholder="Full Name">
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="email"
																		name="email" id="id[surname]"
																		required="" value="" maxlength="64"
																		placeholder="Email">
																</div>
															</div>
														</div>
														
														<div class="col-lg-6">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="number"
																		name="phone" id="id[surname]"
																		required="" value="" maxlength="64"
																		placeholder="Phone number">
																</div>
															</div>
														</div>

														<div class="col-lg-6">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="password"
																		name="password" id="id[surname]"
																		required="" value="" maxlength="64"
																		placeholder="Phone number">
																</div>
															</div>
														</div>


														
														<div class="col-lg-12">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="text"
																		name="address" value=""
																		id="id_headline" required="" maxlength="60"
																		placeholder="Enter your Address">
																	
																</div>
																<div class="help-block">Add a professional Bio
																	like, "Engineer at Cursus" or "Architect."</div>
															</div>
														</div>
														<div class="col-lg-12">
															<div class="ui search focus mt-30">
																<div class="ui form swdh30">
																	<div class="field">
																		<textarea rows="3" name="bio"
																			id="id_about"
																			placeholder="Write a little description about you...">
																			</textarea>
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
																		name="facebooklink" id="id_facebook" required=""
																		value="" placeholder="Facebook Profile">
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
																		name="twitterlink" id="id_twitter" required=""
																		value="" placeholder="Twitter Profile">
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
																		name="linkedinlink" id="id_linkedin" required=""
																		value="" placeholder="Linkedin Profile">
																</div>
																<div class="help-block">Input your LinkedIn resource id
																	(e.g. in/johndoe).</div>
															</div>
														</div>

														<div class="col-lg-12">
															<div class="ui search focus mt-30">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="file"
																		name="image"
																		id="id_headline"
																		>
																	
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
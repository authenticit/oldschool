@extends('layouts.front')
@section('title', $title)
@section('content')


		<div class="_215b01">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="section3125">
							<div class="row justify-content-center">
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="preview_video">
										<a href="#" class="fcrse_img">
											<img src="{{ url('uploads/images/book', $book->image)}}" alt="">
											
										</a>
									</div>
									
								</div>
								<div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{ $book->name }}</h2>
                                </div>

                                <div class="_215b06">
									<div class="_215b07">
                                        <span><i class='uil uil-comment'></i></span>
                                        {{ $book->bookcategory->name }}
                                    </div>
                                    <div class="_215b08">
                                        <span><i class='uil uil-shop'></i></span>
                                        <span>
                                            Total Enrolled -  Person
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="_215b06">
                                   
                                    <div class="_215b08">
                                        <span><i class='uil uil-comment'></i></span>
                                        <span>Actual Price - ৳
											<s>{{ $book->actual_price }}</s>

                                        </span>
                                    </div>

									<div class="_215b08">
                                        <span><i class='uil uil-comment'></i></span>
                                        <span>Sale Price - ৳{{ $book->sale_price }}

                                        </span>
                                    </div>

                                </div>
                                
                                <ul class="_215b31">
									@if (Auth::check())
                                        <li><button class="btn btn-success text-white"><a class="text-white"
                                                    style="padding: 100px;"
                                                    href="{{ route('book.order.add', $book->id) }}">বই টি কিনুন</a></button></li>
                                    
                                    @else
                                        <li><button class="btn btn-success text-white"><a class="text-white"
                                                    style="padding: 100px;"
                                                    href="{{ route('student-signup') }}">বই টি কিনুন</a></button></li>
                                    @endif
                                </ul>
                                
                            </div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="_215b15 _byt1458">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="user_dt5">
							<div class="user_dt_left">
								
							</div>
							
						</div>
						<div class="course_tabs">
							<nav>
								<div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab"
										href="#nav-about" role="tab" aria-selected="true">Description</a>
									
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="_215b17">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="course_tab_content">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-about" role="tabpanel">
									<div class="_htg451">
										
										<div class="_htg452 mt-35">
											<p>{!! $book->description !!}</p>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	

@endsection
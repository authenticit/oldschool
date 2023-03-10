@extends('layouts.admin')
@section('title', 'Main Categories')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile Page</title>

  <meta name="author" content="Codeconvey" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

  <!--Only for demo purpose - no need to add.-->
  <link rel="stylesheet" href="{% static 'backend/css/demo.css' %}">

  <link rel="stylesheet" href="{% static 'backend/css/style.css' %}">
</head>

<body>

  <div class="main-content">
        <header class="ScriptHeader">
          <div class="rt-container">
            <div class="col-rt-4">
              <div class="rt-heading">
                <h1 class="mt-5 text-center text-dark">Student Details Page</h1>
              </div>
            </div>
          </div>
        </header>

        <section>
          <div class="rt-container">
            <div class="col-rt-12">
              <div class="Scriptcontent">

                <!-- Student Profile -->
                <div class="student-profile py-2">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent text-center">
                         
                             
                        <img class="profile_img" style="width: 4.5em; height: 4.5em;" src="{{ url('uploads/images/student', $student->image) }}"
                            alt="student dp">
                            <h3 class="mt-3">{{$student->name}}</h3>
                          </div>
                        
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-0"></i>General Information</h3>
                          </div>
                          <div class="card-body pt-0">
                            <table class="table table-bordered">
                            
                              <tr>
                                <th width="10%">Name</th>
                                <td width="2%">:</td>
                                <td>{{$student->name}}</td>
                              </tr>
                              
                              <tr>
                                <th width="10%">Phone</th>
                                <td width="2%">:</td>
                                <td>{{$student->phone}}</td>
                              </tr>
                              
                              <tr>
                                <th width="30%">Email</th>
                                <td width="2%">:</td>
                                <td>{{$student->email}}</td>
                              </tr>

                              
                              
                            </table>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <!-- partial -->

              </div>
            </div>
          </div>
        </section>

        <div class="col-rt-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive mt-4">
								<table class="table mb-0">
                    
									<thead>
										<tr>
											<th>#</th>
											<th>Course Title</th>
											<th>Order Id</th>	
										</tr>
									</thead>
									<tbody>
                  @foreach($courses as $c)
										<tr>
											<td>{{$c->course->id}}</td>
											<td>{{$c->course->title}}</td>
											<td>{{$c->order->order_number}}</td>
											
										</tr>
									@endforeach

									</tbody>

									
								</table>





							</div>

						</div>
					</div>
				</div>

     
  
  </div>


  <!-- Analytics -->

</body>

</html>

@endsection
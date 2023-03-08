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
                         
                             
                        <img class="profile_img" src="{{ url('uploads/images/student', $student->image)}}"
                            alt="student dp">
                            <h3 class="mt-3">{{$student->first_name}} {{$student->last_name}}</h3>
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
                                <th width="10%">First Name</th>
                                <td width="2%">:</td>
                                <td>{{$student->first_name}}</td>
                              </tr>
                              <tr>
                                <th width="30%">Last Name </th>
                                <td width="2%">:</td>
                                <td>{{$student->last_name}}</td>
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

     
  
  </div>


  <!-- Analytics -->

</body>

</html>

@endsection
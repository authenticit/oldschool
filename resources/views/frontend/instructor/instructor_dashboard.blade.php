<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ url('/') }}">
    <title>@yield('title', 'Gains School')</title>
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-colorpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/colorpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-iconpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/ruang-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/dropify/css/demo.css') }}">
    @yield('styles')
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="mt-0 navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('instructor.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('assets/images/' . $gs->invoice_logo) }}">
                </div>
            </a>
            @can('dashboard-view')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('instructor.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{ __('Dashboard') }}</span></a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation0"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Course</span>
                </a>
                <div id="activation0" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('instructor.create.course') }}"><i
                                class="fas fa-lock"></i><span> Add Course</span></a>
                        <a class="collapse-item" href="{{ route('instructor.course') }}"><i
                                class="fas fa-lock"></i><span> Course List</span></a>

                        <a class="collapse-item" href="{{ route('instructor.enrolled.course') }}"><i
                            class="fas fa-lock"></i><span> EnrolledCourse </span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#book"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Book</span>
                </a>
                <div id="book" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('instructor.book') }}"><i
                                class="fas fa-lock"></i><span> Book</span></a>

                        <a class="collapse-item" href="{{ route('instructor.book.order') }}"><i
                            class="fas fa-lock"></i><span> Book Orders </span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdraw"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span> Course Withdraw</span>
                </a>
                <div id="withdraw" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('withdraw.complete.list') }}"><i
                            class="fas fa-lock"></i><span> Complete Withdraw</span></a>

                        <a class="collapse-item" href="{{ route('withdraw.instructor.list') }}"><i
                                class="fas fa-lock"></i><span> Pending Withdraw</span></a>

                        <a class="collapse-item" href="{{ route('withdraw.create') }}"><i
                            class="fas fa-lock"></i><span> Withdraw Request </span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course_withdraw"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span> Book Withdraw</span>
                </a>
                <div id="course_withdraw" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('withdraw.complete.book.list') }}"><i
                            class="fas fa-lock"></i><span> Complete Withdraw</span></a>

                        <a class="collapse-item" href="{{ route('withdraw.instructor.book.list') }}"><i
                                class="fas fa-lock"></i><span> Pending Withdraw</span></a>

                        <a class="collapse-item" href="{{ route('withdraw.book.create') }}"><i
                            class="fas fa-lock"></i><span> Withdraw Request </span></a>
                    </div>
                </div>
            </li>

          

      

           
            
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link pr-0" target="_blank" href="">
                                <i class="fas fa-globe fa-fw"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1" onclick="shownotification()">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter" data-href="" id="notclear"></span>
                            </a>
                            {{-- <div id="notf-show" data-href="" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown">
                  @include('load.notification')
              </div> --}}
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/frontend/artist/images/avator.png') }}" style="max-width: 60px">
                                @if (Auth::check())
                                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Change Password') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @yield('content')
                </div>
                <!---Container Fluid-->
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- toastr --}}
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/colorpicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/summernote.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tagify.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sortable.js') }}"></script>
    <script src="{{ asset('assets/admin/js/timepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/ruang-admin.js') }}"></script>
    <script src="{{ asset('assets/backend/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/dropify/dropify.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    @yield('scripts')
</body>

</html>

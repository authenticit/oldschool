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
        <ul class="navbar-nav sidebar sidebar-light accordion mt-0" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('assets/images/' . $gs->invoice_logo) }}">
                </div>
            </a>
            @can('dashboard-view')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{ __('Dashboard') }}</span></a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation0"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Categories</span>
                </a>
                <div id="activation0" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('main-category.index') }}"><i
                                class="fas fa-lock"></i><span> Main Categories</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation00"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Student</span>
                </a>
                <div id="activation00" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('student.create') }}"><i class="fas fa-plus"></i><span>
                                Add Student</span></a>
                        <a class="collapse-item" href="{{ route('student.index') }}"><i class="fas fa-eye"></i><span>
                                View Student</span></a>
                    </div>

                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#instructor"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>{{ __('Manage Instructors') }} @if (DB::table('users')->where('register_id', 0)->where('is_instructor', 1)->count() +
                        DB::table('withdraws')->where('register_id', 0)->where('status', 'pending')->count() >
                        0)
                            <span
                                class="badge badge-sm badge-danger badge-counter">{{ DB::table('users')->where('register_id', 0)->where('is_instructor', 1)->count() +DB::table('withdraws')->where('register_id', 0)->where('status', 'pending')->count() }}</span></span>
                    @endif
                </a>
                <div id="instructor" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('instructor.create') }}">{{ __('Add Instructors') }}</a>
                        <a class="collapse-item"
                            href="{{ route('instructor.index') }}">{{ __('Instructors List') }}</a>
                        <a class="collapse-item" href="{{ route('withdraw.index') }}">{{ __('All Withdraws') }}</a>
                        <a class="collapse-item"
                            href="{{ route('withdraw.reject.list') }}">{{ __('Reject Withdraws') }}</a>

                        <a class="collapse-item" href="{{ route('withdraw.list') }}">{{ __('Course  Request') }}
                            @if (DB::table('withdraws')->where('register_id', 0)->where('status', 'pending')->count() > 0)
                                <span
                                    class="badge badge-sm badge-danger badge-counter">{{ DB::table('withdraws')->where('register_id', 0)->where('status', 'pending')->count() }}</span>
                            @endif
                        </a>

                        <a class="collapse-item" href="{{ route('withdraw.book.list') }}">{{ __('Book  Request') }}
                            @if (DB::table('book_withdraws')->where('register_id', 0)->where('status', 'pending')->count() > 0)
                                <span
                                    class="badge badge-sm badge-danger badge-counter">{{ DB::table('book_withdraws')->where('register_id', 0)->where('status', 'pending')->count() }}</span>
                            @endif
                        </a>

                        <a class="collapse-item"
                            href="{{ route('withdraw.book.index') }}">{{ __('All Book Withdraws') }}</a>
                        <a class="collapse-item"
                            href="{{ route('withdraw.reject.book.list') }}">{{ __('Reject Book Withdraws') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>{{ __('Manage Courses') }}</span></a>
                </a>
                <div id="course" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('course.index') }}">{{ __('Course List') }}</a>
                        <a class="collapse-item" href="{{ route('course.create') }}">{{ __('Add Course') }}</a>



                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#section"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>{{ __('Manage Section') }}</span></a>
                </a>
                <div id="section" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('section.index') }}">{{ __('Section List') }}</a>
                        <a class="collapse-item" href="{{ route('section.create') }}">{{ __('Add Section') }}</a>



                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lesson"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>{{ __('Manage Lesson') }}</span></a>
                </a>
                <div id="lesson" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('lesson.index') }}">{{ __('Lesson List') }}</a>
                        <a class="collapse-item" href="{{ route('lesson.create') }}">{{ __('Add Lesson') }}</a>



                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>{{ __('Manage Orders') }}</span></a>
                </a>
                <div id="order" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item"
                            href="{{ route('purchase.index') }}">{{ __('Order History') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enroll"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>{{ __('Enrolled Course') }}</span></a>
                </a>
                <div id="enroll" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item"
                            href="{{ route('add.enroll.course') }}">{{ __('Add Enrolled') }}</a>

                        <a class="collapse-item"
                            href="{{ route('course.enroll') }}">{{ __('Enrolled Course List') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation10"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Book</span>
                </a>
                <div id="activation10" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('book-category.index') }}"><i
                                class="fas fa-plus"></i><span> Book Category</span></a>
                        <a class="collapse-item" href="{{ route('book.create') }}"><i class="fas fa-plus"></i><span>
                                Add Book</span></a>
                        <a class="collapse-item" href="{{ route('book.index') }}"><i class="fas fa-eye"></i><span>
                                Book List</span></a>
                        <a class="collapse-item" href="{{ route('book.order.index') }}"><i
                                class="fas fa-eye"></i><span>
                                Book Order List</span></a>

                    </div>

                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation12"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Manage Blog</span>
                </a>
                <div id="activation12" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('blog-category.index') }}"><i
                                class="fas fa-plus"></i><span> Blog Category</span></a>
                        <a class="collapse-item" href="{{ route('blog.create') }}"><i class="fas fa-plus"></i><span>
                                Add Post</span></a>
                        <a class="collapse-item" href="{{ route('blog.index') }}"><i class="fas fa-eye"></i><span>
                                Post List</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation2"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Art Work</span>
                </a>
                <div id="activation2" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('artworks.index') }}"><span>All ArtWorks</span></a>
                        <a class="collapse-item"
                            href="{{ route('art-categories.index') }}"><span>Categories</span></a>
                        <a class="collapse-item" href="{{ route('art-categories.create') }}"><span>Create
                                Categories</span></a>
                        <a class="collapse-item" href="{{ route('medium.index') }}"><span>Medium</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation3"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Artist</span>
                </a>
                <div id="activation3" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('artist.index') }}"><i
                                class="fas fa-lock"></i><span> List </span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation4"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Exhibitor</span>
                </a>
                <div id="activation4" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('exhibitor.index') }}"><span>Approve
                                Registrations</span></a>
                        <a class="collapse-item" href="{{ route('exhibitor.pending') }}"><span>Pending
                                Registrations</span></a>
                        <a class="collapse-item" href="{{ route('category.index') }}"><span>Exhibition's
                                Category</span></a>
                        <a class="collapse-item" href="{{ route('school.index') }}"><span>Exhibition's
                                School</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation5"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-globe"></i>
                    <span>Exhibition</span>
                </a>
                <div id="activation5" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('exhibition.index') }}"><span>Exhibition</span></a>
                        <a class="collapse-item" href="{{ route('gallery.index') }}"><span>Gallery</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation6"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>General Settings</span>
                </a>
                <div id="activation6" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('general-setting.logo') }}"><span>Logo</span></a>
                        <a class="collapse-item"
                            href="{{ route('general-setting.favicon') }}"><span>Favicon</span></a>
                        <a class="collapse-item" href="{{ route('general-setting.breadcrumb') }}"><span>Breadcrumb
                                Banner</span></a>
                        <a class="collapse-item" href="{{ route('general-setting.contents') }}"><span>Website
                                Contents</span></a>
                        <a class="collapse-item" href="{{ route('general-setting.certificate') }}"><span>Website
                                Certificate</span></a>
                        <a class="collapse-item" href="{{ route('general-setting.error') }}"><span>Error
                                Banner</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home-page"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home Page Settings</span>
                </a>
                <div id="home-page" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('page-setting.hero-section') }}">Hero Section</a>
                        <a class="collapse-item" href="{{ route('page-setting.hero-section') }}">Service Section</a>
                        <a class="collapse-item" href="{{ route('page-setting.instructor-section') }}">Instructor
                            Section</a>
                        <a class="collapse-item" href="{{ route('page-setting.faq-section') }}">Faq Section</a>
                        <a class="collapse-item" href="{{ route('page-setting.news-letter-section') }}">Newsletter
                            Section</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Menu Page Settings</span>
                </a>
                <div id="menu" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('page-setting.contact') }}">Contact Us Page</a>
                        <a class="collapse-item" href="{{ route('page.index') }}">Other Pages</a>
                        <a class="collapse-item" href="{{ route('faq.index') }}">Faq</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_gateways"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Payment Settings</span>
                </a>
                <div id="payment_gateways" class="collapse" aria-labelledby="headingTable"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('payment.info') }}">Payment Informations</a>
                        <a class="collapse-item" href="{{ route('currency.index') }}">Currencies</a>
                        <a class="collapse-item" href="{{ route('payment.index') }}">Payment Gateways</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('seo.index') }}">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>SEO Settings</span>
                </a>
            </li>

            @can('role-management')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#activation1"
                        aria-expanded="true" aria-controls="collapseTable">
                        <i class="fas fa-fw fa-users-cog"></i>
                        <span>Role Management</span>
                    </a>
                    <div id="activation1" class="collapse" aria-labelledby="headingTable"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('permission-list')
                                <a class="collapse-item" href="{{ route('permissions.index') }}"><i
                                        class="fas fa-lock"></i><span>Permissions</span></a>
                            @endcan
                            @can('role-list')
                                <a class="collapse-item" href="{{ route('roles.index') }}"><i
                                        class="fas fa-lock"></i><span>Roles</span></a>
                            @endcan
                            @can('user-list')
                                <a class="collapse-item" href="{{ route('users.index') }}"><i
                                        class="fas fa-lock"></i><span>Users</span></a>
                            @endcan
                        </div>
                    </div>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>{{ __('Manage Staff') }}</span></a>
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
                                    src="{{ Auth::user()->photo ? asset('assets/images/admins/' . Auth::user()->photo) : asset('assets/images/noimage.png') }}"
                                    style="max-width: 60px">
                                <span
                                    class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
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

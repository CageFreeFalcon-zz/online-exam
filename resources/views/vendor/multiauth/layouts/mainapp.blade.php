<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Exam Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pretty-checkbox/3.0.0/pretty-checkbox.min.css">
    <link type="text/css" href="{{asset('css/argon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
</head>

<body>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('admin.home') }}">
            <h1 class="text-primary mb-0">Online Exam</h1>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button">
                    <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle bg-white">
                                <i class="ni ni-circle-08 text-pink ni-2x"></i>
                            </span>
                    </div>
                </a>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-9 collapse-brand">
                        <a href="{{ route('admin.home') }}">
                            <h1 class="text-primary">Online Exam</h1>
                        </a>
                    </div>
                    <div class="col-3 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <i class="ni ni-planet text-blue"></i> Category
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('question.index') }}">
                        <i class="fab fa-quora text-orange" aria-hidden="true"></i> Questions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.marks') }}">
                        <i class="ni ni-single-02 text-yellow"></i> Marks Obtained
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.password.change') }}">
                        <i class="fa fa-retweet text-red" aria-hidden="true"></i> Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.show') }}">
                        <i class="ni ni-circle-08 text-pink"></i> Admins
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/logout"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-key text-info"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-content">
    <!-- main nav bar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark bg-gradient-blue" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <h4 class="h2 mb-0 text-white text-uppercase d-none d-md-inline-block">@yield('nav_head')</h4>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button">
                        <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle bg-transparent">
                                    <i class="ni ni-circle-08 text-pink"style="font-size: 2.5rem"></i>
                                </span>
                            <div class="media-body ml-2">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth('admin')->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- main content -->
    <div class="container-fluid pt-7">
        @yield('content')
    </div>
</div>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
{{--bootstrap--}}
<script src="{{asset('js/app.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('js/argon.min.js')}}"></script>
@yield('script')
</body>

</html>
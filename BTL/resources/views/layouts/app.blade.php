<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Đăng kí tài khoản</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class=" container ">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class="material-icons">home</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                            style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">THEO DÕI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">LỊCH SỬ </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    THỂ LOẠI
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="#">Cổ Đại </a></li>
                                    <li><a class="dropdown-item" href="#">Cận đại </a></li>
                                    <li><a class="dropdown-item" href="#">Hiện đại </a></li>

                                    <li><a class="dropdown-item" href="#">Tương lai</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">TÌM TRUYỆN </a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i
                                    class="material-icons">search</i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">



            <h3 color=#2980b9>Đề Cử </h3>
            <div class="owl-carousel owl-theme mt-5">

                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption" style="color : while">
                        <h3> <a href=" https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('public/uploads/sach/fdsf.jpg')}}" alt="">
                    <div class="slide-caption">
                        <h3> <a href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong-11989"
                                title="Tinh Giáp Hồn Tướng"> Tinh Giáp Hồn Tướng </a> </h3> <a
                            href="https://nettruyenaa.com/truyen-tranh/tinh-giap-hon-tuong/chapter-219/220"
                            title="Chapter 219"> Chapter 219 </a> <span class="time"><i class="fa fa-clock-o"></i> 6
                            ngày trước </span>
                    </div>
                </div>
            </div>
            <h3>Đề Cử </h3>
            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix" style=" "> <span class=" pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="https://cmnvymn.com/nettruyen/thumb/tinh-giap-hon-tuong.jpg"
                                    alt="Card image cap">
                                <div class="view clearfix">
                                    <span class="pull-left">
                                        <i class="fa fa-eye"></i> 0 <i class="fa fa-comment"></i> 0
                                        <i class="fa fa-heart"></i> 59 </span>
                                </div>
                                <div class="card-body">
                                    <h3><a class="nav-link" href="#">NAME</a></h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <ul style="list-style-type: none;">
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                                <li>
                                                    <h5><a class="nav-link" href="#">Chap 3</a></h5>
                                                </li>
                                            </ul>
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




            <main class="py-4">
                @yield('content')
            </main>
        </div>


        <script src="{{asset('resources/js/app.js')}}" defer></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script src="{{asset('/Js/owl.carousel.js')}}"></script>



        <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,

            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        </script>

</body>

</html>
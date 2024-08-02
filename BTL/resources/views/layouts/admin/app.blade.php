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

    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="/css/adminApp.css" rel="stylesheet">
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li @php
            if (isset($isDashboard)) {
                echo 'class='.'"active"';
            } @endphp>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <!-- Icon Dashboard -->
                    <span>Dashboard</span>
                </a>
            </li>
            <li @php
            if (isset($isCategory)) {
                echo 'class='.'"active"';
            } @endphp>
                <a href={{ route('category.index') }}>
                    <i class="fas fa-list"></i> <!-- Icon Category -->
                    <span>Danh mục</span>
                </a>
            </li>
            <li @php
            if (isset($isBook)) {
                echo 'class='.'"active"';
            } @endphp>
                <a href={{ route('book.index') }}>
                    <i class="fas fa-book"></i> <!-- Icon Book -->
                    <span>Sách</span>
                </a>
            </li>
            <li @php
            if (isset($isChapter)) {
                echo 'class='.'"active"';
            } @endphp>
                <a href={{ route('chapter.index') }}>
                    <i class="fas fa-file-alt"></i> <!-- Icon Chapter -->
                    <span>Chương</span>
                </a>
            </li>
            <li @php
            if (isset($isAccount)) {
                echo 'class='.'"active"';
            } @endphp>
                <a href={{ route('account.index') }}>
                    <i class="fas fa-user"></i> <!-- Icon Account -->
                    <span>Tài khoản</span>
                </a>
            </li>
            <li class="logout">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> <!-- Icon Logout -->
                    <span>Đăng xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>{{ $title }}</h2>
            </div>
            <div class="user-info">
                <div class="img"></div>
                <div>{{ Auth::user()->name }}</div>
            </div>
        </div>

        @yield('content')
    </div>

</body>

</html>

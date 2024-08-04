<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Trang Web Đọc Truyện</h1>
        <nav>
            <a href="/">Trang Chủ</a>
            <a href="/the-loai">Thể Loại</a>
            <a href="/truyen-moi">Truyện Mới</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Trang Web Đọc Truyện. All rights reserved.</p>
    </footer>
</body>
</html>
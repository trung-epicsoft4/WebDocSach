@extends('layouts.admin.app')

@section('content')
<div class="container tabular--wrapper">
    <a href="{{ route('book.create') }}" class='btn btn-primary' style="margin-bottom: 10px;">Thêm sách</a>

    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Mã sách</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng chương</th>
                            <th scope="col">Số người xem</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $key => $book)
                                <tr>
                                    <th scope="row">{{ $book['id'] }}</th>
                                    <td>{{ $book['title'] }}</td>
                                    <td><img src="{{ asset('public/uploads/sach/'.$book['image']) }}" alt="" width="50px" height="50px"></td>
                                    <td>{{ $book->chapters()->count() }}</td>
                                    <td>{{ $book->views()->distinct('bookID')->count('bookID') }}</td>
                                    <td>
                                        @if($book['activate'] == 0)
                                            <span class='text text-success'>Kích hoạt</span>
                                        @else
                                            <span class='text text-danger'>Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('book.edit', ['book' => $book['id']]) }}" class='btn btn-primary'>Sửa</a>
                                        <form action="{{ route('book.destroy', ['book' => $book['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @CSRF
                                            <button class='btn btn-danger' onclick="return confirm('Bạn có chắc chắn muốn xoá sách này không?');">Xoá</button>
                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.adminNav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật sách</div>
                
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                    <form method="POST" action="{{ route('book.update', [$book['id']])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                          <input type="text" class="form-control" value="{{ $book['title'] }}" name="title" placeholder="Tên sách...">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tac gia</label>
                          <input type="text" class="form-control" value="{{ $book['author'] }}" name="author" placeholder="Tác giả...">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nam xuat ban</label>
                          <input type="text" class="form-control" value="{{ $book['year'] }}" name="year" placeholder="Nam xuat ban...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục sách</label>
                            <select class="form-select" aria-label="Default select example" name="categoryID" value="{{ $book['categoryID'] }}">
                                @foreach ($danhSachDanhMuc as $danhmuc )
                                    <option value="{{ $danhmuc['id'] }}">{{ $danhmuc['name'] }}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả sách</label>
                            <textarea id="" class="form-control" name="description" value="{{ $book['description'] }}"></textarea>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                          <input type="file" class="form-control" name="image" accept="image/*">
                          <img src="{{ asset('public/uploads/sach/'.$book['image']) }}" alt="" width="50px" height="50px">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="activate" value="{{ $book['activate'] }}">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="themsach" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

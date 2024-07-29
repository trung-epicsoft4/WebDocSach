@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cap nhat sách</div>
                
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
                        
                    <form method="POST" action="{{ route('sach.update', [$sach['id']])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                          <input type="text" class="form-control" value="{{ $sach['TenSach'] }}" name="tensach" placeholder="Tên sách...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả sách</label>
                            <textarea id="" class="form-control" name="motasach" value="{{ $sach['MoTa'] }}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục sách</label>
                            <select class="form-select" aria-label="Default select example" name="danhmucsach" value="{{ $sach['DanhMucID'] }}">
                                @foreach ($danhSachDanhMuc as $danhmuc )
                                    <option value="{{ $danhmuc['id'] }}">{{ $danhmuc['TenDanhMuc'] }}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                          <input type="file" class="form-control" name="hinhanh" accept="image/*">
                          <img src="{{ asset('public/uploads/sach/'.$sach['HinhAnh']) }}" alt="">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">File sách</label>
                          <input type="file" class="form-control" name="filesach">
                          <iframe src="{{ asset('public/uploads/sach/'.$sach['FileSach']) }}"></iframe>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat" value="{{ $sach['KichHoat'] }}">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="themsach" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

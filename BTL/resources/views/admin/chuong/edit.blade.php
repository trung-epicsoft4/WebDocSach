@extends('layouts.app')

@section('content')
@include('layouts.adminNav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chuong</div>
                
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
                        
                    <form method="POST" action="{{ route('chuong.update', [$chuong['id']])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tiêu đề chương</label>
                          <input type="text" class="form-control" value="{{ $chuong['TieuDe'] }}" name="tieude" placeholder="Tiêu đề chương...">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Chương số</label>
                          <input type="text" class="form-control" value="{{ $chuong['SoChuong'] }}" name="chuongso" placeholder="Chương số...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                            <textarea id="" class="form-control" name="noidung" value="{{ $chuong['NoiDung'] }}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc sách</label>
                            <select class="form-select" aria-label="Default select example" name="sachID" value="{{ $chuong['SachID'] }}">
                                @foreach ($listSach as $sach )
                                    <option value="{{ $sach['id'] }}">{{ $sach['TenSach'] }}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <button type="submit" name="suasach" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

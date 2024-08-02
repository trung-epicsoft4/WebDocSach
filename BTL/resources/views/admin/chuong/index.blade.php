@extends('layouts.app')

@section('content')
@include('layouts.adminNav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liệt kê chương</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="get" action="{{ route('chuong.index') }}">
                        @method('GET')
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Sách</label>
                            <select class="form-select" aria-label="Default select example" name="sachID" value="{{ $sachID }}">
                                @foreach ($listSach as $sach )
                                    <option value="{{ $sach['id'] }}">{{ $sach['TenSach'] }}</option>
                                @endforeach                                
                            </select>

                            <button type="submit" class='btn btn-primary'>Loc</button>
                        </div>
                    </form>
                    <a href="{{ route('chuong.index') }}" class='btn btn-danger'>Xoa loc</a>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Mã chương</th>
                            <th scope="col">Sách</th>
                            <th scope="col">Chương số</th>
                            <th scope="col">Tiêu đề chương</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($danhSachChuong as $key => $chuong)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $chuong['SachID'] }}</td>
                                    <td>{{ $chuong['SoChuong'] }}</td>
                                    <td>{{ $chuong['TieuDe'] }}</td>
                                    <td>
                                        <a href="{{ route('chuong.edit', ['chuong' => $chuong['id']]) }}" class='btn btn-primary'>Sửa</a>
                                        <form action="{{ route('chuong.destroy', ['chuong' => $chuong['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @CSRF
                                            <button class='btn btn-danger' onclick="return confirm('Bạn có chắc chắn muốn xoá chương này không?');">Xoá</button>
                            
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

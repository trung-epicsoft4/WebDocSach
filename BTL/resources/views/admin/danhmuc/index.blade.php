@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liet ke danh muc</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Ma danh muc</th>
                            <th scope="col">Ten danh muc</th>
                            <th scope="col">Mo ta</th>
                            <th scope="col">Kich hoat</th>
                            <th scope="col">Quan ly</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($danhSachDanhMuc as $key => $danhMuc)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $danhMuc['TenDanhMuc'] }}</td>
                                    <td>{{ $danhMuc['MoTa'] }}</td>
                                    <td>
                                        @if($danhMuc['KichHoat'] == 0)
                                            <span class='text text-success'>Kich hoat</span>
                                        @else
                                            <span class='text text-danger'>Khong kich hoat</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('danhmuc.edit', ['danhmuc' => $danhMuc['id']]) }}" class='btn btn-primary'>Sua</a>
                                        <form action="{{ route('danhmuc.destroy', ['danhmuc' => $danhMuc['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @CSRF
                                            <button class='btn btn-danger' onclick="return confirm('Ban co chac chan muon xoa danh muc nay khong?');">Xoa</button>
                            
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

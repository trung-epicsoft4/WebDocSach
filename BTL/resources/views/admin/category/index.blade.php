@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.adminNav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liệt kê danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Mã danh mục</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ $category['id'] }}</th>
                                    <td>{{ $category['name'] }}</td>
                                    <td>
                                        @if($category['activate'] == 0)
                                            <span class='text text-success'>Kích hoạt</span>
                                        @else
                                            <span class='text text-danger'>Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', ['category' => $category['id']]) }}" class='btn btn-primary'>Sửa</a>
                                        <form action="{{ route('category.destroy', ['category' => $category['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @CSRF
                                            <button class='btn btn-danger' onclick="return confirm('Bạn có chắc chắn muốn xoá danh mục này không?');">Xoá</button>
                            
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

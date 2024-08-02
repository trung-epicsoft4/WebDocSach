@extends('layouts.admin.app')

@section('content')
<div class="container tabular--wrapper">
    <a href="{{ route('account.create') }}" class='btn btn-primary' style="margin-bottom: 10px;">Tạo tài khoản</a>
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $user['id'] }}</th>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['role'] == 'admin' ? 'Người quản trị' : 'Người đọc'}}</td>
                                    <td>
                                        <a href="{{ route('account.edit', ['account' => $user['id']]) }}" class='btn btn-primary'>Sửa</a>
                                        <form action="{{ route('account.destroy', ['account' => $user['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @CSRF
                                            <button class='btn btn-danger' onclick="return confirm('Bạn có chắc chắn muốn xoá tài khoản này không?');">Xoá</button>
                            
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

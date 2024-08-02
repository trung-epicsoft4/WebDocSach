@extends('layouts.admin.app')

@section('content')
<div class="container tabular--wrapper">
    <a href="{{ route('category.index') }}" class='btn btn-primary' style="margin-bottom: 10px;">Quay lại</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
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
                        
                    <form method="POST" action="{{ route('category.store') }}">
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Ten danh muc...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="activate" value="{{ old('activate') }}">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Them danh muc</div>
                
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
                        
                    <form method="POST" action="{{ route('danhmuc.store') }}">
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Ten danh muc</label>
                          <input type="text" class="form-control" value="{{ old('tendanhmuc') }}" name="tendanhmuc" placeholder="Ten danh muc...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mo ta danh muc</label>
                            <input type="text" class="form-control" value="{{ old('tendanhmuc') }}" name="motadanhmuc" placeholder="Mo ta danh muc...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kich hoat</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat" value="{{ __old('tendanhmuc') }}">
                                <option value="0">Kich hoat</option>
                                <option value="1">Khong kich hoat</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Them</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>1234</h1>
                </div>

                <div class="card-body"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('stories.create') }}" class="btn btn-primary">Thêm Truyện Mới</a>
                    </div>

                    <h3>Danh Sách Truyện</h3>
                    <ul class="list-group">
                        @foreach($stories as $story)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $story->title }}
                                <span>
                                    <a href="{{ route('stories.edit', $story->id) }}" class="btn btn-sm btn-warning">Chỉnh sửa</a>
                                    <form action="{{ route('stories.destroy', $story->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

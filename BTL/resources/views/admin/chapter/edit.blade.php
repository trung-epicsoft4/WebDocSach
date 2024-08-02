@extends('layouts.admin.app')

@section('content')
<div class="container tabular--wrapper">
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
                        
                    <form method="POST" action="{{ route('chapter.update', [$chapter['id']])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @CSRF
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tiêu đề chương</label>
                          <input type="text" class="form-control" value="{{ $chapter['title'] }}" name="title" placeholder="Tiêu đề chương...">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Chương số</label>
                          <input type="text" class="form-control" value="{{ $chapter['order'] }}" name="order" placeholder="Chương số...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                            <textarea id="" class="form-control" name="content" value="{{ $chapter['content'] }}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc sách</label>
                            <select class="form-select" aria-label="Default select example" name="bookID" value="{{ $chapter['bookID'] }}">
                                @foreach ($books as $book )
                                    <option value="{{ $book['id'] }}">{{ $book['title'] }}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <button type="submit" name="updateChapter" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

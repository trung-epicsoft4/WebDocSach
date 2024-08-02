@extends('layouts.admin.app')

@section('content')
<div class="container tabular--wrapper">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="get" action="{{ route('chapter.index') }}">
                        @method('GET')
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Sách</label>
                            <select class="form-select" aria-label="Default select example" name="bookID" value="{{ $bookID }}">
                                @foreach ($books as $book )
                                    <option value="{{ $book['id'] }}">{{ $book['title'] }}</option>
                                @endforeach                                
                            </select>

                            <button type="submit" class='btn btn-primary'>Loc</button>
                        </div>
                    </form>
                    <a href="{{ route('chapter.index') }}" class='btn btn-danger'>Xoa loc</a>

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
                            @foreach($chapters as $key => $chapter)
                                <tr>
                                    <th scope="row">{{ $chapter['id'] }}</th>
                                    <td>{{ $chapter['bookID'] }}</td>
                                    <td>{{ $chapter['order'] }}</td>
                                    <td>{{ $chapter['title'] }}</td>
                                    <td>
                                        <a href="{{ route('chapter.edit', ['chapter' => $chapter['id']]) }}" class='btn btn-primary'>Sửa</a>
                                        <form action="{{ route('chapter.destroy', ['chapter' => $chapter['id']]) }}" method="POST">
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

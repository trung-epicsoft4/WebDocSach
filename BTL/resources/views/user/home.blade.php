@extends('layouts.app')

@section('content')
@include('layouts.user.nav')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">




                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="col-sm-4 copyright">
                        <h4 style="font-size:20px;margin-bottom:5px">Miễn trừ trách nhiệm</h4>
                        <p>Trang web này cung cấp nội dung truyện tranh chỉ với mục đích giải trí và<b> không chịu trách
                                nhiệm </b>về bất kỳ nội dung quảng cáo, liên kết của bên thứ ba hiển thị trên trang web
                            của chúng tôi.</p>
                        <p>Tất cả thông tin và hình ảnh trên website đều được thu thập từ internet. Chúng tôi không chịu
                            trách nhiệm về bất kỳ nội dung nào. Nếu bạn hoặc tổ chức của bạn có vấn đề gì liên quan đến
                            nội dung hiển thị trên website, vui lòng liên hệ với chúng tôi để được giải quyết.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
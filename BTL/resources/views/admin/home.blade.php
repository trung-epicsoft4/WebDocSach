@extends('layouts.admin.app')
@section('content')
    @include('layouts.admin.adminNav')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <!-- Users Card -->
                        <div class="col">
                            <div class="card radius-20 border-start border-0 border-3 border-info"
                                style="background-color: white; border-radius: 10px;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Số lượng người dùng</p>
                                            <h4 class="my-1 text-info">{{ $userdata['number'] }}</h4>
                                            <p class="mb-0 font-13">+{{ $userdata['change'] }}% from last week</p>
                                        </div>
                                        <div
                                            class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto icon-hidden">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Books Card -->
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-danger"
                                style="background-color: white; border-radius: 10px">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Số lượng sách</p>
                                            <h4 class="my-1 text-danger">{{ $bookdata['books']->count() }}</h4>
                                            <p class="mb-0 font-13">+5.4% from last week</p>
                                        </div>
                                        <div
                                            class="widgets-icons-2 rounded-circle bg-gradient-danger text-white ms-auto icon-hidden">
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories Card -->
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-success"
                                style="background-color: white; border-radius: 10px">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Số lượng danh mục</p>
                                            <h4 class="my-1 text-success">{{ $categorydata['categories']->count() }}</h4>
                                            <p class="mb-0 font-13">-4.5% from last week</p>
                                        </div>
                                        <div
                                            class="widgets-icons-2 rounded-circle bg-gradient-success text-white ms-auto icon-hidden">
                                            <i class="fa fa-tags"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

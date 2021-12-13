@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 style="display: flex;flex-wrap: wrap;justify-content: center;">
                                    <span>{{number_format($total_bill)}} </span> <span>&ensp;VND</span>
                                </h3>
                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('admin.order.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$total_product}}</h3>

                                <p>Sản phẩm đang bán</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('admin.products.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$count_bill}}</h3>

                                <p>Tổng đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('admin.order.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$count_with_status[0] ?? 0}}</h3>

                                <p>Đơn hàng đang chờ</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{route('admin.order.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <section class="col-lg-5 connectedSortable">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin các đơn đặt hàng</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(0,$count_with_status) ? $count_with_status[0] : 0 }}</b> đơn hàng đang chờ xử lý</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(1,$count_with_status) ? $count_with_status[1] : 0 }}</b> đơn hàng đang báo giá</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(2,$count_with_status) ? $count_with_status[2] : 0 }}</b> đơn hàng đã báo giá</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(3,$count_with_status) ? $count_with_status[3] : 0 }}</b> đơn hàng đang giao hàng</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(4,$count_with_status) ? $count_with_status[4] : 0 }}</b> đơn hàng đã thanh toán</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(5,$count_with_status) ? $count_with_status[5] : 0 }}</b> đơn hàng chưa thanh toán</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(6,$count_with_status) ? $count_with_status[6] : 0 }}</b> đơn hàng thành công</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="product-info">
                                        <span><b>{{array_key_exists(7,$count_with_status) ? $count_with_status[7] : 0 }}</b> đơn hàng đã huỷ</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{route('admin.order.index')}}" class="uppercase">Xem tất cả đơn hàng</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    </section>
                    <!-- /.card -->
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Sales
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                    <!-- /.Left col -->
                </div>
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Đơn đặt hàng mới nhất</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i = 0; @endphp
                                    @foreach($list_bill as $bill)
                                     <tr>
                                         <td>{{ ++$i }}</td>
                                        <td><a href="{{route('admin.order.detail',$bill->code_name)}}">#{{$bill->code}}</a></td>
                                         <td>{{$bill->name}}</td>
                                         <td>{{number_format($bill->total)}} VND</td>
                                        <td>{!! \App\Helpers\Helper::getStatusBillInDashboard($bill->status) !!}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('admin.order.index')}}" class="btn btn-sm btn-secondary float-right">Xem tất cả đơn đặt hàng</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    </section>
                </div>
                <!--  PRODUCT LIST  -->
                <div class="row">
                    <div class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm được thêm gần đây</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($list_new_product as $product)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset($product->image)}}" alt="Product image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('products.detail', $product->slug)}}" class="product-title">{{$product->name}}
                                        </div>
                                    </li>
                                    @endforeach
                                    <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{route('admin.products.index')}}" class="uppercase">Xem tất cả sản phẩm</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('stylesheets')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('manage/dist/css/adminlte.min.css') }}">
@endpush

@push('scripts')
    <script src="{{asset('manage/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('manage/dist/js/pages/dashboard.js') }}"></script>
@endpush

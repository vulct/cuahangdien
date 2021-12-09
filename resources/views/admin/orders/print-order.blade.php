<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$info->name ?? config('app.name')}} | In Hoá Đơn #{{$order->code}}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('manage/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 class="page-header">
                    <i class="fas fa-globe"></i> {{$info->name ?? config('app.name')}}
                    <small class="float-right">Date: {{date('d/m/Y', strtotime(now()->today()))}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>{{$info->name ?? config('app.name')}}</strong><br>
                    {{$info->address ?? "#"}}<br>
                    Phone: {{$info->phone ?? "#"}}<br>
                    Email: {{$info->email ?? "#"}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{$order->name}}</strong><br>
                    {{\App\Helpers\Helper::getFullAddress($order->address,$order->province,$order->city)}}<br>
                    Phone: {{$order->phone}}<br>
                    Email: {{$order->email}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Hoá đơn #{{$order->code}}</b><br>
                <br>
                <b>Mã hoá đơn:</b> {{$order->code_name}}<br>
                <b>Ngày tạo:</b> {{date('d/m/Y', strtotime($order->created_at))}}<br>
                <b>Ngày cập nhật:</b> {{date('d/m/Y', strtotime($order->updated_at))}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Hãng</th>
                        <th>Giá list</th>
                        <th>CK(%)</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tạm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($order->items)
                        @foreach($order->items as $item)
                            @php
                                $i = 1;
                                $attribute = $item->product_attribute;
                                $product = $item->product_attribute->product;
                            @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$attribute->codename}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{number_format($attribute->price)}}</td>
                                <td>{{$item->discount}}%</td>
                                <td>{{number_format($item->price)}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->price * $item->quantity)}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Phương thức vận chuyển:</p>
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    {{$order->shipping->name}} <br/>
                </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Tổng giá trị sản phẩm:</th>
                            <td>{{number_format($order->total)}}</td>
                        </tr>
                        <tr>
                            <th>Chi phí vận chuyển:</th>
                            <td>(chưa tính)</td>
                        </tr>
                        <tr>
                            <th>Tổng giá trị đơn hàng:</th>
                            <td>{{number_format($order->total)}} (VNĐ)</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
    window.addEventListener("load", window.print());
</script>
</body>
</html>

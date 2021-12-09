@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hoá đơn <b>#{{$order->code}}</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hoá đơn</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Trang này đã được cải tiến để in. Bấm vào nút in ở cuối hóa đơn để kiểm tra.
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> {{$info->name ?? config('app.name')}}
                                    <small class="float-right">Date: {{date('d/m/Y', strtotime(now()->today()))}}</small>
                                </h4>
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

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{route('admin.order.print',$order->code_name)}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <form id="order-pdf" action="{{route('admin.pdf')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="code_name" value="{{$order->code_name}}">
                                    <button id="order-pdf__action" type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Tạo PDF
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('scripts')
    <script>
        let frm = $('#order-pdf');
        let btn = $('#order-pdf__action');
        btn.on("click", function (e) {
            e.preventDefault();
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (response) {
                    let blob = new Blob([response]);
                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'Hoá đơn #' + '{{$order->code}}' + '-' + '{{config('app.url')}}' + '.pdf';
                    link.click();
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });

        });
    </script>
@endpush

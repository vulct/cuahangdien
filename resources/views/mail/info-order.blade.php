<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail</title>
</head>
<body>
<div id="mail">
    <table class="mail-table">
        <tbody>
        <tr>
            <td align="center">
                <table border="0">
                    <tbody>
                    <tr style="background-color: #fff;">
                        <td align="left" height="auto" style="padding: 15px;" width="100%">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <h1>
                                            Cảm ơn bạn đã gửi yêu cầu nhận báo giá trên trang
                                            <a href="{{config('app.url')}}">{{config('app.url')}}</a>
                                        </h1>
                                        <p style="margin: 4px 0;">
                                            <span>{{$info->name ?? config('app.name')}}</span>
                                            rất vui thông báo báo giá #{{$order->code}} của bạn đã được tiếp nhận và đang trong quá trình xử lý. Chúng tôi sẽ thông báo đến bạn đơn hàng chính xác ngay khi nhận được đơn hàng (trong vòng 24 giờ).
                                            <br>
                                            Dưới đây là thông tin sản phẩm bạn đã chọn báo giá.
                                        </p>
                                        <h3 style="font-size: 13px; margin: 20px 0 0 0; border-bottom: 1px solid #ddd; text-transform: uppercase; color: #f8ad0d;">
                                            THÔNG TIN ĐƠN HÀNG #{{$order->code}}
                                            <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Ngày {{\App\Helpers\Helper::getDateTime($order->created_at)}} {{date('g:i A',strtotime($order->created_at))}}</span>
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th align="left" style="padding: 6px 9px 0 9px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; font-weight: bold;" width="50%">Thông tin khách hàng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="padding: 5px 9px 9px 9px; border-top: 0; border-left: 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px; font-weight: normal;" valign="top">
                                                    <span style="text-transform: capitalize;">{{$order->name}}</span><br />
                                                    <a href="mailto:{{$order->email}}" target="_blank"></a>
                                                    <a href="mailto:{{$order->email}}" target="_blank">{{$order->email}}</a><br />
                                                    ĐT: <a href="tel:{{$order->phone}}" target="_blank"></a>{{$order->phone}}<br />
                                                    ĐC: {{\App\Helpers\Helper::getFullAddress($order->address, $order->province, $order->city)}}<br />

                                                    <span>Ghi chú: {{$order->description}}</span><br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px 9px 0 9px;">
                                                    <a
                                                        href="{{route('tracuu.code').'?code='.$order->code_name}}"
                                                        style="background: #eaa414; color: #fff; padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 13px;"
                                                        target="_blank"
                                                    >
                                                        Xem thông tin đơn hàng
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 style="text-align: left; margin: 10px 0; border-bottom: 1px solid #ddd; padding-bottom: 5px; font-size: 13px; color: #f8ad0d;">DANH SÁCH SẢN PHẨM</h2>

                                        <table border="0" cellpadding="0" cellspacing="0" style="background: #f5f5f5;" width="100%">
                                            <thead>
                                            <tr>
                                                <th align="center" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">STT</th>
                                                <th align="left" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Hình</th>
                                                <th align="left" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Tên hàng</th>
                                                <th align="left" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Mã hàng</th>
                                                <th align="left" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Hãng</th>
                                                <th align="right" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Giá list</th>
                                                <th align="left" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">CK(%)</th>
                                                <th align="right" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">Đơn giá</th>
                                                <th align="center" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px;">SL</th>
                                                <th align="right" bgcolor="#eaa414" style="padding: 10px 9px; color: #fff; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14px; width: 80px;">Tổng tạm</th>
                                            </tr>
                                            </thead>
                                            <tbody bgcolor="#eee" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px;">
                                            @if($order->items)
                                                @foreach($order->items as $item)
                                                    @php
                                                        $i = 1;
                                                        $attribute = $item->product_attribute;
                                                        $product = $item->product_attribute->product;
                                                    @endphp
                                                    @php $image = $product->image ?? $product->image_01 ?? $product->image_02 @endphp
                                                    <tr>
                                                <td align="center" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{$i++}}</span></td>
                                                <td align="left" style="padding: 0; vertical-align: middle;">
                                                    <div style="width: 50px; height: 50px;">
                                                        <img
                                                            src="{{asset($image)}}"
                                                            style="display: block; width: 100%;margin-left: auto; margin-right: auto;"
                                                            alt="{{$product->name}}"
                                                        />
                                                    </div>
                                                </td>
                                                <td align="left" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{$product->name}}</span></td>
                                                <td align="left" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{$attribute->codename}}</span></td>
                                                <td align="center" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{$product->brand->name}}</span></td>
                                                <td align="right" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{number_format($attribute->price)}}</span></td>
                                                <td align="center" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{$item->discount}}%</span></td>
                                                <td align="right" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{number_format($item->price)}}</span></td>
                                                <td align="center" style="padding: 3px 9px; vertical-align: middle;" valign="top">{{$item->quantity}}</td>
                                                <td align="right" style="padding: 3px 9px; vertical-align: middle;" valign="top"><span>{{number_format($item->price * $item->quantity)}}</span></td>
                                            </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px;">
                                            <tr>
                                                <td align="right" colspan="9" style="padding: 5px 9px;">Tổng giá trị sản phẩm</td>
                                                <td align="right" style="padding: 5px 9px;">{{number_format($order->total)}}</td>
                                            </tr>

                                            <tr>
                                                <td align="right" colspan="9" style="padding: 5px 9px;">Chi phí vận chuyển</td>
                                                <td align="right" style="padding: 5px 9px;">
                                                    <span><i>(chưa tính)</i></span>
                                                </td>
                                            </tr>
                                            <tr bgcolor="#eee">
                                                <td align="right" colspan="9" style="padding: 7px 9px;">
                                                    <strong>
                                                        <big>Tổng giá trị đơn hàng</big>
                                                    </strong>
                                                </td>
                                                <td align="right" style="padding: 7px 9px;">
                                                    <strong>
                                                        <big>
                                                            <span>(VND) {{number_format($order->total)}}</span>
                                                        </big>
                                                    </strong>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: red; line-height: 18px; font-weight: bold;">
                                            Chú ý: GIÁ và CHIẾT KHẤU có thể chưa được cập nhật mới nhất. Chúng tôi sẽ thông báo lại chính xác.
                                        </p>
                                        <br />
                                        <p style="margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px; font-weight: normal;">
                                            Trường hợp bạn có thắc mắc về đơn hàng có thể xem thêm mục
                                            <a
                                                href="{{route('contact')}}"
                                                target="_blank"
                                            >
                                                <strong>Liên hệ</strong>.
                                            </a>
                                        </p>
                                        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px; font-weight: normal; border: 1px #14ade5 dashed; padding: 5px; list-style-type: none;">
                                            Báo giá sẽ được xử lý trong vòng 24 giờ. <br />
                                            Chúng tôi sẽ gửi email xác nhận lại hoặc gọi điện xác nhận trước khi đơn hàng được giao.
                                        </p>
                                        <p style="margin: 10px 0 0 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #444; line-height: 18px; font-weight: normal;">
                                            Bạn cần được hỗ trợ ngay? Chỉ cần email <a href="mailto:{{$info->email ?? '#'}}" style="color: #f8ad0d; text-decoration: none;" target="_blank">{{$info->email ?? '#'}}</a>, hoặc gọi số điện thoại
                                            <strong style="color: #f8ad0d;">{{$info->hotline1 ?? 'hotline'}}</strong> (8 đến 21 giờ từ T2 đến T7). Chúng tôi luôn sẵn sàng hỗ trợ bạn bất kỳ lúc nào.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 0; padding: 0; line-height: 18px; color: #444; font-weight: bold;">Cảm ơn bạn.</p>
                                        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(68, 68, 68); line-height: 18px; font-weight: normal;">
                                            <strong>
                                                <a style="text-decoration: none; font-size: 14px;">{{config('app.url')}}</a>
                                            </strong>
                                        </p>
                                    </td>
                                </tr>
                                <table style="width: 100%;">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p style="border-top: 1px solid #979797;"></p>
                                            <p style="font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; padding: 0; margin: 0 0 10px;color: #5e5e5e; text-align: center; line-height: 14px; font-size: 11px;">
                                                <b>{{$info->name ?? "#"}}</b>
                                                <br />
                                                <span>Điện thoại:</span> {{$info->hotline1 ?? "#"}} hoặc {{$info->hotline2 ?? "#"}}
                                                <br />
                                                <span>Địa chỉ:</span> {{$info->address ?? "#"}}
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td>
                                            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 0; padding: 0; line-height: 18px; color: #444; font-weight: bold;">Cảm ơn bạn.</p>
                                            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(68, 68, 68); line-height: 18px; font-weight: normal;">
                                                <strong>
                                                    <a style="text-decoration: none; font-size: 14px;">{{config('app.url')}}</a>
                                                </strong>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

<html class="no-js no-touch" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
    <title>Thông tin nhận báo giá</title>
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:description" content="Đơn hàng của bạn trên trang {{config('app.url')}}">
    <link rel="stylesheet" href="{{asset('guest/css/checkout.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('manage/plugins/toastr/toastr.min.css')}}">
    <style>
        .notification {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .35);
            background: #0f9a00;
            color: #fff;
            border-radius: 5px;
            font-size: 17px;
            padding: 10px 12px;
            margin-bottom: 28px;
            position: relative;
            opacity: .8;
            display: block;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('guest/js/shopify_common.js')}}"></script>
</head>
<body class="page--no-banner page--logo-main page--show page--show">
<div class="header">
    <a href="/" title="Trang chủ">{{$info->name ?? config('app.name')}}</a>
</div>
<div class="banner" data-header="">
    <div class="wrap">
        <div class="logo logo--left">
            <h1 class="logo__text">BÁO GIÁ</h1>
        </div>
    </div>
</div>
<button class="order-summary-toggle order-summary-toggle--hide" aria-expanded="true" aria-controls="order-summary"
        data-drawer-toggle="[data-order-summary]">
    <div class="wrap">
        <div class="order-summary-toggle__inner">
            <div class="order-summary-toggle__icon-wrapper">
                <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
                    <path
                        d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle__text order-summary-toggle__text--show">
                <span>Hiển thị chi tiết hàng hóa</span>
                <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown"
                     fill="#000">
                    <path
                        d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle__text order-summary-toggle__text--hide">
                <span>Ẩn chi tiết hàng hóa</span>
                <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown"
                     fill="#000">
                    <path
                        d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
                <span class="total-recap__final-price"></span>
            </div>
        </div>
    </div>
</button>
<div class="content" data-content="">
    <div class="wrap">
        <div class="sidebar" role="complementary">
            <div class="sidebar__header">
                <div class="logo logo--left">
                    <h2 class="logo__text">BÁO GIÁ</h2>
                </div>
            </div>
            <div class="sidebar__content">
                <div id="order-summary" class="order-summary order-summary--is-expanded" data-order-summary="">
                    <h2 class="visually-hidden">Tổng quan giỏ hàng</h2>
                    <div class="order-summary__sections">
                        <div class="order-summary__section order-summary__section--product-list">
                            <div class="order-summary__section__content">
                                <table class="product-table">
                                    <caption class="visually-hidden">Giỏ hàng</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                                    </tr>
                                    </thead>
                                    <tbody data-order-summary-section="line-items">
                                    @foreach($carts as $key => $cart)
                                        @foreach($products as $product)
                                            @if($cart['product'] === $product->id)
                                                @php $image = $product->image ?? $product->image_01 ?? $product->image_02 @endphp
                                                <tr class="product">
                                                    <td class="product__image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail__wrapper">
                                                                <img alt="{{$product->name}}"
                                                                     class="product-thumbnail__image"
                                                                     src="{{asset($image)}}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product__description">
                                                        <span
                                                            class="product__description__name order-summary__emphasis">{{$product->name}}</span>
                                                        <span
                                                            class="product__description__variant order-summary__small-text">
                                                        <span>Mã: </span>{{$cart['code']}}
                                                    </span>
                                                        @if(!empty($cart['type']))
                                                            <span
                                                                class="product__description__variant order-summary__small-text">
                                                        <span>Loại: </span>{{$cart['type']}}
                                                    </span>
                                                        @endif
                                                    </td>
                                                    @php
                                                        $price = $cart['discount'] != 0 ? ($cart['price'] - $cart['price']*$cart['discount']/100)*$cart['qty'] : $cart['price']*$cart['qty'];
                                                    @endphp
                                                    <td class="product__oldprice">
                                                        <div class="cart-item--content-price">
                                                            <span
                                                                class="money money-at">{{number_format($cart['price'])}}</span>
                                                        </div>
                                                        @if($cart['discount'] != 0)
                                                            <div><span
                                                                    class="price-saved">-{{$cart['discount']}}%</span>
                                                            </div>
                                                            <div class="cart-item--content-price">
                                                                <span
                                                                    class="money">{{number_format($cart['price'] - $cart['price']*($cart['discount']/100))}}</span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="product__price">
                                                        <span class="product-thumbnail__quantity"
                                                              aria-hidden="true">×{{$cart['qty']}}</span>
                                                        <span
                                                            class="order-summary__emphasis">{{number_format($price)}}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="order-summary__scroll-indicator" aria-hidden="true">
                                    Kéo xuống để xem thêm
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12">
                                        <path
                                            d="M9.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L4.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="order-summary__section order-summary__section--total-lines"
                             data-order-summary-section="payment-lines">
                            <table class="total-line-table">
                                <caption class="visually-hidden">Giỏ hàng</caption>
                                <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                </tr>
                                </thead>
                                <tbody class="total-line-table__tbody">
                                <tr class="total-line total-line--subtotal">
                                    <th class="total-line__name" scope="row">Tạm tính</th>
                                    <td class="total-line__price">
                                                <span class="order-summary__emphasis">
                                                    <span>VND</span> {{number_format($total)}}
                                                </span>
                                    </td>
                                </tr>


                                </tbody>
                                <tfoot class="total-line-table__footer">
                                <tr class="total-line">
                                    <th class="total-line__name payment-due-label" scope="row">
                                        <span class="payment-due-label__total">Tổng</span>
                                    </th>
                                    <td class="total-line__price payment-due">
                                        <span class="payment-due__currency">VND</span>
                                        <span
                                            class="payment-due__price data-checkout-payment-due-target">{{number_format($total)}}</span>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="visually-hidden" aria-live="polite" aria-atomic="true" role="status">
                                Tổng giá đã được cập nhật:
                                <span class="data-checkout-payment-due-target">{{number_format($total)}} VND</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main" role="main">
            <div class="main__header">
                <a href="/" class="logo logo--left">
                    <h1 class="logo__text">BÁO GIÁ</h1>
                </a>
                <ul class="breadcrumb ">
                    <li class="breadcrumb__item breadcrumb__item--completed">
                        <a class="breadcrumb__link" href="{{route('cart')}}">Bảng giá của tôi</a>
                        <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                            <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"></path>
                        </svg>
                    </li>
                    <li class="breadcrumb__item breadcrumb__item--blank">
                        <span class="breadcrumb__text">Gửi thông tin và nhận báo giá</span>
                    </li>
                </ul>
                <div data-alternative-payments="">
                </div>
            </div>
            <div class="notification">
                <p>BÁO GIÁ: Quý khách hàng để lại thông tin. Chúng tôi sẽ thông báo xác nhận lại thông tin đơn hàng
                    trong vòng 24h làm việc.</p>
            </div>

            <div class="main__content">
                <div class="step" data-step="contact_information">
                    <form novalidate="novalidate" id="edit_checkout" class="edit_checkout animate-floating-labels"
                          action="{{route('checkout.store')}}" accept-charset="UTF-8" method="post">
                        @csrf
                        <div class="step__sections">
                            <div class="section section--contact-information">
                                <div class="section__header">
                                    <div
                                        class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">Email
                                            làm việc</h2>
                                    </div>
                                </div>
                                <div class="section__content" data-section="customer-information"
                                     data-shopify-pay-validate-on-load="false">
                                    <div class="fieldset">
                                        <div class="field field--required">
                                            <div class="field__input-wrapper">
                                                <label class="field__label field__label--visible"
                                                       for="Email">Email</label>
                                                <input autofocus="true" class="field__input" id="Email" name="email"
                                                       placeholder="Địa chỉ Email" type="text"
                                                       value="{{old('email')}}"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="section section--shipping-address">
                                <div class="section__header">
                                    <h2 class="section__title">
                                        Thông tin khách hàng
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <div class="fieldset">
                                        <div class="field field--optional field--half">
                                            <div class="field__input-wrapper">
                                                <label class="field__label field__label--visible" for="name">Họ
                                                    tên</label>
                                                <input autocomplete="fullname" class="field__input" id="name"
                                                       name="name" placeholder="Họ tên" type="text"
                                                       value="{{old('name')}}"/>
                                            </div>
                                        </div>
                                        <div class="field field--required field--half" data-address-field="last_name">
                                            <div class="field__input-wrapper">
                                                <label class="field__label field__label--visible" for="phone">Số điện
                                                    thoại</label>
                                                <input autocomplete="phone" class="field__input" id="phone" name="phone"
                                                       placeholder="Điện thoại" type="text" value="{{old('phone')}}"/>
                                            </div>
                                        </div>
                                        <div class="clearfix" style="clear:both"></div>
                                        <div class="field field--required field--show-floating-label field--half"
                                             data-address-field="city" data-google-places="true">
                                            <div class="field__input-wrapper field__input-wrapper--select">
                                                <label class="field__label field__label--visible" for="CityId">Tỉnh/Thành
                                                    phố</label>
                                                <select size="1" class="field__input field__input--select"
                                                        aria-required="true" name="city" id="CityId" data-default="">
                                                    <option value="---" data-provinces="[]">---</option>
                                                    <option value="79"
                                                            data-provinces="[[&quot;760&quot;,&quot;Quận 1&quot;],[&quot;769&quot;,&quot;Quận 2&quot;],[&quot;770&quot;,&quot;Quận 3&quot;],[&quot;773&quot;,&quot;Quận 4&quot;],[&quot;774&quot;,&quot;Quận 5&quot;],[&quot;775&quot;,&quot;Quận 6&quot;],[&quot;778&quot;,&quot;Quận 7&quot;],[&quot;776&quot;,&quot;Quận 8&quot;],[&quot;763&quot;,&quot;Quận 9&quot;],[&quot;771&quot;,&quot;Quận 10&quot;],[&quot;772&quot;,&quot;Quận 11&quot;],[&quot;761&quot;,&quot;Quận 12&quot;],[&quot;762&quot;,&quot;Thủ Đức&quot;],[&quot;785&quot;,&quot;Bình Chánh&quot;],[&quot;777&quot;,&quot;Bình Tân&quot;],[&quot;765&quot;,&quot;Bình Thạnh&quot;],[&quot;787&quot;,&quot;Cần Giờ&quot;],[&quot;783&quot;,&quot;Củ Chi&quot;],[&quot;764&quot;,&quot;Gò Vấp&quot;],[&quot;784&quot;,&quot;Hóc Môn&quot;],[&quot;786&quot;,&quot;Nhà Bè&quot;],[&quot;768&quot;,&quot;Phú Nhuận&quot;],[&quot;766&quot;,&quot;Tân Bình&quot;],[&quot;767&quot;,&quot;Tân Phú&quot;]]">
                                                        TP. Hồ Chí Minh
                                                    </option>
                                                    <option value="1"
                                                            data-provinces="[[&quot;1&quot;,&quot;Ba Đình&quot;],[&quot;271&quot;,&quot;Ba Vì&quot;],[&quot;5&quot;,&quot;Cầu Giấy&quot;],[&quot;277&quot;,&quot;Chương Mỹ&quot;],[&quot;273&quot;,&quot;Đan Phượng&quot;],[&quot;17&quot;,&quot;Đông Anh&quot;],[&quot;6&quot;,&quot;Đống Đa&quot;],[&quot;18&quot;,&quot;Gia Lâm&quot;],[&quot;268&quot;,&quot;Hà Đông&quot;],[&quot;7&quot;,&quot;Hai Bà Trưng&quot;],[&quot;274&quot;,&quot;Hoài Đức&quot;],[&quot;2&quot;,&quot;Hoàn Kiếm&quot;],[&quot;8&quot;,&quot;Hoàng Mai&quot;],[&quot;4&quot;,&quot;Long Biên&quot;],[&quot;250&quot;,&quot;Mê Linh&quot;],[&quot;282&quot;,&quot;Mỹ Đức&quot;],[&quot;280&quot;,&quot;Phú Xuyên&quot;],[&quot;272&quot;,&quot;Phúc Thọ&quot;],[&quot;275&quot;,&quot;Quốc Oai&quot;],[&quot;16&quot;,&quot;Sóc Sơn&quot;],[&quot;269&quot;,&quot;Sơn Tây&quot;],[&quot;3&quot;,&quot;Tây Hồ&quot;],[&quot;276&quot;,&quot;Thạch Thất&quot;],[&quot;278&quot;,&quot;Thanh Oai&quot;],[&quot;20&quot;,&quot;Thanh Trì&quot;],[&quot;9&quot;,&quot;Thanh Xuân&quot;],[&quot;279&quot;,&quot;Thường Tín&quot;],[&quot;19&quot;,&quot;Từ Liêm&quot;],[&quot;281&quot;,&quot;Ứng Hòa&quot;]]">
                                                        Hà Nội
                                                    </option>
                                                    <option value="48"
                                                            data-provinces="[[&quot;495&quot;,&quot;Cẩm Lệ&quot;],[&quot;492&quot;,&quot;Hải Châu&quot;],[&quot;497&quot;,&quot;Hoà Vang&quot;],[&quot;498&quot;,&quot;Hoàng Sa&quot;],[&quot;490&quot;,&quot;Liên Chiểu&quot;],[&quot;494&quot;,&quot;Ngũ Hành Sơn&quot;],[&quot;493&quot;,&quot;Sơn Trà&quot;],[&quot;491&quot;,&quot;Thanh Khê&quot;]]">
                                                        Đà Nẵng
                                                    </option>
                                                    <option value="31"
                                                            data-provinces="[[&quot;312&quot;,&quot;An Dương&quot;],[&quot;313&quot;,&quot;An Lão&quot;],[&quot;318&quot;,&quot;Bạch Long Vĩ&quot;],[&quot;317&quot;,&quot;Cát Hải&quot;],[&quot;308&quot;,&quot;Đồ Sơn&quot;],[&quot;306&quot;,&quot;Hải An&quot;],[&quot;303&quot;,&quot;Hồng Bàng&quot;],[&quot;307&quot;,&quot;Kiến An&quot;],[&quot;314&quot;,&quot;Kiến Thụy&quot;],[&quot;309&quot;,&quot;Kinh Dương&quot;],[&quot;305&quot;,&quot;Lê Chân&quot;],[&quot;304&quot;,&quot;Ngô Quyền&quot;],[&quot;311&quot;,&quot;Thuỷ Nguyên&quot;],[&quot;315&quot;,&quot;Tiên Lãng&quot;],[&quot;316&quot;,&quot;Vĩnh Bảo&quot;]]">
                                                        Hải Phòng
                                                    </option>
                                                    <option value="92"
                                                            data-provinces="[[&quot;918&quot;,&quot;Bình Thuỷ&quot;],[&quot;919&quot;,&quot;Cái Răng&quot;],[&quot;925&quot;,&quot;Cờ Đỏ&quot;],[&quot;916&quot;,&quot;Ninh Kiều&quot;],[&quot;917&quot;,&quot;Ô Môn&quot;],[&quot;926&quot;,&quot;Phong Điền&quot;],[&quot;927&quot;,&quot;Thới Lai&quot;],[&quot;923&quot;,&quot;Thốt Nốt&quot;],[&quot;924&quot;,&quot;Vĩnh Thạnh&quot;]]">
                                                        Cần Thơ
                                                    </option>
                                                    <option value="89"
                                                            data-provinces="[[&quot;886&quot;,&quot;An Phú&quot;],[&quot;884&quot;,&quot;Châu Đốc&quot;],[&quot;889&quot;,&quot;Châu Phú&quot;],[&quot;892&quot;,&quot;Châu Thành&quot;],[&quot;893&quot;,&quot;Chợ Mới&quot;],[&quot;883&quot;,&quot;Long Xuyên&quot;],[&quot;888&quot;,&quot;Phú Tân&quot;],[&quot;887&quot;,&quot;Tân Châu&quot;],[&quot;894&quot;,&quot;Thoại Sơn&quot;],[&quot;890&quot;,&quot;Tịnh Biên&quot;],[&quot;891&quot;,&quot;Tri Tôn&quot;]]">
                                                        An Giang
                                                    </option>
                                                    <option value="77"
                                                            data-provinces="[[&quot;748&quot;,&quot;Bà Rịa&quot;],[&quot;750&quot;,&quot;Châu Đức&quot;],[&quot;755&quot;,&quot;Côn Đảo&quot;],[&quot;753&quot;,&quot;Đất Đỏ&quot;],[&quot;752&quot;,&quot;Long Điền&quot;],[&quot;754&quot;,&quot;Tân Thành&quot;],[&quot;747&quot;,&quot;Vũng Tầu&quot;],[&quot;751&quot;,&quot;Xuyên Mộc&quot;]]">
                                                        Bà Rịa - Vũng Tàu
                                                    </option>
                                                    <option value="24"
                                                            data-provinces="[[&quot;213&quot;,&quot;Bắc Giang&quot;],[&quot;223&quot;,&quot;Hiệp Hòa&quot;],[&quot;217&quot;,&quot;Lạng Giang&quot;],[&quot;218&quot;,&quot;Lục Nam&quot;],[&quot;219&quot;,&quot;Lục Ngạn&quot;],[&quot;220&quot;,&quot;Sơn Động&quot;],[&quot;216&quot;,&quot;Tân Yên&quot;],[&quot;222&quot;,&quot;Việt Yên&quot;],[&quot;221&quot;,&quot;Yên Dũng&quot;],[&quot;215&quot;,&quot;Yên Thế&quot;]]">
                                                        Bắc Giang
                                                    </option>
                                                    <option value="6"
                                                            data-provinces="[[&quot;61&quot;,&quot;Ba Bể&quot;],[&quot;58&quot;,&quot;Bắc Kạn&quot;],[&quot;63&quot;,&quot;Bạch Thông&quot;],[&quot;64&quot;,&quot;Chợ Đồn&quot;],[&quot;65&quot;,&quot;Chợ Mới&quot;],[&quot;66&quot;,&quot;Na Rì&quot;],[&quot;62&quot;,&quot;Ngân Sơn&quot;],[&quot;60&quot;,&quot;Pác Nặm&quot;]]">
                                                        Bắc Kạn
                                                    </option>
                                                    <option value="95"
                                                            data-provinces="[[&quot;954&quot;,&quot;Bạc Liêu&quot;],[&quot;960&quot;,&quot;Đông Hải&quot;],[&quot;959&quot;,&quot;Giá Rai&quot;],[&quot;961&quot;,&quot;Hoà Bình&quot;],[&quot;956&quot;,&quot;Hồng Dân&quot;],[&quot;957&quot;,&quot;Phước Long&quot;],[&quot;958&quot;,&quot;Vĩnh Lợi&quot;]]">
                                                        Bạc Liêu
                                                    </option>
                                                    <option value="27"
                                                            data-provinces="[[&quot;256&quot;,&quot;Bắc Ninh&quot;],[&quot;263&quot;,&quot;Gia Bình&quot;],[&quot;264&quot;,&quot;Lương Tài&quot;],[&quot;259&quot;,&quot;Quế Võ&quot;],[&quot;262&quot;,&quot;Thuận Thành&quot;],[&quot;260&quot;,&quot;Tiên Du&quot;],[&quot;261&quot;,&quot;Từ Sơn&quot;],[&quot;258&quot;,&quot;Yên Phong&quot;]]">
                                                        Bắc Ninh
                                                    </option>
                                                    <option value="83"
                                                            data-provinces="[[&quot;836&quot;,&quot;Ba Tri&quot;],[&quot;829&quot;,&quot;Bến Tre&quot;],[&quot;835&quot;,&quot;Bình Đại&quot;],[&quot;831&quot;,&quot;Châu Thành&quot;],[&quot;832&quot;,&quot;Chợ Lách&quot;],[&quot;834&quot;,&quot;Giồng Trôm&quot;],[&quot;838&quot;,&quot;Mỏ Cày Bắc&quot;],[&quot;833&quot;,&quot;Mỏ Cày Nam&quot;],[&quot;837&quot;,&quot;Thạnh Phú&quot;]]">
                                                        Bến Tre
                                                    </option>
                                                    <option value="52"
                                                            data-provinces="[[&quot;542&quot;,&quot;An Lão&quot;],[&quot;549&quot;,&quot;An Nhơn&quot;],[&quot;544&quot;,&quot;Hoài Ân&quot;],[&quot;543&quot;,&quot;Hoài Nhơn&quot;],[&quot;548&quot;,&quot;Phù Cát&quot;],[&quot;545&quot;,&quot;Phù Mỹ&quot;],[&quot;540&quot;,&quot;Qui Nhơn&quot;],[&quot;547&quot;,&quot;Tây Sơn&quot;],[&quot;550&quot;,&quot;Tuy Phước&quot;],[&quot;551&quot;,&quot;Vân Canh&quot;],[&quot;546&quot;,&quot;Vĩnh Thạnh&quot;]]">
                                                        Bình Định
                                                    </option>
                                                    <option value="74"
                                                            data-provinces="[[&quot;721&quot;,&quot;Bến Cát&quot;],[&quot;720&quot;,&quot;Dầu Tiếng&quot;],[&quot;724&quot;,&quot;Dĩ An&quot;],[&quot;722&quot;,&quot;Phú Giáo&quot;],[&quot;723&quot;,&quot;Tân Uyên&quot;],[&quot;718&quot;,&quot;Thủ Dầu Một&quot;],[&quot;725&quot;,&quot;Thuận An&quot;]]">
                                                        Bình Dương
                                                    </option>
                                                    <option value="70"
                                                            data-provinces="[[&quot;690&quot;,&quot;Bình Long&quot;],[&quot;696&quot;,&quot;Bù Đăng&quot;],[&quot;693&quot;,&quot;Bù Đốp&quot;],[&quot;691&quot;,&quot;Bù Gia Mập&quot;],[&quot;697&quot;,&quot;Chơn Thành&quot;],[&quot;695&quot;,&quot;Đồng Phù&quot;],[&quot;689&quot;,&quot;Đồng Xoài&quot;],[&quot;694&quot;,&quot;Hớn Quản&quot;],[&quot;692&quot;,&quot;Lộc Ninh&quot;],[&quot;688&quot;,&quot;Phước Long&quot;]]">
                                                        Bình Phước
                                                    </option>
                                                    <option value="60"
                                                            data-provinces="[[&quot;596&quot;,&quot;Bắc Bình&quot;],[&quot;600&quot;,&quot;Đức Linh&quot;],[&quot;601&quot;,&quot;Hàm Tân&quot;],[&quot;597&quot;,&quot;Hàm Thuận Bắc&quot;],[&quot;598&quot;,&quot;Hàm Thuận Nam&quot;],[&quot;594&quot;,&quot;La Gi&quot;],[&quot;593&quot;,&quot;Phan Thiết&quot;],[&quot;602&quot;,&quot;Phú Quí&quot;],[&quot;599&quot;,&quot;Tánh Linh&quot;],[&quot;595&quot;,&quot;Tuy Phong&quot;]]">
                                                        Bình Thuận
                                                    </option>
                                                    <option value="96"
                                                            data-provinces="[[&quot;964&quot;,&quot;Cà Mau&quot;],[&quot;969&quot;,&quot;Cái Nước&quot;],[&quot;970&quot;,&quot;Đầm Dơi&quot;],[&quot;971&quot;,&quot;Năm Căn&quot;],[&quot;973&quot;,&quot;Ngọc Hiển&quot;],[&quot;972&quot;,&quot;Phú Tân&quot;],[&quot;967&quot;,&quot;Thới Bình&quot;],[&quot;968&quot;,&quot;Trần Văn Thời&quot;],[&quot;966&quot;,&quot;U Minh&quot;]]">
                                                        Cà Mau
                                                    </option>
                                                    <option value="4"
                                                            data-provinces="[[&quot;43&quot;,&quot;Bảo Lạc&quot;],[&quot;42&quot;,&quot;Bảo Lâm&quot;],[&quot;40&quot;,&quot;Cao Bằng&quot;],[&quot;48&quot;,&quot;Hạ Lang&quot;],[&quot;45&quot;,&quot;Hà Quảng&quot;],[&quot;51&quot;,&quot;Hoà An&quot;],[&quot;52&quot;,&quot;Nguyên Bình&quot;],[&quot;50&quot;,&quot;Phục Hoà&quot;],[&quot;49&quot;,&quot;Quảng Uyên&quot;],[&quot;53&quot;,&quot;Thạch An&quot;],[&quot;44&quot;,&quot;Thông Nông&quot;],[&quot;46&quot;,&quot;Trà Lĩnh&quot;],[&quot;47&quot;,&quot;Trùng Khánh&quot;]]">
                                                        Cao Bằng
                                                    </option>
                                                    <option value="66"
                                                            data-provinces="[[&quot;647&quot;,&quot;Buôn Đôn&quot;],[&quot;644&quot;,&quot;Buôn Hồ&quot;],[&quot;643&quot;,&quot;Buôn Ma Thuột&quot;],[&quot;657&quot;,&quot;Cư Kuin&quot;],[&quot;648&quot;,&quot;Cư M'gar&quot;],[&quot;645&quot;,&quot;Ea H'leo&quot;],[&quot;651&quot;,&quot;Ea Kar&quot;],[&quot;646&quot;,&quot;Ea Súp&quot;],[&quot;655&quot;,&quot;Krông A Na&quot;],[&quot;653&quot;,&quot;Krông Bông&quot;],[&quot;649&quot;,&quot;Krông Búk&quot;],[&quot;650&quot;,&quot;Krông Năng&quot;],[&quot;654&quot;,&quot;Krông Pắc&quot;],[&quot;656&quot;,&quot;Lắk&quot;],[&quot;652&quot;,&quot;M'đrắk&quot;]]">
                                                        Đắk Lắk
                                                    </option>
                                                    <option value="67"
                                                            data-provinces="[[&quot;662&quot;,&quot;Cư Jút&quot;],[&quot;661&quot;,&quot;Đắk Glong&quot;],[&quot;663&quot;,&quot;Đắk Mil&quot;],[&quot;666&quot;,&quot;Đắk R'lấp&quot;],[&quot;665&quot;,&quot;Đắk Song&quot;],[&quot;660&quot;,&quot;Gia Nghĩa&quot;],[&quot;664&quot;,&quot;Krông Nô&quot;],[&quot;667&quot;,&quot;Tuy Đức&quot;]]">
                                                        Đắk Nông
                                                    </option>
                                                    <option value="11"
                                                            data-provinces="[[&quot;100&quot;,&quot;Điện Biên&quot;],[&quot;101&quot;,&quot;Điện Biên Đông&quot;],[&quot;94&quot;,&quot;Điện Biên Phủ&quot;],[&quot;102&quot;,&quot;Mường Ảng&quot;],[&quot;97&quot;,&quot;Mường Chà&quot;],[&quot;95&quot;,&quot;Mường Lay&quot;],[&quot;96&quot;,&quot;Mường Nhé&quot;],[&quot;98&quot;,&quot;Tủa Chùa&quot;],[&quot;99&quot;,&quot;Tuần Giáo&quot;]]">
                                                        Điện Biên
                                                    </option>
                                                    <option value="75"
                                                            data-provinces="[[&quot;731&quot;,&quot;Biên Hòa&quot;],[&quot;739&quot;,&quot;Cẩm Mỹ&quot;],[&quot;736&quot;,&quot;Định Quán&quot;],[&quot;732&quot;,&quot;Long Khánh&quot;],[&quot;740&quot;,&quot;Long Thành&quot;],[&quot;742&quot;,&quot;Nhơn Trạch&quot;],[&quot;734&quot;,&quot;Tân Phú&quot;],[&quot;738&quot;,&quot;Thống Nhất&quot;],[&quot;737&quot;,&quot;Trảng Bom&quot;],[&quot;735&quot;,&quot;Vĩnh Cửu&quot;],[&quot;741&quot;,&quot;Xuân Lộc&quot;]]">
                                                        Đồng Nai
                                                    </option>
                                                    <option value="87"
                                                            data-provinces="[[&quot;866&quot;,&quot;Cao Lãnh&quot;],[&quot;873&quot;,&quot;Cao Lãnh&quot;],[&quot;877&quot;,&quot;Châu Thành&quot;],[&quot;868&quot;,&quot;Hồng Ngự&quot;],[&quot;870&quot;,&quot;Hồng Ngự&quot;],[&quot;876&quot;,&quot;Lai Vung&quot;],[&quot;875&quot;,&quot;Lấp Vò&quot;],[&quot;867&quot;,&quot;Sa Đéc&quot;],[&quot;871&quot;,&quot;Tam Nông&quot;],[&quot;869&quot;,&quot;Tân Hồng&quot;],[&quot;874&quot;,&quot;Thanh Bình&quot;],[&quot;872&quot;,&quot;Tháp Mười&quot;]]">
                                                        Đồng Tháp
                                                    </option>
                                                    <option value="64"
                                                            data-provinces="[[&quot;623&quot;,&quot;An Khê&quot;],[&quot;624&quot;,&quot;Ayun Pa&quot;],[&quot;627&quot;,&quot;Chư Păh&quot;],[&quot;632&quot;,&quot;Chư Prông&quot;],[&quot;639&quot;,&quot;Chư Pưh&quot;],[&quot;633&quot;,&quot;Chư Sê&quot;],[&quot;626&quot;,&quot;Đăk Đoa&quot;],[&quot;634&quot;,&quot;Đăk Pơ&quot;],[&quot;631&quot;,&quot;Đức Cơ&quot;],[&quot;628&quot;,&quot;Ia Grai&quot;],[&quot;635&quot;,&quot;Ia Pa&quot;],[&quot;625&quot;,&quot;Kbang&quot;],[&quot;630&quot;,&quot;Kông Chro&quot;],[&quot;637&quot;,&quot;Krông Pa&quot;],[&quot;629&quot;,&quot;Mang Yang&quot;],[&quot;638&quot;,&quot;Phú Thiện&quot;],[&quot;622&quot;,&quot;Pleiku&quot;]]">
                                                        Gia Lai
                                                    </option>
                                                    <option value="2"
                                                            data-provinces="[[&quot;31&quot;,&quot;Bắc Mê&quot;],[&quot;34&quot;,&quot;Bắc Quang&quot;],[&quot;26&quot;,&quot;Đồng Văn&quot;],[&quot;24&quot;,&quot;Hà Giang&quot;],[&quot;32&quot;,&quot;Hoàng Su Phì&quot;],[&quot;27&quot;,&quot;Mèo Vạc&quot;],[&quot;29&quot;,&quot;Quản Bạ&quot;],[&quot;35&quot;,&quot;Quang Bình&quot;],[&quot;30&quot;,&quot;Vị Xuyên&quot;],[&quot;33&quot;,&quot;Xín Mần&quot;],[&quot;28&quot;,&quot;Yên Minh&quot;]]">
                                                        Hà Giang
                                                    </option>
                                                    <option value="35"
                                                            data-provinces="[[&quot;352&quot;,&quot;Bình Lục&quot;],[&quot;349&quot;,&quot;Duy Tiên&quot;],[&quot;350&quot;,&quot;Kim Bảng&quot;],[&quot;353&quot;,&quot;Lý Nhân&quot;],[&quot;347&quot;,&quot;Phủ Lý&quot;],[&quot;351&quot;,&quot;Thanh Liêm&quot;]]">
                                                        Hà Nam
                                                    </option>
                                                    <option value="42"
                                                            data-provinces="[[&quot;446&quot;,&quot;Cẩm Xuyên&quot;],[&quot;443&quot;,&quot;Can Lộc&quot;],[&quot;440&quot;,&quot;Đức Thọ&quot;],[&quot;436&quot;,&quot;Hà Tĩnh&quot;],[&quot;437&quot;,&quot;Hồng Lĩnh&quot;],[&quot;444&quot;,&quot;Hương Khê&quot;],[&quot;439&quot;,&quot;Hương Sơn&quot;],[&quot;447&quot;,&quot;Kỳ Anh&quot;],[&quot;448&quot;,&quot;Lộc Hà&quot;],[&quot;442&quot;,&quot;Nghi Xuân&quot;],[&quot;445&quot;,&quot;Thạch Hà&quot;],[&quot;441&quot;,&quot;Vũ Quang&quot;]]">
                                                        Hà Tĩnh
                                                    </option>
                                                    <option value="30"
                                                            data-provinces="[[&quot;296&quot;,&quot;Bình Giang&quot;],[&quot;295&quot;,&quot;Cẩm Giàng&quot;],[&quot;290&quot;,&quot;Chí Linh&quot;],[&quot;297&quot;,&quot;Gia Lộc&quot;],[&quot;288&quot;,&quot;Hải Dương&quot;],[&quot;293&quot;,&quot;Kim Thành&quot;],[&quot;292&quot;,&quot;Kinh Môn&quot;],[&quot;291&quot;,&quot;Nam Sách&quot;],[&quot;299&quot;,&quot;Ninh Giang&quot;],[&quot;294&quot;,&quot;Thanh Hà&quot;],[&quot;300&quot;,&quot;Thanh Miện&quot;],[&quot;298&quot;,&quot;Tứ Kỳ&quot;]]">
                                                        Hải Dương
                                                    </option>
                                                    <option value="93"
                                                            data-provinces="[[&quot;933&quot;,&quot;Châu Thành&quot;],[&quot;932&quot;,&quot;Châu Thành A&quot;],[&quot;936&quot;,&quot;Long Mỹ&quot;],[&quot;931&quot;,&quot;Ngã Bảy&quot;],[&quot;934&quot;,&quot;Phụng Hiệp&quot;],[&quot;930&quot;,&quot;Vị Thanh&quot;],[&quot;935&quot;,&quot;Vị Thuỷ&quot;]]">
                                                        Hậu Giang
                                                    </option>
                                                    <option value="17"
                                                            data-provinces="[[&quot;154&quot;,&quot;Cao Phong&quot;],[&quot;150&quot;,&quot;Đà Bắc&quot;],[&quot;148&quot;,&quot;Hòa Bình&quot;],[&quot;153&quot;,&quot;Kim Bôi&quot;],[&quot;151&quot;,&quot;Kỳ Sơn&quot;],[&quot;157&quot;,&quot;Lạc Sơn&quot;],[&quot;159&quot;,&quot;Lạc Thủy&quot;],[&quot;152&quot;,&quot;Lương Sơn&quot;],[&quot;156&quot;,&quot;Mai Châu&quot;],[&quot;155&quot;,&quot;Tân Lạc&quot;],[&quot;158&quot;,&quot;Yên Thủy&quot;]]">
                                                        Hòa Bình
                                                    </option>
                                                    <option value="33"
                                                            data-provinces="[[&quot;329&quot;,&quot;Ân Thi&quot;],[&quot;323&quot;,&quot;Hưng Yên&quot;],[&quot;330&quot;,&quot;Khoái Châu&quot;],[&quot;331&quot;,&quot;Kim Động&quot;],[&quot;328&quot;,&quot;Mỹ Hào&quot;],[&quot;333&quot;,&quot;Phù Cừ&quot;],[&quot;332&quot;,&quot;Tiên Lữ&quot;],[&quot;326&quot;,&quot;Văn Giang&quot;],[&quot;325&quot;,&quot;Văn Lâm&quot;],[&quot;327&quot;,&quot;Yên Mỹ&quot;]]">
                                                        Hưng Yên
                                                    </option>
                                                    <option value="56"
                                                            data-provinces="[[&quot;570&quot;,&quot;Cam Lâm&quot;],[&quot;569&quot;,&quot;Cam Ranh&quot;],[&quot;574&quot;,&quot;Diên Khánh&quot;],[&quot;575&quot;,&quot;Khánh Sơn&quot;],[&quot;573&quot;,&quot;Khánh Vĩnh&quot;],[&quot;568&quot;,&quot;Nha Trang&quot;],[&quot;572&quot;,&quot;Ninh Hòa&quot;],[&quot;576&quot;,&quot;Trường Sa&quot;],[&quot;571&quot;,&quot;Vạn Ninh&quot;]]">
                                                        Khánh Hòa
                                                    </option>
                                                    <option value="91"
                                                            data-provinces="[[&quot;908&quot;,&quot;An Biên&quot;],[&quot;909&quot;,&quot;An Minh&quot;],[&quot;905&quot;,&quot;Châu Thành&quot;],[&quot;914&quot;,&quot;Giang Thành&quot;],[&quot;906&quot;,&quot;Giồng Giềng&quot;],[&quot;907&quot;,&quot;Gò Quao&quot;],[&quot;900&quot;,&quot;Hà Tiên&quot;],[&quot;903&quot;,&quot;Hòn Đất&quot;],[&quot;912&quot;,&quot;Kiên Hải&quot;],[&quot;902&quot;,&quot;Kiên Lương&quot;],[&quot;911&quot;,&quot;Phú Quốc&quot;],[&quot;899&quot;,&quot;Rạch Giá&quot;],[&quot;904&quot;,&quot;Tân Hiệp&quot;],[&quot;913&quot;,&quot;U Minh Thượng&quot;],[&quot;910&quot;,&quot;Vĩnh Thuận&quot;]]">
                                                        Kiên Giang
                                                    </option>
                                                    <option value="62"
                                                            data-provinces="[[&quot;610&quot;,&quot;Đắk Glei&quot;],[&quot;615&quot;,&quot;Đắk Hà&quot;],[&quot;612&quot;,&quot;Đắk Tô&quot;],[&quot;613&quot;,&quot;Kon Plông&quot;],[&quot;614&quot;,&quot;Kon Rẫy&quot;],[&quot;608&quot;,&quot;Kon Tum&quot;],[&quot;611&quot;,&quot;Ngọc Hồi&quot;],[&quot;616&quot;,&quot;Sa Thầy&quot;],[&quot;617&quot;,&quot;Tu Mơ Rông&quot;]]">
                                                        Kon Tum
                                                    </option>
                                                    <option value="12"
                                                            data-provinces="[[&quot;104&quot;,&quot;Lai Châu&quot;],[&quot;107&quot;,&quot;Mường Tè&quot;],[&quot;109&quot;,&quot;Phong Thổ&quot;],[&quot;108&quot;,&quot;Sìn Hồ&quot;],[&quot;106&quot;,&quot;Tam Đường&quot;],[&quot;111&quot;,&quot;Tân Uyên&quot;],[&quot;110&quot;,&quot;Than Uyên&quot;]]">
                                                        Lai Châu
                                                    </option>
                                                    <option value="68"
                                                            data-provinces="[[&quot;680&quot;,&quot;Bảo Lâm&quot;],[&quot;673&quot;,&quot;Bảo Lộc&quot;],[&quot;683&quot;,&quot;Cát Tiên&quot;],[&quot;681&quot;,&quot;Đạ Huoai&quot;],[&quot;672&quot;,&quot;Đà Lạt&quot;],[&quot;682&quot;,&quot;Đạ Tẻh&quot;],[&quot;674&quot;,&quot;Đam Rông&quot;],[&quot;679&quot;,&quot;Di Linh&quot;],[&quot;677&quot;,&quot;Đơn Dương&quot;],[&quot;678&quot;,&quot;Đức Trọng&quot;],[&quot;675&quot;,&quot;Lạc Dương&quot;],[&quot;676&quot;,&quot;Lâm Hà&quot;]]">
                                                        Lâm Đồng
                                                    </option>
                                                    <option value="20"
                                                            data-provinces="[[&quot;185&quot;,&quot;Bắc Sơn&quot;],[&quot;181&quot;,&quot;Bình Gia&quot;],[&quot;183&quot;,&quot;Cao Lộc&quot;],[&quot;187&quot;,&quot;Chi Lăng&quot;],[&quot;189&quot;,&quot;Đình Lập&quot;],[&quot;186&quot;,&quot;Hữu Lũng&quot;],[&quot;178&quot;,&quot;Lạng Sơn&quot;],[&quot;188&quot;,&quot;Lộc Bình&quot;],[&quot;180&quot;,&quot;Tràng Định&quot;],[&quot;182&quot;,&quot;Văn Lãng&quot;],[&quot;184&quot;,&quot;Văn Quan&quot;]]">
                                                        Lạng Sơn
                                                    </option>
                                                    <option value="10"
                                                            data-provinces="[[&quot;85&quot;,&quot;Bắc Hà&quot;],[&quot;86&quot;,&quot;Bảo Thắng&quot;],[&quot;87&quot;,&quot;Bảo Yên&quot;],[&quot;82&quot;,&quot;Bát Xát&quot;],[&quot;80&quot;,&quot;Lào Cai&quot;],[&quot;83&quot;,&quot;Mường Khương&quot;],[&quot;88&quot;,&quot;Sa Pa&quot;],[&quot;84&quot;,&quot;Si Ma Cai&quot;],[&quot;89&quot;,&quot;Văn Bàn&quot;]]">
                                                        Lào Cai
                                                    </option>
                                                    <option value="80"
                                                            data-provinces="[[&quot;803&quot;,&quot;Bến Lức&quot;],[&quot;806&quot;,&quot;Cần Đước&quot;],[&quot;807&quot;,&quot;Cần Giuộc&quot;],[&quot;808&quot;,&quot;Châu Thành&quot;],[&quot;802&quot;,&quot;Đức Hòa&quot;],[&quot;801&quot;,&quot;Đức Huệ&quot;],[&quot;798&quot;,&quot;Mộc Hóa&quot;],[&quot;794&quot;,&quot;Tân An&quot;],[&quot;796&quot;,&quot;Tân Hưng&quot;],[&quot;799&quot;,&quot;Tân Thạnh&quot;],[&quot;805&quot;,&quot;Tân Trụ&quot;],[&quot;800&quot;,&quot;Thạnh Hóa&quot;],[&quot;804&quot;,&quot;Thủ Thừa&quot;],[&quot;797&quot;,&quot;Vĩnh Hưng&quot;]]">
                                                        Long An
                                                    </option>
                                                    <option value="36"
                                                            data-provinces="[[&quot;365&quot;,&quot;Giao Thủy&quot;],[&quot;366&quot;,&quot;Hải Hậu&quot;],[&quot;358&quot;,&quot;Mỹ Lộc&quot;],[&quot;356&quot;,&quot;Nam Định&quot;],[&quot;362&quot;,&quot;Nam Trực&quot;],[&quot;361&quot;,&quot;Nghĩa Hưng&quot;],[&quot;363&quot;,&quot;Trực Ninh&quot;],[&quot;359&quot;,&quot;Vụ Bản&quot;],[&quot;364&quot;,&quot;Xuân Trường&quot;],[&quot;360&quot;,&quot;Ý Yên&quot;]]">
                                                        Nam Định
                                                    </option>
                                                    <option value="40"
                                                            data-provinces="[[&quot;424&quot;,&quot;Anh Sơn&quot;],[&quot;422&quot;,&quot;Con Cuông&quot;],[&quot;413&quot;,&quot;Cửa Lò&quot;],[&quot;425&quot;,&quot;Diễn Châu&quot;],[&quot;427&quot;,&quot;Đô Lương&quot;],[&quot;431&quot;,&quot;Hưng Nguyên&quot;],[&quot;417&quot;,&quot;Kỳ Sơn&quot;],[&quot;430&quot;,&quot;Nam Đàn&quot;],[&quot;429&quot;,&quot;Nghi Lộc&quot;],[&quot;419&quot;,&quot;Nghĩa Đàn&quot;],[&quot;415&quot;,&quot;Quế Phong&quot;],[&quot;416&quot;,&quot;Quỳ Châu&quot;],[&quot;420&quot;,&quot;Quỳ Hợp&quot;],[&quot;421&quot;,&quot;Quỳnh Lưu&quot;],[&quot;423&quot;,&quot;Tân Kỳ&quot;],[&quot;414&quot;,&quot;Thái Hoà&quot;],[&quot;428&quot;,&quot;Thanh Chương&quot;],[&quot;418&quot;,&quot;Tương Dương&quot;],[&quot;412&quot;,&quot;Vinh&quot;],[&quot;426&quot;,&quot;Yên Thành&quot;]]">
                                                        Nghệ An
                                                    </option>
                                                    <option value="37"
                                                            data-provinces="[[&quot;373&quot;,&quot;Gia Viễn&quot;],[&quot;374&quot;,&quot;Hoa Lư&quot;],[&quot;376&quot;,&quot;Kim Sơn&quot;],[&quot;372&quot;,&quot;Nho Quan&quot;],[&quot;369&quot;,&quot;Ninh Bình&quot;],[&quot;370&quot;,&quot;Tam Điệp&quot;],[&quot;375&quot;,&quot;Yên Khánh&quot;],[&quot;377&quot;,&quot;Yên Mô&quot;]]">
                                                        Ninh Bình
                                                    </option>
                                                    <option value="58"
                                                            data-provinces="[[&quot;584&quot;,&quot;Bác Ái&quot;],[&quot;586&quot;,&quot;Ninh Hải&quot;],[&quot;587&quot;,&quot;Ninh Phước&quot;],[&quot;585&quot;,&quot;Ninh Sơn&quot;],[&quot;582&quot;,&quot;Phan Rang-Tháp Chàm&quot;],[&quot;588&quot;,&quot;Thuận Bắc&quot;],[&quot;589&quot;,&quot;Thuận Nam&quot;]]">
                                                        Ninh Thuận
                                                    </option>
                                                    <option value="25"
                                                            data-provinces="[[&quot;235&quot;,&quot;Cẩm Khê&quot;],[&quot;230&quot;,&quot;Đoan Hùng&quot;],[&quot;231&quot;,&quot;Hạ Hoà&quot;],[&quot;237&quot;,&quot;Lâm Thao&quot;],[&quot;233&quot;,&quot;Phù Ninh&quot;],[&quot;228&quot;,&quot;Phú Thọ&quot;],[&quot;236&quot;,&quot;Tam Nông&quot;],[&quot;240&quot;,&quot;Tân Sơn&quot;],[&quot;232&quot;,&quot;Thanh Ba&quot;],[&quot;238&quot;,&quot;Thanh Sơn&quot;],[&quot;239&quot;,&quot;Thanh Thuỷ&quot;],[&quot;227&quot;,&quot;Việt Trì&quot;],[&quot;234&quot;,&quot;Yên Lập&quot;]]">
                                                        Phú Thọ
                                                    </option>
                                                    <option value="54"
                                                            data-provinces="[[&quot;564&quot;,&quot;Đông Hoà&quot;],[&quot;558&quot;,&quot;Đồng Xuân&quot;],[&quot;563&quot;,&quot;Phú Hoà&quot;],[&quot;560&quot;,&quot;Sơn Hòa&quot;],[&quot;557&quot;,&quot;Sông Cầu&quot;],[&quot;561&quot;,&quot;Sông Hinh&quot;],[&quot;562&quot;,&quot;Tây Hoà&quot;],[&quot;559&quot;,&quot;Tuy An&quot;],[&quot;555&quot;,&quot;Tuy Hòa&quot;]]">
                                                        Phú Yên
                                                    </option>
                                                    <option value="44"
                                                            data-provinces="[[&quot;455&quot;,&quot;Bố Trạch&quot;],[&quot;450&quot;,&quot;Đồng Hới&quot;],[&quot;457&quot;,&quot;Lệ Thủy&quot;],[&quot;452&quot;,&quot;Minh Hóa&quot;],[&quot;456&quot;,&quot;Quảng Ninh&quot;],[&quot;454&quot;,&quot;Quảng Trạch&quot;],[&quot;453&quot;,&quot;Tuyên Hóa&quot;]]">
                                                        Quảng Bình
                                                    </option>
                                                    <option value="49"
                                                            data-provinces="[[&quot;515&quot;,&quot;Bắc Trà My&quot;],[&quot;506&quot;,&quot;Đại Lộc&quot;],[&quot;507&quot;,&quot;Điện Bàn&quot;],[&quot;505&quot;,&quot;Đông Giang&quot;],[&quot;508&quot;,&quot;Duy Xuyên&quot;],[&quot;512&quot;,&quot;Hiệp Đức&quot;],[&quot;503&quot;,&quot;Hội An&quot;],[&quot;510&quot;,&quot;Nam Giang&quot;],[&quot;516&quot;,&quot;Nam Trà My&quot;],[&quot;519&quot;,&quot;Nông Sơn&quot;],[&quot;517&quot;,&quot;Núi Thành&quot;],[&quot;518&quot;,&quot;Phú Ninh&quot;],[&quot;511&quot;,&quot;Phước Sơn&quot;],[&quot;509&quot;,&quot;Quế Sơn&quot;],[&quot;502&quot;,&quot;Tam Kỳ&quot;],[&quot;504&quot;,&quot;Tây Giang&quot;],[&quot;513&quot;,&quot;Thăng Bình&quot;],[&quot;514&quot;,&quot;Tiên Phước&quot;]]">
                                                        Quảng Nam
                                                    </option>
                                                    <option value="51"
                                                            data-provinces="[[&quot;535&quot;,&quot;Ba Tơ&quot;],[&quot;524&quot;,&quot;Bình Sơn&quot;],[&quot;534&quot;,&quot;Đức Phổ&quot;],[&quot;536&quot;,&quot;Lý Sơn&quot;],[&quot;531&quot;,&quot;Minh Long&quot;],[&quot;533&quot;,&quot;Mộ Đức&quot;],[&quot;532&quot;,&quot;Nghĩa Hành&quot;],[&quot;522&quot;,&quot;Quảng Ngãi&quot;],[&quot;529&quot;,&quot;Sơn Hà&quot;],[&quot;530&quot;,&quot;Sơn Tây&quot;],[&quot;527&quot;,&quot;Sơn Tịnh&quot;],[&quot;526&quot;,&quot;Tây Trà&quot;],[&quot;525&quot;,&quot;Trà Bồng&quot;],[&quot;528&quot;,&quot;Tư Nghĩa&quot;]]">
                                                        Quảng Ngãi
                                                    </option>
                                                    <option value="22"
                                                            data-provinces="[[&quot;202&quot;,&quot;Ba Chẽ&quot;],[&quot;198&quot;,&quot;Bình Liêu&quot;],[&quot;195&quot;,&quot;Cẩm Phả&quot;],[&quot;207&quot;,&quot;Cô Tô&quot;],[&quot;200&quot;,&quot;Đầm Hà&quot;],[&quot;205&quot;,&quot;Đông Triều&quot;],[&quot;193&quot;,&quot;Hạ Long&quot;],[&quot;201&quot;,&quot;Hải Hà&quot;],[&quot;204&quot;,&quot;Hoành Bồ&quot;],[&quot;194&quot;,&quot;Móng Cái&quot;],[&quot;199&quot;,&quot;Tiên Yên&quot;],[&quot;196&quot;,&quot;Uông Bí&quot;],[&quot;203&quot;,&quot;Vân Đồn&quot;],[&quot;206&quot;,&quot;Yên Hưng&quot;]]">
                                                        Quảng Ninh
                                                    </option>
                                                    <option value="45"
                                                            data-provinces="[[&quot;468&quot;,&quot;Cam Lộ&quot;],[&quot;471&quot;,&quot;Cồn Cỏ&quot;],[&quot;467&quot;,&quot;Đa Krông&quot;],[&quot;461&quot;,&quot;Đông Hà&quot;],[&quot;466&quot;,&quot;Gio Linh&quot;],[&quot;470&quot;,&quot;Hải Lăng&quot;],[&quot;465&quot;,&quot;Hướng Hóa&quot;],[&quot;462&quot;,&quot;Quảng Trị&quot;],[&quot;469&quot;,&quot;Triệu Phong&quot;],[&quot;464&quot;,&quot;Vĩnh Linh&quot;]]">
                                                        Quảng Trị
                                                    </option>
                                                    <option value="94"
                                                            data-provinces="[[&quot;942&quot;,&quot;Châu Thành&quot;],[&quot;945&quot;,&quot;Cù Lao Dung&quot;],[&quot;943&quot;,&quot;Kế Sách&quot;],[&quot;946&quot;,&quot;Long Phú&quot;],[&quot;944&quot;,&quot;Mỹ Tú&quot;],[&quot;947&quot;,&quot;Mỹ Xuyên&quot;],[&quot;948&quot;,&quot;Ngã Năm&quot;],[&quot;941&quot;,&quot;Sóc Trăng&quot;],[&quot;949&quot;,&quot;Thạnh Trị&quot;],[&quot;951&quot;,&quot;Trần Đề&quot;],[&quot;950&quot;,&quot;Vĩnh Châu&quot;]]">
                                                        Sóc Trăng
                                                    </option>
                                                    <option value="14"
                                                            data-provinces="[[&quot;121&quot;,&quot;Bắc Yên&quot;],[&quot;125&quot;,&quot;Mai Sơn&quot;],[&quot;123&quot;,&quot;Mộc Châu&quot;],[&quot;120&quot;,&quot;Mường La&quot;],[&quot;122&quot;,&quot;Phù Yên&quot;],[&quot;118&quot;,&quot;Quỳnh Nhai&quot;],[&quot;116&quot;,&quot;Sơn La&quot;],[&quot;126&quot;,&quot;Sông Mã&quot;],[&quot;127&quot;,&quot;Sốp Cộp&quot;],[&quot;119&quot;,&quot;Thuận Châu&quot;],[&quot;124&quot;,&quot;Yên Châu&quot;]]">
                                                        Sơn La
                                                    </option>
                                                    <option value="72"
                                                            data-provinces="[[&quot;711&quot;,&quot;Bến Cầu&quot;],[&quot;708&quot;,&quot;Châu Thành&quot;],[&quot;707&quot;,&quot;Dương Minh Châu&quot;],[&quot;710&quot;,&quot;Gò Dầu&quot;],[&quot;709&quot;,&quot;Hòa Thành&quot;],[&quot;705&quot;,&quot;Tân Biên&quot;],[&quot;706&quot;,&quot;Tân Châu&quot;],[&quot;703&quot;,&quot;Tây Ninh&quot;],[&quot;712&quot;,&quot;Trảng Bàng&quot;]]">
                                                        Tây Ninh
                                                    </option>
                                                    <option value="34"
                                                            data-provinces="[[&quot;340&quot;,&quot;Đông Hưng&quot;],[&quot;339&quot;,&quot;Hưng Hà&quot;],[&quot;343&quot;,&quot;Kiến Xương&quot;],[&quot;338&quot;,&quot;Quỳnh Phụ&quot;],[&quot;336&quot;,&quot;Thái Bình&quot;],[&quot;341&quot;,&quot;Thái Thụy&quot;],[&quot;342&quot;,&quot;Tiền Hải&quot;],[&quot;344&quot;,&quot;Vũ Thư&quot;]]">
                                                        Thái Bình
                                                    </option>
                                                    <option value="19"
                                                            data-provinces="[[&quot;171&quot;,&quot;Đại Từ&quot;],[&quot;167&quot;,&quot;Định Hóa&quot;],[&quot;169&quot;,&quot;Đồng Hỷ&quot;],[&quot;172&quot;,&quot;Phổ Yên&quot;],[&quot;173&quot;,&quot;Phú Bình&quot;],[&quot;168&quot;,&quot;Phú Lương&quot;],[&quot;165&quot;,&quot;Sông Công&quot;],[&quot;164&quot;,&quot;Thái Nguyên&quot;],[&quot;170&quot;,&quot;Võ Nhai&quot;]]">
                                                        Thái Nguyên
                                                    </option>
                                                    <option value="38"
                                                            data-provinces="[[&quot;386&quot;,&quot;Bá Thước&quot;],[&quot;381&quot;,&quot;Bỉm Sơn&quot;],[&quot;390&quot;,&quot;Cẩm Thủy&quot;],[&quot;405&quot;,&quot;Đông Sơn&quot;],[&quot;392&quot;,&quot;Hà Trung&quot;],[&quot;400&quot;,&quot;Hậu Lộc&quot;],[&quot;399&quot;,&quot;Hoằng Hóa&quot;],[&quot;388&quot;,&quot;Lang Chánh&quot;],[&quot;384&quot;,&quot;Mường Lát&quot;],[&quot;401&quot;,&quot;Nga Sơn&quot;],[&quot;389&quot;,&quot;Ngọc Lặc&quot;],[&quot;403&quot;,&quot;Như Thanh&quot;],[&quot;402&quot;,&quot;Như Xuân&quot;],[&quot;404&quot;,&quot;Nông Cống&quot;],[&quot;385&quot;,&quot;Quan Hóa&quot;],[&quot;387&quot;,&quot;Quan Sơn&quot;],[&quot;406&quot;,&quot;Quảng Xương&quot;],[&quot;382&quot;,&quot;Sầm Sơn&quot;],[&quot;391&quot;,&quot;Thạch Thành&quot;],[&quot;380&quot;,&quot;Thanh Hóa&quot;],[&quot;398&quot;,&quot;Thiệu Hoá&quot;],[&quot;395&quot;,&quot;Thọ Xuân&quot;],[&quot;396&quot;,&quot;Thường Xuân&quot;],[&quot;407&quot;,&quot;Tĩnh Gia&quot;],[&quot;397&quot;,&quot;Triệu Sơn&quot;],[&quot;393&quot;,&quot;Vĩnh Lộc&quot;],[&quot;394&quot;,&quot;Yên Định&quot;]]">
                                                        Thanh Hóa
                                                    </option>
                                                    <option value="46"
                                                            data-provinces="[[&quot;481&quot;,&quot;A Lưới&quot;],[&quot;474&quot;,&quot;Huế&quot;],[&quot;479&quot;,&quot;Hương Thủy&quot;],[&quot;480&quot;,&quot;Hương Trà&quot;],[&quot;483&quot;,&quot;Nam Đông&quot;],[&quot;476&quot;,&quot;Phong Điền&quot;],[&quot;482&quot;,&quot;Phú Lộc&quot;],[&quot;478&quot;,&quot;Phú Vang&quot;],[&quot;477&quot;,&quot;Quảng Điền&quot;]]">
                                                        Thừa Thiên Huế
                                                    </option>
                                                    <option value="82"
                                                            data-provinces="[[&quot;819&quot;,&quot;Cái Bè&quot;],[&quot;820&quot;,&quot;Cai Lậy&quot;],[&quot;821&quot;,&quot;Châu Thành&quot;],[&quot;822&quot;,&quot;Chợ Gạo&quot;],[&quot;816&quot;,&quot;Gò Công&quot;],[&quot;824&quot;,&quot;Gò Công Đông&quot;],[&quot;823&quot;,&quot;Gò Công Tây&quot;],[&quot;815&quot;,&quot;Mỹ Tho&quot;],[&quot;825&quot;,&quot;Tân Phú Đông&quot;],[&quot;818&quot;,&quot;Tân Phước&quot;]]">
                                                        Tiền Giang
                                                    </option>
                                                    <option value="84"
                                                            data-provinces="[[&quot;844&quot;,&quot;Càng Long&quot;],[&quot;845&quot;,&quot;Cầu Kè&quot;],[&quot;848&quot;,&quot;Cầu Ngang&quot;],[&quot;847&quot;,&quot;Châu Thành&quot;],[&quot;850&quot;,&quot;Duyên Hải&quot;],[&quot;846&quot;,&quot;Tiểu Cần&quot;],[&quot;849&quot;,&quot;Trà Cú&quot;],[&quot;842&quot;,&quot;Trà Vinh&quot;]]">
                                                        Trà Vinh
                                                    </option>
                                                    <option value="8"
                                                            data-provinces="[[&quot;73&quot;,&quot;Chiêm Hóa&quot;],[&quot;74&quot;,&quot;Hàm Yên&quot;],[&quot;72&quot;,&quot;Nà Hang&quot;],[&quot;76&quot;,&quot;Sơn Dương&quot;],[&quot;70&quot;,&quot;Tuyên Quang&quot;],[&quot;75&quot;,&quot;Yên Sơn&quot;]]">
                                                        Tuyên Quang
                                                    </option>
                                                    <option value="86"
                                                            data-provinces="[[&quot;861&quot;,&quot;Bình Minh&quot;],[&quot;863&quot;,&quot;Bình Tân&quot;],[&quot;857&quot;,&quot;Long Hồ&quot;],[&quot;858&quot;,&quot;Mang Thít&quot;],[&quot;860&quot;,&quot;Tam Bình&quot;],[&quot;862&quot;,&quot;Trà Ôn&quot;],[&quot;855&quot;,&quot;Vĩnh Long&quot;],[&quot;859&quot;,&quot;Vũng Liêm&quot;]]">
                                                        Vĩnh Long
                                                    </option>
                                                    <option value="26"
                                                            data-provinces="[[&quot;249&quot;,&quot;Bình Xuyên&quot;],[&quot;246&quot;,&quot;Lập Thạch&quot;],[&quot;244&quot;,&quot;Phúc Yên&quot;],[&quot;253&quot;,&quot;Sông Lô&quot;],[&quot;248&quot;,&quot;Tam Đảo&quot;],[&quot;247&quot;,&quot;Tam Dương&quot;],[&quot;252&quot;,&quot;Vĩnh Tường&quot;],[&quot;243&quot;,&quot;Vĩnh Yên&quot;],[&quot;251&quot;,&quot;Yên Lạc&quot;]]">
                                                        Vĩnh Phúc
                                                    </option>
                                                    <option value="15"
                                                            data-provinces="[[&quot;135&quot;,&quot;Lục Yên&quot;],[&quot;137&quot;,&quot;Mù Cang Chải&quot;],[&quot;133&quot;,&quot;Nghĩa Lộ&quot;],[&quot;139&quot;,&quot;Trạm Tấu&quot;],[&quot;138&quot;,&quot;Trấn Yên&quot;],[&quot;140&quot;,&quot;Văn Chấn&quot;],[&quot;136&quot;,&quot;Văn Yên&quot;],[&quot;132&quot;,&quot;Yên Bái&quot;],[&quot;141&quot;,&quot;Yên Bình&quot;]]">
                                                        Yên Bái
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field field--required field--show-floating-label field--half"
                                             data-address-field="district" data-google-places="true"
                                             id="district_container" style="display:none;">
                                            <div class="field__input-wrapper field__input-wrapper--select">
                                                <label class="field__label field__label--visible" for="DistrictId">Quận
                                                    huyện</label>

                                                <select class="field__input field__input--select" name="province"
                                                        id="DistrictId" data-default="">
                                                    <option value="">--- Quận / Huyện ---</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div data-address-field="address" data-google-places="true"
                                             class="field field--required">
                                            <div class="field__input-wrapper">
                                                <label class="field__label field__label--visible" for="address">Địa
                                                    chỉ</label>
                                                <input autocomplete="address" class="field__input" data-val="true"
                                                       id="address" name="address" placeholder="Địa chỉ" type="text"
                                                       value="{{old('address')}}"/>
                                            </div>
                                        </div>
                                        <div data-address-field="address" data-google-places="true"
                                             class="field field--required">
                                            <div class="field__input-wrapper">
                                                <label class="field__label field__label--visible" for="CustomerNote">Ghi
                                                    chú</label>
                                                <textarea autocomplete="note" class="field__input" cols="20"
                                                          id="CustomerNote" name="description"
                                                          placeholder="Ghi chú cho đơn hàng" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div id="partial-icon-symbols" data-tg-refresh="partial-icon-symbols"
                                             data-tg-refresh-always="true" style="display: none;">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <symbol id="powered-by-google">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116 15">
                                                        <path fill="#a8a8a8"
                                                              d="M4.025 3.572c1.612 0 2.655 1.283 2.655 3.27 0 1.974-1.05 3.27-2.655 3.27-.902 0-1.63-.393-1.974-1.06H1.96v3.057H.95V3.682h.96v1.054h.094c.404-.726 1.16-1.166 2.02-1.166zm-.24 5.63c1.16 0 1.852-.884 1.852-2.36 0-1.477-.692-2.362-1.846-2.362-1.14 0-1.86.91-1.86 2.362 0 1.447.72 2.36 1.856 2.36zm7.072.91c-1.798 0-2.912-1.243-2.912-3.27 0-2.033 1.114-3.27 2.912-3.27 1.8 0 2.913 1.237 2.913 3.27 0 2.027-1.114 3.27-2.913 3.27zm0-.91c1.196 0 1.87-.866 1.87-2.36 0-1.5-.674-2.362-1.87-2.362-1.195 0-1.87.862-1.87 2.362 0 1.494.675 2.36 1.87 2.36zm12.206-5.518H22.05l-1.244 5.05h-.094L19.3 3.684h-.966l-1.412 5.05h-.094l-1.242-5.05h-1.02L16.336 10h1.02l1.406-4.887h.093L20.268 10h1.025l1.77-6.316zm3.632.78c-1.008 0-1.71.737-1.787 1.856h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.9h1.006c-.305 1.085-1.277 1.747-2.66 1.747-1.752 0-2.848-1.263-2.848-3.26 0-1.988 1.113-3.277 2.847-3.277 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zM31.03 10h1.01V6.086c0-.89.696-1.535 1.657-1.535.2 0 .563.037.645.06V3.6c-.13-.018-.34-.03-.504-.03-.838 0-1.565.434-1.752 1.05h-.094v-.938h-.96V10zm6.915-5.537c-1.008 0-1.71.738-1.787 1.857h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.902h1.006c-.304 1.084-1.277 1.746-2.66 1.746-1.752 0-2.848-1.263-2.848-3.26 0-1.988 1.113-3.277 2.847-3.277 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zm5.01 1.746c-1.62 0-2.656-1.28-2.656-3.267 0-1.98 1.05-3.27 2.654-3.27.878 0 1.622.416 1.98 1.108h.087V1.177h1.008V10h-.96V8.992h-.094c-.4.703-1.15 1.12-2.02 1.12zm.233-5.63c-1.15 0-1.846.89-1.846 2.363 0 1.476.69 2.36 1.846 2.36 1.148 0 1.857-.9 1.857-2.36 0-1.447-.714-2.362-1.856-2.362zm7.875-3.116h1.024v3.123c.23-.3.506-.53.826-.688.32-.16.668-.238 1.043-.238.78 0 1.416.27 1.9.806.49.537.73 1.33.73 2.376 0 .992-.24 1.817-.72 2.473-.48.656-1.145.984-1.997.984-.476 0-.88-.115-1.207-.345-.195-.137-.404-.356-.627-.657V10h-.97V1.363zm4.02 7.225c.284-.454.426-1.05.426-1.794 0-.66-.142-1.207-.425-1.64-.283-.434-.7-.65-1.25-.65-.48 0-.9.177-1.264.532-.36.356-.542.942-.542 1.758 0 .59.075 1.068.223 1.435.277.693.795 1.04 1.553 1.04.57 0 .998-.228 1.28-.68zm6.654-4.864h1.166c-.148.402-.478 1.32-.99 2.754-.383 1.077-.703 1.956-.96 2.635-.61 1.602-1.04 2.578-1.29 2.93-.25.35-.68.527-1.29.527-.147 0-.262-.006-.342-.017-.08-.012-.178-.034-.296-.065v-.96c.184.05.317.08.4.093.08.012.153.018.216.018.195 0 .338-.03.43-.095.092-.065.17-.144.232-.237.02-.032.09-.192.21-.48.122-.29.21-.505.264-.645l-2.32-6.457h1.195l1.68 5.11 1.694-5.11z"></path>
                                                        <path
                                                            d="M73.994 5.282V6.87h3.814c-.117.89-.416 1.54-.87 1.998-.557.555-1.427 1.16-2.944 1.16-2.35 0-4.184-1.882-4.184-4.217 0-2.333 1.835-4.216 4.184-4.216 1.264 0 2.192.497 2.873 1.135l1.122-1.117C77.04.697 75.77 0 73.992 0c-3.218 0-5.923 2.606-5.923 5.805 0 3.2 2.706 5.804 5.924 5.804 1.738 0 3.048-.57 4.073-1.627 1.05-1.045 1.382-2.522 1.382-3.71 0-.366-.028-.708-.087-.992h-5.37zm10.222-1.29c-2.082 0-3.78 1.574-3.78 3.748 0 2.154 1.698 3.747 3.78 3.747S87.998 9.9 87.998 7.74c0-2.174-1.7-3.748-3.782-3.748zm0 6.018c-1.14 0-2.127-.935-2.127-2.27 0-1.348.984-2.27 2.125-2.27 1.142 0 2.128.922 2.128 2.27 0 1.335-.986 2.27-2.128 2.27zm18.54-5.18h-.06c-.37-.438-1.083-.838-1.985-.838-1.88 0-3.52 1.632-3.52 3.748 0 2.102 1.64 3.747 3.52 3.747.904 0 1.617-.4 1.987-.852h.06v.523c0 1.432-.773 2.2-2.012 2.2-1.012 0-1.64-.723-1.9-1.336l-1.44.593c.414.994 1.51 2.213 3.34 2.213 1.94 0 3.58-1.135 3.58-3.902v-6.74h-1.57v.645zm-1.9 5.18c-1.144 0-2.013-.968-2.013-2.27 0-1.323.87-2.27 2.01-2.27 1.13 0 2.012.967 2.012 2.282.006 1.31-.882 2.258-2.01 2.258zM92.65 3.992c-2.084 0-3.783 1.574-3.783 3.748 0 2.154 1.7 3.747 3.782 3.747 2.08 0 3.78-1.587 3.78-3.747 0-2.174-1.7-3.748-3.78-3.748zm0 6.018c-1.143 0-2.13-.935-2.13-2.27 0-1.348.987-2.27 2.13-2.27 1.14 0 2.126.922 2.126 2.27 0 1.335-.986 2.27-2.127 2.27zM105.622.155h1.628v11.332h-1.628m6.655-1.477c-.843 0-1.44-.38-1.83-1.135l5.04-2.07-.168-.426c-.313-.84-1.273-2.39-3.226-2.39-1.94 0-3.554 1.517-3.554 3.75 0 2.1 1.596 3.746 3.737 3.746 1.725 0 2.724-1.05 3.14-1.658l-1.285-.852c-.428.62-1.012 1.032-1.855 1.032zm-.117-4.612c.668 0 1.24.342 1.427.826l-3.405 1.4c0-1.574 1.122-2.226 1.978-2.226z"
                                                            fill="#999"></path>
                                                    </svg>
                                                </symbol>
                                                <symbol id="close-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                        <path d="M10.864 5.136l-5.786 5.786m0-5.786l5.786 5.786"
                                                              stroke="#FFF" stroke-width="2"
                                                              stroke-linecap="round"></path>
                                                    </svg>
                                                </symbol>
                                            </svg>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="section section--billing-address" data-billing-address="">
                                <div class="section__header">
                                    <h2 class="section__title">Phương thức vận chuyển</h2>
                                </div>

                                <div class="section__content">
                                    <fieldset class="content-box">
                                        <legend class="visually-hidden">Chọn hình thức vận chuyển</legend>
                                        @foreach($shipping as $method)
                                            <div class="radio-wrapper content-box__row">
                                                <div class="radio__input">
                                                    <input class="input-radio" type="radio" value="{{$method->id}}"
                                                           name="shipping_status" id="ship-{{$method->id}}">
                                                </div>
                                                <label class="radio__label content-box__emphasis"
                                                       for="ship-{{$method->id}}">
                                                    {{$method->name}}<br/>
                                                    @if(!empty($method->description))
                                                        <span class="small-text">{!! $method->description !!}</span>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="step__footer" data-step-footer="">
                            <input name="button" type="submit" id="submit__cart" class="step__footer__continue-btn btn"
                                   aria-busy="false" value="Gửi báo giá đơn hàng này"
                                   onClick="this.disabled=true; this.value='Đang gửi…'; "/>
                            <a class="step__footer__previous-link" href="{{route('cart')}}">
                                <svg
                                    class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon rtl-flip"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                                    <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"></path>
                                </svg>
                                <span class="step__footer__previous-link-content">Quay lại bảng giá</span>
                            </a>
                        </div>
                    </form>
                    <p style="font-style: italic;color: #25ac0d;font-size: 0.94em;margin: 20px 0;">Chúng tôi sẽ liên hệ
                        xác nhận đơn hàng ngay khi nhận được yêu cầu (trong vòng 24h).</p>
                </div>
            </div>
            <div class="main__footer">
                <div class="modals">
                </div>
                <div role="contentinfo" aria-label="Footer">
                    <p class="copyright-text">
                        Bản quyền thuộc về {{$info->name ?? config('app.name')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('guest/scripts/jquery.validate.js')}}"></script>
<script src="{{asset('guest/scripts/jquery.validate.unobtrusive.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('manage/plugins/toastr/toastr.min.js')}}"></script>
<script>
    var el = document.getElementById("CityId");
    if (el) {
        new Shopify.CountryProvinceSelector('CityId', 'DistrictId', {hideElement: 'district_container'});
    }
    $('#district').change(function () {
        var c = document.getElementById("city");
        var address = ' , ' + this.options[this.selectedIndex].text + ', ' + c.options[c.selectedIndex].text;
        $("#Address").val(address);
    });
</script>
<script type="text/javascript">
    let frm = $('#edit_checkout');
    let btn = $('#submit__cart');
    btn.on("click", function (e) {
        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (response) {
                btn.removeAttr("disabled");
                btn.val("Gửi báo giá đơn hàng này");
                if (response.error === false) {
                    toastr.success(response.message);
                    setTimeout(() => {
                        window.location.href = response.url;
                    }, 500);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                btn.removeAttr("disabled");
                btn.val("Gửi báo giá đơn hàng này");
                if (xhr.responseText) {
                    let list_error = JSON.parse(xhr.responseText);
                    $.each(list_error.errors, function (index, value) {
                        toastr.error(value);
                    });
                    if (xhr.status === 419) {
                        toastr.error('Token đã hết hạn. Vui lòng chờ tải lại trang để lấy token mới.');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                }
            }
        });

    });
</script>
</body>
</html>


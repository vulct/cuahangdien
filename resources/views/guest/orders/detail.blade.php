<html class="no-js no-touch" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
    <title>{{$title ?? 'Thông tin đơn hàng'}} - {{preg_replace("(^https?://)", "", config('app.url') )}}</title>
    <link rel="canonical">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:description"
          content="Chú ý: Những ai có liên kết này mới xem được nội dung. Không chia sẻ liên kết với người khác.">
    <link rel="stylesheet" media="all" href="{{asset('guest/css/checkout.css')}}">
    <style>
        @media (min-width: 750px) {
            .section {
                padding-top: 2em;
            }

            .section__header {
                margin-bottom: 0.5em;
            }
        }

        .section {
            position: relative;
            padding-top: 1.2em;
        }

        .section h2 {
            font-size: 0.9em;
            font-weight: bold;
        }

        .content-box__emphasis {
            display: block !important;
            margin-bottom: 4px;
        }

        .content-box__emphasis span {
            font-weight: normal;
        }

        .content-box__emphasis b {
            width: 85px;
            display: inline-block;
        }
    </style>
</head>
<body class="page--no-banner page--logo-main page--show page--show">
<div class="header">
    <a href="{{route('index')}}" title="Trang chủ">{{$info->name ?? config('app.name')}}</a>
</div>
<div class="banner" data-header="">
    <div class="wrap">
        <div class="logo logo--left">
            <h2 class="logo__text">ĐƠN HÀNG: #{{$order->code}}</h2>
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
                <span class="total-recap__final-price" data-checkout-payment-due-target="9100"></span>
            </div>
        </div>
    </div>
</button>
<div class="content" data-content="">

    <div class="wrap">
        <div class="sidebar" role="complementary">
            <div class="sidebar__header">
                <div class="logo logo--left">
                    <h2 class="logo__text">ĐƠN HÀNG: #{{$order->code}}</h2>
                </div>
            </div>
            <div class="sidebar__content">
                <div id="order-summary" class="order-summary order-summary--is-expanded" data-order-summary="">
                    <h2 class="visually-hidden">Tổng quan</h2>
                    <div class="order-summary__sections">
                        <div class="order-summary__section order-summary__section--product-list">
                            <div class="order-summary__section__content">
                                <table class="product-table">
                                    <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($order->items)
                                        @foreach($order->items as $item)
                                        @php
                                            $attribute = $item->product_attribute;
                                            $product = $item->product_attribute->product;
                                        @endphp
                                        <tr class="product">
                                        <td class="product__image">
                                            <div class="product-thumbnail">
                                                <div class="product-thumbnail__wrapper">
                                                    <img alt="{{$product->name}}"
                                                         class="product-thumbnail__image"
                                                         src="{{asset($product->image)}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__description">
                                            <span class="product__description__name order-summary__emphasis">{{$product->name}}</span>
                                            <span
                                                class="product__description__variant order-summary__small-text _1line">
                                                    <span>Mã: </span>{{$attribute->codename}}
                                            </span>
                                            <span
                                                class="product__description__variant order-summary__small-text _1line">
                                                                <span>Hãng: </span>{{$product->brand->name}}
                                            </span>
                                        </td>

                                        <td class="product__oldprice" style="width:90px;">
                                            @if(isset($order->items->discount) && $order->items->discount != 0)
                                            <div class="cart-item--content-price">
                                                <span class="money money-at">{{$attribute->price}}</span>
                                            </div>
                                            <div><span class="price-saved">-{{number_format($item->discount)}}%</span></div>
                                            <div class="cart-item--content-price">
                                                <span class="money">{{number_format($item->price)}}</span>
                                            </div>
                                            @else
                                                <div class="cart-item--content-price">
                                                    <span class="money money-at">{{number_format($item->price)}}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="product__price" style="width:94px;">
                                            <span class="product-thumbnail__quantity" aria-hidden="true">×{{$item->quantity}}</span>
                                            <span class="order-summary__emphasis">{{number_format($item->price * $item->quantity)}}</span>
                                        </td>
                                    </tr>
                                        @endforeach
                                    @endif
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
                                <caption class="visually-hidden">Chi tiết đơn hàng</caption>
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
                                                   <span>VND</span> {{number_format($order->total)}}
                                                </span>
                                    </td>
                                </tr>
                                <tr class="total-line total-line--shipping">
                                    <th class="total-line__name" scope="row">Phí vận chuyển</th>
                                    <td class="total-line__price">
                                                <span class="order-summary__emphasis">
                                                        <i style="font-size: 0.9em;">(thông báo khi xác nhận ĐH nếu có)</i>
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
                                        <span class="payment-due__price">
                                                    {{number_format($order->total)}}
                                                </span>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="visually-hidden" aria-live="polite" aria-atomic="true" role="status">
                                Tổng giá đã được cập nhật:
                                <span>
                                        {{number_format($order->total)}} VND
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="main" role="main">
            <div class="main__header">
                <div class="logo logo--left">
                    <h1 class="logo__text">ĐƠN HÀNG: #{{$order->code}}</h1>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb__item breadcrumb__item--completed">
                        <span class="breadcrumb__text"><a href="{{route('index')}}">Trang chủ</a></span>
                        <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                            <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"></path>
                        </svg>
                    </li>
                    <li class="breadcrumb__item breadcrumb__item--completed">
                        <span class="breadcrumb__text"><a href="{{route('tracuu')}}">Tra cứu Đơn hàng</a></span>
                        <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                            <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"></path>
                        </svg>
                    </li>
                    <li class="breadcrumb__item breadcrumb__item--blank breadcrumb__item--current">
                        <span class="breadcrumb__text" aria-current="step">#{{$order->code}}</span>
                    </li>
                </ul>
                <div data-alternative-payments=""></div>
            </div>
            <div class="main__content">
                <div class="step" data-step="contact_information">
                    <form class="edit_checkout animate-floating-labels">
                        <div class="step__sections">
                            <div class="section section--contact-information">
                                <div class="section__header">
                                    <div
                                        class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">Thông
                                            tin đơn hàng</h2>
                                    </div>
                                </div>
                                <div class="section__content" data-section="customer-information"
                                     style="padding: 0 3px;">
                                    <fieldset class="content-box">
                                        <div class="radio-wrapper content-box__row">
                                            <table class="info">
                                                <tr>
                                                    <td style="width: 120px;">
                                                        <b>Mã ĐH <span class="dot">:</span></b>
                                                    </td>
                                                    <td><span>#{{$order->code}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Trạng thái ĐH <span class="dot">:</span></b>
                                                    </td>
                                                    <td>
                                                        {!! \App\Helpers\Helper::statusOrder($order->status) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Ngày đặt hàng <span class="dot">:</span></b>
                                                    </td>
                                                    <td>
                                                        <span>{{date('d/m/Y h:i', strtotime($order->created_at))}}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </fieldset>
                                </div>
                            </div>

                            <div class="section section--contact-information">
                                <div class="section__header">
                                    <div
                                        class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">Thông
                                            tin khách hàng</h2>
                                    </div>
                                </div>
                                <div class="section__content" data-section="customer-information"
                                     style="padding: 0 3px;">
                                    <fieldset class="content-box">
                                        <div class="radio-wrapper content-box__row">
                                            <table class="info">
                                                <tr>
                                                    <td><b>Họ tên <span class="dot">:</span></b></td>
                                                    <td><span>{{$order->name}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{\App\Helpers\Helper::obfuscate_email($order->email)}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Điện thoại <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{\App\Helpers\Helper::hiddenPhoneNumber($order->phone)}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Địa chỉ <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{\App\Helpers\Helper::getFullAddress($order->address,$order->province,$order->city)}}</span>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="section section--shipping-address" data-shipping-address=""
                                 data-update-order-summary="">
                                <div class="section__header">
                                    <h2 class="section__title">
                                        Thông tin giao hàng
                                    </h2>
                                </div>
                                <div class="section__content" style="padding: 0 3px;">
                                    <fieldset class="content-box">
                                        <div class="radio-wrapper content-box__row">
                                            <table class="info">
                                                <tr>
                                                    <td><b>Người nhận <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{$order->name}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Điện thoại <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{\App\Helpers\Helper::hiddenPhoneNumber($order->phone)}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Địa chỉ <span class="dot">:</span></b></td>
                                                    <td>
                                                        <span>{{\App\Helpers\Helper::getFullAddress($order->address,$order->province,$order->city)}}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="section section--billing-address" data-billing-address="">
                                <div class="section__header">
                                    <h2 class="section__title">Phương thức vận chuyển</h2>
                                </div>
                                <div class="section__content" style="padding: 0 3px;">
                                    <fieldset class="content-box">
                                        <div class="radio-wrapper content-box__row">
                                            <label class="radio__label content-box__emphasis" for="ship-11">
                                                {{$order->shipping->name}} <br/>
                                                @if(!empty($order->shipping->description))
                                                    <span
                                                        class="small-text">{!! $order->shipping->description !!}</span>
                                                @endif
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                        </div>
                        <div class="step__footer" data-step-footer="">
                            <a class="step__footer__previous-link" href="{{route('index')}}">
                                <svg
                                    class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon rtl-flip"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                                    <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"></path>
                                </svg>
                                <span class="step__footer__previous-link-content">Quay lại trang chủ</span>
                            </a>
                        </div>
                    </form>
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
<style>
    .ssuport {
        padding: 8px 8px 4px;
        background: cornsilk;
    }

    .ssuport:before, .ssuport:after {
        content: "";
        clear: both;
        display: block;
    }

    .ssuport img {
        width: 90px;
        float: left;
        margin-right: 15px;
        border-radius: 50%;
    }

    .ssuport .sname {
        font-size: 17px;
        font-weight: bold;
    }

    .ssuport > div {
        font-size: 17px;
    }

    .ssuport > div > div {
        margin-bottom: 5px
    }

    .ssuport > div i {
        font-size: 13px;
    }

    .ssuport > div > div > span {
        width: 50px;
        display: inline-block;
    }
</style>
</body>
</html>

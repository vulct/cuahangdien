@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div id="shopify-section-static-cart" class="shopify-section cart--section">
            @if($carts)
                <form action="{{route('checkout.index')}}" method="get">
                    <header class="cart-title">
                        <div class="cart-title-left">
                            <h1>Sản phẩm đã chọn</h1>
                            <div class="cart-title-total--small"></div>
                        </div>
                        <div class="cart-title-right">
                            <div class="cart-title-total--large">
                                <div class="cart-title-total" data-cart-title-total="">
                                    Tạm tính
                                    <span class="money cart-money-total">{{number_format($total)}} VND</span>
                                </div>
                            </div>
                            <a class="button-primary cart-title-button" href="{{route('checkout.index')}}" aria-label="Checkout">
                                <svg aria-hidden="true" focusable="false" width="28" height="26" viewBox="0 10 28 26" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" fill-rule="evenodd" d="M26.15 14.488L6.977 13.59l-.666-2.661C6.159 10.37 5.704 10 5.127 10H1.213C.547 10 0 10.558 0 11.238c0 .68.547 1.238 1.213 1.238h2.974l3.337 13.249-.82 3.465c-.092.371 0 .774.212 1.053.243.31.576.465.94.465H22.72c.667 0 1.214-.558 1.214-1.239 0-.68-.547-1.238-1.214-1.238H9.434l.333-1.423 12.135-.589c.455-.03.85-.31 1.032-.712l4.247-9.286c.181-.34.151-.774-.06-1.144-.212-.34-.577-.589-.97-.589zM22.297 36c-1.256 0-2.275-1.04-2.275-2.321 0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322c0 1.281-1.02 2.321-2.275 2.321zM10.92 33.679C10.92 34.96 9.9 36 8.646 36 7.39 36 6.37 34.96 6.37 33.679c0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322z"></path>
                                </svg>
                                Báo giá
                            </a>
                        </div>
                    </header>
                    <section class="cartitems--container ">
                        <div class="cartitems">
                            @php $i = 1; @endphp
                            @foreach($carts as $key => $cart)
                                @foreach($products as $product)
                                    @if($cart['product'] === $product->id)
                                        <article class="cart-item" id="cart-item-{{$key}}" data-cartitem-price="{{App\Helpers\Helper::price($cart['price'],$cart['discount'],$cart['qty'])}} VND">
                                            <div class="cart-item--no">{{$i}}.</div>
                                            <figure class="cart-item--image-wrapper">
                                                <a href="{{route('products.detail',$product->slug)}}">
                                                    <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                                                </a>
                                            </figure>
                                            <div class="cart-item--inner">
                                                <div class="cart-item--content">
                                                    <h2 class="cart-item--content-title">
                                                        <a href="{{route('products.detail',$product->slug)}}">
                                                            {{$product->name}}
                                                        </a>
                                                    </h2>
                                                    <div class="cart-item--content-price">
                                                        <span>Mã: </span>
                                                        {{$cart['code']}}
                                                    </div>
                                                    @if(!empty($cart['type']))
                                                    <div class="cart-item--content-info">
                                                        <span>Mẫu: </span>
                                                        {{$cart['type']}}
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="cart-item--info">
                                                    <div class="cart-item--content-price" style="padding-right: 40px;">
                                                        @if($cart['discount'] != 0)
                                                        <del class="money">{{\App\Helpers\Helper::price($cart['price'])}} VND</del><br />
                                                        <span class="money"><b>{{\App\Helpers\Helper::price($cart['price'],$cart['discount'])}} VND</b></span>
                                                        @else
                                                        <span class="money"><b>{{\App\Helpers\Helper::price($cart['price'])}} VND</b></span>
                                                        @endif
                                                    </div>
                                                    <div class="cart-item--quantity form-fields--qty" data-quantity-wrapper="">
                                                        <div class="form-field form-field--qty-select visible">
                                                            <div class="form-field-select-wrapper">
                                                                <input class="form-field-input form-field-select form-field-filled" aria-label="Quantity" id="cart-quantity-{{$key}}" value="{{$cart['qty']}}" onchange="updateItem('{{route('cart.update',$key)}}', {{$key}})">
                                                                <label class="form-field-title">
                                                                    Số lượng
                                                                </label>
                                                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                                                    <g fill="currentColor" fill-rule="evenodd">
                                                                        <polygon class="icon-chevron-down-left" points="4 5.371 7.668 1.606 6.665 .629 4 3.365"></polygon>
                                                                        <polygon class="icon-chevron-down-right" points="4 3.365 1.335 .629 1.335 .629 .332 1.606 4 5.371"></polygon>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item--total">
                                                        @if($cart['discount'] != 0)
                                                        <span class="money" id="cart-subtotal-{{$key}}">{{\App\Helpers\Helper::price($cart['price'],$cart['discount'],$cart['qty'])}} VND</span>
                                                        @else
                                                            <span class="money" id="cart-subtotal-{{$key}}">{{\App\Helpers\Helper::price($cart['price'],0,$cart['qty'])}} VND</span>
                                                        @endif
                                                    </div>
                                                    <div class="cart-item--remove" onclick="removeItem('{{route('cart.delete',$key)}}')">
                                                        <svg class="svg-close"></svg>
                                                    </div>

                                                </div>
                                            </div>
                                        </article>
                                                @php $i++; @endphp
                                    @endif
                                @endforeach
                            @endforeach

                            <div class="cart-total">
                                <div class="cart-subtotal">
                                    <span>Tạm tính</span>
                                    <span class="money cart-money-total">{{number_format($total)}} <span>VND</span></span>
                                </div>
                                <div class="cart-shipping">
                                    <br />
                                    <div><i>Chi phí khác sẽ được chúng tôi thông báo sau khi báo giá được xử lý.</i></div>

                                </div>
                                <div class="cart-checkout">
                                    <a class="button-primary" href="{{route('checkout.index')}}" name="checkout" aria-label="Checkout">
                                        Gửi Báo Giá
                                    </a>
                                    <a class="cart-continue" href="{{route('products')}}" style="color: red;font-weight: bold;">
                                        Tìm kiếm thêm sản phẩm
                                        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                            <g fill="currentColor" fill-rule="evenodd">
                                                <polygon class="icon-chevron-down-left" points="4 5.371 7.668 1.606 6.665 .629 4 3.365"></polygon>
                                                <polygon class="icon-chevron-down-right" points="4 3.365 1.335 .629 1.335 .629 .332 1.606 4 5.371"></polygon>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            @else
                <header class="cart-title">
                    <div class="cart-title-left">
                        <h1>Sản phẩm đã chọn báo giá</h1>
                    </div>
                    <div class="cart-title-right">
                        <a class="cart-continue" href="{{route('products')}}">
                            Chọn thêm sản phẩm
                            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                <g fill="currentColor" fill-rule="evenodd">
                                    <polygon class="icon-chevron-down-left" points="4 5.371 7.668 1.606 6.665 .629 4 3.365"></polygon>
                                    <polygon class="icon-chevron-down-right" points="4 3.365 1.335 .629 1.335 .629 .332 1.606 4 5.371"></polygon>
                                </g>
                            </svg>
                        </a>

                    </div>
                </header>
                <section class="cartitems--container ">
                    <div class="cartitems">
                        <div class="cartitems-empty">
                            <div class="cartitems-empty--inner">
                                <p>Chưa có sản phẩm nào trong bảng báo giá</p>
                                <a class="button-primary" href="{{route('products')}}">
                                    <svg aria-hidden="true" focusable="false" width="28" height="26" viewBox="0 10 28 26" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="currentColor" fill-rule="evenodd" d="M26.15 14.488L6.977 13.59l-.666-2.661C6.159 10.37 5.704 10 5.127 10H1.213C.547 10 0 10.558 0 11.238c0 .68.547 1.238 1.213 1.238h2.974l3.337 13.249-.82 3.465c-.092.371 0 .774.212 1.053.243.31.576.465.94.465H22.72c.667 0 1.214-.558 1.214-1.239 0-.68-.547-1.238-1.214-1.238H9.434l.333-1.423 12.135-.589c.455-.03.85-.31 1.032-.712l4.247-9.286c.181-.34.151-.774-.06-1.144-.212-.34-.577-.589-.97-.589zM22.297 36c-1.256 0-2.275-1.04-2.275-2.321 0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322c0 1.281-1.02 2.321-2.275 2.321zM10.92 33.679C10.92 34.96 9.9 36 8.646 36 7.39 36 6.37 34.96 6.37 33.679c0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322z"></path>
                                    </svg>
                                    Chọn thêm sản phẩm
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </main>
@endsection

@push('stylesheets')
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('manage/plugins/toastr/toastr.min.css')}}">
@endpush

@push('scripts')
<!-- Toastr -->
<script src="{{asset('manage/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('guest/scripts/products.js')}}"></script>
@endpush

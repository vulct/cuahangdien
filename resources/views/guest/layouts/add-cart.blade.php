<section class="atc-banner--container visible" id="notify-add-cart" data-atc-banner="" style="top: 106.8px;" data-flyout-active="true"
         tabindex="-1">
    <div class="atc-banner--outer">
        <div class="atc-banner--inner">
            <div class="atc-banner--product">
                <h2 class="atc-banner--product-title">
                    <span class="atc-banner--product-title--icon">
                        <svg aria-hidden="true" focusable="false" width="18" height="13" viewBox="0 0 18 13" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" fill-rule="evenodd" d="M6.23 9.1L2.078 5.2 0 7.15 6.23 13 18 1.95 15.923 0z"></path>
                        </svg>
                    </span>
                    Sản phẩm đã được thêm vào giỏ:
                </h2>
                <div class="atc--product">
                    <div class="atc--product-image" data-atc-banner-product-image="">
                        <img src="{{asset($product->image)}}"
                            alt="{{$product->name}}">
                    </div>
                    <div class="atc--product-details">
                        <h2 class="atc--product-details--title" data-atc-banner-product-title="">{{$product->name}} × {{$carts['qty']}}</h2>
                        <span class="atc--product-details--options" data-atc-banner-product-options="">{{is_null($attribute->typename) ? $attribute->typename : $attribute->codename}}</span>
                        <span class="atc--product-details--price money" data-atc-banner-product-price="">{{App\Helpers\Helper::price($attribute->price, $attribute->discount)}} VND</span></div>
                </div>
            </div>
            <div class="atc-banner--cart">
                <div class="atc-banner--cart-subtotal"><span class="atc-subtotal--label"> Tạm tính </span> <span
                        class="atc-subtotal--price money" data-atc-banner-cart-subtotal="">{{App\Helpers\Helper::price($attribute->price, $attribute->discount, $carts['qty'])}} VND</span></div>
                <footer class="atc-banner--cart-footer">
                    <a class="button-secondary atc-button--viewcart" href="{{route('cart')}}"
                       data-atc-banner-cart-button=""> Xem giỏ hàng (<span>{{$carts['qty']}}</span>)
                    </a> <a class="button-primary atc-button--checkout" href="{{route('checkout.index')}}"> Báo giá </a>
                </footer>
            </div>
        </div>
        <button class="atc-banner--close" type="button" aria-label="Close" data-atc-banner-close="">
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                <path fill="currentColor" fill-rule="evenodd" d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"></path>
            </svg>
        </button>
    </div>

</section>

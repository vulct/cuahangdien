@extends('guest.layouts.app')

@section('content')
    <main class="site-main" style="padding-top: 183px;">
        <div id="shopify-section-static-search" class="shopify-section search--section">
            <div class="productgrid--outer layout--no-sidebar">
                <div class="productgrid--wrapper">

                    <div class="productgrid--masthead">

                        <div class="collection--information">
                            <h1 class="collection--title">
                                Sản phẩm khuyến mãi
                            </h1>
                        </div>

                    </div>
                    <div class="productgrid--items">
                        @foreach($products as $product)
                            <article class='productgrid--item imagestyle--natural productitem--emphasis'
                                     data-product-item
                                     tabindex='1'>
                                <div class='productitem' data-product-item-content>
                                    <a class='productitem--image-link' href='/products/{{$product->slug}}.html'>
                                        <figure class='productitem--image' data-product-item-image>
                                            <img alt='{{$product->name}}'
                                                 src='{{$product->image}}' width='350' height='350'>
                                        </figure>
                                    </a>
                                    <div class='productitem--info'>
                                        <div class='productitem--price'>
                                            @if(isset($product['attributes']))
                                                @if($product['attributes'][0]['discount'] > 0)                                                <div class='price--compare-at visible' data-price-compare-at>
                                                    <span class='price--spacer'>{{number_format($product['attributes'][0]['price'])}} VND</span>
                                                </div>
                                                <span class='productitem--badge badge--sale' data-badge-sales>
                                                    <span data-price-percent-saved>{{round($product['attributes'][0]['discount'],2)}}
                                                    </span>%
                                                </span>

                                                <div class='price--main' data-price>
                                                    <span class='money'>
                                                        {{number_format($product['attributes'][0]['price'] - ($product['attributes'][0]['price']*$product['attributes'][0]['discount']/100))}} <span>VND</span>
                                                    </span>
                                                </div>
                                            @else
                                                <div class='price--compare-at visible' data-price-compare-at>
                                                    <span class='price--spacer'>{{number_format($product['attributes'][0]['price'])}} VND</span>
                                                </div>
                                                <span class='productitem--badge badge--sale' data-badge-sales>
                                                    <span data-price-percent-saved>LH</span>
                                                </span>

                                                <div class='price--main' data-price>
                                                    <span class='money'>
                                                        {{number_format($product['attributes'][0]['price'])}} <span>VND</span>
                                                    </span>
                                                </div>
                                            @endif
                                                @endif
                                        </div>
                                        <h4 class='productitem--title'>
                                            <a href='/products/{{$product->slug}}.html'>
                                                {{$product->name}}
                                            </a>
                                        </h4>

                                        <div class='productitem--provider'>
                                            <img
                                                src='{{$brands[$product->brand_id]->image}}'
                                                alt='{{$brands[$product->brand_id]->name}}' width='120'
                                                height='60'>
                                        </div>
                                        <img src="{{asset('guest/images/seller.gif')}}" class="clabel-sale" alt="sale"/>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')

@endpush

@push('scripts')
@endpush

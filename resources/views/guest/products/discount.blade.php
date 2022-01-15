@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
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
                            @php $image = $product->image ?? $product->image_01 ?? $product->image_02 @endphp
                            <article class='productgrid--item imagestyle--natural productitem--emphasis'
                                     data-product-item
                                     tabindex='1'>
                                <div class='productitem' data-product-item-content>
                                    <a class='productitem--image-link' href='{{route('products.detail',$product->slug)}}'>
                                        <figure class='productitem--image' data-product-item-image>
                                            <img alt='{{$product->name}}'
                                                 src='{{asset($image)}}' width='350' height='350'>
                                        </figure>
                                    </a>
                                    <div class='productitem--info'>
                                        <div class='productitem--price'>
                                            @if(isset($product['attributes']) && count($product['attributes']) > 0)
                                                @if($product['attributes'][0]['discount'] > 0 && $product->attributes[0]->price > 0)                                                <div class='price--compare-at visible' data-price-compare-at>
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
                                                @elseif($product->attributes[0]->price == 0 || $product->attributes[0]->price == "")
                                                    <div class="price--compare-at visible" data-price-compare-at="">
                                                        <span class="price--spacer"></span>
                                                    </div>

                                                    <div class="price--main" data-price="">
                                                        <span class="money">
                                                            Liên hệ
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class='price--compare-at visible' data-price-compare-at>
                                                        <span class='price--spacer'>{{number_format($product['attributes'][0]['price'])}} VND</span>
                                                    </div>
                                                    <span class='productitem--badge badge--sale' data-badge-sales>
                                                        <span data-price-percent-saved>Liên Hệ</span>
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
                                            <a href='{{route('products.detail',$product->slug)}}'>
                                                {{$product->name}}
                                            </a>
                                        </h4>
                                        @php
                                            $description = \App\Helpers\Helper::clearDescriptionProduct($product->description);
                                        @endphp
                                        @if(!empty($description))
                                            <div class='productitem--desc'>
                                                <span class='watt'>
                                                    {{$description}}
                                                </span>
                                            </div>
                                        @endif
                                        <div class='productitem--provider'>
                                            <img
                                                src='{{asset($brands[$product->brand_id]->image)}}'
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

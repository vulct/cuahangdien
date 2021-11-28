@extends('guest.layouts.app')

@section('content')
    <main class="site-main">

        <div id="shopify-section-static-collection" class="shopify-section collection--section">
            <script type="application/json"
                    data-section-type="static-collection"
                    data-section-id="static-collection"
                    data-section-data>
            {"context": {"see_more": "See more","see_less": "See less"}}
            </script>
            <div class="productgrid--outer layout--no-sidebar">

                <div class="productgrid--wrapper product-collection">

                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope
                         itemtype='http://schema.org/BreadcrumbList'>
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('index')}}" itemprop="item">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1">
                            </a>
                            </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('danhmuc.chitiet',$category->slug)}}" itemprop="item">
                                <span itemprop="name">{{$category->name}}</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </div>
                    </nav>
                    <div class="productgrid--masthead">

                        <div class="collection--information">
                            <h1 class="collection--title">
                                {{$category->name}}
                            </h1>
                        </div>
                        @if(isset($list_brand))
                        <div class="collection--brands">
                            <h3 class="productgrid--sidebar-title--small  box-abs">
                                <span>Xem sản phẩm theo thương hiệu</span>
                            </h3>
                            <div class="collection--brands--logo">
                                @foreach($list_brand as $brand)
                                    <a href='/hang/{{$brand->slug}}/{{$category->slug}}.html'
                                       title='Xem {{$category->name}} của hãng {{$brand->name}}' class='brand-image'>
                                        <img src='{{asset($brand->image)}}' alt="Xem {{$category->name}} của hãng {{$brand->name}}"/>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="collection--tags">
                            <span>Tags: {{$category->keyword}}</span>
                        </div>

                    </div>

                    {{$products->links('guest.layouts.pagination.default')}}
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

                                        <div class='productitem--provider'><img
                                                src='{{$brands[$product->brand_id]->image}}'
                                                alt='{{$brands[$product->brand_id]->name}}' width='120'
                                                height='60'></div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    {{$products->links('guest.layouts.pagination.default')}}
                </div>
            </div>

        </div>
        @if(isset($categories_child))
        <div class="product--sidebar-out">
            <div class="product--sidebar grid">
                @foreach($categories_child as $cate)
                <a class='product--sidebar--item' href='{{route('danhmuc.chitiet',$cate->slug)}}'>
                    <img src='{{asset($cate->image)}}' alt='{{$cate->name}}'/>
                    <h3>{{$cate->name}}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </main>
@endsection

@push('stylesheets')

@endpush

@push('scripts')
@endpush

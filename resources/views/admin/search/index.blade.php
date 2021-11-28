@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div id="shopify-section-static-search" class="shopify-section search--section">
            <div class="productgrid--outer layout--no-sidebar">
                <div class="productgrid--wrapper">
                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope itemtype='http://schema.org/BreadcrumbList'>
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="https://www.thietbidiendgp.vn/" itemprop="item">
                                <span itemprop="name" >Trang chủ</span>
                                <meta itemprop="position" content="1">
                                </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span  itemprop="name">Kết quả tìm kiếm cho: "{{$keyword}}" ({{$count}} sản phẩm)
                                <meta itemprop="position" content="2">
                            </span>
                        </div>
                    </nav>
                    <div class="productgrid--masthead">
                        <div class="productgrid--search" data-live-search="">
                            <form class="productgrid--search-form" action="{{route('search')}}" method="get" data-live-search-form="">
                                <div class="form-field no-label">
                                    <input class="form-field-input productgrid--search-form-field" type="text" name="q" aria-label="Search" placeholder="Nhập tìm kiếm: công tắc schneider, led bulb philips, hoặc mã hàng..." data-live-search-input="" value="{{$keyword}}">

                                    <button class="productgrid--search-button" type="submit" aria-label="Search" data-live-search-submit="">
                                    <span class="search-icon search-icon--inactive">
                                        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21">
                                            <path fill="currentColor" fill-rule="evenodd" d="M12.514 14.906a8.264 8.264 0 0 1-4.322 1.21C3.668 16.116 0 12.513 0 8.07 0 3.626 3.668.023 8.192.023c4.525 0 8.193 3.603 8.193 8.047 0 2.033-.769 3.89-2.035 5.307l4.999 5.552-1.775 1.597-5.06-5.62zm-4.322-.843c3.37 0 6.102-2.684 6.102-5.993 0-3.31-2.732-5.994-6.102-5.994S2.09 4.76 2.09 8.07c0 3.31 2.732 5.993 6.102 5.993z"></path>
                                        </svg>
                                    </span>
                                        <span class="search-icon search-icon--active">
                                        <svg aria-hidden="true" focusable="false" width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="currentColor">
                                                <path d="M13 26C5.82 26 0 20.18 0 13S5.82 0 13 0s13 5.82 13 13-5.82 13-13 13zm0-3.852a9.148 9.148 0 1 0 0-18.296 9.148 9.148 0 0 0 0 18.296z" opacity=".29"></path>
                                                <path d="M13 26c7.18 0 13-5.82 13-13a1.926 1.926 0 0 0-3.852 0A9.148 9.148 0 0 1 13 22.148 1.926 1.926 0 0 0 13 26z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div  class="search--category">
                        @foreach($brands as $brand)
                            <a href="{{route('hang.chitiet',$brand->slug)}}">
                                <img src="{{asset($brand->image)}}" alt="{{$brand->name}}" />
                                <span>{{$brand->name}}</span>
                            </a>
                        @endforeach

                        @foreach($categories as $category)
                            <a href="{{route('danhmuc.chitiet',$category->slug)}}">
                                <img src="{{asset($category->image)}}" alt="{{$category->name}}" />
                                <span>{{$category->name}}</span>
                            </a>
                        @endforeach
                        <div class="clearfix clear"> </div>
                    </div>

                    <div class="clearfix clear"> </div>
                    <div class="productgrid--items">
                        @if(!$products->isEmpty())
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
                                                @if($product['attributes'][0]['discount'] > 0)
                                                <div class='price--compare-at visible' data-price-compare-at>
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
                                                src='{{$brand_of_product[$product->brand_id]->image}}'
                                                alt='{{$brand_of_product[$product->brand_id]->name}}' width='120'
                                                height='60'>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        @else
                            <article class="productgrid--no-results">
                                <h2 class="productgrid--no-results-title">
                                    Sử dụng thanh tìm kiếm bên trên để tìm sản phẩm chính xác
                                </h2>
                            </article>
                        @endif
                    </div>
                    @if($products->isEmpty())
                        <span class="pagination--info" style="margin-top:20px;">Không có sản phẩm nào được tìm thấy</span>
                    @elseif($products->hasPages())
                        {{ $products->withQueryString('q')->links('guest.layouts.pagination.default') }}
                    @else
                        <span class="pagination--info" style="margin-top:20px;">{{$count}}-{{$count}}/{{$count}} sản phẩm</span>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

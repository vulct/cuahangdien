@extends('guest.layouts.app')

@section('content')
    <main class="site-main" style="padding-top: 62px;">
        <div id="shopify-section-static-collection" class="shopify-section collection--section">
            <script type="application/json" data-section-type="static-collection" data-section-id="static-collection"
                    data-section-data="">{"context": {"see_more": "See more","see_less": "See less"}}
            </script>
            <div class="productgrid--outer layout--has-sidebar">
                <div class="productgrid--sidebar" style="">
                    <div class="productgrid--sidebar-section" data-productgrid-filters-content="">
                        <a href="/hang/{{$brand->slug}}.html" title="{{$brand->meta_title}}"><img
                                src="{{asset($brand->image)}}" class="filters-brand-image" alt="{{$brand->name}}"></a>
                        <a href="/bang-gia/{{$brand->slug}}.html" class="btn button-secondary price--tag">
                            <span class="icon--tag">Catalogue &amp; Bảng giá {{$brand->name}}</span>
                        </a>

                        <ul class="productgrid--sidebar-item filter-group left-menu iscollapse">
                            @php $array = []; @endphp
                            @foreach($categoryOfBrand as $key => $category)
                                @if(!in_array($category->id, $array))
                                <li class="filter-item filter-item--a{{$key}}">
                                    <a href="/hang/{{$brand->slug}}/{{$category->slug}}.html" title="{{$category->name}}" class="filter-link--a1">
                                        <span class="filter-text">{{$category->name}} <span> ({{$count[$category->id]}})</span></span>
                                    </a>
                                    @if($category->parent_id === 0)
                                        <span class="fa-icon fa-minus"></span>
                                            <ul>
                                                @foreach($categoryOfBrand as $key => $cate)
                                                    @if($cate->parent_id === $category->id)
                                                        <li>
                                                            <a href="/hang/{{$brand->slug}}/{{$cate->slug}}.html"
                                                               title="Dòng {{$cate->name}}" class="c-4938">
                                                                <span class="filter-text">{{$cate->name}} <span> ({{$count[$cate->id]}})</span></span>
                                                            </a>
                                                        </li>

                                                        @php $array[] = $cate->id; @endphp
                                                    @endif
                                                @endforeach
                                            </ul>
                                    @endif
                                </li>
                                    @php $array[] = $category->id; @endphp
                                @endif
                            @endforeach
                        </ul>
                        <div id="last-div"></div>
                    </div>
                </div>
                <div class="productgrid--wrapper">
                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope=""
                         itemtype="http://schema.org/BreadcrumbList">
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope=""
                             itemtype="http://schema.org/ListItem">
                            <a href="{{route('index')}}" itemprop="item">
                                <span itemprop="name">Trang chủ</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </div>
                        <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="/hang/{{$brand->slug}}.html" itemprop="item">
                                <span itemprop="name">Thiết bị điện {{$brand->name}}</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </div>
                    </nav>
                    <div class="productgrid--masthead">
                        <div class="collection--information"><h1 class="collection--title">Thiết bị điện {{$brand->name}}</h1></div>
                    </div>

                    <nav class="productgrid--utils productgrid--utils--visible-mobile utils-page">
                        <div class="productgrid--utils utils-filter">
                            <button class="utils-filter-button" type="button" aria-label="Filters"
                                    data-productgrid-trigger-filters="">
                        <span class="utils-filter-icon">
                            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="19"
                                 height="13" viewBox="0 0 19 13">
                                <path fill="currentColor" fill-rule="evenodd"
                                      d="M16.516 2.25h2.474v1.5h-2.474a2.626 2.626 0 0 1-5.032 0H0v-1.5h11.484a2.626 2.626 0 0 1 5.032 0zm-9 7h11.472v1.5H7.516a2.626 2.626 0 0 1-5.032 0H0v-1.5h2.484a2.626 2.626 0 0 1 5.032 0zM5 11.375a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75zm9-7a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75z"></path>
                            </svg>
                        </span>
                                <span class="utils-filter-text">Danh mục</span>
                            </button>
                        </div>

                        {{$products->links('guest.layouts.pagination.count')}}
                    </nav>
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
                                        </div>
                                        <h4 class='productitem--title'>
                                            <a href='/products/{{$product->slug}}.html'>
                                                {{$product->name}}
                                            </a>
                                        </h4>

                                        <div class='productitem--provider'><img
                                                src='{{$brand->image}}'
                                                alt='{{$brand->image}}' width='120'
                                                height='60'></div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    {{$products->links('guest.layouts.pagination.default')}}
                    @if($brand->description)
                        <div class="box-intro">
                            <div class="ellips expand">
                                {!! $brand->description !!}
                            </div>
                            <div class="smore"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="utils-sortby--modal" aria-hidden="true" data-productgrid-sort-content="">

            </div>
        </div>
    </main>
@endsection

@push('stylesheets')
    <style>
        .productgrid-brand .box-category a:hover img {
            -webkit-transform: scale(1.06);
            transform: scale(1.06);
        }
    </style>
@endpush

@push('scripts')
    <script src="{{asset('guest/js/jquery.sticky-kit.js')}}"></script>

    <script>
        $(function () {
            $(".productgrid--sidebar").stick_in_parent({
                offset_top: 75
            });
        });
        $(document).on('click', '.smore a', function (e) {
            e.preventDefault();
            $('.ellips').addClass("expand");
            $(this).remove();
        });
    </script>
@endpush

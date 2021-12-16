@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div class="shopify-section collection--section" id="shopify-section-static-collection">
            <script type="application/json"
                    data-section-type="static-collection"
                    data-section-id="static-collection"
                    data-section-data>
            {
            "context": {
            "see_more": "See more",
            "see_less": "See less"
            }
            }
        </script>
            <div class="productgrid--outer layout--has-sidebar pricegrid">
                <div class="productgrid--sidebar">
                    <div class="productgrid--sidebar-section" data-productgrid-filters-content>
                        <h3 class="productgrid--sidebar-title--small" style="margin-top:0">
                            Thương hiệu
                        </h3>
                        <ul class="productgrid--sidebar-item filter-group">
                            @foreach($brands as $brand)
                                <li class="filter-item @if($brand->id === $brand_selected->id) filter-item--active @endif k43 data-tag-advanced" data-group="" data-handle="">
                                    <a href="{{route('bang-gia.hang',$brand->slug)}}" title="Xem bảng giá {{$brand->name}}">
                                    <span class="filter-icon--checkbox">
                                        <svg aria-hidden="true" focusable="false" width="11" height="11" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill="currentColor"
                                                fill-rule="evenodd"
                                                d="M0,2.00276013 C0,0.896666251 0.893542647,0 2.00276013,0 L10.9972399,0 C12.1033337,0 13,0.893542647 13,2.00276013 L13,10.9972399 C13,12.1033337 12.1064574,13 10.9972399,13 L2.00276013,13 C0.896666251,13 0,12.1064574 0,10.9972399 L0,2.00276013 Z M3.038,6.013 L2,7.024 L5.115,10.061 L11,4.325 L9.962,3.312 L5.115,8.038 L3.038,6.013 Z"
                                            />
                                        </svg>
                                    </span>
                                        <span class="filter-text">{{$brand->name}} ({{$count_of_brand[$brand->id]}})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="productgrid--wrapper">
                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope itemtype='http://schema.org/BreadcrumbList'>
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('index')}}" itemprop="item">
                                <span itemprop="name" >Trang chủ</span>
                                <meta itemprop="position" content="1">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('bang-gia')}}" itemprop="item">
                                <span itemprop="name">Bảng giá</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="{{route('bang-gia.hang', $brand_selected->slug)}}" itemprop="item">
                                <span itemprop="name">{{$brand_selected->name}}</span>
                                <meta itemprop="position" content="3">
                            </a>
                        </div>
                    </nav>
                    <div class="productgrid--masthead">
                        <div class="collection--information">
                            <h1 class="collection--title price--title">Bảng Giá</h1>
                            <p  class="price-notification">Vui lòng chọn hãng để tải bảng giá nhanh nhất.</p>
                        </div>
                    </div>
                    <div class="productgrid--filters">
                        <ul class="filter-group--grid">
                            <li class="filter-item--grid">
                                <a href="{{route('bang-gia')}}" title="Xoá" tag="{{$brand_selected->slug}}">
                                        <span class="filter-text">
                                            {{$brand_selected->name}}
                                        </span><span class="filter-icon--remove">
                                            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                <path fill="currentColor" fill-rule="evenodd" d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"></path>
                                            </svg><span class="show-for-sr">
                                                Xóa
                                            </span>
                                        </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <nav class="productgrid--utils productgrid--utils--visible-mobile productgrid--utils--hidden-desktop">
                        <div class="productgrid--utils utils-filter">
                            <button class="utils-filter-button"
                                    type="button"
                                    aria-label="Filters"
                                    data-productgrid-trigger-filters>
                            <span class="utils-filter-icon">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13">
                                    <path fill="currentColor" fill-rule="evenodd" d="M16.516 2.25h2.474v1.5h-2.474a2.626 2.626 0 0 1-5.032 0H0v-1.5h11.484a2.626 2.626 0 0 1 5.032 0zm-9 7h11.472v1.5H7.516a2.626 2.626 0 0 1-5.032 0H0v-1.5h2.484a2.626 2.626 0 0 1 5.032 0zM5 11.375a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75zm9-7a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75z" />
                                </svg>
                            </span>
                                <span class="utils-filter-text">Chọn thương hiệu</span>
                            </button>
                        </div>

                    </nav>
                    <div class="productgrid--items result-list">
                        @foreach($tariffs as $tariff)
                            <div class="result-list-item">
                                <div class="">
                                    <section class="result-list-item-inner">
                                        <a class="list-item-thumb" target="_self" href="{{route('bang-gia.chitiet',[$tariff->slug, $tariff->id])}}">
                                            <img src="{{asset($tariff->image)}}" alt="Bảng giá điện {{$tariff->name}}">
                                        </a>
                                        <div class="result-list-item-content">
                                            <h5>
                                                <a class="title" target="_self"  href="{{route('bang-gia.chitiet',[$tariff->slug, $tariff->id])}}" >
                                                    <span>Bảng giá điện {{$tariff->name}}</span></a>
                                            </h5>
                                            <div class="result-list-info">
                                                <ul class="item-info">
                                                    <li>
                                                        <span>
                                                            <em>Ngày cập nhật:</em>
                                                            {{date('d/m/Y', strtotime($tariff->updated_at))}}
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <em>Ngôn ngữ:</em>
                                                            {{empty($tariff->language) ? 'Tiếng Việt' : $tariff->language}}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="result-list-options">
                                                <ul>
                                                    <li class="list-option-doctype">
                                                        <span class="label-download dn-type-file dn-type-pdf">
                                                            <a target="_blank" href="{{$tariff->link_download}}">
                                                                Download pdf
                                                            </a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="result-list-tags">
                                                <a href="{{route('bang-gia.hang',$brands[$tariff->brand_id]->slug)}}">
                                                    <img src="{{asset($brands[$tariff->brand_id]->image)}}" alt="Bảng giá {{$brands[$tariff->brand_id]->name}}">
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$tariffs->links('guest.layouts.pagination.default')}}
                </div>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')
    <style>
        .price--title{margin-bottom:20px}.result-list{padding:0;margin:0}.result-list .result-list-item{display:flex;background-color:#fff;border:1px solid #e7e6e6;width:49%;float:left;margin-bottom:20px}.result-list .result-list-item:nth-child(odd){margin-right:1%}.result-list .result-list-item:nth-child(even){margin-left:1%}.result-list .result-list-item > div{width:100%}.result-list .result-list-item .result-list-item-inner{align-items:flex-start;position:relative;display:flex;padding:15px}.result-list .result-list-item .result-list-item-inner .list-item-thumb{flex:0 0 106px;height:147px;max-height:147px;display:initial;margin-right:15px;box-shadow:0 2px 4px 0 rgba(0,0,0,.12)}.result-list .result-list-item .result-list-item-inner .list-item-thumb img{width:100%;height:100%}.result-list .result-list-item .result-list-item-inner .result-list-item-content{flex:1 1 auto}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5{display:flex;align-items:center;margin:0}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 a{color:#333}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 a:hover{color:#29927d;text-decoration:none}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 span{font-size:17px;line-height:22px;cursor:pointer}.result-list .result-list-item .result-list-item-inner .result-list-info,.result-list-options,.result-list-tags{font-size:inherit;margin-top:10px;color:#333}.result-list-info .item-info li{font-size:12px;word-break:break-word}.result-list-info .item-info li span em{font-style:normal;color:#626469}.result-list .result-list-item .result-list-item-inner .result-list-info ul,.result-list-options ul,.result-list-tags{display:flex;justify-content:flex-start;padding-left:0}.result-list-tags img{width:75px}.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li{display:flex;justify-content:flex-start;margin-right:15px;color:#626469}.result-list-options ul li{display:flex;justify-content:flex-start;margin-right:15px;color:#626469;flex-direction:row;align-items:center}.result-list .result-list-item .result-list-item-inner .result-list-info ul li span{color:#333;font-weight:500;word-break:break-word}.result-list-options ul li a{color:#333;padding-left:20px}span.label-download{color:#333;cursor:pointer;position:relative}.result-list-tags span{padding:0 10px;border:1px solid #cecece;font-size:10px;color:#1b1b1b;height:auto;border-radius:13px;line-height:18px;background:#f2ba33}.result-list-tags a:hover{text-decoration:none}.result-list-tags span:hover{background-color:#e7e6e6;border-color:#e7e6e6;color:#666;cursor:pointer}.dn-type-file:before{background-image:url({{asset('guest/images/search-sprite@2x.png')}});background-repeat:no-repeat;background-size:90px auto;width:15px;height:20px;content:" ";left:-5px;position:absolute;top:-3px}.dn-type-pdf:before{background-position:-24px 0}.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li:last-child{margin-right:0!important}.pricegrid .price-notification{color:#dc3a40;margin-top:-10px}@media screen and (max-width: 769px){.result-list-item{width:100%!important;margin-right:0!important}.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li{margin-right:10px}}
    </style>
@endpush

@push('scripts')

@endpush

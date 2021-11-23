@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div class="shopify-section collection--section" id="shopify-section-static-collection">
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
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('bang-gia.hang',$brand_selected->slug)}}" itemprop="item">
                                <span itemprop="name">Bảng giá {{$brand_selected->name}}</span>
                                <meta itemprop="position" content="3">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="name">{{$tariff->name}}
                                <meta itemprop="position" content="4">
                            </span>
                        </div>
                    </nav>
                    <div class="productgrid--masthead">
                        <div class="collection--information">
                            <h1 class="collection--title price--title">{{$tariff->name}}</h1>
                        </div>
                        <div class="meta-file">
                            <div><span>Hãng</span> : &nbsp; {{$brand_selected->name}} </div>
                            <div><span>Ngày xuất bản</span> : &nbsp; {{date('d/m/Y',strtotime($tariff->created_at))}} </div>
                            <div><span>Ngôn ngữ</span> : &nbsp; {{$tariff->language}}</div>
                            <div><span>Tải về</span> : &nbsp; <a href="{{$tariff->link_download}}" target="_blank" style="color: red;">Bấm để tải về</a> </div>
                        </div>
                    </div>
                    <nav class="productgrid--utils productgrid--utils--visible-mobile productgrid--utils--hidden-desktop">
                        <div class="productgrid--utils utils-filter">
                            <button class="utils-filter-button" type="button" aria-label="Filters" data-productgrid-trigger-filters>
                            <span class="utils-filter-icon">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13">
                                    <path fill="currentColor" fill-rule="evenodd" d="M16.516 2.25h2.474v1.5h-2.474a2.626 2.626 0 0 1-5.032 0H0v-1.5h11.484a2.626 2.626 0 0 1 5.032 0zm-9 7h11.472v1.5H7.516a2.626 2.626 0 0 1-5.032 0H0v-1.5h2.484a2.626 2.626 0 0 1 5.032 0zM5 11.375a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75zm9-7a1.375 1.375 0 1 1 0-2.75 1.375 1.375 0 0 1 0 2.75z" />
                                </svg>
                            </span>
                                <span class="utils-filter-text">Chọn thương hiệu</span>
                            </button>
                        </div>
                    </nav>
                    <div class="view-file">
                        <iframe src="{{$tariff->link_download . '/preview'}}" width="100%" height="1200"></iframe>

                    </div>
                    <div class="meta-footer">Để báo giá nhanh và chính xác nhất, xin Quý khách vui lòng liên hệ Hotline: <a href="tel:(028) 3731 3963">(028) 3731 3963</a>. Hoặc gửi báo giá khối lượng quá email <a href="mailto:sale@thietbidiendgp.vn">sale@thietbidiendgp.vn</a></div>
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
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('bang-gia.hang',$brand_selected->slug)}}" itemprop="item">
                                <span itemprop="name">Bảng giá {{$brand_selected->name}}</span>
                                <meta itemprop="position" content="3">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="name">{{$tariff->name}}
                                <meta itemprop="position" content="4">
                            </span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')
    <style>
        .price--title{margin-bottom:20px}.result-list .result-list-item > div{width:100%}.result-list .result-list-item .result-list-item-inner .list-item-thumb img{width:100%;height:100%}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5{display:flex;align-items:center;margin:0}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 a{color:#333}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 a:hover{color:#29927d;text-decoration:none}.result-list .result-list-item .result-list-item-inner .result-list-item-content h5 span{font-size:17px;line-height:22px;cursor:pointer}.result-list-info .item-info li{font-size:12px;word-break:break-word}.result-list-info .item-info li span em{font-style:normal;color:#626469}.result-list .result-list-item .result-list-item-inner .result-list-info ul,.result-list-options ul{display:flex;justify-content:flex-start;padding-left:0}.result-list-tags img{width:75px}.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li{display:flex;justify-content:flex-start;margin-right:15px;color:#626469}.result-list-options ul li{display:flex;justify-content:flex-start;margin-right:15px;color:#626469;flex-direction:row;align-items:center}.result-list .result-list-item .result-list-item-inner .result-list-info ul li span{color:#333;font-weight:500;word-break:break-word}.result-list-options ul li a{color:#333;padding-left:20px}.result-list-tags span{padding:0 10px;border:1px solid #cecece;font-size:10px;color:#1b1b1b;height:auto;border-radius:13px;line-height:18px;background:#f2ba33}.result-list-tags a:hover{text-decoration:none}.result-list-tags span:hover{background-color:#e7e6e6;border-color:#e7e6e6;color:#666;cursor:pointer}.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li:last-child{margin-right:0!important}@media screen and (max-width: 769px){.result-list .result-list-item .result-list-item-inner .result-list-info ul.item-info li{margin-right:10px}}
        .meta-file{    background: #f8f8f8;
            font-style: italic;
            line-height: 23px;
            padding: 5px 10px;
            border-radius: 5px;}
        .meta-file > div > span{width:100px;display:inline-block;}
        .meta-footer{
            display: block;
            background: #f5f5f5;
            border-radius: 3px;
            padding: 8px  10px;
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 20px;
            opacity: .9;
        }
        .view-file iframe{ border: 0;margin-bottom:25px;margin-top:15px;}
@endpush

@push('scripts')

@endpush

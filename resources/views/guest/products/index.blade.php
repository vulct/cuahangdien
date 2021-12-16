@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div id="shopify-section-static-collection" class="shopify-section collection--section">
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
            <div class="productgrid--outer layout--no-sidebar">
                <div class="productgrid--wrapper">
                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope itemtype='http://schema.org/BreadcrumbList'>
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('index')}}" itemprop="item">
                                <span itemprop="name" >Trang chủ</span></a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{route('products')}}" itemprop="item">
                                <span itemprop="name">Tất cả sản phẩm</span><meta itemprop="position" content="2">
                            </a>
                        </div>
                    </nav>
                    <div class="collection--information">
                        <h1 class="collection--title">Thiết Bị Diện Dân Dụng & Công nghiệp</h1>
                        <p style="margin: 10px 0;">Chọn danh mục thiết bị điện bên dưới để tìm kiếm sản phẩm bạn cần một cách chính xác.</p>
                    </div>
                    <div class="productgrid--items row">
                        @foreach($categories as $category)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 box-category">
                            <article class="animated fadeIn" data-product-item tabindex="1" style="animation-delay:450ms;">
                                <div class="" data-product-item-content>
                                    <a class="" href="{{route('danhmuc.chitiet',$category->slug)}}">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="{{$category->name}}" src="{{asset($category->image)}}">
                                        </figure>
                                        <div class="overlay"></div>
                                        <h4 class="title-category">
                                            <span>{{$category->name}}</span>
                                        </h4>

                                    </a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <div class="shopify-section highlights-banners--section">
                        <div class="productgrid--masthead">
                            <div class="collection--information" style="margin-bottom:25px;">
                                <h3 class="collection--title">
                                    Xem danh mục sản phẩm theo thương hiệu
                                </h3>
                            </div>

                        </div>

                        <div class="collection--brands">
                            <h3 class="productgrid--sidebar-title--small box-abs">
                                <span>Tìm sản phẩm theo thương hiệu</span>
                            </h3>
                            <div class="collection--brands--logo">
                                @foreach($brands as $brand)
                                    <a href="{{route('hang.chitiet',$brand->slug)}}" title="Xem sản phẩm thương hiệu {{$brand->name}}" class="brand-image">
                                        <img class="lazy" src="{{asset($brand->image)}}" data-src="{{asset($brand->image)}}" width="120" height="60" alt="Thiết bị điện {{$brand->name}}" />
                                    </a>
                                @endforeach
                            </div>
                        </div>

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


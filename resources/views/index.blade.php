@extends('guest.layouts.app')

@section('content')

    <main class="site-main">
        <div id="shopify-section-homemenu" class="shopify-section promo-mosaic--section">
            <script type="application/json" data-section-id="homemenu" data-section-type="dynamic-promo-mosaic">
            </script>
            <section class="promo-mosaic--container">
                <div class="home-section--banner" style="display: flex;">
                    <div style="width:270px;float:left;">
                        <div class='hero'>
                            <div id='vertical' class='hovermenu ttmenu dark-style menu-red-gradient'>
                                <div class='navbar navbar-default' role='navigation'>
                                    <div class='navbar-collapse collapse' style='padding:0;margin: 0;'>
                                        <ul class='nav navbar-nav lef-nav-bar' style="min-height: 550px;">

                                            @foreach($categories as $cate)
                                            <li class='dropdown ttmenu-full'>
                                                <a href='/{{$cate->slug}}' data-toggle='dropdown' class='dropdown-toggle'>
                                                    <span class='icon-wrap'>
                                                        <i class='lv1-icon icon navicon {{$cate->icon}}'></i>
                                                    </span>
                                                    <span>{{$cate->name}}</span>
                                                </a>
                                                <ul class='dropdown-menu vertical-menu'>
                                                    <li>
                                                        <div class='ttmenu-content'>
                                                            <div class='tabbable'>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3>Xem thương hiệu</h3>
                                                                        <div class="menu-brands">
                                                                            @if(isset($data['brands'][$cate->id]))
                                                                                @foreach($data['brands'][$cate->id] as $brands)
                                                                                    @foreach($brands as $brand)
                                                                                    <div>
                                                                                        <a href="/hang/{{$brand->slug}}/{{$cate->slug}}">
                                                                                            <img class="lazy" data-src="{{$brand->image}}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=" alt="{{$brand->name}}" /><span>{{$brand->name}}</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3>Xem theo loại sản phẩm</h3>
                                                                        <div class="menu-products grid-3r">
                                                                            @if(isset($data['subcategory'][$cate->id]))
                                                                                @foreach($data['subcategory'][$cate->id] as $subcategory)
                                                                                    <div>
                                                                                        <a href="/{{$subcategory->name}}">
                                                                                            <img class="lazy" data-src="{{asset($subcategory->image)}}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=" alt="{{$subcategory->name}}" />
                                                                                            <span>{{$subcategory->name}}</span>
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home-banner">

                        <div class="left" style="">
                            <div class="slider-wrap" style="">
                                @php $bannerSort0 = \App\Helpers\Helper::bannerWithSort($banners, 0); @endphp
                                <a class="impress-banner" href="{{$bannerSort0->url ?? '#'}}" data-banner-title="">
                                    <img src="{{$bannerSort0->image ?? asset('storage/default/banners/vt1.jpg')}}" alt="{{$bannerSort0->alt ?? ''}}" class="insdr-insight-1-1">
                                </a>
                            </div>
                            <div class="sub-banner-wrap">
                                <div class="sub-item">
                                    @php $bannerSort6 = \App\Helpers\Helper::bannerWithSort($banners, 6); @endphp
                                    <a class="impress-banner" data-banner-group-code="home_v4_sub_banner" href="{{$bannerSort6->url ?? '#'}}">

                                        <img src="{{$bannerSort6->image ?? '/storage/default/banners/vt7.jpg'}}" alt="{{$bannerSort6->alt ?? ''}}">
                                    </a>
                                </div>
                                <div class="sub-item">
                                    @php $bannerSort5 = \App\Helpers\Helper::bannerWithSort($banners, 5); @endphp
                                    <a class="impress-banner" data-banner-group-code="home_v4_sub_banner" href="{{$bannerSort5->url ?? '#'}}">

                                        <img src="{{$bannerSort5->image ?? '/storage/default/banners/vt6.jpg'}}" alt="{{$bannerSort5->alt ?? ''}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="right">

                            <div class="mini-item mini-f-item">
                                @php $bannerSort1 = \App\Helpers\Helper::bannerWithSort($banners, 1); @endphp
                                <a class="impress-banner" data-banner-group-code="home_v4_sub_banner" href="{{$bannerSort1->url ?? '#'}}">

                                    <img src="{{$bannerSort1->image ?? '/storage/default/banners/vt2.jpg'}}" alt="{{$bannerSort1->alt ?? ''}}">
                                </a>
                            </div>
                            <div class="mini-item mini-f-item">
                                @php $bannerSort2 = \App\Helpers\Helper::bannerWithSort($banners, 2); @endphp
                                <a class="impress-banner" data-banner-group-code="home_v4_sub_banner" href="{{$bannerSort2->url ?? '#'}}">

                                    <img src="{{$bannerSort2->image ?? '/storage/default/banners/vt3.jpg'}}" alt="{{$bannerSort2->alt ?? ''}}">
                                </a>
                            </div>
                            <div class="mini-item">
                                @php $bannerSort4 = \App\Helpers\Helper::bannerWithSort($banners, 4); @endphp
                                <a class="impress-banner" href="{{$bannerSort4->url ?? '#'}}">
                                    <img src="{{$bannerSort4->image ?? '/storage/default/banners/vt5.jpg'}}" alt="{{$bannerSort4->alt ?? ''}}">
                                </a>
                            </div>
                            <div class="mini-item">
                                @php $bannerSort3 = \App\Helpers\Helper::bannerWithSort($banners, 3); @endphp
                                <a class="impress-banner" href="{{$bannerSort3->url ?? '#'}}">
                                    <img src="{{$bannerSort3->image ?? '/storage/default/banners/vt4.jpg'}}" alt="{{$bannerSort3->alt ?? ''}}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div id="shopify-section-static-slideshow" class="shopify-section slideshow--section">
            <script type="application/json"
                    data-section-type="static-slideshow"
                    data-section-id="static-slideshow"
                    data-section-data>
                {
                "enable_autoplay": true,
                "autoplay_duration": 8
                }
            </script>
            <section class="slideshow slideshow-dots-large">
                @php $i = 1; @endphp
                @foreach($banners as $banner)
                    @if($banner->sort === 0)
                        <div class="slideshow-slide slideshow-height-large">
                            <div class="slideshow-background slideshow-background--static-slideshow-1 slideshow-height-large " data-rimg="lazy" data-rimg-template=""
                                 data-themecolor="#4d4d4d"
                                 data-slidecolor="#ffffff" style="background-image: url('{{$banner->image}}');">
                                <div data-rimg-canvas></div>
                                <div class="slideshow-slide-overlay slideshow-slide-overlay--static-slideshow-1"></div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endif
                @endforeach

                @if($i <= 1)
                    <div class="slideshow-slide slideshow-height-large">
                        <div class="slideshow-background slideshow-background--static-slideshow-1 slideshow-height-large " data-rimg="lazy" data-rimg-template=""
                             data-themecolor="#4d4d4d"
                             data-slidecolor="#ffffff" style="background-image: url('{{asset('/storage/default/banners/vt1.jpg')}}');">
                            <div data-rimg-canvas></div>
                            <div class="slideshow-slide-overlay slideshow-slide-overlay--static-slideshow-1"></div>
                        </div>
                    </div>
                @endif
                <style>
                    /*.slideshow-slide-overlay--static-slideshow-1 {
                    background-color: #111111;
                    opacity: 0.35;
                    }*/
                    .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-1 .slideshow-slide-heading,
                    .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-1 .slideshow-slide-subheading {
                        color: #ffffff;
                    }
                    @media (min-width: 720px) {
                        .slideshow-slide-content--static-slideshow-1 .slideshow-slide-heading,
                        .slideshow-slide-content--static-slideshow-1 .slideshow-slide-subheading {
                            color: #ffffff;
                        }
                    }
                    .slideshow-slide-overlay--static-slideshow-0 {
                        background-color: #111111;
                        opacity: 0.05;
                    }
                    .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-0 .slideshow-slide-heading,
                    .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-0 .slideshow-slide-subheading {
                        color: #ffffff;
                    }
                    @media (min-width: 720px) {
                        .slideshow-slide-content--static-slideshow-0 .slideshow-slide-heading,
                        .slideshow-slide-content--static-slideshow-0 .slideshow-slide-subheading {
                            color: #ffffff;
                        }
                    }
                    .slideshow-slide-overlay--1517242272829 {
                        background-color: #000000;
                        opacity: 0.45;
                    }
                    .slideshow-height-fullscreen + .slideshow-slide-content--1517242272829 .slideshow-slide-heading,
                    .slideshow-height-fullscreen + .slideshow-slide-content--1517242272829 .slideshow-slide-subheading {
                        color: #ffffff;
                    }
                    @media (min-width: 720px) {
                        .slideshow-slide-content--1517242272829 .slideshow-slide-heading,
                        .slideshow-slide-content--1517242272829 .slideshow-slide-subheading {
                            color: #ffffff;
                        }
                    }
                </style>
            </section>
        </div>

        <div id="shopify-section-static-highlights-banners" class="shopify-section highlights-banners--section">
            <script type="application/json" data-section-type="static-highlights-banners" data-section-id="static-highlights-banners">
            </script>
            <div class="highlights-banners-container">
                <div class="highlights-banners highlight-banners-count-4">
                    <a class="highlights-banners-block" href="/pages/thanh-toan-van-chuyen.html">
                        <div class="highlights-banners-icon">
                            <i class="sprite_support sprite_giao_hang"></i>
                        </div>
                        <div class="highlights-banners-text">
                            <p class="highlights-banners-heading">
                                Miễn phí ship
                            </p>
                            Nội thành TP.HCM
                        </div>
                    </a>
                    <a class="highlights-banners-block" href="tel:(028) 3731 3963">
                        <div class="highlights-banners-icon">
                            <i class="sprite_support sprite_tu-van"></i>
                        </div>
                        <div class="highlights-banners-text">
                            <p class="highlights-banners-heading">
                                Hỗ trợ tư vấn
                            </p>
                            (028) 3731 3963
                        </div>
                    </a>
                    <a class="highlights-banners-block" href="https://m.me/thietbidiendgp" target="_blank">
                        <div class="highlights-banners-icon">
                            <i class="sprite_support sprite_lien_he"></i>
                        </div>
                        <div class="highlights-banners-text">
                            <p class="highlights-banners-heading">
                                Chat với chúng tôi
                            </p>
                            Trả lời trong vòng 24h
                        </div>
                    </a>
                    <a class="highlights-banners-block" href="/pages/thanh-toan-van-chuyen.html">
                        <div class="highlights-banners-icon">
                            <i class="sprite_support sprite_tra_hang"></i>
                        </div>
                        <div class="highlights-banners-text">
                            <p class="highlights-banners-heading">
                                Nhận hàng
                            </p>
                            Thu tiền
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <section class="shopify-section section-brand-info promo-grid--container">
            <div class="container">
                <div class="brand--info">
                    <div class="row amin">
                        <div class="col-md-12 brand-heading">
                            <h1><a href="https://www.thietbidiendgp.vn/">Thiết Bị Điện</a> ĐẶNG GIA PHÁT</h1>
                            <p class="brand--info--address"><i class="icon-mini"></i> Số 8B, Tổ 8, Đường 2, Khu Phố 6, Phường Trường Thọ, Quận Thủ Đức, TP. HCM</p>
                            <p class="brand--info--mobile"><i class="icon-mini"></i> <a href="tel:(028) 3731 3963">(028) 3731 3963</a> /<a href="tel:(028) 3728 0609"> (028) 3728 0609</a></p>
                            <p class="brand--info--email"> <i class="icon-mini"></i> <a href="mailto:sale@thietbidiendgp.vn">sale@thietbidiendgp.vn</a> | <span class="brand--info--hotline"> <i class="icon-mini"></i> <a href="tel:0909257877">0909257877</a></span></p>
                            <p><b>Thiết bị điện Đặng Gia Phát</b> là nhà cung cấp sỉ, lẻ thiết bị điện xây dựng dân dụng và công nghiệp. Chúng tôi hiện hợp tác cùng nhiều nhà sản xuất, nhà nhập khẩu thiết bị điện hàng đầu Việt Nam và thế giới. <b>Chất lượng</b> sản phẩm chúng tôi phân phối đến khách hàng được quản lý chặt chẽ từ khâu chọn sản phẩm, nhà sản xuất, nhà nhập khẩu đến khâu dịch vụ hậu mãi, bảo hành, bảo trì sản phẩm.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features  amin delay-500ms">
                                <i class="sprite_service ss1"></i>
                                <h4>Phân phối Sỉ &amp; Lẻ</h4>
                                <p>GIÁ SỈ BÁN LẺ</p>
                                <p>Phân phối và Bán lẻ thiết bị điện dân dụng/công nghiệp. Hỗ trợ vẫn chuyển đến các tỉnh thành.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features  amin   delay-500ms">
                                <i class="sprite_service ss2"></i>
                                <h4>Thiết kế và Thi công</h4>
                                <p>
                                    Hệ thống điện công nghiệp<br>
                                    Hệ thống điện tự động<br>
                                    Hệ thống Camera an ninh<br>
                                    Hệ thống Nhà thông minh<br>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features  amin   delay-500ms">
                                <i class="sprite_service ss6"></i>
                                <h4>Dịch vụ & Tư vấn</h4>
                                <p>Tư vấn sản phẩm đầy đủ rõ ràng kèm thông số kỹ thuật và hình ảnh, hướng dẫn lắp đặt, vận hành, sử dụng.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features amin  delay-1s">
                                <i class="sprite_service ss3"></i>
                                <h4>Giá sản phẩm</h4>
                                <p>Cam kết tốt nhất so với sản phẩm cùng chất lượng trên thị trường trong khu vực.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features amin  delay-1s">
                                <i class="sprite_service ss4"></i>
                                <h4>Chất lượng sản phẩm</h4>
                                <p>Mới, đúng nhãn hiệu, đúng xuất xứ, đúng thông số kỹ thuật mà nhà sản xuất, nhập khẩu đã cung cấp.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-more-features amin  delay-1s">
                                <i class="sprite_service ss5"></i>
                                <h4>Bảo hành</h4>
                                <p> Đổi mới theo đúng điều khoản bảo hành của nhà sản xuất hoặc theo qui định bảo hành của công ty.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <div class="clearfix"></div>



        <div id='shopify-section-1' class='shopify-section featured-collection--section'>
            <script type='application/json'
                    data-section-id='1'
                    data-section-type='dynamic-featured-collection'>
            </script>
            <section class='product-row--container featured-collection--container'>
                <div class='title-header'>
                    <h3 class='h3-title ii1'><a href='/thiet-bi-smart-home.html' title=''>Thiết Bị Smart Home</a></h3>
                    <a href='/thiet-bi-smart-home.html' class='title-all'>
                        <span class='text'>Xem thêm</span>
                        <i class='icon-next'></i>
                    </a>
                </div>
                <div class='home-section--content product-row product-row--scroller product-row--count-5' data-product-row>
                    <div class='product-row--outer'>
                        <div class='product-row-nav'>
                            <ul>
                                <li>
                                    <a href="/hang/philips/thiet-bi-smart-home.html"><img data-src="/media/brands/philips-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                                <li>
                                    <a href="/hang/mpe/thiet-bi-smart-home.html"><img data-src="/media/brands/mpe-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                                <li>
                                    <a href="/hang/rang-dong/thiet-bi-smart-home.html"><img data-src="/media/brands/rang-dong-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/may-loc-khong-khi.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Máy lọc không khí điều khiển từ xa ARP1/SC' src='/media/products/350/arp1-sc.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>13,854,300 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>40</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        8,312,580 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/may-loc-khong-khi.html'>
                                        Máy lọc không khí điều khiển từ xa ARP1/SC
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='/media/brands/mpe-sm.jpg' alt='Máy lọc không khí (MPE)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/thiet-bi-do-nhiet-do-co-tich-hop-bo-dieu-khien.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Thiết bị đo nhiệt độ có tích hợp bộ điều khiển TMS1/SC' src='/media/products/350/tms1-sc.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>3,127,700 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>40</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        1,876,620 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/thiet-bi-do-nhiet-do-co-tich-hop-bo-dieu-khien.html'>
                                        Thiết bị đo nhiệt độ có tích hợp bộ điều khiển TMS1/SC
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='/media/brands/mpe-sm.jpg' alt='Cảm biến thông minh (MPE)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/cong-tac-vuong-wifi-chiet-ap-den.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Công tắc vuông Wifi chiết áp đèn SDS86-03CMW(Y)' src='/media/products/350/SDS86-03CMW(Y).jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'></span>
                                    </div>

                                    <div class='price--main' data-price>
                    <span class='money'>
                        liên hệ
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/cong-tac-vuong-wifi-chiet-ap-den.html'>
                                        Công tắc vuông Wifi chiết áp đèn SDS86-03CMW(Y)
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='/media/brands/vmk-sm.jpg' alt='Công tắc Wifi Smartlife (VMK)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/smart-wifi-plug-2000w-220vac-16a2usb2-4a.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Ổ cắm thông minh MPE Smart wifi 16A+2USB2.4A SWP16-5' src='/media/products/350/SWP16-5.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>669,900 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>30</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        468,930 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/smart-wifi-plug-2000w-220vac-16a2usb2-4a'>
                                        Ổ cắm thông minh MPE Smart wifi 16A+2USB2.4A SWP16-5
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='/media/brands/mpe-sm.jpg' alt='Ổ cắm thông minh (MPE)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/den-led-panel-wifi-rang-dong-60x60-40w.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn Led panel wifi Rạng Đông 60x60/40W D P02 60x60/40W.WF' src='/media/products/350/d-p07-60x60-40w.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>2,420,000 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>30</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        1,694,000 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/den-led-panel-wifi-rang-dong-60x60-40w.html'>
                                        Đèn Led panel wifi Rạng Đông 60x60/40W D P02 60x60/40W.WF
                                    </a>
                                </h4>
                                <div class='productitem--desc'><span class='watt'>40W</span></div>
                                <div class='productitem--provider'><img src='/media/brands/rang-dong-sm.jpg' alt='Đèn Panel tấm (Rạng Đông)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                </div></section></div>


        <div id='shopify-section-13' class='shopify-section featured-collection--section'>
            <script type='application/json'
                    data-section-id='13'
                    data-section-type='dynamic-featured-collection'>
            </script>
            <section class='product-row--container featured-collection--container'>
                <div class='title-header'>
                    <h3 class='h3-title ii13'><a href='/den-trang-tri.html' title=''>Đèn Trang Trí</a></h3>
                    <a href='/den-trang-tri.html' class='title-all'>
                        <span class='text'>Xem thêm</span>
                        <i class='icon-next'></i>
                    </a>
                </div>
                <div class='home-section--content product-row product-row--scroller product-row--count-5' data-product-row>
                    <div class='product-row--outer'>
                        <div class='product-row-nav'>
                            <ul>
                                <li>
                                    <a href="/hang/euroto/den-trang-tri.html"><img data-src="/media/brands/euroto-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                                <li>
                                    <a href="/hang/hufa/den-trang-tri.html"><img data-src="/media/brands/hufa-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                                <li>
                                    <a href="/hang/khang-dy-venus/den-trang-tri.html"><img data-src="/media/brands/khang-dy-venus-sm.jpg" class="lazy" src="/images/brand-sm.jpg" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <article class='productgrid--item  imagestyle--natural productitem--sale productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/den-chum-pha-le-sano-o750xh380mm-e14x15-pha-le-k9.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn chùm pha lê Sano Ø750xH380mm E14x15 Pha lê K9 CPL 9017'  class='lazy' data-src='/media/products/350/CPL9017.jpg'  src='/images/load.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='money'>12,000,000 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>40</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        7,200,000 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/den-chum-pha-le-sano-o750xh380mm-e14x15-pha-le-k9.html'>
                                        Đèn chùm pha lê Sano Ø750xH380mm E14x15 Pha lê K9 CPL 9017
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='./media/brands/sano-sm.jpg' alt='Đèn chùm (Sano)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/den-vach-led-13w-size-w11h10-5cm-co-bong-led-94032w-1.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn vách led 1*3W, size: W11*H10.5cm, có bóng LED 94032W/1'  class='lazy' data-src='/media/products/350/94032W-1.jpg'  src='/images/load.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>735,000 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>30</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        514,500 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/den-vach-led-13w-size-w11h10-5cm-co-bong-led-94032w-1.html'>
                                        Đèn vách led 1*3W, size: W11*H10.5cm, có bóng LED 94032W/1
                                    </a>
                                </h4>
                                <div class='productitem--desc'><span class='watt'>13W</span></div>
                                <div class='productitem--provider'><img src='./media/brands/phung-nam-sm.jpg' alt='Đèn vách (Phụng Nam Lighting)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/den-soi-guong-hufa-l400w60h110-led-7w4.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn soi gương Hufa L400*W60*H110, Led 7W*4 SG 5725/4'  class='lazy' data-src='/media/products/350/SG-5725-4.jpg'  src='/images/load.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'></span>
                                    </div>

                                    <div class='price--main' data-price>
                    <span class='money'>
                        liên hệ
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/den-soi-guong-hufa-l400w60h110-led-7w4.html'>
                                        Đèn soi gương Hufa L400*W60*H110, Led 7W*4 SG 5725/4
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='./media/brands/hufa-sm.jpg' alt='Đèn soi gương (Hufa)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/at-16-euroto.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn led bậc thang AT-16 SMD 3W'  class='lazy' data-src='/media/products/350/at-16_181.png'  src='/images/load.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>410,000 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>35</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        266,500 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/at-16-euroto.html'>
                                        Đèn led bậc thang AT-16 SMD 3W
                                    </a>
                                </h4>
                                <div class='productitem--desc'><span class='watt'>3W</span></div>
                                <div class='productitem--provider'><img src='./media/brands/euroto-sm.jpg' alt='Đèn cầu thang (Euroto)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                    <article class='productgrid--item  imagestyle--natural  productitem--emphasis' data-product-item tabindex='1'>
                        <div class='productitem' data-product-item-content>
                            <a class='productitem--image-link' href='/products/vt-14.html'>
                                <figure class='productitem--image' data-product-item-image>
                                    <img alt='Đèn vách L220*220*H450-E27*1 VT 14'  class='lazy' data-src='/media/products/350/vt-14.JPG'  src='/images/load.jpg' width='350' height='350'>
                                </figure>
                            </a>
                            <div class='productitem--info'>
                                <div class='productitem--price '>
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>1,280,000 VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span data-price-percent-saved>40</span>%</span>
                                    <div class='price--main' data-price>
                    <span class='money'>
                        768,000 <span>VND</span>
                    </span>
                                    </div>
                                </div>
                                <h4 class='productitem--title'>
                                    <a href='/products/vt-14.html'>
                                        Đèn vách L220*220*H450-E27*1 VT 14
                                    </a>
                                </h4>

                                <div class='productitem--provider'><img src='/media/brands/hufa-sm.jpg' alt='Đèn tường ngoài trời cổ điển (Hufa)'  width='120' height='60'></div>
                            </div>
                        </div>
                    </article>
                </div><div class='_links'>
                    <a href='/den-chum.html' title='Đèn chùm, Đèn Trang Trí'>Đèn chùm</a> / <a href='/den-mam' title='Đèn mâm, Đèn Trang Trí'>Đèn mâm</a> / <a href='/den-treo.html' title='Đèn thả, Đèn Trang Trí'>Đèn thả</a> / <a href='/den-vach-den-tuong.html' title='Đèn tường trong nhà, Đèn Trang Trí'>Đèn tường trong nhà</a> / <a href='/den-guong.html' title='Đèn Gương / Rọi tranh, Đèn Trang Trí'>Đèn Gương / Rọi tranh</a> / <a href='/den-ngoai-troi.html' title='Đèn sân vườn, ngoài trời, Đèn Trang Trí'>Đèn sân vườn, ngoài trời</a> / <a href='/den-ban-trang-tri.html' title='Đèn bàn trang trí, Đèn Trang Trí'>Đèn bàn trang trí</a> / <a href='/den-san.html' title='Đèn cây (đèn sàn), Đèn Trang Trí'>Đèn cây (đèn sàn)</a> / <a href='/phu-kien-linh-kien-den-trang-tri.html' title='Phụ kiện & Linh kiện, Đèn Trang Trí'>Phụ kiện & Linh kiện</a> / <a href='/den-trang-tri-khac.html' title='Đèn trang trí khác, Đèn Trang Trí'>Đèn trang trí khác</a></div></section></div>

        <div style='text-align: center; margin: 20px auto; width:200px'><a class='button-primary' href='/san-pham.html'  style='background: #ffb354; border: 1px solid #ffb354;padding: 0.875rem 1.75rem;font-size: 1.3125rem;width: 100%;'>Xem tất cả</a></div>
        <div class="shopify-section highlights-banners--section">
            <div class="highlights-banners-container">
                <div class="brands-banners">
                    <a href="/hang/schneider.html" title="Xem sản phẩm thương hiệu Schneider" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/schneider-sm.jpg" width="120" height="60" alt="Thiết bị điện Schneider" /></a>
                    <a href="/hang/panasonic.html" title="Xem sản phẩm thương hiệu Panasonic" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/panasonic-sm.jpg" width="120" height="60" alt="Thiết bị điện Panasonic" /></a>
                    <a href="/hang/panasonic-nanoco.html" title="Xem sản phẩm thương hiệu Panasonic/Nanoco" class="brand-image">
                        <img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/nanoco-sm.jpg" width="120" height="60" alt="Thiết bị điện Panasonic/Nanoco" />
                    </a>
                    <a href="/hang/mpe.html" title="Xem sản phẩm thương hiệu MPE" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/mpe-sm.jpg" width="120" height="60" alt="Thiết bị điện MPE" /></a>
                    <a href="/hang/kawasan.html" title="Xem sản phẩm thương hiệu Kawasan" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/kawasan-sm.jpg" width="120" height="60" alt="Thiết bị điện thông minh Kawasan" /></a>
                    <a href="/hang/kawaled.html" title="Sản phẩm Đèn Led Kawaled" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/kawaled-sm.jpg" width="120" height="60" alt="Đèn Led Kawaled" /></a>
                    <a href="/hang/philips.html" title="Xem sản phẩm thương hiệu Philips" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/philips-sm.jpg" width="120" height="60" alt="Thiết bị điện Philips" /></a>
                    <a href="/hang/paragon.html" title="Xem sản phẩm thương hiệu Paragon" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/paragon-sm.jpg" width="120" height="60" alt="Thiết bị điện Paragon" /></a>
                    <a href="/hang/duhal.html" title="Xem sản phẩm thương hiệu Duhal" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/duhal-sm.jpg" width="120" height="60" alt="Thiết bị điện Duhal" /></a>
                    <a href="/hang/rang-dong.html" title="Xem sản phẩm thương hiệu Rạng Đông" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/rang-dong-sm.jpg" width="120" height="60" alt="Thiết bị điện Rạng Đông" /></a>
                    <a href="/hang/hufa.html" title="Xem sản phẩm thương hiệu Hufa" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/hufa-sm.jpg" width="120" height="60" alt="Thiết bị điện Hufa" /></a>
                    <a href="/hang/anfaco.html" title="Xem sản phẩm thương hiệu Anfaco" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/anfaco-sm.jpg" width="120" height="60" alt="Thiết bị điện Anfaco" /></a>
                    <a href="/hang/nvc-lighting.html" title="Đèn Led NVC Lighting" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/nvc-sm.jpg" width="120" height="60" alt="Đèn Led NVC Lighting" /></a>
                    <a href="/hang/megaman.html" title="Xem sản phẩm thương hiệu Megaman" class="brand-image"><img class="lazy" src="/images/brand-sm.jpg" data-src="/media/brands/megaman-sm.jpg" width="120" height="60" alt="Thiết bị điện Megaman" /></a>
                </div>
            </div>
        </div>
        <div id="more">
            <scriptmore type="text/template">
                <div class="clearfix"></div>
                <div id="shopify-section-blog" class="shopify-section blogposts--section">
                    <section class="blogposts--container">
                        <a href="/blogs.html">
                            <h3 class="home-section--title">
                                KIẾN THỨC & THÔNG TIN THIẾT BỊ ĐIỆN
                            </h3>
                        </a>
                        <div class="home-section--content blogposts--scroller blogposts--count-3">
                            <div class="blogposts--outer">
                                <div class="blogposts--inner">
                                    <article class="article--excerpt-wrapper  ">
                                        <a class="article--excerpt-image" href="/posts/bang-gia-den-led-ht-light-level.html"
                                           style="background-image: url('https://www.thietbidiendgp.vn/media/article/bang-gia-ht-level.jpg');">
                                            <img src="/media/article/bang-gia-ht-level.jpg" alt="Bảng Gi&#225; Đ&#232;n Led HT LIGHT LEVEL 2021">
                                        </a>
                                        <div class="article--excerpt-content">
                                            <aside class="article--excerpt-meta">
                <span class="article--excerpt-meta-item">
                    27 Tháng Mười, 2021
                </span>
                                                <span class="article--excerpt-meta-item">
                    Bảng gi&#225; thiết bị điện
                </span>

                                            </aside>
                                            <h2 class="article--excerpt-title">
                                                <a href="/posts/bang-gia-den-led-ht-light-level">
                                                    Bảng Gi&#225; Đ&#232;n Led HT LIGHT LEVEL 2021
                                                </a>
                                            </h2><div class="article--excerpt-text">
                                                <meta charset="utf-8"><meta charset="utf-8"><span>Bảng giá đèn Led hãng HT Light Level cập nhật mới nhất tháng 10/2021. Catalog đầy đủ giá các loại đèn led bulb, đèn led ốp trần, đèn pha, đèn đường ☑ Nhận báo giá  ✔ Cam kết giá tốt nhất trong khu vực.</span>
                                            </div><a class="article--excerpt-readmore" href="/posts/bang-gia-den-led-ht-light-level.html">
                                                Đọc tiếp
                                                <span class="article--excerpt-readmore--icon">

                    <svg class="svg-chevron-down"></svg>
                </span>
                                            </a>
                                        </div>

                                    </article>
                                    <article class="article--excerpt-wrapper  ">
                                        <a class="article--excerpt-image" href="/posts/bang-gia-den-led-hufa.html"
                                           style="background-image: url('https://www.thietbidiendgp.vn/media/article/hufa-led-2022.jpg');">
                                            <img src="/media/article/hufa-led-2022.jpg" alt="Bảng Gi&#225; Đ&#232;n Chiếu S&#225;ng LED HUFA 2022">
                                        </a>
                                        <div class="article--excerpt-content">
                                            <aside class="article--excerpt-meta">
                <span class="article--excerpt-meta-item">
                    26 Tháng Mười, 2021
                </span>
                                                <span class="article--excerpt-meta-item">
                    Bảng gi&#225; thiết bị điện
                </span>

                                            </aside>
                                            <h2 class="article--excerpt-title">
                                                <a href="/posts/bang-gia-den-led-hufa.html">
                                                    Bảng Gi&#225; Đ&#232;n Chiếu S&#225;ng LED HUFA 2022
                                                </a>
                                            </h2><div class="article--excerpt-text">
                                                <meta charset="utf-8"><meta charset="utf-8"><span>Thiết Bị Điện Đặng Gia Phát chuyên phân phối đèn LED HUFA lớn tại TP.HCM. Bên dưới là catalogue bảng giá đèn LED HUFA cập nhật mới nhất đến năm 2021 ✔ Chúng tôi nhận báo giá, đặt hàng sản phẩm đèn Hufa với Chiết Khấu Tốt cạnh tranh nhất trong khu vực ➠ Liên hệ thông tin trên website.</span>
                                            </div><a class="article--excerpt-readmore" href="/posts/bang-gia-den-led-hufa.html">
                                                Đọc tiếp
                                                <span class="article--excerpt-readmore--icon">

                    <svg class="svg-chevron-down"></svg>
                </span>
                                            </a>
                                        </div>

                                    </article>
                                    <article class="article--excerpt-wrapper  ">
                                        <a class="article--excerpt-image" href="/posts/catalogue-bang-gia-den-hc-lighting.html"
                                           style="background-image: url('https://www.thietbidiendgp.vn/media/article/bang-gia-hclighting-102021.jpg');">
                                            <img src="/media/article/bang-gia-hclighting-102021.jpg" alt="Catalogue Bảng Gi&#225; Đ&#232;n HC Lighting 2021">
                                        </a>
                                        <div class="article--excerpt-content">
                                            <aside class="article--excerpt-meta">
                <span class="article--excerpt-meta-item">
                    25 Tháng Mười, 2021
                </span>
                                                <span class="article--excerpt-meta-item">
                    Bảng gi&#225; thiết bị điện
                </span>

                                            </aside>
                                            <h2 class="article--excerpt-title">
                                                <a href="/posts/catalogue-bang-gia-den-hc-lighting.html">
                                                    Catalogue Bảng Gi&#225; Đ&#232;n HC Lighting 2021
                                                </a>
                                            </h2><div class="article--excerpt-text">
                                                <meta charset="utf-8"><meta charset="utf-8"><span>Bảng giá đèn Led hãng HC Lighting cập nhật mới nhất tháng 10/2021. Catalog đầy đủ giá các loại đèn led bulb, đèn led ốp trần, đèn pha, đèn đường ☑ Nhận báo giá  ✔ Cam kết giá tốt nhất trong khu vực.</span>
                                            </div><a class="article--excerpt-readmore" href="/posts/catalogue-bang-gia-den-hc-lighting.html">
                                                Đọc tiếp
                                                <span class="article--excerpt-readmore--icon">

                    <svg class="svg-chevron-down"></svg>
                </span>
                                            </a>
                                        </div>

                                    </article>
                                </div>

                                <div class="clearfix"></div>
                                <div class="blogposts--inner">
                                    <article class="article--excerpt-wrapper  ">
                                        <a class="article--excerpt-image" href="/posts/3-hinh-thuc-chieu-sang-moi-trong-noi-that-nam-2021.html"
                                           style="background-image: url('https://www.thietbidiendgp.vn/media/article/downlight-goc-chieu-hep-lo-hoa.jpg');">
                                            <img src="/media/article/downlight-goc-chieu-hep-lo-hoa.jpg" alt="3 h&#236;nh thức chiếu s&#225;ng mới trong nội thất năm 2021">
                                        </a>
                                        <div class="article--excerpt-content">
                                            <aside class="article--excerpt-meta">
                <span class="article--excerpt-meta-item">
                    21 Tháng Mười, 2021
                </span>
                                                <span class="article--excerpt-meta-item">
                    Kiến thức
                </span>

                                            </aside>
                                            <h2 class="article--excerpt-title">
                                                <a href="/posts/3-hinh-thuc-chieu-sang-moi-trong-noi-that-nam-2021.html">
                                                    3 h&#236;nh thức chiếu s&#225;ng mới trong nội thất năm 2021
                                                </a>
                                            </h2><div class="article--excerpt-text">
                                                <meta charset="utf-8"><meta charset="utf-8"><span>Để tạo được các hiệu ứng tốt nhất về ánh sáng, các nhà thiết kế chiếu sáng chia chiếu sáng nội thất thành 3 loại: Chiếu sáng tổng thể, chiếu sáng chức năng và chiếu sáng điểm nhấn.</span>
                                            </div><a class="article--excerpt-readmore" href="/posts/3-hinh-thuc-chieu-sang-moi-trong-noi-that-nam-2021.html">
                                                Đọc tiếp
                                                <span class="article--excerpt-readmore--icon">

                    <svg class="svg-chevron-down"></svg>
                </span>
                                            </a>
                                        </div>

                                    </article>

                                </div>

                            </div>
                        </div>
                        <div class="blogposts--footer">
                            <a class="blogposts--footer-link" href="/blogs.html">
                                Xem tất cả
                                <span class="blogposts--footer-icon">
                                <svg class="svg-chevron-down"></svg>

                            </span>
                            </a>
                        </div>
                    </section>
                </div><div class="clearfix"></div>
            </scriptmore>
        </div>
        <div class="clearfix"></div>


    </main>

@endsection

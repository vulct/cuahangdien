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
                                        @php $i = 1; @endphp
                                        @foreach($menu as $cate)
                                            @if($i <= 14)
                                                <li class='dropdown ttmenu-full'>
                                                <a href='{{route('danhmuc.chitiet',$cate->slug)}}' data-toggle='dropdown'
                                                   class='dropdown-toggle'>
                                                <span class='icon-wrap'>
                                                    <i class='lv1-icon navicon {{$cate->icon}}'></i>
                                                </span>
                                                    <span>{{$cate->name}}</span>
                                                </a>
                                                <ul class='dropdown-menu vertical-menu'>
                                                    <li>
                                                        <div class='ttmenu-content'>
                                                            <div class='tabbable'>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3>Xem th????ng hi???u</h3>
                                                                        <div class="menu-brands">
                                                                            @if(isset($data['brands'][$cate->id]))
                                                                                @foreach($data['brands'][$cate->id] as $brand)
                                                                                    @if($brand->category_id === $cate->id)
                                                                                    <div>
                                                                                        <a href="{{route('hang.danhmuc',[$brand->slug, $cate->slug])}}">
                                                                                            <img class="lazy"
                                                                                                 data-src="{{asset($brand->image)}}"
                                                                                                 src="{{asset($brand->image)}}"
                                                                                                 alt="{{$brand->name}}"/><span>{{$brand->name}}</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3>Xem theo lo???i s???n ph???m</h3>
                                                                        <div class="menu-products grid-3r">
                                                                            @if(isset($data['subcategory'][$cate->id]))
                                                                                @foreach($data['subcategory'][$cate->id] as $subcategory)
                                                                                    <div>
                                                                                        <a href="{{route('danhmuc.chitiet',$subcategory->slug)}}">
                                                                                            <img class="lazy"
                                                                                                 data-src="{{asset($subcategory->image)}}"
                                                                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII="
                                                                                                 alt="{{$subcategory->name}}"/>
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
                                            @endif
                                        @php $i++; @endphp
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
                                <img src="{{$bannerSort0->image ? asset($bannerSort0->image) : asset('storage/default/banners/vt1.jpg')}}"
                                     alt="{{$bannerSort0->alt ?? ''}}" class="insdr-insight-1-1">
                            </a>
                        </div>
                        <div class="sub-banner-wrap">
                            <div class="sub-item">
                                @php $bannerSort6 = \App\Helpers\Helper::bannerWithSort($banners, 6); @endphp
                                <a class="impress-banner" data-banner-group-code="home_v4_sub_banner"
                                   href="{{$bannerSort6->url ?? '#'}}">

                                    <img src="{{$bannerSort6->image ? asset($bannerSort6->image) : asset('storage/default/banners/vt7.jpg')}}"
                                         alt="{{$bannerSort6->alt ?? ''}}">
                                </a>
                            </div>
                            <div class="sub-item">
                                @php $bannerSort5 = \App\Helpers\Helper::bannerWithSort($banners, 5); @endphp
                                <a class="impress-banner" data-banner-group-code="home_v4_sub_banner"
                                   href="{{$bannerSort5->url ?? '#'}}">

                                    <img src="{{$bannerSort5->image ? asset($bannerSort5->image) : asset('storage/default/banners/vt6.jpg')}}"
                                         alt="{{$bannerSort5->alt ?? ''}}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right">

                        <div class="mini-item mini-f-item">
                            @php $bannerSort1 = \App\Helpers\Helper::bannerWithSort($banners, 1); @endphp
                            <a class="impress-banner" data-banner-group-code="home_v4_sub_banner"
                               href="{{$bannerSort1->url ?? '#'}}">

                                <img src="{{$bannerSort1->image ? asset($bannerSort1->image) : asset('storage/default/banners/vt2.jpg')}}"
                                     alt="{{$bannerSort1->alt ?? ''}}">
                            </a>
                        </div>
                        <div class="mini-item mini-f-item">
                            @php $bannerSort2 = \App\Helpers\Helper::bannerWithSort($banners, 2); @endphp
                            <a class="impress-banner" data-banner-group-code="home_v4_sub_banner"
                               href="{{$bannerSort2->url ?? '#'}}">

                                <img src="{{$bannerSort2->image ? asset($bannerSort2->image) : asset('storage/default/banners/vt3.jpg')}}"
                                     alt="{{$bannerSort2->alt ?? ''}}">
                            </a>
                        </div>
                        <div class="mini-item">
                            @php $bannerSort4 = \App\Helpers\Helper::bannerWithSort($banners, 4); @endphp
                            <a class="impress-banner" href="{{$bannerSort4->url ?? '#'}}">
                                <img src="{{$bannerSort4->image ? asset($bannerSort4->image) : asset('storage/default/banners/vt5.jpg')}}"
                                     alt="{{$bannerSort4->alt ?? ''}}">
                            </a>
                        </div>
                        <div class="mini-item">
                            @php $bannerSort3 = \App\Helpers\Helper::bannerWithSort($banners, 3); @endphp
                            <a class="impress-banner" href="{{$bannerSort3->url ?? '#'}}">
                                <img src="{{$bannerSort3->image ? asset($bannerSort3->image) : asset('storage/default/banners/vt4.jpg')}}"
                                     alt="{{$bannerSort3->alt ?? ''}}">
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
                        <div
                            class="slideshow-background slideshow-background--static-slideshow-1 slideshow-height-large "
                            data-rimg="lazy" data-rimg-template=""
                            data-themecolor="#4d4d4d"
                            data-slidecolor="#ffffff" style="background-image: url('{{asset($banner->image)}}');">
                            <div data-rimg-canvas></div>
                            <div class="slideshow-slide-overlay slideshow-slide-overlay--static-slideshow-1"></div>
                        </div>
                    </div>
                    @php $i++; @endphp
                @endif
            @endforeach

            @if($i <= 1)
                <div class="slideshow-slide slideshow-height-large">
                    <div
                        class="slideshow-background slideshow-background--static-slideshow-1 slideshow-height-large "
                        data-rimg="lazy" data-rimg-template=""
                        data-themecolor="#4d4d4d"
                        data-slidecolor="#ffffff"
                        style="background-image: url('{{asset('/storage/default/banners/vt1.jpg')}}');">
                        <div data-rimg-canvas></div>
                        <div class="slideshow-slide-overlay slideshow-slide-overlay--static-slideshow-1"></div>
                    </div>
                </div>
            @endif

        </section>
    </div>

    <div id="shopify-section-static-highlights-banners" class="shopify-section highlights-banners--section">
        <script type="application/json" data-section-type="static-highlights-banners"
                data-section-id="static-highlights-banners">
        </script>
        <div class="highlights-banners-container">
            <div class="highlights-banners highlight-banners-count-4">
                <a class="highlights-banners-block" href="{{isset($pages[3]) ? route('pages',$pages[3]->slug) : '#'}}">
                    <div class="highlights-banners-icon">
                        <i class="sprite_support sprite_giao_hang"></i>
                    </div>
                    <div class="highlights-banners-text">
                        <p class="highlights-banners-heading">
                            Mi???n ph?? ship
                        </p>
                        N???i th??nh TP.Thanh Ho??
                    </div>
                </a>
                <a class="highlights-banners-block" href="tel:{{$info->hotline1 ?? ''}}">
                    <div class="highlights-banners-icon">
                        <i class="sprite_support sprite_tu-van"></i>
                    </div>
                    <div class="highlights-banners-text">
                        <p class="highlights-banners-heading">
                            H??? tr??? t?? v???n
                        </p>
                        {{ $info->hotline1 ?? '' }}
                    </div>
                </a>
                <a class="highlights-banners-block" href="{{$info->facebook ?? '#'}}" target="_blank">
                    <div class="highlights-banners-icon">
                        <i class="sprite_support sprite_lien_he"></i>
                    </div>
                    <div class="highlights-banners-text">
                        <p class="highlights-banners-heading">
                            Chat v???i ch??ng t??i
                        </p>
                        Tr??? l???i trong v??ng 24h
                    </div>
                </a>
                <a class="highlights-banners-block" href="{{isset($pages[3]) ? route('pages',$pages[3]->slug) : '#'}}">
                    <div class="highlights-banners-icon">
                        <i class="sprite_support sprite_tra_hang"></i>
                    </div>
                    <div class="highlights-banners-text">
                        <p class="highlights-banners-heading">
                            Nh???n h??ng
                        </p>
                        Thu ti???n
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

                        <h1>
                            <a href="{{config('app.url')}}">{{$info->name ?? 'Thi???t B??? ??i???n D??n D???ng v?? V???t T?? Ng??nh N?????c'}}</a>
                        </h1>
                        {!! isset($info->address) && !empty($info->address) ? '<p class="brand--info--address"><i class="icon-mini"></i> '.$info->address.'</p>' : '' !!}
                        {!! isset($info->hotline1) && !empty($info->hotline1) ? '<p class="brand--info--mobile"><i class="icon-mini"></i>
                        <a href="'.$info->hotline1.'">'.$info->hotline1.'</a>' : '' !!}
                        {!! isset($info->hotline2) && !empty($info->hotline2)  ? '/<a href="tel:'.$info->hotline2.'"> '.$info->hotline2.'</a></p>' : '</p>' !!}
                        @if(isset($info->email) && !empty($info->email))
                        <p class="brand--info--email"><i class="icon-mini"></i> <a
                                href="mailto:{{$info->email ?? ''}}">{{$info->email ?? ''}}</a> @if(isset($info->phone))| <span
                                class="brand--info--hotline"> <i class="icon-mini"></i> <a href="tel:{{$info->phone ?? ''}}">{{$info->phone ?? ''}}</a></span>@endif
                        </p>
                        @endif
                        @if(isset($info->description) && !empty($info->description))
                        <p>{!! $info->description ?? '' !!}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features  amin delay-500ms">
                            <i class="sprite_service ss1"></i>
                            <h4>Ph??n ph???i S??? &amp; L???</h4>
                            <p>GI?? S??? B??N L???</p>
                            <p>Ph??n ph???i v?? B??n l??? thi???t b??? ??i???n d??n d???ng/c??ng nghi???p. H??? tr??? v???n chuy???n ?????n c??c
                                t???nh th??nh.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features  amin   delay-500ms">
                            <i class="sprite_service ss2"></i>
                            <h4>Thi???t k??? v?? Thi c??ng</h4>
                            <p>
                                H??? th???ng ??i???n c??ng nghi???p<br>
                                H??? th???ng ??i???n t??? ?????ng<br>
                                H??? th???ng Camera an ninh<br>
                                H??? th???ng Nh?? th??ng minh<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features  amin   delay-500ms">
                            <i class="sprite_service ss6"></i>
                            <h4>D???ch v??? & T?? v???n</h4>
                            <p>T?? v???n s???n ph???m ?????y ????? r?? r??ng k??m th??ng s??? k??? thu???t v?? h??nh ???nh, h?????ng d???n l???p ?????t,
                                v???n h??nh, s??? d???ng.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features amin  delay-1s">
                            <i class="sprite_service ss3"></i>
                            <h4>Gi?? s???n ph???m</h4>
                            <p>Cam k???t t???t nh???t so v???i s???n ph???m c??ng ch???t l?????ng tr??n th??? tr?????ng trong khu v???c.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features amin  delay-1s">
                            <i class="sprite_service ss4"></i>
                            <h4>Ch???t l?????ng s???n ph???m</h4>
                            <p>M???i, ????ng nh??n hi???u, ????ng xu???t x???, ????ng th??ng s??? k??? thu???t m?? nh?? s???n xu???t, nh???p kh???u
                                ???? cung c???p.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-more-features amin  delay-1s">
                            <i class="sprite_service ss5"></i>
                            <h4>B???o h??nh</h4>
                            <p> ?????i m???i theo ????ng ??i???u kho???n b???o h??nh c???a nh?? s???n xu???t ho???c theo qui ?????nh b???o h??nh
                                c???a c??ng ty.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="clearfix"></div>


    @include('guest.layouts.product')


    <div style='text-align: center; margin: 20px auto; width:200px'><a class='button-primary' href='{{route('products')}}' style='background: #ffb354; border: 1px solid #ffb354;padding: 0.875rem 1.75rem;font-size: 1.3125rem;width: 100%;'>Xem t???t c???</a></div>
    <div class="shopify-section highlights-banners--section">
        <div class="highlights-banners-container">
            <div class="brands-banners">
                @foreach($brands as $brand)
                <a href="{{route('hang.chitiet',$brand->slug)}}" title="Xem s???n ph???m th????ng hi???u {{$brand->name}}" class="brand-image"><img
                        class="lazy" src="{{asset($brand->image)}}" data-src="{{asset($brand->image)}}"
                        width="120" height="60" alt="{{$brand->name}}"/></a>
                @endforeach
            </div>
        </div>
    </div>
    <div id="more">
        <scriptmore type="text/template">
            <div class="clearfix"></div>
            <div id="shopify-section-blog" class="shopify-section blogposts--section">
                <section class="blogposts--container">
                    <a href="{{route('blogs')}}">
                        <h3 class="home-section--title">
                            KI???N TH???C & TH??NG TIN THI???T B??? ??I???N
                        </h3>
                    </a>
                    <div class="home-section--content blogposts--scroller blogposts--count-3">
                        <div class="blogposts--outer">
                            @if(isset($posts['rowOne']))
                            <div class="blogposts--inner">
                                @foreach($posts['rowOne'] as $post)
                                        <article class="article--excerpt-wrapper">
                                            <a class="article--excerpt-image"
                                               href="{{route('posts',$post->slug)}}"
                                               style="background-image: url('{{asset($post->image)}}');">
                                                <img src="{{asset($post->image)}}"
                                                     alt="{{$post->name}}">
                                            </a>
                                            <div class="article--excerpt-content">
                                                <aside class="article--excerpt-meta">
                                            <span class="article--excerpt-meta-item">
                                                {!! \App\Helpers\Helper::getDateTime($post->updated_at) !!}
                                            </span>
                                                    <span class="article--excerpt-meta-item">{{$post->category->name}}</span>

                                                </aside>
                                                <h2 class="article--excerpt-title">
                                                    <a href="{{route('posts',$post->slug)}}">
                                                        {{$post->name}}
                                                    </a>
                                                </h2>
                                                <div class="article--excerpt-text">
                                                    <meta charset="utf-8">
                                                    <meta charset="utf-8">
                                                    <span>{!! $post->description !!}</span>
                                                </div>
                                                <a class="article--excerpt-readmore"
                                                   href="{{route('posts',$post->slug)}}">
                                                    ?????c ti???p
                                                    <span class="article--excerpt-readmore--icon"><svg class="svg-chevron-down"></svg></span>
                                                </a>
                                            </div>

                                        </article>
                                    @endforeach
                            </div>
                            @endif
                            <div class="clearfix"></div>
                            @if(isset($posts['rowTwo']))
                            <div class="blogposts--inner">
                                        @foreach($posts['rowTwo'] as $post)
                                            <article class="article--excerpt-wrapper">
                                                <a class="article--excerpt-image"
                                                   href="{{route('posts',$post->slug)}}"
                                                   style="background-image: url('{{asset($post->image)}}');">
                                                    <img src="{{asset($post->image)}}"
                                                         alt="{{$post->name}}">
                                                </a>
                                                <div class="article--excerpt-content">
                                                    <aside class="article--excerpt-meta">
                                            <span class="article--excerpt-meta-item">
                                                {!! \App\Helpers\Helper::getDateTime($post->updated_at) !!}
                                            </span>
                                                        <span class="article--excerpt-meta-item">{{$post->category->name}}</span>

                                                    </aside>
                                                    <h2 class="article--excerpt-title">
                                                        <a href="{{route('posts',$post->slug)}}">
                                                            {{$post->name}}
                                                        </a>
                                                    </h2>
                                                    <div class="article--excerpt-text">
                                                        <span>{!! $post->description !!}</span>
                                                    </div>
                                                    <a class="article--excerpt-readmore"
                                                       href="{{route('posts',$post->slug)}}">
                                                        ?????c ti???p
                                                        <span class="article--excerpt-readmore--icon"><svg class="svg-chevron-down"></svg></span>
                                                    </a>
                                                </div>

                                            </article>
                                        @endforeach
                                    </div>
                            @endif
                        </div>
                    </div>
                    <div class="blogposts--footer">
                        <a class="blogposts--footer-link" href="{{route('blogs')}}">
                            Xem t???t c???
                            <span class="blogposts--footer-icon">
                            <svg class="svg-chevron-down"></svg>
                        </span>
                        </a>
                    </div>
                </section>
            </div>
            <div class="clearfix"></div>
        </scriptmore>
    </div>
    <div class="clearfix"></div>
</main>
@endsection

@push('stylesheets')
<style>
    .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-1 .slideshow-slide-heading, .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-1 .slideshow-slide-subheading {color: #ffffff;}@media (min-width: 720px) {.slideshow-slide-content--static-slideshow-1 .slideshow-slide-heading, .slideshow-slide-content--static-slideshow-1 .slideshow-slide-subheading {color: #ffffff;}}.slideshow-slide-overlay--static-slideshow-0 {background-color: #111111;opacity: 0.05;}.slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-0 .slideshow-slide-heading, .slideshow-height-fullscreen + .slideshow-slide-content--static-slideshow-0 .slideshow-slide-subheading {color: #ffffff;}@media (min-width: 720px) {.slideshow-slide-content--static-slideshow-0 .slideshow-slide-heading, .slideshow-slide-content--static-slideshow-0 .slideshow-slide-subheading {color: #ffffff;}}.slideshow-slide-overlay--1517242272829 {background-color: #000000;opacity: 0.45;}.slideshow-height-fullscreen + .slideshow-slide-content--1517242272829 .slideshow-slide-heading, .slideshow-height-fullscreen + .slideshow-slide-content--1517242272829 .slideshow-slide-subheading {color: #ffffff;}@media (min-width: 720px) {.slideshow-slide-content--1517242272829 .slideshow-slide-heading, .slideshow-slide-content--1517242272829 .slideshow-slide-subheading {color: #ffffff;}}
</style>
@endpush

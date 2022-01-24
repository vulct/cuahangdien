@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div id="shopify-section-static-collection" class="shopify-section collection--section">
            <div class="productgrid--outer layout--has-sidebar">
                <div class="productgrid--sidebar">
                    <div class="productgrid--sidebar-section" data- -content>
                        <div class="model-brand block block-filter" id="boxFilter" data-url="{{$data_url}}">
                            <div class="filter-content">
                                <div class="heading">
                                    <img src="{{asset('guest/images/svg/filter.svg')}}" class="icon-filter" alt="icon"/>
                                    BỘ LỌC
                                </div>
                                <ul class="">
                                    <li class="active" data-category="b">
                                        <div class="head"><span>Thương hiệu</span><i class="fa-icon"></i></div>
                                        <div class="body">
                                            <div class='fitem f-131' data-filter='131'><span>LiOA</span></div>
                                            <div class='fitem f-88' data-filter='88'><span>Honeywell</span></div>
                                            <div class='fitem f-94' data-filter='94'><span>Sonata</span></div>
                                            <div class='fitem f-93' data-filter='93'><span>LONON</span></div>
                                            <div class='fitem f-8' data-filter='8'><span>Schneider</span></div>
                                            <div class='fitem f-79' data-filter='79'><span>MPE</span></div>
                                            <div class='fitem f-10' data-filter='10'><span>Panasonic</span></div>
                                            <div class='fitem f-100' data-filter='100'><span>Kawasan</span></div>
                                            <div class='fitem f-130' data-filter='130'><span>Roman</span></div>
                                            <div class='fitem f-148' data-filter='148'><span>ARTDNA</span></div>
                                            <div class='fitem f-82' data-filter='82'><span>Rạng Đông</span></div>
                                            <div class='fitem f-120' data-filter='120'><span>VMK</span></div>
                                            <div class='fitem f-19' data-filter='19'><span>Philips</span></div>
                                            <div class='fitem f-92' data-filter='92'><span>ABB</span></div>
                                        </div>
                                    </li>
                                    <li data-category="p" class="fli-p">
                                        <div class="head"><span>Mức giá</span><i class="fa-icon"></i></div>
                                        <div class="body">
                                            <div class="fitem f-0p5" data-filter="0p5"><span>< 50 nghìn</span></div>
                                            <div class="fitem f-5p10" data-filter="5p10"><span>50➜100 nghìn</span></div>
                                            <div class="fitem f-10p25" data-filter="10p25"><span>100➜250 nghìn</span>
                                            </div>
                                            <div class="fitem f-25p50" data-filter="25p50"><span>250➜500 nghìn</span>
                                            </div>
                                            <div class="fitem f-50p1000" data-filter="50p1000"><span>> 500 nghìn</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="buttons">
                                    <a href="cong-tac.html"><span class="delete">Xóa bộ lọc</span></a>
                                    <span class="apply" id="btnFilterSubmit">Áp dụng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productgrid--wrapper product-collection">
                    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope
                         itemtype='http://schema.org/BreadcrumbList'>
                        <div class="breadcrumb-home" itemprop="itemListElement" itemscope
                             itemtype="http://schema.org/ListItem">
                            <a href="index.html" itemprop="item"><span itemprop="name">Trang chủ</span>
                            <meta itemprop="position" content="1">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a
                                href="san-pham.html" itemprop="item"><span itemprop="name">Sản phẩm</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a
                                href="cong-tac-o-cam.html" itemprop="item"><span itemprop="name">Công tắc - Ổ cắm</span>
                                <meta itemprop="position" content="3">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a
                                href="cong-tac-dien.html" itemprop="item"><span itemprop="name">Công tắc điện</span>
                                <meta itemprop="position" content="4">
                            </a></div>
                        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a
                                href="cong-tac.html" itemprop="item"><span itemprop="name">Công tắc</span>
                                <meta itemprop="position" content="5">
                            </a></div>
                    </nav>
                    <div class="productgrid--masthead">
                        <div class="collection--information">
                            <h1 class="collection--title">C&#244;ng tắc</h1>
                        </div>
                        <div class="collection--links">
                            <a href='cong-tac.html' title='Công tắc'>Công tắc</a> / <a href='cong-tac-dong-ho.html'
                                                                                       title='Công tắc đồng hồ'>Công tắc
                                đồng hồ</a> / <a href='cong-tac-dieu-khien-tu-xa.html'
                                                 title='Công tắc điều khiển từ xa'>Công tắc điều khiển từ xa</a> / <a
                                href='cong-tac-cam-ung.html' title='Công tắc cảm ứng hồng ngoại vi sóng'>Công tắc cảm
                                ứng hồng ngoại vi sóng</a> / <a href='cong-tac-cam-ung-cham.html'
                                                                title='Công tắc cảm ứng chạm'>Công tắc cảm ứng chạm</a>
                        </div>
                    </div>
                    <div class="productgrid--items">

                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t31-e1f-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 1 chiều 16AX, size E (3S) cắm nhanh M3T31_E1F_WE"
                                             src="media/products/350/m3t31-e1f-we.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="money">51,700 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
32,571 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t31-e1f-we.html">
                                            C&#244;ng tắc 1 chiều 16AX, size E (3S) cắm nhanh M3T31_E1F_WE </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                            alt="Schneider" width="120" height="60"/>
                                    </div>
                                </div>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/cong-tac-smartlife-mat-nhua-phim-bam-nhan-nha.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc Smartlife mặt nhựa ph&#237;m bấm nhấn nhả SS86"
                                             src="media/products/350/CTSmartlifemn.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="price--spacer"></span>
                                        </div>
                                        <div class="price--main" data-price>
                    <span class="money">
                            <span class="price-lh">Giá liên hệ</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/cong-tac-smartlife-mat-nhua-phim-bam-nhan-nha.html">
                                            C&#244;ng tắc Smartlife mặt nhựa ph&#237;m bấm nhấn nhả </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/vmk-sm.jpg" alt="VMK"
                                                                            width="120" height="60"/></div>
                                </div>
                                <span class="clabel">3 mẫu</span>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/c9-c16-artdna.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Ổ cắm đơn 3 Chấu dọc Size 2/3 C9-C16"
                                             src="media/products/350/default.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="money">132,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-25</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
99,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/c9-c16-artdna.html">
                                            Ổ cắm đơn 3 Chấu dọc Size 2/3 C9-C16 </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/artadn-sm.jpg"
                                                                            alt="ARTDNA" width="120" height="60"/></div>
                                </div>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/c9-p01-artdna.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt che Size S C9-P01" src="media/products/350/c9-p01.jpg" width="350"
                                             height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="money">12,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-25</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
9,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/c9-p01-artdna.html">
                                            Mặt che Size S C9-P01 </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/artadn-sm.jpg"
                                                                            alt="ARTDNA" width="120" height="60"/></div>
                                </div>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/c9-p09-artdna.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt che Size M C9-P09" src="media/products/350/c9-p09.jpg" width="350"
                                             height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="money">18,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-25</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
13,500 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/c9-p09-artdna.html">
                                            Mặt che Size M C9-P09 </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/artadn-sm.jpg"
                                                                            alt="ARTDNA" width="120" height="60"/></div>
                                </div>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t31-hbp-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="N&#250;t nhấn chu&#244;ng 10A, size E (3S) cắm nhanh M3T31_HBP_WE"
                                             src="media/products/350/m3t31-hbp-we.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>

                                            <span class="money">68,200 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
42,966 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t31-hbp-we.html">
                                            N&#250;t nhấn chu&#244;ng 10A, size E (3S) cắm nhanh M3T31_HBP_WE </a>
                                    </h4>
                                    <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                            alt="Schneider" width="120" height="60"/>
                                    </div>
                                </div>


                            </div>

                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t31-d20n-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 2 cực 20A, size S M3T31_D20N_WE" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/m3t31-d20n-we.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">148,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
93,555 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t31-d20n-we.html">
                                            C&#244;ng tắc 2 cực 20A, size S M3T31_D20N_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t31-e2-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 2 chiều 16AX, size E (3S) cắm nhanh M3T31_E2_WE"
                                             class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/m3t31-e2-we.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">73,700 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
46,431 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t31-e2-we.html">
                                            C&#244;ng tắc 2 chiều 16AX, size E (3S) cắm nhanh M3T31_E2_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t31-2-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 2 chiều 16AX, size S cắm nhanh M3T31_2_WE" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/m3t31-2-we.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">40,700 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
25,641 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t31-2-we.html">
                                            C&#244;ng tắc 2 chiều 16AX, size S cắm nhanh M3T31_2_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t1v400fm-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc điều chỉnh tốc độ quạt, size S, 40-500W M3T1V400FM_WE"
                                             class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/m3t1v400fm-we.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">317,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
200,277 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t1v400fm-we.html">
                                            C&#244;ng tắc điều chỉnh tốc độ quạt, size S, 40-500W M3T1V400FM_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/m3t1v400dm-we.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc điều chỉnh độ s&#225;ng đ&#232;n, size S, 1-400W M3T1V400DM_WE"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/m3t1v400dm-we.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">331,100 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
208,593 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/m3t1v400dm-we.html">
                                            C&#244;ng tắc điều chỉnh độ s&#225;ng đ&#232;n, size S, 1-400W
                                            M3T1V400DM_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/kb34-we-schneider.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Bộ c&#244;ng tắc 4, hai chiều m&#224;u trắng KB34_WE" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/kb34.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">312,400 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-38</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
193,688 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/kb34-we-schneider.html">
                                            Bộ c&#244;ng tắc 4, hai chiều m&#224;u trắng KB34_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/kb34-as-schneider.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Bộ c&#244;ng tắc 4, hai chiều m&#224;u bạc KB34_AS" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/kb34-as-iopmain-oda19.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">348,700 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-38</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
216,194 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/kb34-as-schneider.html">
                                            Bộ c&#244;ng tắc 4, hai chiều m&#224;u bạc KB34_AS </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/kb32x-we-schneider.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="2G WALL PLATE 30 mech W/ APO TIME, WE KB32X_WE" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/kb32-we-iopgp-oda18.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">114,400 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-38</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
70,928 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/kb32x-we-schneider.html">
                                            2G WALL PLATE 30 mech W/ APO TIME, WE KB32X_WE </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/schneider-sm.jpg"
                                                                             alt="Schneider" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/ct01-pir-300w-rang-dong.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc cảm biến Model: CT01.PIR CT01.PIR 300W" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/ct01-pir.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">213,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
149,100 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/ct01-pir-300w-rang-dong.html">
                                            C&#244;ng tắc cảm biến Model: CT01.PIR CT01.PIR 300W </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/rang-dong-sm.jpg"
                                                                             alt="Rạng Đ&#244;ng" width="120"
                                                                             height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/lioa-v20sdnv2x.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="Ổ cắm đơn đa năng 16a với 2 lỗ v&#224; viền đơn trắng V20SDNV2X V20SDNV2X"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20sdn2x_971.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">34,700 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
27,760 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/lioa-v20sdnv2x.html">
                                            Ổ cắm đơn đa năng 16a với 2 lỗ v&#224; viền đơn trắng V20SDNV2X </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/hop-dieu-khien-tu-xa-smart.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Hộp điều khiển từ xa Smart SB01/SC" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/sb01-sc.PNG"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">408,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
245,340 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/hop-dieu-khien-tu-xa-smart.html">
                                            Hộp điều khiển từ xa Smart SB01/SC </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/lioa-se183u.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Ổ cắm ba 2 chấu 16A SE183U SE183U" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/se183u_561.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">46,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
36,800 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/lioa-se183u.html">
                                            Ổ cắm ba 2 chấu 16A SE183U </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/cong-tac-20a-nb6202k-d.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 20A NB6 202K/D" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/NB6202K D.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">273,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
191,730 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/cong-tac-20a-nb6202k-d.html">
                                            C&#244;ng tắc 20A NB6 202K/D </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lonon-sm.jpg" alt="LONON"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/wsbc9120sw-vn.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Ổ cắm chuy&#234;n d&#249;ng cho m&#225;y cạo r&#226;u WSBC9120SW-VN"
                                             class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/wsbc9120sw-vn.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">1,490,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
1,043,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/wsbc9120sw-vn.html">
                                            Ổ cắm chuy&#234;n d&#249;ng cho m&#225;y cạo r&#226;u WSBC9120SW-VN </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/panasonic-sm.jpg"
                                                                             alt="Panasonic" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/webp1041b-mh.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Bộ ổ cắm đa năng chuẩn BS, 250 VAC - 13A WEBP1041B-MH" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/webp1041b-mh.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">250,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
175,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/webp1041b-mh.html">
                                            Bộ ổ cắm đa năng chuẩn BS, 250 VAC - 13A WEBP1041B-MH </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/panasonic-sm.jpg"
                                                                             alt="Panasonic" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/wnbp5428690fk.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="Bộ c&#244;ng tắc D 2 cực c&#243; đ&#232;n b&#225;o, 250VAC - 45A WNBP5428690FK"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/wnbp5428690fk.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">450,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
315,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/wnbp5428690fk.html">
                                            Bộ c&#244;ng tắc D 2 cực c&#243; đ&#232;n b&#225;o, 250VAC - 45A
                                            WNBP5428690FK </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/panasonic-sm.jpg"
                                                                             alt="Panasonic" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/cong-tac-ba-hai-chieu-16a-250v-hy3q-2y.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc ba hai chiều 16A 250V HY3Q/2Y" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/HY3Q 2Y.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">226,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-30</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
158,830 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/cong-tac-ba-hai-chieu-16a-250v-hy3q-2y.html">
                                            C&#244;ng tắc ba hai chiều 16A 250V HY3Q/2Y </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/honeywell-sm.jpg"
                                                                             alt="Honeywell" width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/bo-cong-tac-2-hat-1-chieu-2-hat-2-chieu.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Bộ c&#244;ng tắc 2 hạt 1 chiều &amp; 2 hạt 2 chiều M6542" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/M6542.JPG"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">98,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-25</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
73,500 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/bo-cong-tac-2-hat-1-chieu-2-hat-2-chieu.html">
                                            Bộ c&#244;ng tắc 2 hạt 1 chiều &amp; 2 hạt 2 chiều M6542 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/roman-sm.jpg" alt="Roman"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/bo-cong-tac-3-hat-1-chieu-1-hat-2-chieu.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Bộ c&#244;ng tắc 3 hạt 1 chiều &amp; 1 hạt 2 chiều M6543" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/M6543.JPG"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">92,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-25</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
69,000 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/bo-cong-tac-3-hat-1-chieu-1-hat-2-chieu.html">
                                            Bộ c&#244;ng tắc 3 hạt 1 chiều &amp; 1 hạt 2 chiều M6543 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/roman-sm.jpg" alt="Roman"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/dimmer-dieu-chinh-do-sang-den-400w.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Dimmer điều chỉnh độ s&#225;ng đ&#232;n 400W S7DIM/L" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S7DIM-L.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">457,400 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
274,440 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/dimmer-dieu-chinh-do-sang-den-400w.html">
                                            Dimmer điều chỉnh độ s&#225;ng đ&#232;n 400W S7DIM/L </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link"
                                   href="products/dimmer-dieu-chinh-toc-do-quat-250w.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Dimmer điều chỉnh tốc độ quạt 250W S7DIM/F" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S7DIM-F.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">457,400 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
274,440 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/dimmer-dieu-chinh-toc-do-quat-250w.html">
                                            Dimmer điều chỉnh tốc độ quạt 250W S7DIM/F </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/cong-tac-2-cuc-20a-s7md20.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc 2 cực 20A S7MD20" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S7MD20.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">304,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
182,940 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/cong-tac-2-cuc-20a-s7md20.html">
                                            C&#244;ng tắc 2 cực 20A S7MD20 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/mat-4-cong-tac-1-chieu-16a-250v.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt 4 c&#244;ng tắc 1 chiều 16A-250V S704" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S704.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">216,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
129,600 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/mat-4-cong-tac-1-chieu-16a-250v.html">
                                            Mặt 4 c&#244;ng tắc 1 chiều 16A-250V S704 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/mat-3-cong-tac-1-chieu-16a-250v.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt 3 c&#244;ng tắc 1 chiều 16A-250V S703" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S703.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">153,800 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
92,280 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/mat-3-cong-tac-1-chieu-16a-250v.html">
                                            Mặt 3 c&#244;ng tắc 1 chiều 16A-250V S703 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/mat-2-cong-tac-2-chieu-16a-250v.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt 2 c&#244;ng tắc 2 chiều 16A-250V S702M" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S702M.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">146,200 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
87,720 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/mat-2-cong-tac-2-chieu-16a-250v.html">
                                            Mặt 2 c&#244;ng tắc 2 chiều 16A-250V S702M </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/mat-2-cong-tac-1-chieu-16a-250v.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt 2 c&#244;ng tắc 1 chiều 16A-250V S702" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S702.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">142,300 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
85,380 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/mat-2-cong-tac-1-chieu-16a-250v.html">
                                            Mặt 2 c&#244;ng tắc 1 chiều 16A-250V S702 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/mat-1-cong-tac-2-chieu-16a-250v.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="Mặt 1 c&#244;ng tắc 2 chiều 16A-250V S701M" class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/S701M.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">116,900 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
70,140 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/mat-1-cong-tac-2-chieu-16a-250v.html">
                                            Mặt 1 c&#244;ng tắc 2 chiều 16A-250V S701M </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/mpe-sm.jpg" alt="MPE"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/lioa-e201d1n.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img alt="C&#244;ng tắc đơn chữ nhật bản nhỏ 1 chiều 10A E201D1N E201D1N"
                                             class="lazy"
                                             data-src="https://www.thietbidiendgp.vn/media/products/350/e201d1n_231.jpg"
                                             src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">29,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
23,600 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/lioa-e201d1n.html">
                                            C&#244;ng tắc đơn chữ nhật bản nhỏ 1 chiều 10A E201D1N </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20am2d3n3.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc ba 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D3N3 V20AM2D3N3"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20am2d3n3_361.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">96,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
76,800 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20am2d3n3.html">
                                            C&#244;ng tắc ba 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D3N3 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20a2d3n3.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc ba 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D3N3 V20A2D3N3"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20a2d3n3_371.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">96,000 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
76,800 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20a2d3n3.html">
                                            C&#244;ng tắc ba 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D3N3 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20am2d2n2.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc đ&#244;i 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D2N2 V20AM2D2N2"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20am2d2n2_351.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">71,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
57,200 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20am2d2n2.html">
                                            C&#244;ng tắc đ&#244;i 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D2N2 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20a2d2n2.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc đ&#244;i 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D2N2 V20A2D2N2"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20a2d2n2_381.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">71,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
57,200 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20a2d2n2.html">
                                            C&#244;ng tắc đ&#244;i 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D2N2 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20am2d1n1.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc đơn 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D1N1 V20AM2D1N1"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20am2d1n1_391.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">40,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
32,400 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20am2d1n1.html">
                                            C&#244;ng tắc đơn 2 chiều 10A c&#243; đ&#232;n b&#225;o V20AM2D1N1 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                        <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item
                                 tabindex="1">
                            <div class="productitem" data-product-item-content>
                                <a class="productitem--image-link" href="products/v20a2d1n1.html">
                                    <figure class="productitem--image" data-product-item-image>
                                        <img
                                            alt="C&#244;ng tắc đơn 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D1N1 V20A2D1N1"
                                            class="lazy"
                                            data-src="https://www.thietbidiendgp.vn/media/products/350/v20a2d1n1_401.jpg"
                                            src="images/load.jpg" width="350" height="350">

                                    </figure>
                                </a>
                                <div class="productitem--info">
                                    <div class="productitem--price ">
                                        <div class="price--compare-at visible" data-price-compare-at>
                                            <span class="money">40,500 VND</span>
                                        </div>
                                        <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-20</span>%
                    </span>
                                        <div class="price--main" data-price>
                    <span class="money">
32,400 <span>VND</span>
                    </span>
                                        </div>
                                    </div>
                                    <h4 class="productitem--title">
                                        <a href="products/v20a2d1n1.html">
                                            C&#244;ng tắc đơn 2 chiều 10A c&#243; đ&#232;n b&#225;o V20A2D1N1 </a>
                                    </h4>
                                    <span class="productitem--provider"><img src="media/brands/lioa-sm.jpg" alt="LiOA"
                                                                             width="120" height="60"/>  </span>

                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="utils-page">
                        <div class="pagination--container">
                            <ul class="pagination--inner">
                                <li>
                                    <span class="pagination--item pagination-info">1-40/462 </span>
                                </li>
                                <li class="pagination--active"><span class="pagination--item">1</span></li>
                                <li><a class="pagination--item" href="cong-tac4658.html?page=2">2</a></li>
                                <li><a class="pagination--item" href="cong-tac9ba9.html?page=3">3</a></li>
                                <li><a class="pagination--item" href="cong-tacfdb0.html?page=4">4</a></li>
                                <li class="pagination--next"><a class="pagination--item"
                                                                href="cong-tac4658.html?page=2">›</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="utils-sortby--modal" aria-hidden="true" data-productgrid-sort-content>
            <span class="utils-sortby--modal-title">
                Sắp xếp
            </span>
                <ul class="utils-sortby--modal-list">
                    <li class="utils-sortby--modal-item">
                        <button class="utils-sortby--modal-button utils-sortby--modal-button--active" value="default"
                                data-productgrid-trigger-sort-button disabled>
                            Mặc định
                        </button>
                    </li>
                    <li class="utils-sortby--modal-item">
                        <button class="utils-sortby--modal-button" value="asc" data-productgrid-trigger-sort-button>
                            Giá, thấp -> cao
                        </button>
                    </li>
                    <li class="utils-sortby--modal-item">
                        <button class="utils-sortby--modal-button" value="des" data-productgrid-trigger-sort-button>
                            Giá, cao -> thấp
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="product--sidebar-out" style="background:#F3F7FD">
            <div class="product--sidebar grid">
                <a class='product--sidebar--item' href='cong-tac-dien.html'><img src='media/category/cong-tac.jpg'
                                                                                 alt='Công tắc điện'/>
                    <h3 style='color:red'>Công tắc điện</h3></a><a class='product--sidebar--item'
                                                                   href='cong-tac.html'><img
                        src='media/category/cong-tac.jpg' alt='Công tắc'/>
                    <h3>Công tắc</h3></a><a class='product--sidebar--item' href='cong-tac-dong-ho.html'><img
                        src='media/category/0246a49d.jpg' alt='Công tắc đồng hồ'/>
                    <h3>Công tắc đồng hồ</h3></a><a class='product--sidebar--item'
                                                    href='cong-tac-dieu-khien-tu-xa.html'><img
                        src='media/category/cong-tac-ba-kawasan-cam-ung-cham-dieu-khien-tu-xa-dk3s.jpg'
                        alt='Công tắc điều khiển từ xa'/>
                    <h3>Công tắc điều khiển từ xa</h3></a><a class='product--sidebar--item'
                                                             href='cong-tac-cam-ung.html'><img
                        src='media/category/RS03.jpg' alt='Công tắc cảm ứng hồng ngoại vi sóng'/>
                    <h3>Công tắc cảm ứng hồng ngoại vi sóng</h3></a><a class='product--sidebar--item'
                                                                       href='cong-tac-cam-ung-cham.html'><img
                        src='media/category/CT%20Wifi_3B.jpg' alt='Công tắc cảm ứng chạm'/>
                    <h3>Công tắc cảm ứng chạm</h3></a>
            </div>
        </div>

        <div class="productgrid--outer layout--no-sidebar" style="margin-top: 70px;">
            <div class="product-section--heading">
                <h2 class="product-section--title related-products--title">
                    <a href="khuyen-mai.html" style="color: #d60808;">Sản phẩm đang giảm giá</a>
                </h2>
                <span class="right-view-more"><a href="khuyen-mai.html" style="color: #d60808;">Xem thêm »</a></span>
            </div>
            <div class="productgrid--items">
                <article class="productgrid--item  imagestyle--natural productitem--sale productitem--emphasis"
                         data-product-item tabindex="1">
                    <div class="productitem" data-product-item-content>
                        <a class="productitem--image-link" href="products/bo-o-cam-don-3-chau-va-1-lo-trong.html">
                            <figure class="productitem--image" data-product-item-image>
                                <img alt="Bộ ổ cắm đơn 3 chấu v&#224; 1 lỗ trống E426UEX_G19"
                                     src="media/products/350/e426uex-g19.jpg" width="350" height="350">

                            </figure>
                        </a>
                        <div class="productitem--info">
                            <div class="productitem--price ">
                                <div class="price--compare-at visible" data-price-compare-at>

                                    <span class="money">156,200 VND</span>
                                </div>
                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-42</span>%
                    </span>
                                <div class="price--main" data-price>
                    <span class="money">
90,596 <span>VND</span>
                    </span>
                                </div>
                            </div>
                            <h4 class="productitem--title">
                                <a href="products/bo-o-cam-don-3-chau-va-1-lo-trong.html">
                                    Bộ ổ cắm đơn 3 chấu v&#224; 1 lỗ trống E426UEX_G19 </a>
                            </h4>
                            <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg" alt="Schneider"
                                                                    width="120" height="60"/></div>
                        </div>


                    </div>

                </article>
                <article class="productgrid--item  imagestyle--natural productitem--sale productitem--emphasis"
                         data-product-item tabindex="1">
                    <div class="productitem" data-product-item-content>
                        <a class="productitem--image-link" href="products/bo-o-cam-don-2-chau-1-lo-trong.html">
                            <figure class="productitem--image" data-product-item-image>
                                <img alt="Bộ ổ cắm đơn 2 chấu 1 lỗ trống E426UX_G19"
                                     src="media/products/350/e426ux-g19.jpg" width="350" height="350">

                            </figure>
                        </a>
                        <div class="productitem--info">
                            <div class="productitem--price ">
                                <div class="price--compare-at visible" data-price-compare-at>

                                    <span class="money">112,200 VND</span>
                                </div>
                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-37</span>%
                    </span>
                                <div class="price--main" data-price>
                    <span class="money">
70,686 <span>VND</span>
                    </span>
                                </div>
                            </div>
                            <h4 class="productitem--title">
                                <a href="products/bo-o-cam-don-2-chau-1-lo-trong.html">
                                    Bộ ổ cắm đơn 2 chấu 1 lỗ trống E426UX_G19 </a>
                            </h4>
                            <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg" alt="Schneider"
                                                                    width="120" height="60"/></div>
                        </div>


                    </div>

                </article>
                <article class="productgrid--item  imagestyle--natural productitem--sale productitem--emphasis"
                         data-product-item tabindex="1">
                    <div class="productitem" data-product-item-content>
                        <a class="productitem--image-link" href="products/bo-o-cam-don-2-chau-2-lo-trong.html">
                            <figure class="productitem--image" data-product-item-image>
                                <img alt="Bộ ổ cắm đơn 2 chấu 2 lỗ trống E426UXX_G19"
                                     src="media/products/350/e426uxx-g19.jpg" width="350" height="350">

                            </figure>
                        </a>
                        <div class="productitem--info">
                            <div class="productitem--price ">
                                <div class="price--compare-at visible" data-price-compare-at>

                                    <span class="money">112,200 VND</span>
                                </div>
                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-42</span>%
                    </span>
                                <div class="price--main" data-price>
                    <span class="money">
65,076 <span>VND</span>
                    </span>
                                </div>
                            </div>
                            <h4 class="productitem--title">
                                <a href="products/bo-o-cam-don-2-chau-2-lo-trong.html">
                                    Bộ ổ cắm đơn 2 chấu 2 lỗ trống E426UXX_G19 </a>
                            </h4>
                            <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg" alt="Schneider"
                                                                    width="120" height="60"/></div>
                        </div>


                    </div>

                </article>
                <article class="productgrid--item  imagestyle--natural productitem--sale productitem--emphasis"
                         data-product-item tabindex="1">
                    <div class="productitem" data-product-item-content>
                        <a class="productitem--image-link" href="products/bo-o-cam-don-2-chau-16a.html">
                            <figure class="productitem--image" data-product-item-image>
                                <img alt="Bộ ổ cắm đơn 2 chấu 16A E426UST_G19" src="media/products/350/e426ust-g19.jpg"
                                     width="350" height="350">

                            </figure>
                        </a>
                        <div class="productitem--info">
                            <div class="productitem--price ">
                                <div class="price--compare-at visible" data-price-compare-at>

                                    <span class="money">74,800 VND</span>
                                </div>
                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-42</span>%
                    </span>
                                <div class="price--main" data-price>
                    <span class="money">
43,384 <span>VND</span>
                    </span>
                                </div>
                            </div>
                            <h4 class="productitem--title">
                                <a href="products/bo-o-cam-don-2-chau-16a.html">
                                    Bộ ổ cắm đơn 2 chấu 16A E426UST_G19 </a>
                            </h4>
                            <div class="productitem--provider"><img src="media/brands/schneider-sm.jpg" alt="Schneider"
                                                                    width="120" height="60"/></div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')
    <style>

        .filter-content .heading {
            font-weight: bold;
            font-size: 24px;
            text-align: left;
        }

        .filter-content .heading .icon-filter {
            width: 26px;
            height: 26px;
            float: left;
            margin-top: 5px;
            margin-right: 3px;
        }

        .block-filter {
            background: #F3F7FD;
            clear: both;
            overflow: hidden;
        }

        .block-filter ul {
            padding-left: 0;
        }

        .block-filter li {
            padding: 5px 10px;
            display: block;
            border-bottom: 1px solid #D8E6F3;
            overflow: hidden;
        }


        .block-filter.fixtop {
            width: 270px;
            position: fixed;
            top: 112px;
        }

        .block-filter .head.head-filter {
            overflow: hidden;
            background: #125e9d;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
        }

        .head.head-filter .fa-filter {
            font-size: 18px;
            margin-right: 10px;
        }

        .block-filter li .head {
            overflow: hidden;
            padding: 3px 0;
            cursor: pointer;
        }

        .block-filter li .head span {
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        .block-filter li .body {
            clear: both;
            height: 0;
            overflow: hidden;
            transition: height 0.2s ease-out;
        }

        .block-filter li .head .fa-icon {
            width: 20px;
            height: 20px;
            z-index: 2;
            border: 1px dashed #ddd;
            background: #fff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKBAMAAAB/HNKOAAAAKlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKE86IAAAADnRSTlMABhMUHiYnOElZb+/1+1AcS30AAAAoSURBVAhbY2CYxgACPgEgkuUoEofjIojULgASTNtBTGsQk2E5AwwAAMdrBhc7Cq32AAAAAElFTkSuQmCC) 4px center no-repeat;
            float: right;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .block-filter li.active .head .fa-icon {
            transform: translateY(-50%) rotate(90deg);
        }

        .block-filter li.active .body {
            height: auto !important;
        }

        .block-filter li .body > div {
            float: left;
        }

        .block-filter li .body > div.space {
            font-weight: bold;
            margin: 12px 5px;
            width: 10px;
            height: 2px;
            background: #a7a7a7;
        }

        .block-filter li .body .filter-price-box {
            width: 115px;
            border-radius: 20px;
            border: 1px solid #D8E6F3;
            padding: 4px 10px;
            height: 25px;
            background: #E6EEFB;
            outline: none;
        }

        .block-filter li .body .filter-price-box::placeholder {
            color: #666;
        }

        .block-filter li .body .fitem {
            width: 47%;
            margin-right: 3%;
            margin-bottom: 3%;
            float: left;
            border: 1px solid #ebeef2;
            background: #E6EEFB;
            outline: none;
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            padding: 3px;
            cursor: pointer;
        }

        .block-filter li .body .fitem.active {
            background: #fcd77d;
            color: #1e1e1e;
        }

        .block-filter li .body .fitem:nth-of-type(2n) {
            margin-right: 0;
            text-align: center;
        }

        .block-filter li .body .fitem span {
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-all;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .block-filter .buttons {
            padding: 4px;
            background: #122C51;
            overflow: hidden;
            text-align: center;
            font-size: 15px;
        }

        .block-filter .buttons span {
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
            display: inline-block;
            width: 100px;
            text-align: center;
            cursor: pointer;
            background: rgb(224, 32, 32);
            background: linear-gradient(90deg, rgba(224, 32, 32, 1) 0%, rgba(255, 202, 0, 1) 100%);
            color: #fff;
            margin: 0 5px;
            border-radius: 4px;
            font-weight: bold;
        }

        .block-filter .buttons span.delete {
            background: #fff;
            color: #074371;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{asset('guest/js/slick.min.js')}}"></script>
    <script>
        function serialize(obj) {
            var str = [];
            for (var p in obj)
                if (obj.hasOwnProperty(p)) {
                    str.push(encodeURIComponent(p) + "=" + obj[p].join(','));
                }
            return str.join("&");
        }
        function applyFilter() {
            var filters = [];
            $("#boxFilter li .fitem.active").each(function() {
                var category = $(this).closest('li').data('category');
                if(filters[category]) {
                    filters[category].push($(this).data('filter'));
                } else {
                    filters[category] = [];
                    filters[category].push($(this).data('filter'));
                }
            });
            var url = $("#boxFilter").data('url');
            if(filters) {
                url += '?'+serialize(filters);
            }
            url += "&sort_by=" + $('#product_grid_sort option:selected').val();
            window.location = url ;
        }
        $(document).ready(function () {
            $(".block-filter .head").click(function(){
                $(this).parent().toggleClass("active");
            });
            $("#boxFilter li .fitem").click(function() {
                $(this).toggleClass('active');
            });
            $("#btnFilterSubmit").click(function() {
                applyFilter();
            });
        })
    </script>
@endpush

@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div id="shopify-section-static-product" class="shopify-section product--section">
            <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope itemtype='http://schema.org/BreadcrumbList'>
                <div class="breadcrumb-home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{ route('index')  }}" itemprop="item">
                        <span itemprop="name" >Trang chủ</span>
                        <meta itemprop="position" content="1">
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{route('hang.chitiet',$product->brand->slug)}}" itemprop="item">
                        <span itemprop="name">{{$product->brand->name}}</span>
                        <meta itemprop="position" content="2">
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{route('hang.danhmuc',[$product->brand->slug, $product->category->slug])}}" itemprop="item">
                        <span itemprop="name">{{$product->category->name}}</span>
                        <meta itemprop="position" content="3">
                    </a>
                </div>
            </nav>
            <section class="product--container layout--two-col" data-product-wrapper>

                <article class="product--outer" itemscope itemtype="http://schema.org/Product">
                    <meta itemprop="url" content="{{route('products.detail',$product->slug)}}">
                    <meta itemprop="image" content="{{asset($product->image)}}">
                    <meta itemprop="description" content="{{$product->description}}">
                    <div class="product-gallery" data-product-image>
                        <img src="{{asset($product->image)}}" data-src="{{asset($product->image)}}" data-image="" alt="{{asset($product->name)}}" class="lazy" width="800" height="800">
                    </div>
                    <div class="product-infomation">
                        <h1 class="product-title" itemprop="name">
                            {{$product->name}}
                            @if($product->attributes[0])
                            <span>{{$product->attributes[0]->codename}}</span>
                            @endif
                        </h1>
                        <div class="product-main" data-product-details>
                            <div class="product-details">
                                <p class="product-serial">4/6/8/12/18/24/36 đường</p>
                                <div class="product-vendor" itemprop="brand" itemscope itemtype="http://schema.org/Brand">
                                    <a href="{{route('hang.chitiet',$product->brand->slug)}}">
                                        <img src="{{asset($product->brand->image)}}" alt="{{$product->brand->name}}" itemprop="logo" width="80" height="40" />
                                    </a>
                                    <meta itemprop="name" content="{{$product->brand->name}}">
                                </div>
                                <div class="productitem-ratings">
                                    <span class="spr-badge" id="spr_badge_741" data-rating="0.0">
                                        <span class="spr-starrating spr-badge-starrating">
                                            <i class="spr-icon spr-icon-star"></i>
                                            <i class="spr-icon spr-icon-star"></i>
                                            <i class="spr-icon spr-icon-star"></i>
                                            <i class="spr-icon spr-icon-star"></i>
                                            <i class="spr-icon spr-icon-star"></i>
                                        </span>
                                    </span>
                                </div>

                                <div class="product-pricing">
                                    <div class="product--price">
                                        @if(isset($product->attributes))

                                            @if($product->attributes[0]->price)
                                                <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                                    <meta itemprop="priceCurrency" content="VND">
                                                    <meta itemprop="price" content="{{$product->attributes[0]->price}}" />
                                                    <link itemprop="availability" href="http://schema.org/InStock">
                                                </div>
                                            @endif

                                            @if($product->attributes[0]->discount > 0)
                                                <div class="price--main" data-price="">
                                                    <span class="money money--style">{{number_format($product['attributes'][0]['price'] - ($product['attributes'][0]['price']*$product['attributes'][0]['discount']/100))}} <span>VND</span></span>
                                                </div>
                                                <div class="price--compare-at" data-price-compare-at="">
                                                    <span class="money">{{number_format($product['attributes'][0]['price'])}} VND</span>
                                                </div>
                                                <span class="productitem--badge badge--ck" data-badge-sales="">-<span data-price-percent-saved="">{{round($product['attributes'][0]['discount'],2)}}</span>%</span>
                                            @elseif($product->attributes[0]->price === 0 || $product->attributes[0]->price == "")
                                                <div class="price--main" data-price="">
                                                    <span class="money money--style">Giá: liên hệ</span>
                                                </div>
                                            @else
                                                <div class="price--compare-at" data-price-compare-at>
                                                    <span class="money">{{$product->attributes[0]->price}} VND</span>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                                <div style="font-style: italic;color: #d31d1d;font-size: 14.5px;margin-bottom: 6px;">Giá sản phẩm rẻ hơn khi mua số lượng nhiều
                                    @if(!empty($info->email))
                                    <i style="font-size:14.5px;color:#222;display:block;">(vui lòng thêm vào báo giá để nhận báo giá hoặc qua email: {{$info->email}})</i>
                                    @endif
                                </div>
                            </div>
                            <div class="product-description rte" data-product-description="">
                                <meta charset="utf-8">
                                <div class="unco">
                                    <div class="row">
                                        <ul class="product--topinfo">
                                            <li><i>Mã sản phẩm:</i> <b data-code="">{{$product->attributes[0]->codename}}</b> </li>
                                            <li><i>Thương hiệu:</i><a href="{{route('hang.danhmuc',[$product->brand->slug,$product->category->slug])}}" class="_1line">{{$product->category->name}} ({{$product->brand->name}})</a></li>                                        <li><i>Bảo hành:</i> <b>1-3 năm (theo NSX)</b></li>
                                            <li><i>Loại:</i> <a href="/san-pham/thiet-bi-tu-dien/tu-nhua">Tủ điện nhựa</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-form--regular" data-product-form-regular="">
                            </div>
                            <div class="clearfix"></div>

                            <div class="product--tags">
                                <span>Tags: <a href='/thiet-bi-dien/tủ-nhựa-schneider' rel='tag'>tủ nhựa schneider</a> <span>, </span> Tủ điện nhựa mua ở đâu, báo giá, giá rẻ, giá tốt, chính hãng, quận 2, quận 9, thủ đức, tại tphcm</span>
                            </div>
                            <div class="small-12 columns">
                                <div>
                                    <div class="product-price--table">
                                        <a  href="https://www.thietbidiendgp.vn/bang-gia/schneider/356" target="_blank"><i></i>Xem Bảng Gi&#225; SCHNEIDER 08/2021</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-form--alt" data-product-form-alt="">
                            <div data-product-form-area="">

                                <div class="notification">
                                    <p class="messa">Sản phẩm có nhiều loại/mẫu, vui lòng chọn để thêm vào bảng giá. <span style="color: #fff;text-decoration: underline;cursor:pointer" onclick="gotolist();">Hoặc xem giá bên dưới.</span> </p>

                                    <svg class="svg-close"></svg>
                                    <div class="arrow"></div>
                                </div>
                                <form method="post" action="/cart/add" data-product-form="">

                                    <div data-product-options-container="">
                                        <select name="id" data-variants="" class="form-options no-js-required">
                                            <option data-variant-id="13919" data-sku="13919" value="13919" selected="selected">16A - 66660</option>
                                            <option data-variant-id="13920" data-sku="13920" value="13920" anchor_13920="">32A - 98340</option>
                                        </select>
                                        <div class="form-field form-options js-required">
                                            <div class="form-field-select-wrapper">
                                                <select class="form-field-input form-field-select form-field-filled" data-product-option="0">
                                                    <option value="16A" selected="selected">16A -- 66,660 VND</option>
                                                    <option value="32A" anchor_13920="">32A -- 98,340 VND</option>
                                                </select>
                                                <label class="form-field-title">Mẫu</label>
                                                <svg class="svg-chevron-down"></svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-form--atc">
                                        <div class="product-form--atc-qty form-fields--qty" data-quantity-wrapper="">
                                            <div class="form-field form-field--qty-select visible">
                                                <div class="form-field-select-wrapper">
                                                    <select class="form-field-input form-field-select form-field-filled" aria-label="Số lượng" data-quantity-select="">
                                                        <option selected="" value="1"> 1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10+">10+</option>
                                                    </select>

                                                    <label class="form-field-title" style="top:6px;font-size:13px;">
                                                        Số lượng
                                                    </label>
                                                    <svg class="svg-chevron-down"></svg>

                                                </div>
                                            </div>
                                            <div class="form-field form-field--qty-input hidden">
                                                <input class="form-field-input form-field-number form-field-filled" value="1" name="quantity" type="text" pattern="\d*" aria-label="Số lượng" data-quantity-input="">
                                                <label class="form-field-title" style="top:6px;font-size:13px;">Số lượng</label>
                                            </div>
                                        </div>
                                        <button class="product-form--atc-button " type="submit" data-product-atc="">
                                        <span class="atc-button--text">
                                            Thêm vào báo giá
                                        </span>
                                            <span class="atc-button--icon">

                                            <svg class="svg-loader"></svg>
                                        </span>
                                        </button>
                                    </div>

                                    <div class="box-feeship">
                                        <h6>Đặt hàng và nhận báo giá</h6>

                                        <p>Xem <a href="/pages/huong-dan-mua-hang"><i>Hướng dẫn mua hàng</i></a> hoặc <a href="/pages/bao-hanh-doi-tra"><i>Bảo hành &amp; đổi trả</i></a></p>
                                        <div><a class="RRQQWe" href="https://maps.google.com/maps?cid=3955612946622686792&amp;_ga=2.269134454.624368395.1594018748-1236053085.1594018748" target="_blank"><div class="fbNEY"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill:transparent"><path fill="#EA4335" d="M9.84,6.93L6.4,4.04c-1.07,1.26-1.7,2.9-1.7,4.68c0,1.38,0.27,2.48,0.73,3.47l4.37-5.2  C9.8,6.97,9.81,6.95,9.84,6.93z"></path><path fill="#1A73E8" d="M11.97,1.44c-2.24,0-4.24,1.01-5.58,2.6l3.45,2.89c0.01-0.01,0.02-0.02,0.03-0.03l4.29-5.12  C13.47,1.56,12.73,1.44,11.97,1.44z"></path><path fill="#4285F4" d="M14.12,10.48l4.31-5.13c-0.88-1.69-2.41-2.99-4.26-3.57L9.83,6.93l0,0c0.51-0.61,1.28-1,2.14-1  c1.54,0,2.78,1.25,2.78,2.78C14.75,9.39,14.52,10,14.12,10.48z"></path><path fill="#FBBC04" d="M5.42,12.2c0.76,1.67,2.02,3.01,3.32,4.69l5.36-6.38l0,0c-0.51,0.6-1.28,0.99-2.12,0.99  c-1.54,0-2.78-1.25-2.78-2.78c0-0.65,0.23-1.26,0.61-1.74L5.42,12.2z"></path><path fill="#34A853" d="M19.25,8.72c0-1.22-0.3-2.36-0.83-3.37l-4.29,5.12c-0.01,0.01-0.01,0.02-0.03,0.03l-5.36,6.39  c0.42,0.54,0.85,1.13,1.26,1.77c1.48,2.28,1.04,3.65,1.97,3.65c0.96,0,0.53-1.37,2.01-3.65C16.42,14.87,19.25,13.14,19.25,8.72z"></path></svg></div><div class="MKOiO">Chỉ đường trên Google Maps</div></a></div>
                                    </div>

                                </form>
                                <div class="clear-fix"></div>
                                <aside class="share-buttons">
                                    <div class="box-support">
                                        <p class="title">Hỗ trợ trực tuyến</p>
                                        <p class="stitle1">Phòng kinh doanh</p>


                                        <div class="links">
                                            <div class="avatar">
                                                <img src="/images/team/dgp.jpg" data-src="/images/team/dgp.jpg" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                            </div>
                                            <a href="tel:0708757877" title="Bấm để Gọi tư vấn"> 0708 75 7877</a>
                                            <a class="zalo" href="https://zalo.me/0708757877" title="Bấm để Chát tư vấn" target="_blank"> Chát Zalo</a>
                                        </div>
                                        <div class="links">
                                            <div class="avatar">
                                                <img src="/images/team/thanhquy.jpg" data-src="/images/team/thanhquy.jpg" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                            </div>
                                            <a href="tel:0909617877" title="Bấm để Gọi tư vấn"> 0909 61 7877</a>
                                            <a class="zalo" href="https://zalo.me/0909617877" title="Bấm để Chát tư vấn" target="_blank"> Chát Zalo</a>
                                        </div>
                                        <div class="links">
                                            <div class="avatar">
                                                <img src="/images/team/loan.jpg" data-src="/images/team/loan.jpg" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                            </div>
                                            <a href="tel:0938397877" title="Bấm để Gọi tư vấn"> 0938 39 7877</a>
                                            <a class="zalo" href="https://zalo.me/0938397877" title="Bấm để Chát tư vấn" target="_blank"> Chát Zalo</a>
                                        </div>


                                        <div class="links">
                                            <div class="avatar">
                                                <img src="/images/team/dang-hong-thai-2.jpg" data-src="/images/team/dang-hong-thai-2.jpg" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                            </div>
                                            <a href="tel:0938397877" title="Bấm để Gọi tư vấn"> 0909 25 7877</a>
                                            <a class="zalo" href="https://zalo.me/0909257877" title="Bấm để Chát tư vấn" target="_blank"> Chát Zalo</a>
                                        </div>
                                        <p class="stitle2">Phòng kỹ thuật</p>
                                        <div class="links">
                                            <div class="avatar">
                                                <img src="/images/team/dang-hong-thai.jpg" data-src="/images/team/dang-hong-thai.jpg" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                            </div>
                                            <a href="tel:0909257877" title="Bấm để Gọi tư vấn"> 0909 25 7877</a>
                                            <a class="zalo" href="https://zalo.me/0909257877" title="Bấm để Chát tư vấn" target="_blank"> Chát Zalo</a>
                                        </div>


                                    </div>

                                </aside>

                            </div>
                        </div>
                        <div class="product-descriptions">
                            <div style="padding: 5px 10px;border: 1px solid #baebb1;font-size: 14px;line-height: 17px;background: #e5fbe0;border-radius: 4px;margin: 8px 0;box-shadow: rgb(160, 160, 160) 1px 1px 1px -1px;opacity: 0.8;"><b style="color: #299615;text-transform: uppercase;text-decoration: underline;">ƯU ĐÃI TRONG THÁNG 09</b><br>Quý khách hàng có nhu cầu mua số lượng lớn thiết bị điện thương hiệu <b style="color: #299615;">Schneider</b>, vui lòng gửi yêu cầu báo giá qua email <a href="mailto:sale@thiebidiendgp.vn" style="color: #299615;">sale@thiebidiendgp.vn</a> hoặc báo giá trực tiếp trên website để nhận chiết khấu <b style="color: #299615;">ƯU ĐÃI TỐT NHẤT</b> trong tháng 09.<br></div>                                                    <div class="product--description" id="lists">
                                <div class="product--description-content">
                                    <p class="description-content--title">Các dòng sản phẩm</p>
                                    <div class="table-outer">
                                        <table>
                                            <tr>
                                                <td>Stt</td>
                                                <td>Ảnh</td>
                                                <td>Mẫu</td>
                                                <td>Mã</td>
                                                <td>K&#237;ch thước (WxHxD)</td>
                                                <td class="table--price">Giá list (VND)</td>
                                                <td style="text-align:center;">CK</td>
                                                <td class="table--price">Giá bán (VND)</td>
                                            </tr>
                                            <tr>
                                                <td width="30">1</td>
                                                <td class="table--img"><img src="./images/load.jpg" data-src="/media/products/50/MIP22104T.JPG" width="50" height="50" class="lazy"/></td>
                                                <td>Chứa 4 đường</td>
                                                <td>MIP22104T</td>
                                                <td>150x252x98 mm</td>
                                                <td class="table--price">452,100</td>
                                                <td style="text-align:center;">45%</td>
                                                <td class="table--price">248,655</td>
                                            </tr>
                                            <tr>
                                                <td width="30">2</td>
                                                <td class="table--img"><img src="./images/load.jpg" data-src="/media/products/50/MIP22104T.JPG" width="50" height="50" class="lazy"/></td>
                                                <td>Chứa 6 đường</td>
                                                <td>MIP22106T</td>
                                                <td>186x252x98 mm</td>
                                                <td class="table--price">499,400</td>
                                                <td style="text-align:center;">45%</td>
                                                <td class="table--price">274,670</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <p class="description-notification">Thông tin sản phẩm được cập nhật ngày <span>13/09/2021</span>. Nếu GIÁ hoặc CHIẾC KHẤU có thể chưa được cập nhật mới, Quý khách hàng có nhu cầu vui lòng liên hệ báo giá qua email <a href="mailto:sale@thietbidiendgp.vn" style="color: orangered;font-weight:500">sale@thietbidiendgp.vn</a> để nhận thông tin giá chính xác nhất. Cảm ơn. </p>
                                </div>
                            </div>

                            <div class="clear-fix"></div>
                            <div class="description-outer">
                                <p class="description-content--title">Thông số kỹ thuật</p>
                                <div class="clearfix"></div>
                                <div class="tech--info">
                                    <p>Thông số kỹ thuật đang được cập nhật <i>(hoặc xem mô tả bên dưới)</i></p>
                                </div>
                                <div class="clear-fix"></div>
                                <br />
                                <div class="product--description">
                                    <div class="product--description-content">

                                        <p><img alt="" height="1807" class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAQAAAA3fa6RAAAADklEQVR42mNkAANGCAUAACMAA2w/AMgAAAAASUVORK5CYII=" data-src="https://www.thietbidiendgp.vn/media/uploads/prices/SCHNEIDER-T082021/SCHNEIDER-T08-2021_35.jpeg" width="1250" /></p>

                                        <a style="display:none" href="https://www.thietbidiendgp.vn/products/tu-dien-nhua-am-tuong-cua-mo" rel="dofollow">Tủ điện nhựa &#226;m tường cửa mờ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <section class="product-section--container product-row--container related-products--container" data-related-products>
                <div class="product-section--heading">
                    <h2 class="product-section--title related-products--title">
                        <a href="/hang/schneider/thiet-bi-tu-dien/tu-dien-nhua-am-tuong-minipragma">Tủ điện nhựa &#226;m tường - Mini pragma (Schneider)</a>
                    </h2>
                    <span class="right-view-more"><a href="/hang/schneider/thiet-bi-tu-dien/tu-dien-nhua-am-tuong-minipragma">Xem thêm »</a></span>
                </div>

                <div class="product-section--content product-row--scroller product-row--count-5">
                    <div class="product-row--outer">
                        <div id="loading" style="display:none"><span><img src="./images/ajax-loader.gif" align="center" valign="middle" border="0" />&nbsp;Loading... </span></div>
                        <div id="otherRelates">
                            <div class="product-row--inner">
                                <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                    <div class="productitem" data-product-item-content>
                                        <a class="productitem--image-link" href="/products/ez9e108s2f">
                                            <figure class="productitem--image" data-product-item-image>
                                                <img alt="Tủ điện &#226;m tường Schneider 8 đến 36 đường EZ9E108S2F" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/ez9e.JPG"  src="./images/load.jpg"  width="350" height="350">

                                            </figure>
                                        </a>
                                        <div class="productitem--info">
                                            <div class="productitem--price ">
                                                <div class="price--compare-at visible" data-price-compare-at>
                                                    <span class="money">229,900 VND</span>
                                                </div>
                                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-35</span>%
                    </span>
                                                <div class="price--main" data-price>
                    <span class="money">
149,435 <span>VND</span>
                    </span>
                                                </div>
                                            </div>
                                            <h4 class="productitem--title">
                                                <a href="/products/ez9e108s2f">
                                                    Tủ điện &#226;m tường Schneider 8 đến 36 đường                </a>
                                            </h4>
                                            <div class="productitem--desc">
                                                <span>8-36 đường</span>
                                            </div>
                                            <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/schneider-sm.jpg" alt="Schneider"  width="120" height="60"/>  </span>

                                        </div>
                                        <span class="clabel">5 mẫu</span>
                                    </div>
                                </article><article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                    <div class="productitem" data-product-item-content>
                                        <a class="productitem--image-link" href="/products/tu-dien-nhua-am-tuong-cua-trang-mip22104">
                                            <figure class="productitem--image" data-product-item-image>
                                                <img alt="Tủ điện nhựa &#226;m tường cửa trắng MIP22104" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/MIP22 tr.jpg"  src="./images/load.jpg"  width="350" height="350">

                                            </figure>
                                        </a>
                                        <div class="productitem--info">
                                            <div class="productitem--price ">
                                                <div class="price--compare-at visible" data-price-compare-at>
                                                    <span class="money">452,100 VND</span>
                                                </div>
                                                <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-45</span>%
                    </span>
                                                <div class="price--main" data-price>
                    <span class="money">
248,655 <span>VND</span>
                    </span>
                                                </div>
                                            </div>
                                            <h4 class="productitem--title">
                                                <a href="/products/tu-dien-nhua-am-tuong-cua-trang-mip22104">
                                                    Tủ điện nhựa &#226;m tường cửa trắng                </a>
                                            </h4>
                                            <div class="productitem--desc">
                                                <span>4/6/8/12/18/24/36 đường</span>
                                            </div>
                                            <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/schneider-sm.jpg" alt="Schneider"  width="120" height="60"/>  </span>

                                        </div>
                                        <span class="clabel">7 mẫu</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-section--container product-row--container related-products--container">
                <div class="product-section--heading">
                    <h2 class="product-section--title related-products--title">
                        <a href="/san-pham/thiet-bi-tu-dien/tu-nhua">Tủ điện nhựa</a>
                    </h2>
                    <span class="right-view-more"><a href="/san-pham/thiet-bi-tu-dien/tu-nhua">Xem tất cả »</a></span>
                </div>

                <div class="product-section--content product-row--scroller product-row--count-5">
                    <div class="product-row--outer">
                        <div class="product-row--inner">
                            <article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                <div class="productitem" data-product-item-content>
                                    <a class="productitem--image-link" href="/products/tu-dien-am-tuong-wpx-wp-12">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="Tủ điện MPE chống thấm 10-12 cực 230x110mm WP-12" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/wp-9.jpg"  src="./images/load.jpg"  width="350" height="350">

                                        </figure>
                                    </a>
                                    <div class="productitem--info">
                                        <div class="productitem--price ">
                                            <div class="price--compare-at visible" data-price-compare-at>
                                                <span class="money">1,556,900 VND</span>
                                            </div>
                                            <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                            <div class="price--main" data-price>
                    <span class="money">
934,140 <span>VND</span>
                    </span>
                                            </div>
                                        </div>
                                        <h4 class="productitem--title">
                                            <a href="/products/tu-dien-am-tuong-wpx-wp-12">
                                                Tủ điện MPE chống thấm 10-12 cực 230x110mm WP-12                </a>
                                        </h4>
                                        <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/mpe-sm.jpg" alt="MPE"  width="120" height="60"/>  </span>

                                    </div>
                                </div>
                            </article><article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                <div class="productitem" data-product-item-content>
                                    <a class="productitem--image-link" href="/products/bqdx16t11av">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="Tủ điện &#226;m tường Panasonic m&#224;u trắng - 16 đường BQDX16T11AV" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/bqdx16t11av.jpg"  src="./images/load.jpg"  width="350" height="350">

                                        </figure>
                                    </a>
                                    <div class="productitem--info">
                                        <div class="productitem--price ">
                                            <div class="price--compare-at visible" data-price-compare-at>
                                                <span class="money">1,730,000 VND</span>
                                            </div>
                                            <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-35</span>%
                    </span>
                                            <div class="price--main" data-price>
                    <span class="money">
1,124,500 <span>VND</span>
                    </span>
                                            </div>
                                        </div>
                                        <h4 class="productitem--title">
                                            <a href="/products/bqdx16t11av">
                                                Tủ điện &#226;m tường Panasonic m&#224;u trắng - 16 đường BQDX16T11AV                </a>
                                        </h4>
                                        <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/panasonic-sm.jpg" alt="Panasonic"  width="120" height="60"/>  </span>

                                    </div>
                                </div>
                            </article><article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                <div class="productitem" data-product-item-content>
                                    <a class="productitem--image-link" href="/products/tu-dien-12-modun">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="Tủ điện 12 modun – 601112 601112" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/legrand-cabinet-601112.jpg"  src="./images/load.jpg"  width="350" height="350">

                                        </figure>
                                    </a>
                                    <div class="productitem--info">
                                        <div class="productitem--price ">
                                            <div class="price--compare-at visible" data-price-compare-at>
                                                <span class="money">645,960 VND</span>
                                            </div>
                                            <span class="productitem--badge badge--sale" data-badge-sales><span>LH</span></span>
                                            <div class="price--main" data-price>
                    <span class="money">
645,960 <span>VND</span>
                    </span>
                                            </div>
                                        </div>
                                        <h4 class="productitem--title">
                                            <a href="/products/tu-dien-12-modun">
                                                Tủ điện 12 modun – 601112                </a>
                                        </h4>
                                        <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/legrand-sm.jpg" alt="Legrand"  width="120" height="60"/>  </span>

                                    </div>
                                </div>
                            </article><article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                <div class="productitem" data-product-item-content>
                                    <a class="productitem--image-link" href="/products/tu-dien-mpe-series-ts-5-6-cuc">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="Tủ điện MPE Series TS 5-6 cực TS-6" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/ts-4-6.jpg"  src="./images/load.jpg"  width="350" height="350">

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
                                            <a href="/products/tu-dien-mpe-series-ts-5-6-cuc">
                                                Tủ điện MPE Series TS 5-6 cực TS-6                </a>
                                        </h4>
                                        <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/mpe-sm.jpg" alt="MPE"  width="120" height="60"/>  </span>

                                    </div>
                                </div>
                            </article><article class="productgrid--item  imagestyle--natural  productitem--emphasis" data-product-item tabindex="1">
                                <div class="productitem" data-product-item-content>
                                    <a class="productitem--image-link" href="/products/tu-dien-am-tuong-wpx-wp-24">
                                        <figure class="productitem--image" data-product-item-image>
                                            <img alt="Tủ điện MPE chống thấm 19-24 cực, 380x110mm WP-24" class="lazy" data-src="https://www.thietbidiendgp.vn/media/products/350/wp-12.jpg"  src="./images/load.jpg"  width="350" height="350">

                                        </figure>
                                    </a>
                                    <div class="productitem--info">
                                        <div class="productitem--price ">
                                            <div class="price--compare-at visible" data-price-compare-at>
                                                <span class="money">2,743,200 VND</span>
                                            </div>
                                            <span class="productitem--badge badge--sale" data-badge-sales>
                        <span data-price-percent-saved>-40</span>%
                    </span>
                                            <div class="price--main" data-price>
                    <span class="money">
1,645,920 <span>VND</span>
                    </span>
                                            </div>
                                        </div>
                                        <h4 class="productitem--title">
                                            <a href="/products/tu-dien-am-tuong-wpx-wp-24">
                                                Tủ điện MPE chống thấm 19-24 cực, 380x110mm WP-24                </a>
                                        </h4>
                                        <span class="productitem--provider"><img src="https://www.thietbidiendgp.vn/media/brands/mpe-sm.jpg" alt="MPE"  width="120" height="60"/>  </span>

                                    </div>
                                </div>
                            </article>                        </div>
                    </div>
                </div>
            </section>
            <section class="product-section--container" data-product-reviews >
                <div class="product-section--content product-reviews--content">
                    <div id="product-reviews" data-id="741">
                        <div class="spr-container">
                            <div class="spr-header">
                                <h2 class="spr-header-title">Khách hàng đánh giá</h2>

                                <div class="spr-summary">
                                    <span class="spr-summary-caption">Chưa có đánh giá nào</span><span class="spr-summary-actions">
                                        <a href='javascript:void(0)' class='spr-summary-actions-newreview' id='newreview'>Viết đánh giá</a>
                                    </span>
                                </div>
                            </div>
                            <div class="spr-content" style="max-width: 700px;margin: 10px auto;">
                                <div class="spr-form" id="form" style="display: none">
                                    <form method="get" action="#" id="new-review-form" class="new-review-form" >
                                        <input type="hidden" name="rating">
                                        <input type="hidden" name="type" value="product">
                                        <input type="hidden" name="id" value="741">
                                        <h3 class="spr-form-title">Đánh giá</h3>
                                        <fieldset class="spr-form-contact">
                                            <div class="spr-form-contact-name">
                                                <label class="spr-form-label" for="author">Họ tên</label>
                                                <input class="spr-form-input spr-form-input-text " id="review_author" type="text" name="author" value="" placeholder="Nhập họ tên">
                                            </div>
                                            <div class="spr-form-review-email">
                                                <label class="spr-form-label" for="email">Email</label>
                                                <input class="spr-form-input spr-form-input-text " id="email" type="text" name="email" value="" placeholder="Email của bạn">
                                            </div>

                                        </fieldset>
                                        <fieldset class="spr-form-review">

                                            <div class="spr-form-review-body">
                                                <label class="spr-form-label" for="message">Nội dung <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                <div class="spr-form-input">
                                                    <textarea class="spr-form-input spr-form-input-textarea" id="message" data-product-id="#" name="message" rows="10" placeholder="Viết đánh giá của bạn ở đây."></textarea>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="spr-form-actions" >
                                            <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Đăng đánh giá">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="spr-reviews" id="reviews_741" style="display: none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-section--container product-recently-viewed--section">
                <div class="product-recently-viewed-wrapper">
                    <div class="product-recently-viewed-header">
                        <h3 class="product-recently-viewed-heading">
                            Sản phẩm bạn đã xem
                        </h3>
                        <span class="product-recently-viewed-clear" data-clear-recently-viewed="">
                                Xóa lịch sử
                            </span>
                    </div>
                    <div class="product-section--content product-recently-viewed--content imagestyle--natural" data-recently-viewed-container="">
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection

@push('stylesheets')
    <style>
        .product-title{margin: 0 2.5% 2.5% 0;font-size: 2rem;}
        .product-descriptions{
            font-size: 1rem;
            border-top: 1.5px solid #fafafa;
            margin-top: 10px;
            padding-top: 0px;
            font-family: helvetica;
        }
        h1.product-title{margin-top:20px;margin-bottom: 10px;font-size:1.6rem;}
        h1.product-title span{
            display: block;
            font-size: 19px;
            margin-top: 8px;
            color: #555;
            font-weight: 400;
        }
        @media screen and (min-width: 1024px)
        {
            .layout--two-col .product-gallery {
                width: 37.5%;
            }
            .layout--two-col .product-infomation {
                width: 60%;
                margin-left:2.5%;
                display: inline-block;
            }
            .layout--two-col .product-main {
                width: 60%;
                margin-left: 0;
            }
            .layout--two-col .product-form--alt {
                width: 37.5%;
            }
            h1.product-title{margin: 0 2% 2% 0;font-size: 2.2rem;}
            .support-button {display:block;}
        }
        @media screen and (min-width: 720px)
        {
            .product-gallery {
                width: 100%;
            }
            .product-main {
                width: 100%;
                margin-left: 0%;
            }
            h1.product-title{font-size: 1.9rem;}
            .support-button {display:none;}

            .product--description #gallery-2 {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding-left: 0;
                padding-right: 0;
                margin-left: -15px;
                margin-right: -15px;
                width: auto;
            }
            .product--description #gallery-2 img {
                max-width: 33.33333%;
                -ms-flex-preferred-size: 33.33333%;
                flex-basis: 33.33333%;
                position: relative;
                margin: 0;
                padding: 0 15px 30px;
                width: 100%;
            }
        }
        #shopify-product-reviews{*zoom:1;display:block;clear:both;overflow:hidden;margin:1em 0}#shopify-product-reviews:before,#shopify-product-reviews:after{content:" ";display:table}#shopify-product-reviews:after{clear:both}.spr-loading{*zoom:1;display:block;border:1px solid rgba(0,0,0,.1);padding:24px;text-align:center}.spr-loading:before,.spr-loading:after{content:" ";display:table}.spr-loading:after{clear:both}.spr-container{*zoom:1;border:1px solid #DFDFDF;border:1px solid rgba(0,0,0,.1);padding:2em;background:#fafafa}.spr-container:before,.spr-container:after{content:" ";display:table}.spr-container:after{clear:both}.spr-header{*zoom:1}.spr-header:before,.spr-header:after{content:" ";display:table}.spr-header:after{clear:both}.spr-header-title{*zoom:1;font-size:24px;margin:0 0 12px 0}.spr-header-title:before,.spr-header-title:after{content:" ";display:table}.spr-header-title:after{clear:both}.spr-starratings{font-size:13px;margin:0 0 8px 0}.spr-icon{font-size:120%;position:relative;top:1px;width:1.3em;height:1.3em}.spr-icon.spr-icon-star-empty{opacity:.6}.spr-badge{*zoom:1;min-height:auto;min-width:auto;display:block}.spr-badge:before,.spr-badge:after{content:" ";display:table}.spr-badge:after{clear:both}.spr-badge-starrating{margin:0 3px 0 0}.spr-badge-starrating .spr-icon{font-size:100%}.spr-summary{*zoom:1}.spr-summary:before,.spr-summary:after{content:" ";display:table}.spr-summary:after{clear:both}.spr-summary-actions-newreview{float:right}.spr-summary-starrating{margin:0 6px 0 0}.spr-form{margin:24px 0 0 0;padding:24px 0 0 0;border-top:1px solid #DFDFDF;border-top:1px solid rgba(0,0,0,.1)}.spr-form>form{margin:0 auto}.spr-form-title{font-size:16px;line-height:24px;margin-top:0}.spr-form-contact-name,.spr-form-contact-email,.spr-form-contact-location,.spr-form-review-rating,.spr-form-review-title,.spr-form-review-body{*zoom:1;margin:0 0 15px 0}.spr-form-contact-name:before,.spr-form-contact-name:after,.spr-form-contact-email:before,.spr-form-contact-email:after,.spr-form-contact-location:before,.spr-form-contact-location:after,.spr-form-review-rating:before,.spr-form-review-rating:after,.spr-form-review-title:before,.spr-form-review-title:after,.spr-form-review-body:before,.spr-form-review-body:after{content:" ";display:table}.spr-form-contact-name:after,.spr-form-contact-email:after,.spr-form-contact-location:after,.spr-form-review-rating:after,.spr-form-review-title:after,.spr-form-review-body:after{clear:both}.spr-form-contact,.spr-form-review,.spr-form-actions{*zoom:1;padding:0;border:0;margin:0}.spr-form-contact:before,.spr-form-contact:after,.spr-form-review:before,.spr-form-review:after,.spr-form-actions:before,.spr-form-actions:after{content:" ";display:table}.spr-form-contact:after,.spr-form-review:after,.spr-form-actions:after{clear:both}.spr-form-review-rating{clear:both;overflow:hidden}.spr-form-review-rating a,.spr-form-review-rating a:hover{text-decoration:none;display:inline-block;float:left}.spr-form-label{font-size:13px;line-height:20px}.spr-form-input{margin:0}.spr-form-label+.spr-form-input{margin:0}.spr-form-input-text,.spr-form-input-email,.spr-form-input-textarea{-webkit-box-sizing:border-box;box-sizing:border-box;width:100%;max-width:100%;margin:0}.spr-form-input-textarea{resize:vertical}.spr-form-input-error,input[type="text"].spr-form-input-error,input[type="email"].spr-form-input-error{border-color:#C0363A}.spr-starrating.spr-form-input-error a{color:#C0363A}.spr-form-message{padding:.8em 1em;margin:0 0 1em 0}.spr-form-message-error{background:#C0363A;color:#FFF}.spr-form-message-success{padding:0;margin:0}.spr-button,.spr-button-primary{width:auto;margin:0;min-height:1em}.spr-button-primary{float:right}.spr-reviews{margin:24px 0 0 0}.spr-review{padding:24px 0;border-top:1px solid #DFDFDF;border-top:1px solid rgba(0,0,0,.1)}.spr-review:first-child{margin-top:24px}.spr-review:last-child{padding-bottom:0}.spr-review-header-byline{font-style:italic;font-size:13px;opacity:.5;display:inline-block;margin:0 0 1em 0}.spr-review-header-starratings{margin:0 0 .5em 0;display:inline-block}.spr-review-header-title{font-size:16px;line-height:24px;margin:0;padding:0;border:none}.spr-review-content{*zoom:1;margin:0 0 24px 0}.spr-review-content:before,.spr-review-content:after{content:" ";display:table}.spr-review-content:after{clear:both}.spr-review-content-body{font-size:13px;line-height:20px;margin:0;padding:0}.spr-review-reply{*zoom:1;background:#ECECEC;background:rgba(0,0,0,.06);margin:0 0 24px 0;padding:24px}.spr-review-reply:before,.spr-review-reply:after{content:" ";display:table}.spr-review-reply:after{clear:both}.spr-review-reply-body,.spr-review-reply-shop{font-size:13px;line-height:20px}.spr-review-reply-body{margin:0 0 12px 0}.spr-review-reply-shop{display:block;float:right;font-style:italic}.spr-review-footer{*zoom:1}.spr-review-footer:before,.spr-review-footer:after{content:" ";display:table}.spr-review-footer:after{clear:both}.spr-review-reportreview{float:right;font-size:11px;line-height:16px}.spr-pagination{text-align:center;padding:12px 0 0 0;position:relative;border-top:1px solid #DFDFDF;border-top:1px solid rgba(0,0,0,.1)}.spr-pagination-page,.spr-pagination-deco,.spr-pagination-next,.spr-pagination-prev{display:inline-block}.spr-pagination-page.is-active{font-weight:700}.spr-pagination-prev{position:absolute;left:0}.spr-pagination-next{position:absolute;right:0}@media only screen and (max-width:480px){.spr-header-title{text-align:center}.spr-summary{text-align:center}.spr-summary-actions-newreview{float:none;*zoom:1}.spr-summary-actions-newreview:before,.spr-summary-actions-newreview:after{content:" ";display:table}.spr-summary-actions-newreview:after{clear:both}}
        .view-file iframe{border:0;margin-bottom:25px;margin-top:15px}.spr-container{padding:24px;border-color:#ECECEC}.spr-review,.spr-form{border-color:#ECECEC}.product-row--outer #loading{position:absolute;top:0;right:-5px;bottom:90px;left:-5px;background:rgba(255,255,255,.7);z-index:100;text-align:center}.product-row--outer #loading span{position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;height:22px;width:90px;color:#333}.product--promo{border:1px solid #eee;box-shadow:0 1px 4px -3px #000;padding:10px;position:relative;font-size:1rem;line-height:1.4;background:#fffefb}.product--promo p{margin-bottom:5px}.product--promo ul{margin:5px 0;font-size:15px}.product--promo img.icon-sale{position:absolute;top:0;right:5px;margin:0}.description-outer{max-width:800px;float:right;width:100%}.description-outer .product--description .product--description-content{font-size:1.15rem!important;line-height:1.7!important}.description-outer .product--description .product--description-content figure{margin: 1em 0px;}.tech--info table.tblstyle-01 {border:none;margin-top:20px;}.tech--info table.tblstyle-01 tr{border:none;border-bottom: 1px solid #ececec;} .tech--info table.tblstyle-01 tr td,table.tblstyle-01 tr th {padding-left: 0;border:none;border-bottom: 1px solid #ececec;}.tech--info table.tblstyle-01 tr td:first-child,table.tblstyle-01 tr th:first-child{width:220px;}

    </style>
@endpush

@push('scripts')
    <script src="{{asset('guest/js/jquery.sticky-kit.js')}}"></script>

    <script src="{{asset('guest/js/option_selection.js')}}"></script>

    <script src="{{asset('guest/scripts/products.js')}}"></script>

    <script src="{{asset('guest/scripts/comments.js')}}"></script>

@endpush

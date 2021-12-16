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
                        <div class="owl-carousel">
                            <div class="item">
                                <img src="{{asset($product->image)}}" data-src="{{asset($product->image)}}" data-image="" alt="{{$product->name}}" class="lazy" width="800" height="800">
                            </div>
                            <div class="item">
                                <img src="{{asset($product->image)}}" data-src="{{asset($product->image)}}" data-image="" alt="{{$product->name}}" class="lazy" width="800" height="800">
                            </div>
                        </div>
                    </div>
                    <div class="product-infomation">
                        <h1 class="product-title" itemprop="name">
                            {{$product->name}}
                            @if(isset($product->attributes) && count($product->attributes) > 0)
                            <span>{{$product->attributes[0]->codename}}</span>
                            @endif
                        </h1>
                        <div class="product-main" data-product-details>
                            <div class="product-details">
                                {!! isset($product->attributes[0]->type_name) ? '<p class="product-serial">'.$product->attributes[0]->type_name.'</p>' : ''  !!}
                                <div class="product-vendor" itemprop="brand" itemscope itemtype="http://schema.org/Brand">
                                    <a href="{{route('hang.chitiet',$product->brand->slug)}}">
                                        <img src="{{asset($product->brand->image)}}" alt="{{$product->brand->name}}" itemprop="logo" width="80" height="40" />
                                    </a>
                                    <meta itemprop="name" content="{{$product->brand->name}}">
                                </div>
                                <div class="productitem-ratings">
                                    <span class="spr-badge" id="spr_badge_{{$product->id}}" data-rating="0.0">
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
                                        @if(isset($product->attributes) && count($product->attributes) > 0)

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
                                            @elseif($product->attributes[0]->price == 0 || $product->attributes[0]->price == "")
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
                                    @if( isset($info->email) && !empty($info->email))
                                    <i style="font-size:14.5px;color:#222;display:block;">(vui lòng thêm vào báo giá để nhận báo giá hoặc qua email: {{$info->email}})</i>
                                    @endif
                                </div>
                            </div>
                            <div class="product-description rte" data-product-description="">
                                <meta charset="utf-8">
                                <div class="unco">
                                    <div class="row">
                                        <ul class="product--topinfo">
                                            <li><i>Mã sản phẩm:</i> <b data-code="">{{$product->attributes[0]->codename ?? "#"}}</b> </li>
                                            <li><i>Thương hiệu:</i><a href="{{route('hang.danhmuc',[$product->brand->slug,$product->category->slug])}}" class="_1line">{{$product->category->name}} ({{$product->brand->name}})</a></li>
                                            <li><i>Bảo hành:</i> <b>{{$product->warranty}}</b></li>
                                            <li><i>Loại:</i> <a href="{{route('danhmuc.chitiet', $product->category->slug)}}">{{$product->category->name}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-form--regular" data-product-form-regular="">
                            </div>
                            <div class="clearfix"></div>

                            <div class="product--tags">
                                <span>Tags: {{$product->keyword}}</span>
                            </div>
                            <div class="small-12 columns">
                                <div>
                                    <div class="product-price--table">
                                        <a  href="{{ isset($tariff) ? route('bang-gia.chitiet',[$tariff->slug, $tariff->id]) : '#' }}" target="_blank"><i></i>Xem Bảng Giá {{$product->brand->name}} {{date("Y")}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-form--alt" data-product-form-alt="">
                            <div data-product-form-area="">
                                @if($product->attributes->count() > 1)
                                <div class="notification">
                                    <p class="messa">Sản phẩm có nhiều loại/mẫu, vui lòng chọn để thêm vào bảng giá. <span style="color: #fff;text-decoration: underline;cursor:pointer" onclick="gotolist();">Hoặc xem giá bên dưới.</span> </p>

                                    <svg class="svg-close"></svg>
                                    <div class="arrow"></div>
                                </div>
                                @endif
                                <form method="post" action="{{route('cart.store')}}" id="add-cart" data-product-form="">
                                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                    @csrf
                                    @if($product->attributes->count() > 1)
                                    <div data-product-options-container="">
                                        <div class="form-field form-options js-required">
                                            <div class="form-field-select-wrapper">
                                                <select id="attribute_id" name="attribute_id" class="form-field-input form-field-select form-field-filled" data-product-option="0">
                                                    @foreach($product->attributes as $key => $attribute)
                                                        <option value="{{$attribute->id}}" {!! $key === 0 ? 'selected="selected"' : '' !!}>{{ !empty($attribute->type_name) ? $attribute->type_name : $attribute->codename }} -- {{ number_format($attribute->price) }} VND</option>
                                                    @endforeach
                                                </select>
                                                <label for="attribute_id" class="form-field-title">Mẫu</label>
                                                <svg class="svg-chevron-down"></svg>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <input type="hidden" id="attribute_id" name="attribute_id" value="{{$product->attributes[0]->id ?? ""}}">
                                    @endif
                                        <div class="product-form--atc" >
                                            <div class="product-form--atc-qty form-fields--qty" data-quantity-wrapper>
                                                <div class="form-field form-field--qty-select visible">
                                                    <div class="form-field-select-wrapper">
                                                        <select class="form-field-input form-field-select" name="num_product" id="num_product" aria-label="Số lượng" data-quantity-select>
                                                            <option selected value="1"> 1</option>
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
                                            </div>
                                            <button class="product-form--atc-button "
                                                    type="submit"
                                                    data-product-atc>
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
                                        <p>Xem <a href="{{isset($page['buy_product']) ? route('pages.chitiet',$page['buy_product']->slug) : '#'}}"><i>Hướng dẫn mua hàng</i></a> hoặc <a href="{{isset($page['warranty']) ? route('pages.chitiet', $page['warranty']->slug) : '#'}}"><i>Bảo hành &amp; đổi trả</i></a></p>
                                        @if(isset($info->map_address))
                                            <div>
                                                <a class="RRQQWe" href="{{$info->map_address}}" target="_blank">
                                                    <div class="fbNEY">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill:transparent">
                                                            <path fill="#EA4335" d="M9.84,6.93L6.4,4.04c-1.07,1.26-1.7,2.9-1.7,4.68c0,1.38,0.27,2.48,0.73,3.47l4.37-5.2  C9.8,6.97,9.81,6.95,9.84,6.93z"></path>
                                                            <path fill="#1A73E8" d="M11.97,1.44c-2.24,0-4.24,1.01-5.58,2.6l3.45,2.89c0.01-0.01,0.02-0.02,0.03-0.03l4.29-5.12  C13.47,1.56,12.73,1.44,11.97,1.44z"></path>
                                                            <path fill="#4285F4" d="M14.12,10.48l4.31-5.13c-0.88-1.69-2.41-2.99-4.26-3.57L9.83,6.93l0,0c0.51-0.61,1.28-1,2.14-1  c1.54,0,2.78,1.25,2.78,2.78C14.75,9.39,14.52,10,14.12,10.48z"></path>
                                                            <path fill="#FBBC04" d="M5.42,12.2c0.76,1.67,2.02,3.01,3.32,4.69l5.36-6.38l0,0c-0.51,0.6-1.28,0.99-2.12,0.99  c-1.54,0-2.78-1.25-2.78-2.78c0-0.65,0.23-1.26,0.61-1.74L5.42,12.2z"></path><path fill="#34A853" d="M19.25,8.72c0-1.22-0.3-2.36-0.83-3.37l-4.29,5.12c-0.01,0.01-0.01,0.02-0.03,0.03l-5.36,6.39  c0.42,0.54,0.85,1.13,1.26,1.77c1.48,2.28,1.04,3.65,1.97,3.65c0.96,0,0.53-1.37,2.01-3.65C16.42,14.87,19.25,13.14,19.25,8.72z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="MKOiO">Chỉ đường trên Google Maps</div>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                </form>
                                <div class="clear-fix"></div>
                                <aside class="share-buttons">
                                    <div class="box-support">
                                        <p class="title">Hỗ trợ trực tuyến</p>
                                        <p class="stitle1">Phòng kinh doanh</p>
                                        @foreach($staffs as $staff)
                                            @if($staff->type == 0)
                                                <div class="links">
                                                    <div class="avatar">
                                                        <img src="{{asset($staff->image)}}" data-src="{{asset($staff->image)}}" alt="#" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                                    </div>
                                                    <a href="tel:{{$staff->phone}}" title="Bấm để Gọi tư vấn"> {{$staff->phone}}</a>
                                                    <a class="zalo" href="https://zalo.me/{{$staff->phone}}" title="Bấm để Chát tư vấn" target="_blank"> Chat Zalo</a>
                                                </div>
                                            @endif
                                        @endforeach

                                        <p class="stitle2">Phòng kỹ thuật</p>
                                        @foreach($staffs as $staff)
                                            @if($staff->type == 1)
                                                <div class="links">
                                                    <div class="avatar">
                                                        <img src="{{asset($staff->image)}}" data-src="{{asset($staff->image)}}" alt="#" style="width: 28px;border-radius: 50%;" class="loaded" width="24" height="24">
                                                    </div>
                                                    <a href="tel:{{$staff->phone}}" title="Bấm để Gọi tư vấn"> {{$staff->phone}}</a>
                                                    <a class="zalo" href="https://zalo.me/{{$staff->phone}}" title="Bấm để Chát tư vấn" target="_blank"> Chat Zalo</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </aside>

                            </div>
                        </div>
                        <div class="product-descriptions">
                            @if($product->attributes->count() > 1)
                            <div class="product--description" id="lists">
                                <div class="product--description-content">
                                    <p class="description-content--title">Các dòng sản phẩm</p>
                                    <div class="table-outer">
                                        <table>
                                            <tr>
                                                <td>STT</td>
                                                <td>Ảnh</td>
                                                <td>Mẫu</td>
                                                <td>Mã</td>
                                                <td>Kích thước</td>
                                                <td class="table--price">Giá list (VND)</td>
                                                <td style="text-align:center;">CK</td>
                                                <td class="table--price">Giá bán (VND)</td>
                                            </tr>
                                            @php $i = 1; @endphp
                                            @foreach($product->attributes as $att)
                                                <tr>
                                                    <td width="30">{{$i}}</td>
                                                    <td class="table--img">
                                                        <img src="{{asset($product->image)}}" data-src="{{asset($product->image)}}" width="50" height="50" class="lazy" alt="image-product"/>
                                                    </td>
                                                    <td>{{$att->type_name}}</td>
                                                    <td>{{$att->codename}}</td>
                                                    <td>{{$att->size}}</td>
                                                    <td class="table--price">{{number_format($att->price)}}</td>
                                                    <td style="text-align:center;">{{$att->discount}}%</td>
                                                    <td class="table--price">{{number_format($att->price - ($att->price*$att->discount)/100)}}</td>
                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                        </table>
                                    </div>
                                    <p class="description-notification">Thông tin sản phẩm được cập nhật ngày <span>{{date('d/m/Y', strtotime($product->updated_at))}}</span>. Nếu GIÁ hoặc CHIẾC KHẤU có thể chưa được cập nhật mới, Quý khách hàng có nhu cầu vui lòng liên hệ báo giá qua email <a href="mailto:{{$info->email}}" style="color: orangered;font-weight:500">{{$info->email}}</a> để nhận thông tin giá chính xác nhất. Cảm ơn. </p>
                                </div>
                            </div>
                            @endif
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
                                        {!! $product->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <section class="product-section--container" data-product-reviews >
                <div class="product-section--content product-reviews--content">
                    <div id="product-reviews" data-id="{{$product->id}}">
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
                                        <input type="hidden" name="rating" value="5">
                                        <input type="hidden" name="type" value="0">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <h3 class="spr-form-title">Đánh giá</h3>
                                        <fieldset class="spr-form-contact">
                                            <div class="spr-form-contact-name">
                                                <label class="spr-form-label" for="review_author">Họ tên</label>
                                                <input class="spr-form-input spr-form-input-text " id="review_author" type="text" name="name" value="" placeholder="Nhập họ tên">
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
                                                    <textarea class="spr-form-input spr-form-input-textarea" id="message" data-product-id="#" name="content" rows="10" placeholder="Viết đánh giá của bạn ở đây."></textarea>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="spr-form-actions" >
                                            <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Đăng đánh giá">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="spr-reviews" id="reviews_{{$product->id}}" style="display: none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('stylesheets')
<link rel="stylesheet" href="{{asset('guest/css/product.css')}}">
<style id="fit-vids-style">
    .fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}
</style>
<link rel="stylesheet" href="{{asset('guest/css/review.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('manage/plugins/toastr/toastr.min.css')}}">
<script src="{{asset('guest/js/option_selection.js')}}"></script>
<link rel="stylesheet" href="{{asset('guest/plugins/owlcarousel/dist/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('guest/plugins/owlcarousel/dist/assets/owl.theme.default.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('guest/js/jquery.sticky-kit.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('manage/plugins/toastr/toastr.min.js')}}"></script>

<script src="{{asset('guest/scripts/products.js')}}"></script>
<script>
var stickWidth = 1024;
var win = $(window);
var menu = $(".product-gallery");
var options = {
    offset_top: 75
};
if (win.width() > stickWidth) {
    menu.stick_in_parent(options);
}
win.resize(function () {
    if (win.width() > stickWidth) {
        menu.stick_in_parent(options);
    } else {
        menu.trigger("sticky_kit:detach");
    }
});
</script>
<script src="{{asset('guest/scripts/comments.js')}}"></script>
<script src="{{asset('guest/plugins/owlcarousel/dist/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var owl = $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            items:3
        });

        owl.on('changed.owl.carousel', function(event) {
            setTimeout(function(){
                var activeEls = $('.owl-item.active').eq(1); // .eq(1) to get the "middle image out of 3 actives"
                setCarouselCaption( activeEls );
            },1);
        });

        function setCarouselCaption(el){
            $(".owl-item").removeClass("target");
            el.addClass("target");
        }

    });
</script>
@endpush

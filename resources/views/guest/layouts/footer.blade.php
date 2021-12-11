<div id="shopify-section-static-footer" class="shopify-section">
    <script type="application/json"
            data-section-id="static-footer"
            data-section-type="static-footer">
    </script>
    <section class="site-footer-wrapper">
        <div class="row">
            <div class="contact-group">
                <ul>
                    @foreach($staffs as $staff)
                        @if($staff->type === 0)
                            <li class="item">
                                <div class="avatar">
                                    <img src="{{asset($staff->image)}}" data-src="{{$staff->image}}" class="lazy"
                                         width="62"
                                         height="62" alt="avatar">
                                </div>
                                <div class="detail">
                                    <p class="title">Kinh doanh</p>
                                    <p class="name">{{$staff->name}}</p>
                                </div>
                                <div class="links">
                                    <a href="tel:{{$staff->phone}}" title="Bấm để Gọi tư vấn"> {{$staff->phone}}</a>
                                    <a href="https://zalo.me/{{$staff->phone}}" title="Bấm để Chát tư vấn"
                                       target="_blank"
                                       class="zalo"> Chat Zalo</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    @foreach($staffs as $staff)
                        @if($staff->type === 1)
                            <li class="item tech">
                                <div class="avatar ">
                                    <img src="{{asset($staff->image)}}" data-src="{{$staff->image}}" class="lazy"
                                         width="62" height="62" alt="avatar">
                                </div>
                                <div class="detail">
                                    <p class="title"><span style="color:#0fc2db">Kinh doanh</span><span
                                            style="color:#fff"> / </span>Kỹ thuật</p>
                                    <p class="name">{{$staff->name}}</p>
                                </div>
                                <div class="links">
                                    <a href="tel:{{$staff->phone}}" title="Bấm để Gọi tư vấn"> {{$staff->phone}}</a>
                                    <a href="https://zalo.me/{{$staff->phone}}" title="Bấm để Chát tư vấn"
                                       target="_blank"
                                       class="zalo"> Chat Zalo</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="site-footer-item">
            <div class="site-footer-blocks column-count-4">
                <div class="site-footer-block-item  site-footer-block-menu  has-accordion">
                    <h5 class="site-footer-block-title" data-accordion-trigger>
                        Về Chúng Tôi
                        <span class="site-footer-block-icon accordion--icon"> <svg aria-hidden="true" focusable="false"

                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   width="14" height="8"
                                                                                   viewBox="0 0 14 8"> <g
                                    fill="currentColor" fill-rule="evenodd" transform="translate(0 -.5)"> <polygon
                                        class="icon-chevron-down-left" points="7 8.466 13.655 1.81 12.38 .533 7 5.913"/> <polygon
                                        class="icon-chevron-down-right" points="7 5.913 1.621 .533 .344 1.81 7 8.466"/> </g> </svg> </span>
                    </h5>
                    <div class="site-footer-block-content accordion--content" data-accordion-content>
                        <ul class="navmenu  navmenu-depth-1  ">
                            <li class="navmenu-item navmenu-id-home">
                                <a class="navmenu-link navmenu-link--active" href="/">Trang chủ</a>
                            </li>

                            <li class="navmenu-item navmenu-id-about">
                                <a class="navmenu-link "
                                   href="{{isset($pages[0]) ? route('pages',$pages[0]->slug) : '#'}}">Về chúng
                                    tôi</a>
                            </li>
                            <li class="navmenu-item navmenu-id-contact">
                                <a class="navmenu-link " href="{{route('contact')}}">Liên hệ</a>
                            </li>
                            <li class="navmenu-item navmenu-id-contact">
                                <a class="navmenu-link "
                                   href="{{$info->map_address ?? '#'}}"
                                   target="_blank">Bản đồ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="site-footer-block-item  site-footer-block-menu  has-accordion">
                    <h5 class="site-footer-block-title" data-accordion-trigger>
                        Thông tin
                        <span class="site-footer-block-icon accordion--icon"> <svg aria-hidden="true" focusable="false"

                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   width="14" height="8"
                                                                                   viewBox="0 0 14 8"> <g
                                    fill="currentColor" fill-rule="evenodd" transform="translate(0 -.5)"> <polygon
                                        class="icon-chevron-down-left" points="7 8.466 13.655 1.81 12.38 .533 7 5.913"/> <polygon
                                        class="icon-chevron-down-right" points="7 5.913 1.621 .533 .344 1.81 7 8.466"/> </g> </svg> </span>
                    </h5>
                    <div class="site-footer-block-content accordion--content" data-accordion-content>
                        <ul class="navmenu navmenu-depth-1">

                            <li class="navmenu-item navmenu-id-blog">
                                <a class="navmenu-link" href="{{route('bang-gia')}}">Bảng giá</a>
                            </li>
                            <li class="navmenu-item navmenu-id-blog">
                                <a class="navmenu-link" href="{{route('khuyen-mai')}}">Khuyến mãi</a>
                            </li>
                            <li class="navmenu-item navmenu-id-blog">
                                <a class="navmenu-link" href="{{route('blogs')}}">Tin tức</a>
                            </li>
                            <li class="navmenu-item navmenu-id-submit-your-creation">
                                <a class="navmenu-link"
                                   href="{{isset($pages[1]) ? route('pages',$pages[1]->slug) : '#'}}">Tuyển
                                    dụng</a>
                            </li>
                            <li class="navmenu-item navmenu-id-search">
                                <a class="navmenu-link " href="{{route('search')}}">Tìm kiếm</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="site-footer-block-item site-footer-block-menu has-accordion">
                    <h5 class="site-footer-block-title" data-accordion-trigger>
                        Chính sách
                        <span class="site-footer-block-icon accordion--icon"> <svg aria-hidden="true" focusable="false"

                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   width="14" height="8"
                                                                                   viewBox="0 0 14 8"> <g
                                    fill="currentColor" fill-rule="evenodd" transform="translate(0 -.5)"> <polygon
                                        class="icon-chevron-down-left" points="7 8.466 13.655 1.81 12.38 .533 7 5.913"/> <polygon
                                        class="icon-chevron-down-right" points="7 5.913 1.621 .533 .344 1.81 7 8.466"/> </g> </svg> </span>
                    </h5>
                    <div class="site-footer-block-content accordion--content" data-accordion-content>
                        <ul class="navmenu navmenu-depth-1">
                            <li class="navmenu-item navmenu-id-shipping">
                                <a class="navmenu-link" href="{{route('tracuu')}}">Tra cứu đơn hàng</a>
                            </li>
                            <li class="navmenu-item navmenu-id-shipping">
                                <a class="navmenu-link"
                                   href="{{isset($pages[2]) ? route('pages',$pages[2]->slug) : '#'}}">Hướng dẫn
                                    mua hàng</a>
                            </li>
                            <li class="navmenu-item navmenu-id-shipping">
                                <a class="navmenu-link"
                                   href="{{isset($pages[3]) ? route('pages',$pages[3]->slug) : '#'}}">Thanh toán &
                                    Vận
                                    chuyển</a>
                            </li>
                            <li class="navmenu-item navmenu-id-returns">
                                <a class="navmenu-link"
                                   href="{{isset($pages[4]) ? route('pages',$pages[4]->slug) : '#'}}">Bảo hành &
                                    Đổi trả</a>
                            </li>

                            <li class="navmenu-item navmenu-id-submit-feedback">
                                <a class="navmenu-link" href="{{route('contact')}}">Ý kiến phản hồi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="site-footer-block-item  site-footer-block-newsletter">
                    <h5 class="site-footer-block-title">
                        {{$info->name ?? ""}}
                    </h5>
                    <div class="site-footer-block-content site-footer-contact" style="margin-bottom: .25rem;">
                        <p><b>{{$info->name ?? ""}}</b></p>
                        <p> {!! isset($info->address) ? '<b>Địa chỉ: </b>' . $info->address : "" !!}</p>
                        <p>{{ isset($info->business_license) ? 'MST: '.$info->business_license : "" }}</p>
                        @if(isset($info->hotline1))
                            <p>
                                <img src="{{asset('guest/images/svg/phone.svg')}}" alt="phone support" width="20"
                                     height="20"/>
                                <a href="tel:{{$info->hotline1}}">{{$info->hotline1}}</a> {!! isset($info->hotline2) ? '- <a href="tel:'.$info->hotline2.'">'.$info->hotline2.'</a>' : "" !!}
                            </p>
                        @endif
                        @if(isset($info->phone))
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                      id="Capa_1" x="0px" y="0px" width="20px" height="20px"
                                     viewBox="0 0 70.07 70.07" style="enable-background:new 0 0 70.07 70.07;"
                                     xml:space="preserve"><g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M65.094,32.195h-6.982h-0.934c-2.064,0-3.738,1.674-3.738,3.745v0.406c0,2.073,1.674,3.748,3.741,3.748h6.989h0.924    c2.068,0,3.747-1.682,3.747-3.748l-0.004-0.411C68.841,33.869,67.162,32.195,65.094,32.195z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF"/>
                                                <path
                                                    d="M65.098,22.852h-1.649V4.734c0-2.604-2.13-4.734-4.735-4.734H27.475c-2.604,0-4.734,2.131-4.734,4.734v12.999    c-6.301,3.562-12.8,7.283-12.814,7.292C6.399,26.477,1.23,31.162,1.23,42.225c0,0.988,0.065,1.9,0.156,2.781    c0.029,0.258,0.061,0.506,0.096,0.755c0.091,0.647,0.205,1.266,0.341,1.854c0.049,0.21,0.087,0.429,0.14,0.63    c0.183,0.68,0.395,1.318,0.633,1.925c0.12,0.301,0.25,0.575,0.381,0.857c0.14,0.297,0.281,0.589,0.432,0.862    c0.175,0.329,0.35,0.646,0.542,0.947c0.046,0.07,0.096,0.134,0.143,0.205c4.556,6.887,12.961,6.918,12.961,6.918h5.686v5.379    c0,2.601,2.13,4.731,4.734,4.731h31.238c2.605,0,4.735-2.131,4.735-4.731v-6.561h0.722v-0.004h0.921    c2.071,0,3.75-1.675,3.746-3.746l0.004-0.408c-0.004-2.068-1.679-3.738-3.747-3.738H64.17h-6.059h-0.934    c-2.068,0-3.738,1.674-3.738,3.741v0.415c0,2.062,1.674,3.743,3.741,3.743h2.974v2.534h-34.12V27.323    c1.714-1.087,3.301-2.133,4.206-2.834c4.585-3.546,8.937-6.37,9.526-8.931c0.767-3.323-1.784-6.123-6.209-3.824    c-1.394,0.724-4.255,2.311-7.523,4.146V7.502l34.12,0.005V22.85h-2.043v0.004h-0.929c-2.069,0-3.748,1.674-3.748,3.747v0.406    c0,2.072,1.679,3.742,3.743,3.742h0.929h6.059h0.931c2.066,0,3.741-1.674,3.741-3.742V26.59    C68.841,24.531,67.167,22.852,65.098,22.852z M43.09,62.976c1.312,0,2.37,1.059,2.37,2.368c0,1.312-1.059,2.367-2.37,2.367    c-1.307,0-2.363-1.058-2.363-2.367C40.729,64.039,41.788,62.976,43.09,62.976z M48.093,4.558h-9.996    c-0.314,0-0.574-0.255-0.574-0.57c0-0.32,0.26-0.575,0.574-0.575h9.996c0.314,0,0.57,0.254,0.57,0.575    C48.663,4.302,48.407,4.558,48.093,4.558z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF"/>
                                                <path
                                                    d="M65.094,41.538H64.17h-6.992c-2.064,0-3.743,1.679-3.743,3.746v0.41c0,2.069,1.675,3.743,3.743,3.743h0.929h6.059h0.926    c2.071,0,3.741-1.674,3.746-3.743v-0.41C68.837,43.217,67.167,41.538,65.094,41.538z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF"/>
                                            </g>
                                        </g>
                                    </g> </svg>
                                <a href="tel:{{$info->phone}}">{{$info->phone}}</a>
                            </p>
                        @endif
                        <p>
                            @if(isset($info->email))
                                <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1"
                                      height="20px"
                                     viewBox="0 0 479.058 479.058"
                                     width="20px">
                                    <g>
                                        <path
                                            d="m434.146 59.882h-389.234c-24.766 0-44.912 20.146-44.912 44.912v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159l-200.355 173.649-200.356-173.649c1.769-.736 3.704-1.159 5.738-1.159zm0 299.411h-389.234c-8.26 0-14.971-6.71-14.971-14.971v-251.648l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                            data-original="#000000" class="active-path" data-old_color="#000000"
                                            fill="#FFFFFF"/>
                                    </g>
                                </svg>
                                {!! '<a href="mailto:'.$info->email.'">'.$info->email.'</a></p>' !!}
                            @endif
                        </p>
                        <div><a class="RRQQWe"
                                href="{{$info->map_address ?? "#"}}"
                                target="_blank">
                                <div class="fbNEY">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         style="fill:transparent">
                                        <path fill="#EA4335"
                                              d="M9.84,6.93L6.4,4.04c-1.07,1.26-1.7,2.9-1.7,4.68c0,1.38,0.27,2.48,0.73,3.47l4.37-5.2  C9.8,6.97,9.81,6.95,9.84,6.93z"></path>
                                        <path fill="#1A73E8"
                                              d="M11.97,1.44c-2.24,0-4.24,1.01-5.58,2.6l3.45,2.89c0.01-0.01,0.02-0.02,0.03-0.03l4.29-5.12  C13.47,1.56,12.73,1.44,11.97,1.44z"></path>
                                        <path fill="#4285F4"
                                              d="M14.12,10.48l4.31-5.13c-0.88-1.69-2.41-2.99-4.26-3.57L9.83,6.93l0,0c0.51-0.61,1.28-1,2.14-1  c1.54,0,2.78,1.25,2.78,2.78C14.75,9.39,14.52,10,14.12,10.48z"></path>
                                        <path fill="#FBBC04"
                                              d="M5.42,12.2c0.76,1.67,2.02,3.01,3.32,4.69l5.36-6.38l0,0c-0.51,0.6-1.28,0.99-2.12,0.99  c-1.54,0-2.78-1.25-2.78-2.78c0-0.65,0.23-1.26,0.61-1.74L5.42,12.2z"></path>
                                        <path fill="#34A853"
                                              d="M19.25,8.72c0-1.22-0.3-2.36-0.83-3.37l-4.29,5.12c-0.01,0.01-0.01,0.02-0.03,0.03l-5.36,6.39  c0.42,0.54,0.85,1.13,1.26,1.77c1.48,2.28,1.04,3.65,1.97,3.65c0.96,0,0.53-1.37,2.01-3.65C16.42,14.87,19.25,13.14,19.25,8.72z"></path>
                                    </svg>
                                </div>
                                <div class="MKOiO">Chỉ đường trên Google Maps</div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-footer-item site-footer-item-bottom clearfix">
            <div class="site-footer-information">
                <div class="site-footer-left">

                    <p class="site-footer-credits" style="margin-top:5px">
                        Copyright © {{date("Y")}} - {{config('app.url')}}. All Rights Reserved.
                    </p>

                </div>
                <div class="site-footer-right">
                    <nav class="site-footer-navigation" style="float:right;margin-top:5px">
                        <ul class="navmenu  navmenu-depth-1  ">
                            <li class="navmenu-item navmenu-id-terms-conditions">
                                <a class="navmenu-link"
                                   href="{{isset($pages[5]) ? route('pages',$pages[5]->slug) : '#'}}">Điều khoản
                                    &amp; Chính
                                    sách</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
    <div id="top"></div>
</div>

<div style="display: none;" aria-hidden="true" data-templates>
    <div class="message-banner--container" data-message-banner>
        <div class="message-banner--outer">
            <div class="message-banner--inner" data-message-banner-content></div>
            <button class="message-banner--close" type="button" aria-label="Close" data-message-banner-close>
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg"
                     width="13" height="13" viewBox="0 0 13 13">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"/>
                </svg>
            </button>
        </div>
    </div>
    <section class="atc-banner--container" data-atc-banner>
        <div class="atc-banner--outer">
            <div class="atc-banner--inner">
                <div class="atc-banner--product">
                    <h2 class="atc-banner--product-title"><span class="atc-banner--product-title--icon"> <svg
                                aria-hidden="true" focusable="false" width="18" height="13"
                                viewBox="0 0 18 13" xmlns="http://www.w3.org/2000/svg"> <path fill="currentColor"
                                                                                              fill-rule="evenodd"
                                                                                              d="M6.23 9.1L2.078 5.2 0 7.15 6.23 13 18 1.95 15.923 0z"/> </svg> </span>
                        Sản phẩm đã được thêm vào giỏ:
                    </h2>
                    <div class="atc--product">
                        <div class="atc--product-image" data-atc-banner-product-image>
                            <svg class="placeholder--image" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 525.5 525.5">
                                <path
                                    d="M324.5 212.7H203c-1.6 0-2.8 1.3-2.8 2.8V308c0 1.6 1.3 2.8 2.8 2.8h121.6c1.6 0 2.8-1.3 2.8-2.8v-92.5c0-1.6-1.3-2.8-2.9-2.8zm1.1 95.3c0 .6-.5 1.1-1.1 1.1H203c-.6 0-1.1-.5-1.1-1.1v-92.5c0-.6.5-1.1 1.1-1.1h121.6c.6 0 1.1.5 1.1 1.1V308z"/>
                                <path
                                    d="M210.4 299.5H240v.1s.1 0 .2-.1h75.2v-76.2h-105v76.2zm1.8-7.2l20-20c1.6-1.6 3.8-2.5 6.1-2.5s4.5.9 6.1 2.5l1.5 1.5 16.8 16.8c-12.9 3.3-20.7 6.3-22.8 7.2h-27.7v-5.5zm101.5-10.1c-20.1 1.7-36.7 4.8-49.1 7.9l-16.9-16.9 26.3-26.3c1.6-1.6 3.8-2.5 6.1-2.5s4.5.9 6.1 2.5l27.5 27.5v7.8zm-68.9 15.5c9.7-3.5 33.9-10.9 68.9-13.8v13.8h-68.9zm68.9-72.7v46.8l-26.2-26.2c-1.9-1.9-4.5-3-7.3-3s-5.4 1.1-7.3 3l-26.3 26.3-.9-.9c-1.9-1.9-4.5-3-7.3-3s-5.4 1.1-7.3 3l-18.8 18.8V225h101.4z"/>
                                <path
                                    d="M232.8 254c4.6 0 8.3-3.7 8.3-8.3s-3.7-8.3-8.3-8.3-8.3 3.7-8.3 8.3 3.7 8.3 8.3 8.3zm0-14.9c3.6 0 6.6 2.9 6.6 6.6s-2.9 6.6-6.6 6.6-6.6-2.9-6.6-6.6 3-6.6 6.6-6.6z"/>
                            </svg>
                        </div>
                        <div class="atc--product-details"><h2 class="atc--product-details--title"
                                                              data-atc-banner-product-title></h2> <span
                                class="atc--product-details--options" data-atc-banner-product-options></span> <span
                                class="atc--product-details--price money" data-atc-banner-product-price></span></div>
                    </div>
                </div>
                <div class="atc-banner--cart">
                    <div class="atc-banner--cart-subtotal"><span class="atc-subtotal--label"> Tạm tính </span> <span
                            class="atc-subtotal--price money" data-atc-banner-cart-subtotal></span></div>
                    <footer class="atc-banner--cart-footer"><a class="button-secondary atc-button--viewcart"
                                                               href="{{route('cart')}}" data-atc-banner-cart-button> Xem giỏ
                            hàng (<span></span>) </a> <a class="button-primary atc-button--checkout"
                                                         href="{{route('checkout.index')}}"> Báo giá </a></footer>
                </div>
            </div>
            <button class="atc-banner--close" type="button" aria-label="Close" data-atc-banner-close>
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg"
                     width="13" height="13" viewBox="0 0 13 13">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"/>
                </svg>
            </button>
        </div>
    </section>
</div>
<div class="modal" data-modal-container>
    <div class="modal-inner" data-modal-inner>
        <button class="modal-close" type="button" aria-label="Close" data-modal-close>
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="13"
                 height="13" viewBox="0 0 13 13">
                <path fill="currentColor" fill-rule="evenodd"
                      d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"/>
            </svg>
        </button>
        <div class="modal-content" data-modal-content></div>
    </div>
</div>

<div id='arcontactus'></div>


@push('scripts')
    <script>
        window.addEventListener('load', function () {
            let arcItem = {};
            @if(isset($info->email))
            arcItem.id = 'msg-item-6';
            arcItem.class = 'msg-item-envelope';
            arcItem.title = "Email báo giá<br/>{!! $info->email !!}";
            arcItem.icon = '<svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>';
            arcItem.href = 'mailto:{{$info->email}}';
            arcItem.color = '#FF643A';
            arcItems.push(arcItem);
            @endif
            @if(isset($info->facebook))
            arcItem.id = 'msg-item-1';
            arcItem.class = 'msg-item-facebook-messenger';
            arcItem.title = "FB Messenger<br/>{{$info->facebook}}";
            arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z"></path></svg>';
            arcItem.href = '{{$info->facebook}}';
            arcItem.color = '#567AFF';
            arcItems.push(arcItem);
            @endif
            @if(isset($info->zalo))
            arcItem.id = 'msg-item-10';
            arcItem.class = 'msg-item-zalo';
            arcItem.title = "Zalo Chat<br/>{{$info->zalo}}";
            arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6"><path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"/></svg>';
            arcItem.href = 'https://zalo.me/{{$info->zalo}}';
            arcItem.color = '#008FE5';
            arcItems.push(arcItem);
            @endif
            @if(isset($info->sale))
            arcItem.id = 'msg-item-9';
            arcItem.class = 'msg-item-phone';
            arcItem.title = "Bán Hàng<br/><b style='color:#4EB625'>{{$info->sale}}</b>";
            arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';
            arcItem.href = 'tel:{{$info->sale}}';
            arcItem.color = '#4EB625';
            arcItems.push(arcItem);
            @endif
            @if(isset($info->phone))
            arcItem.id = 'msg-item-3';
            arcItem.class = 'msg-item-phone';
            arcItem.title = "Tư vấn kỹ thuật<br/><b style='color:#FF643A'>{{$info->phone}}</b>";
            arcItem.icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';
            arcItem.href = 'tel:{{$info->phone}}';
            arcItem.color = '#FF643A';
            arcItems.push(arcItem);
            @endif
            jQuery('#arcontactus').contactUs({
                buttonIcon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 224V64c0-35.3-28.7-64-64-64H64C28.7 0 0 28.7 0 64v160c0 35.3 28.7 64 64 64v54.2c0 8 9.1 12.6 15.5 7.8l82.8-62.1H352c35.3.1 64-28.6 64-63.9zm96-64h-64v64c0 52.9-43.1 96-96 96H192v64c0 35.3 28.7 64 64 64h125.7l82.8 62.1c6.4 4.8 15.5.2 15.5-7.8V448h32c35.3 0 64-28.7 64-64V224c0-35.3-28.7-64-64-64z"></path></svg>',
                drag: !1,
                mode: 'regular',
                buttonIconUrl: '/images/svg/msg.svg',
                showMenuHeader: !1,
                menuHeaderText: "How would you like to contact us?",
                showHeaderCloseBtn: !1,
                headerCloseBtnBgColor: '#008749',
                headerCloseBtnColor: '#ffffff',
                itemsIconType: 'rounded',
                align: 'left',
                reCaptcha: !1,
                reCaptchaKey: '',
                countdown: 0,
                theme: '#f2ba33',
                buttonText: !1,
                buttonSize: 'medium',
                menuSize: 'large',
                items: arcItems,
                ajaxUrl: '#',
                promptPosition: 'top',
            })
        })
    </script>
@endpush

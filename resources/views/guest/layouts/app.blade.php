<!doctype html>
<!--[if IE]>
<html class="no-js no-touch ie9" lang="en">
<![endif]-->
<!--[if !IE]><!-->
<html class="no-js no-touch" lang="vi">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>{{$title ?? $info->name ?? ""}} | {{preg_replace("(^https?://)", "", config('app.url') )}}</title>
    <meta name="description"
          content="{{$info->description ?? ""}}">
    <meta name="viewport" content="width=device-width">
    @if(isset($info->icon))
    <link rel="shortcut icon" href="{{asset($info->icon)}}" />
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');
        if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) document.documentElement.className = document.documentElement.className.replace(/\bno-touch\b/, 'has-touch');
    </script>
    <link href="{{ asset('guest/css/theme.scss.css') }}" rel="stylesheet"/>
    <link href="{{ asset('guest/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('guest/css/arcontactus.css') }}" rel="stylesheet"/>
    <link href="{{ asset('guest/css/custom.css') }}" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('guest/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style push -->
    @stack('stylesheets')
</head>
<body>

<div id="shopify-section-static-header" class="shopify-section site-header-wrapper">
    <script type="application/json"
            data-section-id="static-header"
            data-section-type="static-header"
            data-section-data>
            {"settings": { "sticky_header": true}}
    </script>

    <section class="site-header"
             data-site-header-main
             data-site-header-sticky>
        <div class="site-header-menu-toggle">
            <a class="site-header-menu-toggle--button" href="#" data-menu-toggle>
                <span class="toggle-icon--bar toggle-icon--bar-top"></span>
                <span class="toggle-icon--bar toggle-icon--bar-middle"></span>
                <span class="toggle-icon--bar toggle-icon--bar-bottom"></span>
                <span class="show-for-sr">Menu</span>
            </a>
        </div>
        <div class="site-header-main">
            <div class="site-header-logo">
                <a class="site-logo" href="/">
                    <img class="site-logo-image" src="{{$info->logo ?? ""}}" style="max-width: 190px; max-height: 42px;"
                         alt="{{$info->name ?? ""}}">
                </a>
            </div>
            <div class="site-header-search" data-live-search>
                <form class="site-header-search-form form-fields-inline" action="{{ route('search') }}" method="get"
                      data-live-search-form>
                    <div class="form-field no-label"><input class="form-field-input site-header-search-form-field"
                                                            type="text" name="q" aria-label="Tìm kiếm"
                                                            placeholder="Nhập tìm kiếm: công tắc schneider, led bulb philips, hoặc mã hàng..."
                                                            autocomplete="off" >
                        <button class="site-header-search-button button-primary" type="submit" aria-label="Search">
                            <span class="search-icon search-icon--inactive">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21">
                                    <path fill="currentColor" fill-rule="evenodd" d="M12.514 14.906a8.264 8.264 0 0 1-4.322 1.21C3.668 16.116 0 12.513 0 8.07 0 3.626 3.668.023 8.192.023c4.525 0 8.193 3.603 8.193 8.047 0 2.033-.769 3.89-2.035 5.307l4.999 5.552-1.775 1.597-5.06-5.62zm-4.322-.843c3.37 0 6.102-2.684 6.102-5.993 0-3.31-2.732-5.994-6.102-5.994S2.09 4.76 2.09 8.07c0 3.31 2.732 5.993 6.102 5.993z"/>
                                </svg>
                            </span>
                            <span class="search-icon search-icon--active">
                                <svg aria-hidden="true" focusable="false" width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <g fill-rule="nonzero" fill="currentColor">
                                        <path d="M13 26C5.82 26 0 20.18 0 13S5.82 0 13 0s13 5.82 13 13-5.82 13-13 13zm0-3.852a9.148 9.148 0 1 0 0-18.296 9.148 9.148 0 0 0 0 18.296z" opacity=".29"/>
                                        <path d="M13 26c7.18 0 13-5.82 13-13a1.926 1.926 0 0 0-3.852 0A9.148 9.148 0 0 1 13 22.148 1.926 1.926 0 0 0 13 26z"/>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="site-header-cart">
            <a class="site-header-cart--button" href="/cart.html" title="Xem giỏ hàng">
                    <span class="site-header-cart--count" data-header-cart-count="">
                    </span>
                <svg aria-hidden="true" focusable="false" width="28" height="26"
                     viewBox="0 10 28 26" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M26.15 14.488L6.977 13.59l-.666-2.661C6.159 10.37 5.704 10 5.127 10H1.213C.547 10 0 10.558 0 11.238c0 .68.547 1.238 1.213 1.238h2.974l3.337 13.249-.82 3.465c-.092.371 0 .774.212 1.053.243.31.576.465.94.465H22.72c.667 0 1.214-.558 1.214-1.239 0-.68-.547-1.238-1.214-1.238H9.434l.333-1.423 12.135-.589c.455-.03.85-.31 1.032-.712l4.247-9.286c.181-.34.151-.774-.06-1.144-.212-.34-.577-.589-.97-.589zM22.297 36c-1.256 0-2.275-1.04-2.275-2.321 0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322c0 1.281-1.02 2.321-2.275 2.321zM10.92 33.679C10.92 34.96 9.9 36 8.646 36 7.39 36 6.37 34.96 6.37 33.679c0-1.282 1.019-2.322 2.275-2.322s2.275 1.04 2.275 2.322z"/>
                </svg>
                <span class="show-for-sr">Giỏ hàng</span>
            </a>
        </div>
    </section>
    @include('guest.layouts.menu')
</div>


@yield('content')


<!-- Main Footer -->
@include('guest.layouts.footer')


<script src="{{asset('guest/js/theme/main.min.js')}}" data-scripts="" data-shopify-api-url="{{asset('guest/js/theme/api.jquery.min.js')}}"></script>

<script src="{{asset('guest/js/custom.js')}}"></script>

@stack('scripts')

</body>
</html>




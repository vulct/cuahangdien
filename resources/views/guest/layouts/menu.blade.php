
<div class="site-navigation-wrapper site-navigation--has-actions" data-site-navigation id="site-header-nav">
    <nav class="site-navigation">
        <ul class="navmenu navmenu-depth-1  ">
            <li class="navmenu-item navmenu-id-home">
                <a class="navmenu-link navmenu-link--active" href="/">Trang chủ</a>
            </li>
            <li class="navmenu-item navmenu-item-parent navmenu-id-shop navmenu-meganav-item-parent"
                data-navmenu-trigger
                data-navmenu-meganav-trigger>
                <a class="navmenu-link navmenu-link-parent " href="/san-pham">
                    Sản phẩm
                    <span class="navmenu-icon navmenu-icon-depth-1">
                                <svg class="svg-chevron-down"></svg>
                            </span>
                </a>
                <div class="navmenu-submenu" data-navmenu-submenu="">
                    <div class="navmenu-meganav--scroller">
                        <ul class="navmenu navmenu-depth-2">
                            @foreach($menu as $cate)
                                @if($cate->parent_id === 0)
                                    <li><a class="navmenu-link" href="{{route('danhmuc.chitiet',$cate->slug)}}">{{$cate->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="navmenu-item">
                <a class="navmenu-link" href="{{route('hang.index')}}">Thương hiệu</a>
            </li>
            <li class="navmenu-item navmenu-item-parent navmenu-id-shop navmenu-meganav-item-parent"
                data-navmenu-trigger data-navmenu-meganav-trigger>
                <a class="navmenu-link navmenu-link-parent " href="{{route('bang-gia')}}">
                    Bảng giá
                </a>

            </li>

            <li class="navmenu-item">
                <a class="navmenu-link navmenu-sale" href="{{route('khuyen-mai')}}">Khuyến mãi</a>
            </li>


            <li class="navmenu-item">
                <a class="navmenu-link" href="{{route('blogs')}}">Tin tức</a>
            </li>
            <li class="navmenu-item">
                <a class="navmenu-link" href="{{isset($pages[0]) ? '/pages/'.$pages[0][0]->slug.'.html' : '#'}}">Về chúng tôi</a>
            </li>
            <li class="navmenu-item">
                <a class="navmenu-link" href="{{route('tracuu')}}">Tra cứu đơn hàng</a>
            </li>
        </ul>
    </nav>
</div>
<div class="site-mobile-nav" id="site-mobile-nav" data-mobile-nav>
    <div class="mobile-nav-panel" data-mobile-nav-panel>
        <a class="mobile-nav-close" href="#site-header-nav" data-mobile-nav-close>
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg"
                 width="13" height="13" viewBox="0 0 13 13">
                <path fill="currentColor" fill-rule="evenodd"
                      d="M5.306 6.5L0 1.194 1.194 0 6.5 5.306 11.806 0 13 1.194 7.694 6.5 13 11.806 11.806 13 6.5 7.694 1.194 13 0 11.806 5.306 6.5z"/>
            </svg>
            <span class="show-for-sr">Đóng</span>
        </a>
        <div class="mobile-nav-content">
            <ul class="navmenu  navmenu-depth-1  ">
                <li class="navmenu-item navmenu-id-home">
                    <a class="navmenu-link" href="/">Trang chủ</a>
                </li>
                <li class="navmenu-item navmenu-item-parent navmenu-id-shop navmenu-meganav-item-parent"
                    data-navmenu-trigger="" data-navmenu-meganav-trigger="">
                    <a class="navmenu-link navmenu-link-parent" href="/san-pham.html">
                        Sản phẩm
                        <span class="navmenu-icon navmenu-icon-depth-1">
                                    <svg class="svg-chevron-down"></svg>
                                </span>
                    </a>
                    <div class="navmenu-submenu navmenu-meganav" data-navmenu-submenu="" data-meganav-menu="">
                        <div class="navmenu-meganav--scroller">
                            <ul class="navmenu navmenu-depth-2">
                                @foreach($menu as $cate)
                                    @if($cate->parent_id === 0)
                                        <li><a class="navmenu-link" href="{{route('danhmuc.chitiet',$cate->slug)}}">{{$cate->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navmenu-item">
                    <a class="navmenu-link" href="{{route('hang.index')}}">Thương hiệu</a>
                </li>
                <li class="navmenu-item navmenu-item-parent navmenu-id-shop navmenu-meganav-item-parent"
                    data-navmenu-trigger="" data-navmenu-meganav-trigger="">
                    <a class="navmenu-link" href="{{route('bang-gia')}}">
                        Bảng giá

                    </a>

                </li>
                <li class="navmenu-item">
                    <a class="navmenu-link" href="{{route('khuyen-mai')}}">Khuyến mãi</a>
                </li>


                <li class="navmenu-item navmenu-id-theme-features">
                    <a class="navmenu-link" href="{{route('blogs')}}">Tin tức</a>
                </li>
                <li class="navmenu-item navmenu-id-theme-features">
                    <a class="navmenu-link" href="/pages/ve-chung-toi.html">Về chúng tôi</a>
                </li>
                <li class="navmenu-item navmenu-id-theme-features">
                    <a class="navmenu-link" href="{{route('tracuu')}}">Tra cứu đơn hàng</a>
                </li>
                <li class="navmenu-item navmenu-id-theme-features">
                    <a class="navmenu-link" href="/pages/thanh-toan-van-chuyen">Thanh toán & Vận chuyển</a>
                </li>
                <li class="navmenu-item navmenu-id-theme-features">
                    <a class="navmenu-link" href="/pages/huong-dan-mua-hang">Hướng dẫn mua hàng</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mobile-nav-overlay" data-mobile-nav-overlay></div>
</div>

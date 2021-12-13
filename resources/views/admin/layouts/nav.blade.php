<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{config('app.url_admin')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn"><i class="fas fa-power-off"></i></button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('storage/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name ?? 'Admin'}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Cửa hàng -->
                <li class="nav-header">
                    <i class="nav-icon  fab fa-shopify "></i>
                    <span style="text-transform: uppercase">Cửa hàng</span>
                </li>
                <li class="nav-item {{ (request()->is('admin/orders*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                        <i class="nav-icon  fas fa-cart-arrow-down "></i>
                        <p>
                            Quản lý đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.order.index')}}" class="nav-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>Đơn hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('admin/products*')) || (request()->is('admin/categories*')) || (request()->is('admin/brands*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/products*')) || (request()->is('admin/categories*')) ? 'active' : '' }}">
                        <i class="nav-icon  fas fa-folder-open "></i>
                        <p>
                            Sản phẩm & danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}" class="nav-link {{ (request()->is('admin/products*')) ? 'active' : '' }}">
                                <i class="far fa-file-image nav-icon"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('admin.categories.index')}}" class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                            <i class="fas fa-folder-open nav-icon"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Blogs -->
                <li class="nav-item {{ (request()->is('admin/post_categories*')) || (request()->is('admin/posts*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/blogs*')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-powerpoint"></i>
                        <p>
                            Bài đăng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.posts.index')}}" class="nav-link {{ (request()->is('admin/posts*')) ? 'active' : '' }}">
                                <i class="far fa-file-image nav-icon"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.tariffs.index')}}" class="nav-link {{ (request()->is('admin/tariffs*')) ? 'active' : '' }}">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Bảng giá</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('admin.categories_post')}}" class="nav-link {{ (request()->is('admin/post_categories*')) ? 'active' : '' }}">
                                <i class="fas fa-folder-open nav-icon"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Phương thức vận chuyển -->
                <li class="nav-item">
                    <a href="{{route('admin.shipping_methods.index')}}" class="nav-link {{ (request()->is('admin/shipping_methods*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>Vận chuyển</p>
                    </a>
                </li>
                <!-- Thương hiệu -->
                <li class="nav-item">
                    <a href="{{route('admin.brands.index')}}" class="nav-link {{ (request()->is('admin/brands*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Thương hiệu</p>
                    </a>
                </li>
                <!-- Nội dung -->
                <li class="nav-header">
                    <i class="nav-icon  fas fa-file-signature "></i>
                    <span style="text-transform: uppercase">Nội dung</span>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.banners.index')}}" class="nav-link {{ (request()->is('admin/banners*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.pages.index')}}" class="nav-link {{ (request()->is('admin/pages*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>
                            Quản lý trang
                        </p>
                    </a>
                </li>
                <!-- Marketing -->
                <li class="nav-header">
                    <i class="nav-icon  fas fa-sort-amount-up "></i>
                    <span style="text-transform: uppercase">Marketing</span>
                </li>
                <!-- Đánh giá sản phẩm -->
                <li class="nav-item">
                    <a href="{{route('admin.reviews.index')}}" class="nav-link {{ (request()->is('admin/reviews*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Đánh giá sản phẩm</p>
                    </a>
                </li>
                <!-- Bình luận bài viết -->
                <li class="nav-item">
                    <a href="{{route('admin.comments')}}" class="nav-link {{ (request()->is('admin/comments*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Bình luận bài viết</p>
                    </a>
                </li>
                <!-- Liên hệ -->
                <li class="nav-item">
                    <a href="{{route('admin.contacts')}}" class="nav-link {{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Liên hệ</p>
                    </a>
                </li>
                <!-- Thiết lập cửa hàng -->
                <li class="nav-header">
                    <i class="nav-icon  fas fa-store-alt "></i>
                    <span style="text-transform: uppercase"> Thiết lập cửa hàng</span>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.info.index')}}" class="nav-link {{ (request()->is('admin/info*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-h-square"></i>
                        <p>
                            Thông tin cửa hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.groups.index')}}" class="nav-link {{ (request()->is('admin/groups*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Thông tin nhân viên
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.account.index')}}" class="nav-link {{ (request()->is('admin/account*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Tài khoản quản trị
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

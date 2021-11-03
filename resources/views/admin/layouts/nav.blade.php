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

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('/storage/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="/storage/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="/storage/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/storage/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/storage/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                    <a href="#" class="nav-link">
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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon  fas fa-cart-arrow-down "></i>
                        <p>
                            Quản lý đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="http://localhost/s-cart/public/sc_admin/order" class="nav-link">
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
                    <a href="http://localhost/s-cart/public/sc_admin/store_maintain" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Bảo trì website
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

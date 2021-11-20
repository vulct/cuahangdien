@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <div class="shopify-section collection--section">
            <div class="productgrid--outer layout--no-sidebar">

                <div class="productgrid--wrapper product-collection">

                    <div class="collection--information">
                        <h1 class="collection--title">THƯƠNG HIỆU THIẾT BỊ ĐIỆN</h1>
                        <p style="margin: 10px 0;">Bạn đang cần tìm sản phẩm của thương hiệu nào?</p>
                    </div>
                    @foreach($categories as $category)
                        @if(isset($brands[$category->id]))
                            <div class="brand-row">
                            <div class="brand-header">
                                <h3 class="h3-title ii3"><a href="/danh-muc/{{$category->slug}}.html" title="">{{$category->name}}</a></h3>
                                <a href="/danh-muc/{{$category->slug}}.html" class="title-all">
                                    <span class="text">Xem tất cả</span>
                                </a>
                            </div>
                            <div class="brand--content">
                                <div  class="collection--brands--logo">
                                @foreach($brands[$category->id] as $brand)
                                    @if($brand->category_id === $category->id)
                                        <a href="/hang/{{$brand->slug}}/{{$category->slug}}.html" title="Xem sản phẩm thương hiệu {{$brand->name}}" class="brand-image">
                                            <img class="lazy" src="{{asset($brand->image)}}" data-src="{{asset($brand->image)}}" alt="Thiết bị điện {{$brand->name}}">
                                        </a>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

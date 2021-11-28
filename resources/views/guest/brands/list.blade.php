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
                                <h3 class="h3-title ii3"><a href="{{route('danhmuc.chitiet',$category->slug)}}" title="">{{$category->name}}</a></h3>
                                <a href="{{route('danhmuc.chitiet',$category->slug)}}" class="title-all">
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
<style> .brand-row {margin-bottom: 30px;}.brand-row .collection--brands--logo {display: grid;grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));grid-gap: 0;}.brand-header {background: 0 0;height: 38px;line-height: 38px;border-bottom: 2px solid #f2ba33;margin-bottom: 8px;}.brand-header .h3-title {float: left;font-size: 18px;color: #424242;width: 290px;text-overflow: ellipsis;white-space: nowrap;margin: 0;text-transform: uppercase;padding-left: 0;position: relative;}.brand-header .h3-title a {background: -webkit-linear-gradient(#f2ba34, #bc8500);-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-family: tahoma, sans-serif;}.brand-header .title-all {float: right;margin-right: 0;font-size: 14px;color: #cea23b;font-weight: 700;}.brand-header .title-all {float: right;margin-right: 0;font-size: 14px;color: #cea23b;font-weight: 700;}</style>
@endpush

@push('scripts')

@endpush

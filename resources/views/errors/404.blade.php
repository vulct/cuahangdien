@extends('guest.layouts.app')

@section('content')
    <main class="site-main">
        <h1>404 Error Page</h1>
        <p class="zoom-area">Xin lỗi! Không tìm thấy trang </p>
        <section class="error-container">
            <span class="four"><span class="screen-reader-text">4</span></span>
            <span class="zero"><span class="screen-reader-text">0</span></span>
            <span class="four"><span class="screen-reader-text">4</span></span>
        </section>
        <div class="link-container">
            <a target="_blank" href="{{route('index')}}" class="more-link">Trờ về trang chủ</a>
        </div>
    </main>
@endsection

@push('stylesheets')
    <link rel="stylesheet" href="{{asset('guest/css/page-404.css')}}">
@endpush

@push('scripts')

@endpush

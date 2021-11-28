@extends('guest.layouts.app')

@section('content')
<main class="site-main page--text">
    <div class="s-menu">
        <div class="max-width-1140">
            <div class="s-menu-wrapper">
                <ul>
                    @foreach($categories as $category)
                        @if($category->id !== $selected->id)
                            <li class="s-menu-items">
                                <a href="{{route('blogs.category',$category->slug)}}">{{$category->name}}</a>
                            </li>
                        @else
                            <li class="s-menu-items active">
                                <a href="{{$selected->slug}}">{{$selected->name}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope>
        <div class="breadcrumb-home" itemprop="itemListElement" itemscope>
            <a href="{{route('index')}}" itemprop="item"><span itemprop="name" >Trang chủ</span></a>
            <meta itemprop="position" content="1">
        </div>
        <div itemprop="itemListElement" itemscope>
            <a href="{{isset($selected) ? route('blogs.category',$selected->slug) : '#'}}" itemprop="item">
                <span itemprop="name">{{$selected->name ?? ''}}</span><meta itemprop="position" content="2">
            </a>
        </div>
    </nav>
    <div id="shopify-section-static-blog" class="shopify-section blog--section">
        <script type="application/json" data-section-type="static-blog" data-section-id="static-blog">
        </script>
        <section class="blog--container">
            <header class="blog-title">
                <h1>{{$selected->name ?? ''}}  {!! isset($selected->description) ? '<span>'. $selected->description .'</span>' : '' !!}</h1>
            </header>
            <div class="blog--inner">
                @foreach($posts as $post)
                <article class="article--excerpt-wrapper">
                    <a class="article--excerpt-image" href="{{route('posts', $post->slug)}}" data-rimg="loaded" data-rimg-scale="1" data-rimg-template="{{asset($post->image)}}" data-rimg-max="2000x1152" style="background-image: url({{asset($post->image)}});">
                        <noscript data-rimg-noscript="">
                            <img src="{{asset($post->image)}}" alt="{{$post->name}}" data-rimg="noscript" srcset="{{asset($post->image)}} 1x, {{asset($post->image)}} 2.85x">
                        </noscript>
                        <img src="{{asset($post->image)}}" alt="{{$post->name}}" data-rimg="loaded" data-rimg-scale="1" data-rimg-template="{{asset($post->image)}}" data-rimg-max="2000x1152" srcset="{{asset($post->image)}} 1.25x" data-rimg-template-svg="data:image/svg+xml;utf8,<svg%20xmlns='http://www.w3.org/2000/svg'%20width='700'%20height='700'></svg>">
                        <div data-rimg-canvas=""></div>
                    </a>
                    <div class="article--excerpt-content">
                        <aside class="article--excerpt-meta">
                                <span class="article--excerpt-meta-item">
                                    {{\App\Helpers\Helper::getDateTime($post->updated_at)}}
                                </span>
                            <span class="article--excerpt-meta-item">
                                    <a href="{{route('blogs.category',$post->category->slug)}}" title="Xem mục tin {{$post->category->name}}">{{$post->category->name}}</a>
                                </span>
                        </aside>
                        <h2 class="article--excerpt-title">
                            <a href="{{route('posts', $post->slug)}}">
                                {{$post->name}}
                            </a>
                        </h2>
                        <div class="article--excerpt-text rte">
                                <span>{!! $post->description !!}</span>
                        </div>
                        <p></p>
                        <a class="article--excerpt-readmore" href="{{route('posts', $post->slug)}}">
                            Chi tiết
                            <span class="article--excerpt-readmore--icon">
                                    <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                        <g fill="currentColor" fill-rule="evenodd">
                                            <polygon class="icon-chevron-down-left" points="4 5.371 7.668 1.606 6.665 .629 4 3.365"></polygon>
                                            <polygon class="icon-chevron-down-right" points="4 3.365 1.335 .629 1.335 .629 .332 1.606 4 5.371"></polygon>
                                        </g>
                                    </svg>

                                </span>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            {{$posts->links('guest.layouts.pagination.default')}}
        </section>
    </div>
</main>

@endsection

@push('stylesheets')
    <link href="{{ asset('guest/css/custom.css') }}" rel="stylesheet"/>
@endpush

@push('scripts')

@endpush

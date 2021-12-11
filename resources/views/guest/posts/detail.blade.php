@extends('guest.layouts.app')

@section('content')
    <main class="site-main page--text">
        <div id="shopify-section-static-article" class="shopify-section article--section">
            <script type="application/json" data-section-type="static-article" data-section-id="static-article">
            </script>
            <section class="article--outer">

                <img alt="{{$post->name}}" src="{{asset($post->image)}}">
                <nav class="breadcrumbs-container" role="navigation" aria-label="breadcrumbs" itemscope=""
                     itemtype="http://schema.org/BreadcrumbList">
                    <div class="breadcrumb-home" itemprop="itemListElement" itemscope=""
                         itemtype="http://schema.org/ListItem">
                        <a href="{{route('index')}}" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </div>
                    <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="{{route('blogs.category',$post->category->slug)}}" itemprop="item">
                            <span itemprop="name">{{$post->category->name}}</span>
                            <meta itemprop="position" content="2">
                        </a>
                    </div>
                </nav>
                <aside class="article--meta">
            <span class="article--meta-item">
                <span>{{\App\Helpers\Helper::getDateTime($post->updated_at)}}</span>
            </span>
                    <span class="article--meta-item">
                {{config('app.name')}}
            </span>
                    <span class="article--meta-item">
                <a href="javascript:" onclick="gotoreview()">{{$post->comments->count()}} Bình luận</a>
            </span>
                    <div class="share-buttons">
                        <div class="share-buttons--list">
                            <a style="width:24px;height:24px;" rel="nofollow"
                               class="share-buttons--button share-buttons--facebook" target="_blank"
                               href="//www.facebook.com/sharer.php?u={{config('app.url')}}/{{$post->slug}}.html">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="28"
                                     height="28" viewBox="0 0 28 28">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M16.913 13.919h-2.17v7.907h-3.215V13.92H10v-2.794h1.528V9.316c0-1.294.601-3.316 3.245-3.316l2.38.01V8.72h-1.728c-.282 0-.68.145-.68.762v1.642h2.449l-.281 2.794z"></path>
                                </svg>
                                <span class="show-for-sr">Share on Facebook</span>
                            </a>
                            <a style="width:24px;height:24px;" rel="nofollow"
                               class="share-buttons--button share-buttons--twitter" target="_blank"
                               href="//twitter.com/share?url={{config('app.url')}}/{{$post->slug}}.html">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="28"
                                     height="28" viewBox="0 0 28 28">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M20.218 9.925a3.083 3.083 0 0 0 1.351-1.7 6.156 6.156 0 0 1-1.952.746 3.074 3.074 0 0 0-5.238 2.804 8.727 8.727 0 0 1-6.336-3.212 3.073 3.073 0 0 0 .951 4.104 3.062 3.062 0 0 1-1.392-.385v.039c0 1.49 1.06 2.732 2.466 3.014a3.078 3.078 0 0 1-1.389.053 3.077 3.077 0 0 0 2.872 2.135A6.168 6.168 0 0 1 7 18.795a8.7 8.7 0 0 0 4.712 1.382c5.654 0 8.746-4.685 8.746-8.747 0-.133-.003-.265-.009-.397a6.248 6.248 0 0 0 1.534-1.592 6.146 6.146 0 0 1-1.765.484z"></path>
                                </svg>
                                <span class="show-for-sr">Tweet on Twitter</span>
                            </a>
                            <a style="width:24px;height:24px;" rel="nofollow"
                               class="share-buttons--button share-buttons--pinterest" target="_blank"
                               href="//pinterest.com/pin/create/button/?url={{config('app.url')}}/{{$post->slug}}.html&amp;media={{asset($post->image)}}&amp;description=">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="28"
                                     height="28" viewBox="0 0 28 28">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M13.914 6a7.913 7.913 0 0 0-2.885 15.281c-.07-.626-.132-1.586.028-2.27.144-.618.928-3.933.928-3.933s-.238-.475-.238-1.175c0-1.098.64-1.922 1.433-1.922.675 0 1 .507 1 1.115 0 .68-.43 1.694-.654 2.634-.188.789.395 1.43 1.172 1.43 1.405 0 2.487-1.482 2.487-3.622 0-1.894-1.361-3.219-3.306-3.219-2.251 0-3.571 1.689-3.571 3.434 0 .68.26 1.409.587 1.805.065.08.074.149.056.228-.06.25-.194.787-.22.897-.035.144-.114.176-.266.106-.987-.46-1.606-1.905-1.606-3.066 0-2.497 1.814-4.787 5.23-4.787 2.744 0 4.878 1.955 4.878 4.57 0 2.726-1.72 4.922-4.108 4.922-.801 0-1.555-.418-1.813-.91l-.495 1.88c-.178.688-.66 1.55-.983 2.075a7.914 7.914 0 0 0 10.258-7.56 7.914 7.914 0 0 0-7.913-7.912V6z"></path>
                                </svg>
                                <span class="show-for-sr">Pin on Pinterest</span>
                            </a>
                        </div>
                    </div>
                </aside>
                <div class="article--container">
                    <div class="article--inner post-body">
                        <h1 class="article--title">
                            {{$post->name}}
                        </h1>

                        <div class="article--content rte">
                            {!! $post->content !!}
                        </div>

                        <div class="post-share">
                            <div class="rates">
                                <span class="spr-badge">
                                    <span class="spr-starrating spr-badge-starrating">
                                        <a href="javascript:" onclick="setRating(1);" class="spr-icon spr-icon-star"></a>
                                        <a href="javascript:" onclick="setRating(2);" class="spr-icon spr-icon-star"></a>
                                        <a href="javascript:" onclick="setRating(3);" class="spr-icon spr-icon-star"></a>
                                        <a href="javascript:" onclick="setRating(4);" class="spr-icon spr-icon-star"></a>
                                        <a href="javascript:" onclick="setRating(5);" class="spr-icon spr-icon-star"></a>
                                    </span>
                                    <span class="spr-badge-caption">
                                        @if($star)
                                            <em><b>{{$star['avg']}}/5</b> - <em> từ <b> {{$star['count']}}</b></em> lượt đánh giá</em>
                                        @endif
                                    </span>
                                </span>
                            </div>
                        </div>
                        @include('guest.layouts.signature')
                    </div>

                    <div class="comment-box" id="comment-box">

                        <div class="spr-container">
                            <div class="spr-header">
                                <h2 class="spr-header-title">Bình luận</h2>
                            </div>
                            <div class="spr-header">
                                <div class="spr-reviews" id="reviews">

                                </div>
                            </div>

                            <div class="spr-content">
                                <div class="spr-form" id="form" style="margin-top: 0;padding-top: 0;">
                                    <form method="get" action="#" id="new-review-form" class="new-review-form">
                                        <input type="hidden" name="rating" value="5">
                                        <input type="hidden" name="type" value="1">
                                        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                                        <fieldset class="spr-form-contact">
                                            <div class="spr-form-contact-name">

                                                <label for="name"></label>
                                                <input class="spr-form-input spr-form-input-text " id="name"
                                                                                 type="text" name="name" value="" placeholder="Nhập họ tên">
                                            </div>
                                            <div class="spr-form-contact-email">

                                                <label for="email"></label>
                                                <input class="spr-form-input spr-form-input-email " id="email"
                                                                                  type="email" name="email" value="" placeholder="Email của bạn">
                                            </div>
                                        </fieldset>
                                        <fieldset class="spr-form-review">

                                            <div class="spr-form-review-body">
                                                <label class="spr-form-label" for="content">Nội dung <span
                                                        class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                <div class="spr-form-input">
                                                    <textarea class="spr-form-input spr-form-input-textarea"
                                                              id="content" data-product-id="#" name="content" rows="3"
                                                              placeholder="Viết đánh giá của bạn ở đây."></textarea>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="spr-form-actions">
                                            <input type="submit"
                                                   class="spr-button spr-button-primary button button-primary btn btn-primary"
                                                   value="Gửi bình luận">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="spr-reviews" id="reviews_192" style="display: none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white relate-articles">
                <div class="width1140 width1400">
                    <a href="{{route('blogs.category',$post->category->slug)}}"><h2>BÀI VIẾT LIÊN QUAN</h2></a>

                    <div>
                        <ul class="clearfix">
                            @foreach($related as $post)
                            <li>
                                <div class="featured">
                                    <div class="cover">
                                        <a href="{{route('posts',$post->slug)}}"
                                           title="{{$post->name}}">
                                            <img
                                                src="{{asset($post->image)}}"
                                                alt="{{$post->name}}"
                                                title="{{$post->name}}">
                                        </a>
                                    </div>
                                    <header class="overlay">
                                        <div class="heading">
                                            <a href="{{route('posts',$post->slug)}}">{{$post->name}}</a>
                                        </div>
                                    </header>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <p style="text-align:center;"><a href="{{route('blogs.category',$post->category->slug)}}">Xem tất cả</a></p>
                </div>
            </section>
            <section class="cate-articles">
                <div class="width1140">
                    <div class="items clearfix">
                        @foreach($categories as $cate)
                        <div class="item"><a href="{{route('blogs.category',$cate->slug)}}" class="_1line">{{$cate->name}}</a></div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('stylesheets')
<link rel="stylesheet" href="{{asset('guest/css/post.css')}}">

<link rel="stylesheet" href="{{asset('guest/css/review.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('guest/scripts/comments.js')}}"></script>
@endpush


@php $i = 1; @endphp

@foreach($categories as $category)
    <div id='shopify-section-{{$i}}' class='shopify-section featured-collection--section'>
        <section class='product-row--container featured-collection--container'>
            <div class='title-header'>
                <h3 class='h3-title'><a href='{{route('danhmuc.chitiet',$category->slug)}}' title='{{$category->name}}'><i class="{{$category->icon}}"></i> {{$category->name}}</a></h3>
                <a href='{{route('danhmuc.chitiet',$category->slug)}}' class='title-all'>
                    <span class='text'>Xem thêm</span>
                    <i class='icon-next'></i>
                </a>
            </div>
            <div class='home-section--content product-row product-row--scroller product-row--count-5'
                 data-product-row>
                <div class='product-row--outer'>
                    <div class='product-row-nav'>
                        <ul>
                            @foreach($data['brands'][$category->id] as $brand)
                                @if($brand->category_id === $category->id)
                                    <li>
                                        <a href="{{route('hang.danhmuc',[$brand->slug,$category->slug])}}"><img
                                                data-src="{{asset($brand->image)}}" class="lazy"
                                                src="{{asset($brand->image)}}" alt="{{$category->name}}"/></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @php $i = 1; @endphp
                @foreach($category['products'] as $product)
                    @if($i <= 5)
                        <article class='productgrid--item imagestyle--natural productitem--emphasis' data-product-item
                         tabindex='1'>
                    <div class='productitem' data-product-item-content>
                        <a class='productitem--image-link' href='{{route('products.detail',$product->slug)}}'>
                            <figure class='productitem--image' data-product-item-image>
                                <img alt='{{$product->name}}'
                                     src='{{$product->image}}' width='350' height='350'>
                            </figure>
                        </a>
                        <div class='productitem--info'>
                            <div class='productitem--price'>
                                @if(isset($product['attributes']))
                                    @if($product['attributes'][0]['discount'] > 0)
                                    <div class='price--compare-at visible' data-price-compare-at>
                                    <span class='price--spacer'>{{number_format($product['attributes'][0]['price'])}} VND</span>
                                </div>
                                <span class='productitem--badge badge--sale' data-badge-sales><span
                                        data-price-percent-saved>{{round($product['attributes'][0]['discount'],2)}}</span>%
                                </span>

                                <div class='price--main' data-price>
                                <span class='money'>
                                    {{number_format($product['attributes'][0]['price'] - ($product['attributes'][0]['price']*$product['attributes'][0]['discount']/100))}} <span>VND</span>
                                </span>
                                </div>
                                @else
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>{{number_format($product['attributes'][0]['price'])}} VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span
                                            data-price-percent-saved>LH</span>
                                    </span>

                                    <div class='price--main' data-price>
                                    <span class='money'>
                                        {{number_format($product['attributes'][0]['price'])}} <span>VND</span>
                                    </span>
                                    </div>
                                @endif
                                    @endif
                            </div>
                            <h4 class='productitem--title'>
                                <a href='{{route('products.detail',$product->slug)}}'>
                                    {{$product->name}}
                                </a>
                            </h4>

                            <div class='productitem--provider'><img src='{{$brands[$product->brand_id]->image}}'
                                                                    alt='{{$brands[$product->brand_id]->name}}' width='120'
                                                                    height='60'></div>
                        </div>
                    </div>
                </article>
                    @endif
                    @php $i++; @endphp
                @endforeach
            </div>
            @foreach($menu as $cate)
                @if($cate->parent_id === $category->id)
                    <div class='_links'>
                        <a href='{{route('danhmuc.chitiet',$cate->slug)}}' title='{{$cate->name}}'>{{$cate->name}}</a> /
                    </div>
                @endif
            @endforeach
        </section>
    </div>
@endforeach

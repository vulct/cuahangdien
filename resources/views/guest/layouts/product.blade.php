@php $i = 1; @endphp

@foreach($categories as $category)
    <div id='shopify-section-{{$i}}' class='shopify-section featured-collection--section'>
        <section class='product-row--container featured-collection--container'>
            <div class='title-header'>
                <h3 class='h3-title'><a href='/{{$category->slug}}.html' title='{{$category->name}}'><i class="{{$category->icon}}"></i> {{$category->name}}</a></h3>
                <a href='/{{$category->name}}.html' class='title-all'>
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
                                        <a href="/hang/{{$brand->name}}/{{$category->slug}}.html"><img
                                                data-src="{{asset($brand->image)}}" class="lazy"
                                                src="{{asset($brand->image)}}"/></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($category['products'] as $product)
                    <article class='productgrid--item imagestyle--natural productitem--emphasis' data-product-item
                         tabindex='1'>
                    <div class='productitem' data-product-item-content>
                        <a class='productitem--image-link' href='/products/{{$product->slug}}.html'>
                            <figure class='productitem--image' data-product-item-image>
                                <img alt='{{$product->name}}'
                                     src='{{$product->image}}' width='350' height='350'>
                            </figure>
                        </a>
                        <div class='productitem--info'>
                            <div class='productitem--price'>
                                @if($product['attributes'][0]['discount'] > 0)
                                <div class='price--compare-at visible' data-price-compare-at>
                                    <span class='price--spacer'>{{number_format($product['attributes'][0]['price'], 0, ',', ',')}} VND</span>
                                </div>
                                <span class='productitem--badge badge--sale' data-badge-sales><span
                                        data-price-percent-saved>{{round($product['attributes'][0]['discount'],2)}}</span>%
                                </span>

                                <div class='price--main' data-price>
                                <span class='money'>
                                    {{number_format($product['attributes'][0]['price'] - ($product['attributes'][0]['price']*$product['attributes'][0]['discount']/100), 0, ',', ',')}} <span>VND</span>
                                </span>
                                </div>
                                @else
                                    <div class='price--compare-at visible' data-price-compare-at>
                                        <span class='price--spacer'>{{number_format($product['attributes'][0]['price'], 0, ',', ',')}} VND</span>
                                    </div>
                                    <span class='productitem--badge badge--sale' data-badge-sales><span
                                            data-price-percent-saved>LH</span>
                                    </span>

                                    <div class='price--main' data-price>
                                    <span class='money'>
                                        {{number_format($product['attributes'][0]['price'], 0, ',', ',')}} <span>VND</span>
                                    </span>
                                    </div>
                                @endif
                            </div>
                            <h4 class='productitem--title'>
                                <a href='/products/{{$product->slug}}.html'>
                                    {{$product->name}}
                                </a>
                            </h4>

                            <div class='productitem--provider'><img src='{{$brands[$product->brand_id]->image}}'
                                                                    alt='{{$brands[$product->brand_id]->name}}' width='120'
                                                                    height='60'></div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
    </div>
@endforeach

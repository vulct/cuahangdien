<div class="modal fade" id="show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__(':resource Details',['resource' => 'Sản Phẩm'])}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th style="width:50%">{{__('Name')}}:</th>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Đường dẫn')}}:</th>
                                        <td><a href="{{route('products.detail',$product->slug)}}">{{route('products.detail',$product->slug)}}</a></td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th style="width:50%">{{__('Tiêu đề')}}:</th>
                                        <td>{{$product->meta_title}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Mô tả')}}:</th>
                                        <td>{!! $product->description !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Nội dung')}}:</th>
                                        <td>{!! $product->content !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Bảo hành')}}:</th>
                                        <td>{!! $product->warranty !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Đơn vị tính')}}:</th>
                                        <td>{!! $product->unit !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Danh mục')}}:</th>
                                        <td>
                                            @foreach($categories as $key => $category)
                                                {{$category->id === $product->category_id ? $category->name : ""}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thương hiệu')}}:</th>
                                        <td>
                                            @foreach($brands as $key => $brand)
                                                {{$brand->id === $product->brand_id ? $brand->name : ""}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian tạo')}}:</th>
                                        <td>{{date_format($product->created_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian cập nhật gần nhất')}}:</th>
                                        <td>{{date_format($product->updated_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Trạng thái')}}:</th>
                                        <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                                    </tr>
                                    @if($product->image != null)
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Hình ảnh sản phẩm 01')}}:</th>
                                        <td><img class="card-img-right flex-auto d-none d-md-block" src="{{asset($product->image)}}"  alt="Thumbnail [200x250]" style="width: 200px;" data-holder-rendered="true">
                                        </td>
                                    </tr>
                                    @endif
                                    @if($product->image_01 != null)
                                        <tr style="border-top: none !important;" class="border-bottom">
                                            <th>{{__('Hình ảnh sản phẩm 02')}}:</th>
                                            <td><img class="card-img-right flex-auto d-none d-md-block" src="{{asset($product->image_01)}}"  alt="Thumbnail [200x250]" style="width: 200px;" data-holder-rendered="true">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($product->image_02 != null)
                                        <tr style="border-top: none !important;" class="border-bottom">
                                            <th>{{__('Hình ảnh sản phẩm 03')}}:</th>
                                            <td><img class="card-img-right flex-auto d-none d-md-block" src="{{asset($product->image_02)}}"  alt="Thumbnail [200x250]" style="width: 200px;" data-holder-rendered="true">
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>

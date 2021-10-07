<div class="card-body">
    <div class="form-group">
        <label for="name">{{__('Name')}} <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" value="{{$product->name}}" name="name" placeholder="Ổ cắm kéo dài chống sét lan truyền thế hệ mới" required>
    </div>
    <div class="form-group">
        <label for="description">{{__('Mô tả')}}</label>
        <textarea id="description" class="summernote" name="description" >{{$product->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="content">{{__('Nội dung')}}</label>
        <textarea id="content" class="summernote" name="content">{{$product->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="inputStatus">{{__('Danh mục sản phẩm')}} <span class="text-danger">*</span></label>
        <select id="inputStatus" name="category" class="form-control select2"
                style="width: 100%" required>
            <option value="">Trống</option>
            @foreach($categories as $cate_parent)
                <option value="{{$cate_parent->id}}" {{ $product->category->id === $cate_parent->id ? "selected" :""}}>{{$cate_parent->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="inputBrand">{{__('Thương hiệu sản phẩm')}} <span class="text-danger">*</span></label>
        <select id="inputBrand" name="brand" class="form-control select2"
                style="width: 100%" required>
            <option value="">Trống</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}" {{ $product->brand->id === $brand->id ? "selected" :""}}>{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success float-right btn-block">{{__('Edit')}}</button>
    </div>
</div>



<div class="col-md-6">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{__('Customize')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="slug">{{__('Đường dẫn')}} <span class="text-danger">*</span></label>
                <input type="text" id="slug" class="form-control" value="{{$product->slug}}" name="slug" placeholder="o-cam-keo-dai-chong-set-lan-truyen-the-he-moi" required>
            </div>
            <div class="form-group repeater">
                <div data-repeater-list="group-a">
                    @if(count($product['attributes']) > 0)
                        @foreach($product['attributes'] as $att)
                            <div data-repeater-item="">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="inputTypeProduct">{{__('Mẫu sản phẩm')}}</label>
                                        <input type="hidden" name="attribute_id" value="{{$att->id}}">
                                        <input type="text" class="form-control" name="type_name" value="{{$att->type_name}}" id="inputTypeProduct" placeholder="1 ổ cắm, 230V - 10A">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="codename">{{__('Mã sản phẩm')}} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="codename" value="{{$att->codename}}"  id="codename" placeholder="PM1W-VN" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 form-group">
                                        <label for="price">{{__('Giá gốc (VNĐ)')}}</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{round($att->price,2)}}" placeholder="276,000 VNĐ">
                                    </div>
                                    <div class="col-md-5 col-sm-12 form-group">
                                        <label for="discount">{{__('Chiết khấu (%)')}}</label>
                                        <input type="number" class="form-control" id="discount" name="discount" value="{{round($att->discount)}}" placeholder="30%">
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group" style="text-align: right;">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger" data-repeater-delete="">
                                            <i class="fas fa-trash font-size-10"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif(old('group-a'))
                        @for( $i =0; $i < count(old('group-a')); $i++)
                            <div data-repeater-item="">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="inputTypeProduct">{{__('Mẫu sản phẩm')}}</label>
                                        <input type="text" class="form-control" name="type_name" value="{{old("group-a.$i.type_name")}}" id="inputTypeProduct" placeholder="1 ổ cắm, 230V - 10A">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="codename">{{__('Mã sản phẩm')}} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="codename" value="{{old("group-a.$i.codename")}}"  id="codename" placeholder="PM1W-VN" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 form-group">
                                        <label for="price">{{__('Giá gốc (VNĐ)')}}</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{old("group-a.$i.price")}}" placeholder="276,000 VNĐ">
                                    </div>
                                    <div class="col-md-5 col-sm-12 form-group">
                                        <label for="discount">{{__('Chiết khấu (%)')}}</label>
                                        <input type="number" class="form-control" id="discount" name="discount" value="{{old("group-a.$i.discount")}}" placeholder="30%">
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group" style="text-align: right;">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger" data-repeater-delete="">
                                            <i class="fas fa-trash font-size-10"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @else
                        <div data-repeater-item="">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="inputTypeProduct">{{__('Mẫu sản phẩm')}}</label>
                                    <input type="text" class="form-control" name="type_name" id="inputTypeProduct" placeholder="1 ổ cắm, 230V - 10A">
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="codename">{{__('Mã sản phẩm')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="codename" id="codename" placeholder="PM1W-VN" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-12 form-group">
                                    <label for="price">{{__('Giá bán (VNĐ)')}}</label>
                                    <input type="text" data-input-mask="money" class="form-control" id="price" name="price" placeholder="276,000 VNĐ">
                                </div>
                                <div class="col-md-5 col-sm-12 form-group">
                                    <label for="discount">{{__('Chiết khấu (%)')}}</label>
                                    <input type="number" class="form-control" id="discount" name="discount" placeholder="30%">
                                </div>
                                <div class="col-md-2 col-sm-12 form-group" style="text-align: right;">
                                    <div><label>&nbsp;</label></div>
                                    <button type="button" class="btn btn-danger" data-repeater-delete="">
                                        <i class="fas fa-trash font-size-10"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-primary" data-repeater-create="">
                    <i class="fas fa-plus font-size-10 mr-2"></i> {{__('Thêm mẫu mã')}}
                </button>
            </div>
            <div class="form-group">
                <label for="warranty">{{__('Bảo hành')}} <span class="text-danger">*</span></label>
                <input type="text" id="warranty" class="form-control" value="{{$product->warranty}}" name="warranty" placeholder="12 tháng" required>
            </div>
            <div class="form-group">
                <label for="unit">{{__('Đơn vị tính')}} <span class="text-muted">{{__('(Đơn vị mặc định: Cái)')}}</span></label>
                <input type="text" id="unit" class="form-control" value="{{$product->unit}}" name="unit" placeholder="Cái">
            </div>
            <div class="form-group">
                <label for="keyword"
                       class="col-sm-2 col-form-label">{{__('Từ khóa')}}</label>
                <div class="input-group">
                    <input type="text" id="keyword"
                           name="keyword"
                           value="{{$product->keyword}}"
                           class="form-control" placeholder=""/>
                </div>
                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự, phân cách nhau bởi dấu ","
                                                    </span>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                       name="active" value="1" {{$product->active === 1 ? 'checked="': ""}}  />
                <label for="customCheckbox2" class="custom-control-label">Hoạt động</label>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Files</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="slug">{{__('Hình ảnh sản phẩm')}}</label>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{$product->image}}"
                     alt="Thumbnail [200x250]" style="width: 200px;"
                     data-holder-rendered="true">
                <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input" id="exampleInputFile"
                           accept="image/*" name="image">
                    <label class="custom-file-label"
                           for="exampleInputFile">{{__('Choose File')}}</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

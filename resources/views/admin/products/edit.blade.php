@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{config('app.url_admin')}}">{{__('Trang chủ')}}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Sửa thông tin sản phẩm')}} {!! __('<span class="text-muted">(Vui lòng điền các trường có chứa dấu <span class="text-danger">*</span>)</span>') !!}</h3>
                        <div class="card-tools">
                            <div class="btn-group mr-5">
                                <a href="{{route('admin.products.index')}}"
                                   class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span
                                        class="hidden-xs"> Trở lại danh sách</span></a>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.products.update',$product->slug) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('Tổng quan')}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="name"
                                                       class="col-sm-2 col-form-label">{{__('Name')}} <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                        </div>
                                                        <input type="text" id="name" name="name"
                                                               value="{{$product->name}}"
                                                               class="form-control"
                                                               placeholder="Tủ điện nhựa âm tường cửa mờ" required/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_title"
                                                       class="col-sm-2 col-form-label">{{__('Tiêu đề')}}</span></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                        </div>
                                                        <input type="text" id="meta_title"
                                                               name="meta_title"
                                                               value="{{$product->meta_title}}"
                                                               class="form-control"
                                                               placeholder="Tủ điện nhựa âm tường cửa mờ Schneider | MIP22104T"/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 100 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="summernote"
                                                       class="col-sm-2 col-form-label">{{__('Mô tả')}}</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="summernote"
                                                              name="description">{{$product->description}}</textarea>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 300 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content"
                                                       class="col-sm-2 col-form-label">{{__('Nội dung')}}</label>
                                                <div class="col-sm-10">
                                                    <textarea id="content" class="summernote"
                                                              name="content">{{$product->content}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputStatus"
                                                       class="col-sm-2 col-form-label">{{__('Danh mục sản phẩm')}} <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <select id="inputStatus" name="category"
                                                            class="form-control select2"
                                                            style="width: 100%" required>
                                                        <option value="">Trống</option>
                                                        @foreach($categories as $cate_parent)
                                                            <option value="{{$cate_parent->id}}" {{ $product->category_id === $cate_parent->id ? "selected" :""}}>{{$cate_parent->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputBrand"
                                                       class="col-sm-2 col-form-label">{{__('Thương hiệu sản phẩm')}}
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <select id="inputBrand" name="brand" class="form-control select2"
                                                            style="width: 100%" required>
                                                        <option value="">Trống</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}" {{ $product->brand->id === $brand->id ? "selected" :""}}>{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('Customize')}}</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="slug" class="col-sm-2 col-form-label">{{__('Đường dẫn')}}
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                        </div>
                                                        <input type="text" id="slug" class="form-control"
                                                               value="{{$product->slug}}" name="slug"
                                                               placeholder="tu-dien-nhua-am-tuong-cua-mo" required/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group repeater">
                                                <div data-repeater-list="group-a">
                                                    @if(count($product['attributes']) > 0)
                                                        @foreach($product['attributes'] as $att)
                                                            <div data-repeater-item="">
                                                                <div class="form-group row">
                                                                    <label for="codename"
                                                                           class="col-sm-2 col-form-label">{{__('Mã sản phẩm')}}<span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10 row">
                                                                        <div class="col-sm-11">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                                </div>
                                                                                <input type="hidden" name="attribute_id" value="{{$att->id}}">
                                                                                <input type="text" id="codename"
                                                                                       name="codename"
                                                                                       value="{{$att->codename}}"
                                                                                       class="form-control" placeholder="PM1W-VN"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-1">
                                                                            <button type="button" class="btn btn-danger"
                                                                                    data-repeater-delete="">
                                                                                <i class="fas fa-trash font-size-10"></i>
                                                                            </button>
                                                                        </div>

                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputTypeProduct" class="col-sm-2 col-form-label">{{__('Mẫu sản phẩm')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                   name="type_name" id="inputTypeProduct"
                                                                                   value="{{$att->type_name}}"
                                                                                   placeholder="1 ổ cắm, 230V - 10A">
                                                                        </div>
                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="size" class="col-sm-2 col-form-label">{{__('Kích thước')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                   name="size" id="size"
                                                                                   value="{{$att->size}}"
                                                                                   placeholder="150x252x98 mm">
                                                                        </div>
                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="price" class="col-sm-2 col-form-label">{{__('Giá bán (VNĐ)')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="number" class="form-control"
                                                                                   name="price" id="price"
                                                                                   value="{{round($att->price,2)}}"
                                                                                   placeholder="276,000 VNĐ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="discount" class="col-sm-2 col-form-label">{{__('Chiết khấu (%)')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="number" class="form-control"
                                                                                   name="discount" id="discount"
                                                                                   value="{{round($att->discount,2)}}"
                                                                                   placeholder="30%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @elseif(old('group-a'))
                                                        @for( $i =0; $i < count(old('group-a')); $i++)
                                                            <div data-repeater-item="">
                                                                <div class="form-group row">
                                                                    <label for="codename"
                                                                           class="col-sm-2 col-form-label">{{__('Mã sản phẩm')}}<span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10 row">
                                                                        <div class="col-sm-11">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                                </div>
                                                                                <input type="text" id="codename"
                                                                                       name="codename"
                                                                                       value="{{old("group-a.$i.codename")}}"
                                                                                       class="form-control" placeholder="PM1W-VN"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-1">
                                                                            <button type="button" class="btn btn-danger"
                                                                                    data-repeater-delete="">
                                                                                <i class="fas fa-trash font-size-10"></i>
                                                                            </button>
                                                                        </div>

                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputTypeProduct" class="col-sm-2 col-form-label">{{__('Mẫu sản phẩm')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                   name="type_name" id="inputTypeProduct"
                                                                                   value="{{old("group-a.$i.type_name")}}"
                                                                                   placeholder="1 ổ cắm, 230V - 10A">
                                                                        </div>
                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="size" class="col-sm-2 col-form-label">{{__('Kích thước')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                   name="size" id="size"
                                                                                   value="{{old("group-a.$i.size")}}"
                                                                                   placeholder="150x252x98 mm">
                                                                        </div>
                                                                        <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="price" class="col-sm-2 col-form-label">{{__('Giá bán (VNĐ)')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="number" class="form-control"
                                                                                   name="price" id="price"
                                                                                   value="{{old("group-a.$i.price")}}"
                                                                                   placeholder="276,000 VNĐ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="discount" class="col-sm-2 col-form-label">{{__('Chiết khấu (%)')}}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="number" class="form-control"
                                                                                   name="discount" id="discount"
                                                                                   value="{{old("group-a.$i.discount")}}"
                                                                                   placeholder="30%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    @else
                                                        <div data-repeater-item="">
                                                            <div class="form-group row">
                                                                <label for="codename"
                                                                       class="col-sm-2 col-form-label">{{__('Mã sản phẩm')}}<span class="text-danger">*</span></label>
                                                                <div class="col-sm-10 row">
                                                                    <div class="col-sm-11">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                            <input type="text" id="codename"
                                                                                   name="codename"
                                                                                   value="{{old('codename')}}"
                                                                                   class="form-control" placeholder="PM1W-VN"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-1">
                                                                        <button type="button" class="btn btn-danger"
                                                                                data-repeater-delete="">
                                                                            <i class="fas fa-trash font-size-10"></i>
                                                                        </button>
                                                                    </div>

                                                                    <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputTypeProduct" class="col-sm-2 col-form-label">{{__('Mẫu sản phẩm')}}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                               name="type_name" id="inputTypeProduct"
                                                                               value="{{old('type_name')}}"
                                                                               placeholder="1 ổ cắm, 230V - 10A">
                                                                    </div>
                                                                    <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="size" class="col-sm-2 col-form-label">{{__('Kích thước')}}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                               name="size" id="size"
                                                                               value="{{old('size')}}"
                                                                               placeholder="150x252x98 mm">
                                                                    </div>
                                                                    <span class="form-text">
                                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="price" class="col-sm-2 col-form-label">{{__('Giá bán (VNĐ)')}}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="number" class="form-control"
                                                                               name="price" id="price"
                                                                               value="{{old('price')}}"
                                                                               placeholder="276,000 VNĐ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="discount" class="col-sm-2 col-form-label">{{__('Chiết khấu (%)')}}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="number" class="form-control"
                                                                               name="discount" id="discount"
                                                                               value="{{old('discount')}}"
                                                                               placeholder="30%">
                                                                    </div>
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
                                                <label for="warranty">{{__('Bảo hành')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="warranty" class="form-control"
                                                       value="{{$product->warranty}}" name="warranty"
                                                       placeholder="12 tháng" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit">{{__('Đơn vị tính')}} <span
                                                        class="text-muted">{{__('(Đơn vị mặc định: Cái)')}}</span></label>
                                                <input type="text" id="unit" class="form-control"
                                                       value="{{$product->unit}}" name="unit" placeholder="Cái">
                                            </div>
                                            <div class="form-group">
                                                <label for="keyword"
                                                       class="col-sm-2 col-form-label">{{__('Từ khóa')}}</label>
                                                <div class="input-group">
                                                    <input type="text" id="keyword"
                                                           name="keyword"
                                                           value="{{$product->keyword }}"
                                                           class="form-control" placeholder=""/>
                                                </div>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự, phân cách nhau bởi dấu ","
                                                    </span>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                       name="active" value="1" {{$product->active === 1 ? 'checked="': ""}}/>
                                                <label for="customCheckbox2" class="custom-control-label">Hoạt
                                                    động</label>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Files</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-success d-block w-100">{{__('Edit')}}</button>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('stylesheets')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('manage/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('manage/plugins/select2/css/select2.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <!-- Summernote -->
    <script src="{{asset('manage/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- File input -->
    <script src="{{asset('manage/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Select2 -->
    <script rel="stylesheet" src="{{asset('manage/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Repeater button -->
    <script rel="stylesheet" src="{{asset('manage/plugins/jquery.repeater/jquery.repeater.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Edit page -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                Swal.fire({
                    title: 'Bạn đã chắc chắn xóa?',
                    text: "Xác nhận xóa mẫu mã sản phẩm.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý, tiến hành xóa!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).slideUp(deleteElement);
                    }
                })
            }
        });
    </script>
    <script src="{{asset('manage/dist/js/pages/edit-form.js')}}"></script>
@endpush

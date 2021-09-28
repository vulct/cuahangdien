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
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Trang chủ')}}</a></li>
                            <li class="breadcrumb-item active">{{$classify}}</li>
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
                        <h3 class="card-title">{{__('Thêm mới sản phẩm')}} {!! __('<span class="text-muted">(Vui lòng điền các trường có chứa dấu <span class="text-danger">*</span>)</span>') !!}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
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
                                            <div class="form-group">
                                                <label for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                                                <input type="text" id="name" class="form-control" value="{{old('name')}}" name="name" placeholder="Ổ cắm kéo dài chống sét lan truyền thế hệ mới" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">{{__('Mô tả')}}</label>
                                                <textarea id="description" class="summernote" name="description" >{{old('description')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">{{__('Nội dung')}}</label>
                                                <textarea id="content" class="summernote" name="content">{{old('content')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">{{__('Danh mục sản phẩm')}} <span class="text-danger">*</span></label>
                                                <select id="inputStatus" name="category" class="form-control select2"
                                                        style="width: 100%" required>
                                                    <option value="">Trống</option>
                                                    @foreach($categories as $cate_parent)
                                                        <option value="{{$cate_parent->id}}" {{ old('category') == $cate_parent->id ? "selected" :""}}>{{$cate_parent->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputBrand">{{__('Thương hiệu sản phẩm')}} <span class="text-danger">*</span></label>
                                                <select id="inputBrand" name="brand" class="form-control select2"
                                                        style="width: 100%" required>
                                                    <option value="">Trống</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}" {{ old('brand') == $brand->id ? "selected" :""}}>{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success float-right btn-block">{{__('Add')}}</button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
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
                                                <input type="text" id="slug" class="form-control" value="{{old('slug')}}" name="slug" placeholder="o-cam-keo-dai-chong-set-lan-truyen-the-he-moi" required>
                                            </div>
                                            <div class="form-group repeater">
                                                <div data-repeater-list="group-a">
                                                    @if(old('group-a'))
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
                                                <input type="text" id="warranty" class="form-control" value="{{old('warranty')}}" name="warranty" placeholder="12 tháng" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit">{{__('Đơn vị tính')}} <span class="text-muted">{{__('(Đơn vị mặc định: Cái)')}}</span></label>
                                                <input type="text" id="unit" class="form-control" value="{{old('unit')}}" name="unit" placeholder="Cái">
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                       name="active" value="1" checked="" />
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

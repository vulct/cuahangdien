@extends('admin.layouts.app')

@section('content')

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
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}. {!! __('<span class="text-muted">(Vui lòng điền các trường có chứa dấu <span class="text-danger">*</span>)</span>') !!}</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ !isset($info) ? route('admin.info.store') : route('admin.info.update', $info->id) }}" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">{{__('Tổng quan')}}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <!-- /.name -->
                                                <div class="form-group row">
                                                    <label for="name"
                                                           class="col-sm-2 col-form-label">{{__('Tên cửa hàng')}} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="name" name="name"
                                                                   value="{{old('name') ?? $info->name ?? ""}}"
                                                                   class="form-control" placeholder="" required/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.keyword -->
                                                <div class="form-group row">
                                                    <label for="keyword"
                                                           class="col-sm-2 col-form-label">{{__('Từ khóa')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="keyword"
                                                                   name="keyword"
                                                                   value="{{old('keyword') ?? $info->keyword ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.description -->
                                                <div class="form-group row">
                                                    <label for="summernote"
                                                           class="col-sm-2 col-form-label">{{__('Mô tả')}}</label>
                                                    <div class="col-sm-10">
                                                    <textarea id="summernote" class="summernote"
                                                              name="description">{{old('description') ?? $info->description ?? ""}}</textarea>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.logo -->
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="logo">{{__('Logo')}}</label>
                                                    <div class="col-sm-10">
                                                        @if(isset($info->logo))
                                                            <img class="card-img-right flex-auto d-none d-md-block" src="{{$info->logo}}"
                                                                 alt="Logo" style="width: 100px;"
                                                                 data-holder-rendered="true">
                                                        @endif
                                                        <div class="custom-file mt-2">
                                                            <input type="file" class="custom-file-input" id="logo"
                                                                   accept="image/*" name="logo">
                                                            <label class="custom-file-label"
                                                                   for="logo">{{__('Choose File')}}</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.icon -->
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="icon">{{__('Icon')}}</label>
                                                    <div class="col-sm-10">
                                                        @if(isset($info->icon))
                                                            <img class="card-img-right flex-auto d-none d-md-block" src="{{$info->icon}}"
                                                                 alt="Icon" style="width: 50px;"
                                                                 data-holder-rendered="true">
                                                        @endif
                                                        <div class="custom-file mt-2">
                                                            <input type="file" class="custom-file-input" id="icon"
                                                                   accept="image/*" name="icon">
                                                            <label class="custom-file-label"
                                                                   for="icon">{{__('Choose File')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">{{__('Liên hệ')}}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!-- /.hotline1 -->
                                                <div class="form-group row">
                                                    <label for="hotline1"
                                                           class="col-sm-2 col-form-label">{{__('Hotline 01')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="hotline1"
                                                                   name="hotline1"
                                                                   value="{{old('hotline1') ?? $info->hotline1 ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 20 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.hotline2 -->
                                                <div class="form-group row">
                                                    <label for="hotline2"
                                                           class="col-sm-2 col-form-label">{{__('Hotline 02')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="hotline2"
                                                                   name="hotline2"
                                                                   value="{{old('hotline2') ?? $info->hotline2 ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 20 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.phone -->
                                                <div class="form-group row">
                                                    <label for="phone"
                                                           class="col-sm-2 col-form-label">{{__('Số điện thoại riêng')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="phone"
                                                                   name="phone"
                                                                   value="{{old('phone') ?? $info->phone ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 20 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.sale-->
                                                <div class="form-group row">
                                                    <label for="sale"
                                                           class="col-sm-2 col-form-label">{{__('Số điện thoại bán hàng')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="sale"
                                                                   name="sale"
                                                                   value="{{old('sale') ?? $info->sale ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.facebook-->
                                                <div class="form-group row">
                                                    <label for="facebook"
                                                           class="col-sm-2 col-form-label">{{__('Facebook')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="facebook"
                                                                   name="facebook"
                                                                   value="{{old('facebook') ?? $info->facebook ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.zalo-->
                                                <div class="form-group row">
                                                    <label for="zalo"
                                                           class="col-sm-2 col-form-label">{{__('Zalo')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="zalo"
                                                                   name="zalo"
                                                                   value="{{old('zalo') ?? $info->zalo ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.email-->
                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-sm-2 col-form-label">{{__('Email')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="email" id="email"
                                                                   name="email"
                                                                   value="{{old('email') ?? $info->email ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">{{__('Địa chỉ')}}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!-- /.address -->
                                                <div class="form-group row">
                                                    <label for="address"
                                                           class="col-sm-2 col-form-label">{{__('Địa chỉ')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="address"
                                                                   name="address"
                                                                   value="{{old('address') ?? $info->address ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.map_address-->
                                                <div class="form-group row">
                                                    <label for="map_address"
                                                           class="col-sm-2 col-form-label">{{__('Đường dẫn Google Map')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="map_address"
                                                                   name="map_address"
                                                                   value="{{old('map_address') ?? $info->map_address ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.map_iframe-->
                                                <div class="form-group row">
                                                    <label for="map_iframe"
                                                           class="col-sm-2 col-form-label">{{__('Mã nhúng Google Map')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="map_iframe"
                                                                   name="map_iframe"
                                                                   value="{{old('map_iframe') ?? $info->map_iframe ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-warning">
                                            <div class="card-header">
                                                <h3 class="card-title">{{__('Thông tin kinh doanh')}}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!-- /.tax_code -->
                                                <div class="form-group row">
                                                    <label for="tax_code"
                                                           class="col-sm-2 col-form-label">{{__('Mã số thuế')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="tax_code"
                                                                   name="tax_code"
                                                                   value="{{old('tax_code') ?? $info->tax_code ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                                <!-- /.business_license-->
                                                <div class="form-group row">
                                                    <label for="business_license"
                                                           class="col-sm-2 col-form-label">{{__('Giấy phép kinh doanh')}}</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                            </div>
                                                            <input type="text" id="business_license"
                                                                   name="business_license"
                                                                   value="{{old('business_license') ?? $info->business_license ?? ""}}"
                                                                   class="form-control" placeholder=""/>
                                                        </div>
                                                        <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 255 kí tự
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.button -->
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-success d-block w-100">{{(isset($info)) ? __('Edit'):__('Add')}}</button>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                @if (isset($info)) @method('PATCH') @endif
                            </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('stylesheets')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('manage/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <!-- Summernote -->
    <script src="{{asset('manage/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('manage/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('manage/dist/js/pages/datatable.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $('.summernote').summernote({
            height: 300
        });
    </script>
@endpush

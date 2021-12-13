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
                        <h3 class="card-title">{{__('Thêm mới trang nội dung')}} {!! __('<span class="text-muted">(Vui lòng điền các trường có chứa dấu <span class="text-danger">*</span>)</span>') !!}</h3>

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
                        <form action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">
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
                                            <div class="form-group">
                                                <label for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                                                <input type="text" id="name" class="form-control" value="{{old('name')}}" name="name" required>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">{{__('Đường dẫn')}} <span class="text-danger">*</span></label>
                                                <input type="text" id="slug" class="form-control" value="{{old('slug')}}" name="slug" required>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự trong nhóm: "A-Z", "a-z", "0-9" and "-_"
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">{{__('Nội dung')}} <span class="text-danger">*</span></label>
                                                <textarea id="content" class="summernote" name="content" required>{{old('content')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="summernote"
                                                       class="col-sm-2 col-form-label">{{__('Mô tả')}}</label>
                                                <textarea id="summernote" class="summernote"
                                                          name="description">{{old('description')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="type"
                                                       class="col-sm-2 col-form-label">{{__('Loại trang')}}<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select class="form-control" id="type" name="type" required>
                                                        <option value="0">Về chúng tôi</option>
                                                        <option value="1">Tuyển dụng</option>
                                                        <option value="2">Hướng dẫn mua hàng</option>
                                                        <option value="3">Thanh toán vận chuyển</option>
                                                        <option value="4">Bảo hành đổi trả</option>
                                                        <option value="5">Chính sách bảo mật</option>
                                                    </select>
                                                </div>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Loại trang được hiển thị
                                                    </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="keyword"
                                                       class="col-sm-2 col-form-label">{{__('Từ khóa')}}</label>
                                                <div class="input-group">
                                                    <input type="text" id="keyword"
                                                           name="keyword"
                                                           value="{{old('keyword')}}"
                                                           class="form-control" placeholder=""/>
                                                </div>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự, phân cách nhau bởi dấu ","
                                                    </span>
                                            </div>
                                            <div class="custom-control custom-checkbox pb-2">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                       name="active" value="1" checked="" />
                                                <label for="customCheckbox2" class="custom-control-label">Hoạt động</label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success float-right btn-block">{{__('Add')}}</button>
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
@endpush

@push('scripts')
    <!-- Summernote -->
    <script src="{{asset('manage/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- File input -->
    <script src="{{asset('manage/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Edit page -->
    <script src="{{asset('manage/dist/js/pages/edit-form.js')}}"></script>
@endpush

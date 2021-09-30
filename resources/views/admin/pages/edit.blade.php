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
                        <h3 class="card-title">{{__('Chỉnh sửa trang nội dung')}}</h3>

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
                        <form action="{{ route('admin.pages.update', $page->slug) }}" method="post" enctype="multipart/form-data">
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
                                            <div class="form-group">
                                                <label for="name">{{__('Name')}}</label>
                                                <input type="text" id="name" class="form-control" value="{{$page->name}}" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">{{__('Đường dẫn')}}</label>
                                                <input type="text" id="slug" class="form-control" value="{{$page->slug}}" name="slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">{{__('Nội dung')}}</label>
                                                <textarea id="content" class="summernote" name="content">{{$page->content}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="summernote"
                                                       class="col-sm-2 col-form-label">{{__('Mô tả')}}</label>
                                                <textarea id="summernote" class="summernote"
                                                          name="description">{{old('description') ?? $page->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="keyword"
                                                       class="col-sm-2 col-form-label">{{__('Từ khóa')}}</label>
                                                <div class="input-group">
                                                    <input type="text" id="keyword"
                                                           name="keyword"
                                                           value="{{old('keyword') ?? $page->keyword}}"
                                                           class="form-control" placeholder=""/>
                                                </div>
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự, phân cách nhau bởi dấu ","
                                                    </span>
                                            </div>
                                            <div class="custom-control custom-checkbox pb-2">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                       name="active" value="1" @if($page->active == 1) checked="" @endif />
                                                <label for="customCheckbox2" class="custom-control-label">Hoạt động</label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success float-right btn-block">{{__('Edit')}}</button>
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

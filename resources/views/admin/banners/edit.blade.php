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
                        <h3 class="card-title">{!! __('Edit :resource',['resource' => 'thông tin banner:' .' <b>'.$banner->title .'</b>']) !!} {!! __('<span class="text-muted">(Vui lòng điền các trường có chứa dấu <span class="text-danger">*</span>)</span>') !!}</h3>

                        <div class="card-tools">
                            <div class="btn-group mr-5">
                                <a href="{{route('admin.banners.index')}}"
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
                        <form action="{{ route('admin.banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
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
                                                <label class="col-sm-2 col-form-label" for="exampleInputFile">{{__('Hình ảnh ')}}<span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <img class="card-img-right flex-auto d-none d-md-block" src="{{$banner->image}}"
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
                                                               name="title"
                                                               value="{{old('title') ?? $banner->title}}"
                                                               class="form-control" placeholder=""/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 100 kí tự
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="summernote"
                                                       class="col-sm-2 col-form-label">{{__('Thông tin')}}</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="summernote"
                                                              name="alt">{{old('alt') ?? $banner->alt}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="url" class="col-sm-2 col-form-label">{{__('Đường dẫn')}}</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-pencil-alt"></i></span>
                                                        </div>
                                                        <input type="text" id="url" class="form-control"
                                                               value="{{old('url') ?? $banner->url}}" name="url" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                       name="active" value="1" @if($banner->active == 1) checked="" @endif />
                                                <label for="customCheckbox2" class="custom-control-label">Hoạt động</label>
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
                            @method('PATCH')
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
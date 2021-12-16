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
                        <h3 class="card-title">{!! __('Edit :resource',['resource' => 'thông tin danh mục:' .' <b>'.$cate->name .'</b>']) !!}</h3>

                        <div class="card-tools">
                            <div class="btn-group mr-5">
                                <a href="{{isset($type) ? route('admin.categories_post') : route('admin.categories.index')}}"
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
                        <form action="{{ isset($type) ? route('admin.categories_post.update', $cate->slug) : route('admin.categories.update', $cate->slug) }}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('Tổng quan')}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
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
                                                               value="{{$cate->name}}"
                                                               class="form-control" placeholder="" required/>
                                                        @if( isset($type) )
                                                            <input type="hidden" name="type" value="1">
                                                        @endif
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="icon"
                                                       class="col-sm-2 col-form-label">{{ __('Icon') }}</label>
                                                <div class="col-sm-10 ">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text">
                                                          <span class="input-group-addon">
                                                            <i class="fas fa-pencil-alt"></i>
                                                          </span>
                                                          </span>
                                                        </div>
                                                        <input style="width: 140px" type="text" id="icon"
                                                               name="icon"
                                                               value="{{ $cate->icon ?? 'fas fa-bars'  }}"
                                                               class="form-control icon " placeholder="Icon">
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Hiển thị tại trang chủ
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
                                                               value="{{$cate->meta_title}}"
                                                               class="form-control" placeholder=""/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 100 kí tự
                                                    </span>
                                                </div>
                                            </div>
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
                                                               value="{{$cate->keyword}}"
                                                               class="form-control" placeholder=""/>
                                                    </div>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 200 kí tự
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="summernote"
                                                       class="col-sm-2 col-form-label">{{__('Mô tả')}}</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="summernote"
                                                              name="description">{{$cate->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                            <div class="form-group">
                                                <label for="slug">{{__('Đường dẫn')}} <span class="text-danger">*</span></label>
                                                <input type="text" id="slug" class="form-control"
                                                       value="{{$cate->slug}}" name="slug" required />
                                                <span class="form-text">
                                                        <i class="fa fa-info-circle"></i> Tối đa 120 kí tự trong nhóm: "A-Z", "a-z", "0-9" and "-_"
                                                    </span>
                                            </div>
                                            @if(!isset($type))
                                            <div class="form-group">
                                                <label for="cate_parent">{{__('Danh mục cha')}}</label>
                                                <select id="cate_parent" name="cate_parent" class="form-control select2"
                                                        style="width: 100%">
                                                    <option value="0" selected>==ROOT==</option>
                                                    {!! \App\Helpers\Helper::categoryOption($categories, 0, '',$cate->parent_id) !!}
                                                </select>
                                            </div>
                                            @endif
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="active"
                                                       name="active" value="1" @if($cate->active == 1) checked="" @endif/>
                                                <label for="active" class="custom-control-label">Hoạt
                                                    động</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="top"
                                                       name="top" value="1" @if($cate->top == 1) checked="" @endif />
                                                <label for="top" class="custom-control-label">Hiển thị</label>
                                                <span class="form-text">
                                                    <i class="fa fa-info-circle"></i> Danh mục này sẽ hiển thị ra ngoài trang chủ. Mặc định chỉ dành cho những danh mục Root.
                                                </span>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-6">
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
                                                <label for="slug">{{__('Hình thu nhỏ')}}</label>
                                                <img class="card-img-right flex-auto d-none d-md-block" src="{{asset($cate->image)}}"
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
                                        <button type="submit" class="btn btn-success d-block w-100">{{__('Edit')}}</button>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            @method('PATCH')
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
    <!-- Iconpicker -->
    <link rel="stylesheet" href="{{asset('manage/plugins/fontawesome-iconpicker/fontawesome-iconpicker.min.css')}}">
@endpush

@push('scripts')
    <!-- Summernote -->
    <script src="{{asset('manage/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- File input -->
    <script src="{{asset('manage/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Select2 -->
    <script rel="stylesheet" src="{{asset('manage/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Iconpicker -->
    <script rel="stylesheet" src="{{asset('manage/plugins/fontawesome-iconpicker/fontawesome-iconpicker.min.js')}}"></script>
    <!-- Edit page -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        // Iconpicker
        $(document).ready(function () {
            $('.icon').iconpicker({
                placement: 'bottomLeft',
                animation: false,
                templates: {
                    iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>',
                }
            });
        });
    </script>
    <script src="{{asset('manage/dist/js/pages/edit-form.js')}}"></script>
@endpush

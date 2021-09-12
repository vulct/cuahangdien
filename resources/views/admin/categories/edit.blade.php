<div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.categories.update', $cate->slug) }}" id="form-edit" method="post" enctype="multipart/form-data" onsubmit="return false">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Edit :resource',['resource' => 'Danh Mục'])}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{$cate->name}}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" class="form-control" value="{{$cate->name}}"
                                               name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Danh mục cha</label>
                                        <select id="inputStatus" name="cate_parent" class="form-control select2"
                                                style="width: 100%">
                                            <option value="0">Trống</option>
                                            @foreach($categories as $cate_parent)
                                                <option
                                                    value="{{$cate_parent->id}}" {{ $cate_parent->id == $cate->parent_id ? 'selected' : '' }}>{{$cate_parent->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Mô tả</label>
                                        <textarea id="summernote" name="description">
                                        {{$cate->description}}
                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Đường dẫn</label>
                                        <input type="text" id="slug" class="form-control" value="{{$cate->slug}}"
                                               name="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">{{__('Hình thu nhỏ')}}</label>
                                        <img class="card-img-right flex-auto d-none d-md-block" src="{{$cate->image}}"
                                             alt="Thumbnail [200x250]" style="width: 200px;"
                                             data-holder-rendered="true">
                                        <div class="custom-file mt-2">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   accept="image/*" name="image">
                                            <label class="custom-file-label"
                                                   for="exampleInputFile">{{__('Choose File')}}</label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                               name="active" value="1" @if($cate->active == 1) checked="" @endif>
                                        <label for="customCheckbox2" class="custom-control-label">Hoạt động</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" class="btn btn-primary" id="btn-update">{{__('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



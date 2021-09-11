<div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
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
                                    <input type="text" id="name" class="form-control" value="{{$cate->name}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Danh mục cha</label>
                                    <select id="inputStatus" class="form-control select2" style="width: 100%">
                                        <option value="0">Trống</option>
                                        @foreach($categories as $cate_parent)
                                            <option value="{{$cate_parent->id}}" {{ $cate_parent->id == $cate->parent_id ? 'selected' : '' }}>{{$cate_parent->name}}</option>
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
                                    <input type="text" id="slug" class="form-control" value="{{$cate->slug}}" name="slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



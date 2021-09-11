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
                                <h3 class="card-title"></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Project Name</label>
                                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                                </div>
                                <div class="form-group">
                                    <label for="ckeditor">Description</label>
                                    <textarea id="summernote" name="description">
                                        Place <em>some</em> <u>text</u> <strong>here</strong>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option disabled>Select one</option>
                                        <option>On Hold</option>
                                        <option>Canceled</option>
                                        <option selected>Success</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Client Company</label>
                                    <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Project Leader</label>
                                    <input type="text" id="inputProjectLeader" class="form-control"
                                           value="Tony Chicken">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



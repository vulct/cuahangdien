<div class="modal fade" id="status">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật trạng thái đơn hàng <b>#{{$order->code}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <div class="table">
                                <form id="update-status" action="{{route('admin.order.update')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="status"
                                               class="col-sm-2 col-form-label">{{__('Trạng thái')}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="hidden" name="code_name" value="{{$order->code_name}}">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="0" {{$order->status == 0 ? 'selected' : ''}}>Đang xử lý</option>
                                                    <option value="1" {{$order->status == 1 ? 'selected' : ''}}>Đang báo giá</option>
                                                    <option value="2" {{$order->status == 2 ? 'selected' : ''}}>Đã báo giá</option>
                                                    <option value="3" {{$order->status == 3 ? 'selected' : ''}}>Đang giao hàng</option>
                                                    <option value="4" {{$order->status == 4 ? 'selected' : ''}}>Đã thanh toán</option>
                                                    <option value="5" {{$order->status == 5 ? 'selected' : ''}}>Chưa thanh toán</option>
                                                    <option value="6" {{$order->status == 6 ? 'selected' : ''}}>Thành công</option>
                                                    <option value="7" {{$order->status == 7 ? 'selected' : ''}}>Huỷ</option>
                                                </select>
                                            </div>
                                            <span class="form-text"><i class="fa fa-info-circle"></i> Trạng thái đơn hàng</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="update-status__action" type="submit" class="btn btn-success float-right btn-block">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>

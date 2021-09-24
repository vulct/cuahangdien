<div class="modal fade" id="show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__(':resource Details',['resource' => 'Phương Thức Vận Chuyển'])}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th style="width:50%">{{__('Name')}}:</th>
                                        <td>{{$shipping->name}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Mô tả')}}:</th>
                                        <td>{!! $shipping->description !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian tạo')}}:</th>
                                        <td>{{date_format($shipping->created_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian cập nhật gần nhất')}}:</th>
                                        <td>{{date_format($shipping->updated_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Trạng thái')}}:</th>
                                        <td>{!! \App\Helpers\Helper::active($shipping->active) !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
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

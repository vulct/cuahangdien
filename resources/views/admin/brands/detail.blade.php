{{-- Modal show chi tiết todo --}}
<div class="modal fade" id="show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__(':resource Details',['resource' => 'Thương Hiệu'])}}</h4>
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
                                        <td>{{$brand->name}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th style="width:50%">{{__('Tiêu đề')}}:</th>
                                        <td>{{$brand->meta_title}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Đường dẫn')}}:</th>
                                        <td><a href="{{config('app.url') . '/brand/'. $brand->slug}}">{{config('app.url') . '/brand/'. $brand->slug}}</a></td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Mô tả')}}:</th>
                                        <td>{!! $brand->description !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian tạo')}}:</th>
                                        <td>{{date_format($brand->created_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Thời gian cập nhật gần nhất')}}:</th>
                                        <td>{{date_format($brand->updated_at,'H:i:s d/m/Y')}}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Trạng thái')}}:</th>
                                        <td>{!! \App\Helpers\Helper::active($brand->active) !!}</td>
                                    </tr>
                                    <tr style="border-top: none !important;" class="border-bottom">
                                        <th>{{__('Logo')}}:</th>
                                        <td><img class="card-img-right flex-auto d-none d-md-block" src="{{$brand->image}}"  alt="Thumbnail [200x250]" style="width: 200px;" data-holder-rendered="true">
                                        </td>
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

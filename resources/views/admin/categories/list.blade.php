@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Ảnh </th>
                                        <th>Tên</th>
                                        <th>Đường dẫn</th>
                                        <th>Cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>Hiển thị trang chủ</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {!! \App\Helpers\Helper::category($categories) !!}
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th> Ảnh </th>
                                        <th>Tên</th>
                                        <th>Đường dẫn</th>
                                        <th>Cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>Hiển thị trang chủ</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('stylesheets')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('manage/dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('manage/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('manage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('manage/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{asset('manage/plugins/toastr/toastr.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('manage/dist/js/demo.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('manage/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('manage/dist/js/custom.js') }}"></script>
    <script src="{{ asset('manage/dist/js/pages/datatable.js') }}"></script>
@endpush

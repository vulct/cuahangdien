// Datatable
$("#example1").DataTable({
    "scrollX": true,
    "responsive": true, "lengthChange": false, "autoWidth": true,
    "buttons": ["copy", "csv", "excel", "pdf"],
    "language": {
        "search": "Tìm kiếm:",
        "paginate": {
            "first": "Về Đầu",
            "last": "Về Cuối",
            "next": "Sau",
            "previous": "Trước"
        },
        "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
        "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
        "lengthMenu": "Hiển thị _MENU_ mục",
        "loadingRecords": "Đang tải...",
        "emptyTable": "Không có gì để hiển thị",
    },
    "columnDefs": [
        {"width": "30px", "targets": 0}
    ]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});



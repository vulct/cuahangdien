// Datatable
$("#example1").DataTable({
    "scrollX": true,
    "responsive": true, "lengthChange": false, "autoWidth": true,
    "buttons": ["copy", "csv", "excel", "pdf"]
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



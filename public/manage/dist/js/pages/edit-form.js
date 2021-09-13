// Customize input file
bsCustomFileInput.init();
// Slug
$("#name").on('keyup change focusout', function (){
    const name = $('#name').val();
    $('#slug').val(slug(name));
})
//Initialize Select2 Elements
$('.select2').select2();
// Summernote
$('#summernote').summernote({
    height: 300
});

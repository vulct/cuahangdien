// Customize input file
bsCustomFileInput.init();
// Slug
$("#name").on('keyup change focusout', function (){
    const name = $('#name').val();
    $('#slug').val(slug(name));
})
// Summernote
$('.summernote').summernote({
    height: 300
});

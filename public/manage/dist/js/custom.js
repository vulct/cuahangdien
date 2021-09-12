// Setup AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Customize toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
// add active in nav
$(function(){
    var current = location.pathname;
    $('nav ul li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        url = $this.attr('href').replace(/^.*\/\/[^\/]+/, '');
        if(url.indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})

// Create slug category

var slug = function(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    str = str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    str = str.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    str = str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    str = str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    str = str.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    str = str.replace(/đ/gi, 'd');

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
};


// Login
$(document).ready(function () {
    $("#login").click(function () {
        $("#login").attr("disabled", true);
        $.ajax({
            type: 'POST',
            url: '/admin/auth/login',
            data: $("#form_login").serialize(),
            dataType: 'json',
            success: function (data) {
                toastr.success(data.message)
                setTimeout(function () {
                    window.location.href = '/admin/dashboard';
                }, 500);

            },
            error: function (xhr) {
                $("#login").removeAttr("disabled");
                var err = JSON.parse(xhr.responseText);
                if (xhr.status === 401) {
                    toastr.error(err.message)
                }

                if (xhr.status === 422) {
                    if (err.errors.email) {
                        toastr.error(err.errors.email)
                    }
                    if (err.errors.password) {
                        toastr.error(err.errors.password)
                    }
                }
            }
        })
    })
})
// END login


$('.btn-show').on( "click touchend",function(){
    var url = $(this).attr('data-url');
    if ($('#show').length){
        $("#show").remove();
    }
    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
            $( "body" ).append(response);
            $('#show').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.error(errorThrown)
        }
    })
})


$('.btn-edit').on( "click touchend",function(){
    var url = $(this).attr('data-url');
    if ($('#edit').length){
        $("#edit").remove();
    }
    $.ajax({
        type: 'get',
        url: url,
        success: function(response) {
            console.log(response)
            $( ".content" ).append(response);
            // Summernote
            $('#summernote').summernote({
                height: 300
            });
            $('#edit').modal('show');
            // customize input file
            bsCustomFileInput.init();
            // slug
            $("#name").on('keyup change focusout', function (){
                const name = $('#name').val();
                $('#slug').val(slug(name));
            })
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.error(errorThrown)
        }
    })
})

// convert title name to URL slug -- Category
$("#name").on('keyup change focusout', function (){
    const name = $('#name').val();
    $('#slug').val(slug(name));
})
// END convert title name to URL slug -- Category

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
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.error(errorThrown)
        }
    })
})

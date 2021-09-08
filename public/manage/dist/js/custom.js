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

// Login
$(document).ready(function() {
    $("#login").click(function() {
        $("#login").attr("disabled", true);
        $.ajax({
            type: 'POST',
            url: '/admin/auth/login',
            data: $("#form_login").serialize(),
            dataType: 'json',
            success: function (data) {
                toastr.success(data.message)
                setTimeout(function (){
                    window.location.href = '/admin/dashboard';
                },500);

            },
            error : function (xhr) {
                $("#login").removeAttr("disabled");
                var err = JSON.parse(xhr.responseText);
                if (xhr.status === 401){
                    toastr.error(err.message)
                }

                if (xhr.status === 422) {
                    if (err.errors.email){
                        toastr.error(err.errors.email)
                    }
                    if (err.errors.password){
                        toastr.error(err.errors.password)
                    }
                }
            }
        })
    })
})
// END login



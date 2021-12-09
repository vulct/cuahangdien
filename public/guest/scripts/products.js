$('.spr-summary-actions-newreview').click(function() {
    $('#form').toggle();
});

function gotoreview(){var t=$("#product-reviews").offset();$("html, body").animate({scrollTop:t.top - 150},500)}
function gotolist(){var t=$("#lists").offset();$("html, body").animate({scrollTop:t.top - 100},500)}
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
// ####CART####
$(document).ready(function() {
    // close modal add product to cart
    $(document).on('click',function () {
        $('#notify-add-cart').removeClass('visible');
    });
    $('.atc-banner--close').on('click', function (){
        $('#notify-add-cart').removeClass('visible');
    });
    // scroll modal with top
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        let style_alert_add_cart  =  $('.atc-banner--container');

        let padding_main  =  $('.site-main').css("padding-top");

        if (scroll >= 127) {
            style_alert_add_cart.css('top','66.8px');
        } else {
            style_alert_add_cart.css('top',padding_main);
        }
    });
});

$('#add-cart').on('submit', function (e) {
    var form = $(this);
    var submit = form.find("[type=submit]");
    //class="product-form--atc-button processing"

    e.preventDefault();
    var data = form.serialize();
    var url = form.attr('action');
    var post = form.attr('method');

    $.ajax({
        type : post,
        url : url,
        data :data,
        success:function(response){
            submit.removeClass("processing");
            submit.prop("disabled", false);
            if (response.error === true) {
                toastr.error(response.message)
            }else{
                $('#arcontactus').after(response);
            }

        },
        beforeSend: function(){
            submit.addClass("processing");
            submit.prop("disabled", true);
        },
        error: function(xhr) {
            if (xhr.status === 419){
                toastr.error('Token đã hết hạn. Vui lòng chờ tải lại trang để lấy token mới.');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
            submit.removeClass("processing");
            submit.prop("disabled", false);
            console.log(xhr);
        }
    });
})

function removeItem(url) {
    $.ajax({
        type: 'GET',
        url : url,
        success:function(response){
            $("#alert-loading").remove();
            if (response.error === true) {
                toastr.error(response.message);
            }else{
                toastr.success(response.message);
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
            console.log(response);
        },
        beforeSend: function(){
            ShowLoading();
        },
        error: function(xhr) {
            if (xhr.status === 419){
                toastr.error('Token đã hết hạn. Vui lòng chờ tải lại trang để lấy token mới.');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
            console.log(xhr);
        }
    });
}

function ShowLoading() {
    let element_loading = '<div id="alert-loading" style="position: fixed; top: 0; left: 0; z-index: 9999999; width: 100%; text-align: center; background: rgba(98, 93, 81, 0.62) none repeat scroll 0 0; height: 100%;">' +
        '<div style="text-align: center;position: relative;top: 50%;-ms-transform: translateY(-50%);-webkit-transform: translateY(-50%);transform: translateY(-50%);">' +
        '    Loading...<br>' +
        '<img src="/guest/images/icon/loading.gif" alt="loading" style="display: inline-block;width: 26px;height: 26px;"/>' +
        '</div>' +
        '</div>';
    $('#arcontactus').after(element_loading);
    return true;
}

function updateItem(url, key) {
    let qty = $("#cart-quantity-"+ key).val();
    $.ajax({
        type: 'GET',
        url : url,
        data : {qty: qty},
        success:function(response){
            if (response.error === true) {
                toastr.error(response.message);
            }else{
                toastr.success(response.message);
                let id = response.key;
                $('#cart-subtotal-' + id).empty().text(response.subtotal + ' VND');

                $(".cart-money-total").empty().text(response.total + ' VND');
            }
            console.log(response);
        },
        error: function(xhr) {
            if (xhr.status === 419){
                toastr.error('Token đã hết hạn. Vui lòng chờ tải lại trang để lấy token mới.');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
            console.log(xhr.status);
            console.log(xhr);
        }
    });
}
// ####END-CART####

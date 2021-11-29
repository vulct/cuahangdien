var stickWidth = 1024;
var win = $(window);
var menu = $(".product-gallery");
var options = {
    offset_top: 75
};
if (win.width() > stickWidth) {
    menu.stick_in_parent(options);
}
win.resize(function () {
    if (win.width() > stickWidth) {
        menu.stick_in_parent(options);
    } else {
        menu.trigger("sticky_kit:detach");
    }
});

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
            submit.removeClass("processing");
            submit.prop("disabled", false);
            var err = JSON.parse(xhr.responseText);
            if (xhr.error === true) {
                toastr.error(err.message)
            }
            console.log(err);
        }
    });
})
// ####END-CART####

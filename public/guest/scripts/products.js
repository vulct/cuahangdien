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

$(document).ready(function($){
    $('.site-navigation .navmenu-item-parent').mouseenter(function(){
        $('.site-navigation .navmenu-item-parent > .navmenu-link-parent').removeClass('navmenu-item-active navmenu-active');
        $('.site-navigation .navmenu-item-parent > .navmenu-submenu').removeClass('visible')
        $(this).find('.navmenu-link-parent').first().addClass('navmenu-item-active navmenu-active');
        $(this).find('.navmenu-submenu').first().addClass('visible');
    }).mouseleave(function(){
        $('.site-navigation .navmenu-item-parent > .navmenu-link-parent').removeClass('navmenu-item-active navmenu-active');
        $('.site-navigation .navmenu-item-parent > .navmenu-submenu').removeClass('visible');
    });
    $('#top').click(function () { $('body,html').animate({ scrollTop: 0 }, 300); });
});

$(".ttmenu-full").hover(
    function () {
        $(this).addClass('open');
    },
    function () {
        $(this).removeClass('open');
    }
);
!function(s){"use strict";s(".nav-pills > li ").hover(function(){s(this).hasClass("hoverblock")||s(this).find("a").tab("show")}),s(".nav-tabs > li").find("a.pane").click(function(){s(this).parent().siblings().addClass("hoverblock")}),s(".hovermenu .dropdown").hover(function(){s(this).addClass("open")},function(){s(this).removeClass("open")}),s(".clickablemenu .dropdown").click("show.bs.dropdown",function(n){var i=s(this).find(".dropdown-menu"),o=parseInt(i.css("margin-top"));i.css({"margin-top":o+65+"px",opacity:0}).animate({"margin-top":o+"px",opacity:1},420,function(){s(this).css({"margin-top":""})})}),s(".verticalmenu .dropdown").click("show.bs.dropdown",function(n){var i=s(this).find(".dropdown-menu"),o=parseInt("1",10);i.css({"margin-left":o+65+"px",opacity:0}).animate({"margin-left":o+"px",opacity:1},420,function(){s(this).css({"margin-left":""})})})}(jQuery);

(function($, win) {
    $.fn.inViewport = function(cb) {
        return this.each(function(i,el){
            function visPx(){
                var H = $(this).height(),
                    r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
                return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));
            } visPx();
            $(win).on("resize scroll", visPx);
        });
    };
}(jQuery, window));
$(".amin").inViewport(function(px){
    if(px) $(this).addClass("animated fadeInUp") ;
});


// Setup AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

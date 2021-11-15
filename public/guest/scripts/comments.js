function setRating(e) {
    let id = $("#post_id").val();
    $.ajax({
        type: "POST",
        data: {
            rate: e,
            id: id
        },
        url: "/comments/rate",
        success: function (response) {
            $(".spr-badge").hide().html(response.msg).fadeIn();
        }
    });
}

$(document).on('click', 'a[href^="#"]', function (event) {
    if (this.getAttribute("href").length > 1) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: ($($.attr(this, 'href')).offset().top - 78)
        }, 500);
    }
});

$(document).ready(function () {
    $(".toggle-toc").click(function () {
        $(".list-toc").toggleClass("toc-hidden", 300);
        let toggle = $(".toggle-toc a");
        if ( toggle.text() === "Ẩn") {
            toggle.text("Hiện");
        } else {
            toggle.text("Ẩn");
        }
    });
    if (window.location.hash) {
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top
        }, 1000);
    }
});

function gotoreview() {
    var t = $("#comment-box").offset();
    $("html, body").animate({scrollTop: t.top - 150}, 300)
}

var frm = $('#new-review-form');
var frmDiv = document.getElementById("form");
var frmBtn = document.getElementById("newreview");
frm.submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/comments/create",
        data: frm.serialize(),
        success: function (data) {
            frmDiv.innerHTML = data;
            frmBtn.style.display = 'none';
        },
        error: function (data) {
            frmDiv.innerHTML = data;
            $('#spr-form-actions').hide();
            frmBtn.style.display = 'none';
        },
    });
});

function setStarRating(e, t) {
    return t.find("a:lt(" + e + ")").removeClass("spr-icon-star-empty spr-icon-star-hover"),
        t.find("a:gt(" + (e - 1) + ")").removeClass("spr-icon-star-hover").addClass("spr-icon-star-empty")
}

function initStarRating(e) {
    var t, r, a;
    if ((a = e.find("input[name='rating']")) && a.val()) return r = a.val(), t = e.find(".spr-starrating"), this.setStarRating(r, t)
}

function initRatingHandler() {
    return $(document).on("mouseover mouseout", "a.spr-icon-star", function (t) {
        var r, a, i;
        return r = t.currentTarget, i = $(r).attr("data-value"), a = $(r).parent(), "mouseover" === t.type ? (a.find("a.spr-icon:lt(" + i + ")").addClass("spr-icon-star-hover"), a.find("a.spr-icon:gt(" + (i - 1) + ")").removeClass("spr-icon-star-hover")) : a.find("a.spr-icon").removeClass("spr-icon-star-hover")
    })
}

initRatingHandler();

@extends('guest.layouts.app')

@section('content')
    <main class="site-main" style="padding-top: 183px;">
        <article class="site-page" data-template-page="" data-template-contact="">
            <header class="page-masthead">
                <h1 class="page-title">
                    Liên hệ chúng tôi
                </h1>
            </header>
            <div class="page-content"></div>

            <div class="page-content rte">
                <meta charset="utf-8"><meta charset="utf-8">
                <p><span>Nếu bạn có bất kỳ vấn đề gì thắc mắc về sản phẩm, có thể liên hệ với chúng tôi với form bên dưới.</span></p>
                @if(isset($info->hotline1))
                <p>Chúng tôi sẽ trả lời sớm nhất, hoặc có thể liên hệ qua số điện thoại <a href="tel:{{$info->hotline1}}">{{$info->hotline1}}</a>.</p>
                @endif
            </div>
            <div class="contact-page-content">
                <form id="contact_form" method="post" accept-charset="UTF-8" class="contact-form">
                    @csrf
                    <input type="hidden" name="type" value="2">
                    <div class="form-fields-columns">
                        <div class="form-field form-field--half">
                            <input class="form-field-input form-field-text" name="name" data-val="true" data-val-length="Họ tên không cho phép quá 50 ký tự." data-val-length-max="50" data-val-required="Vui lòng nhập" id="FullName" type="text" value="" />
                            <label class="form-field-title" for="FullName">Họ tên</label>
                        </div>
                        <div class="form-field form-field--half">
                            <input autocapitalize="off" autocorrect="off" class="form-field-input form-field-text" data-val="true" data-val-length="Vui lòng nhập" data-val-length-max="100" data-val-required="Vui lòng nhập Địa chỉ email." id="Email" name="email" type="text" value="" />
                            <label class="form-field-title" for="Email">Địa chỉ Email</label>
                        </div>
                    </div>

                    <div class="form-field">
                        <input autocapitalize="off" autocorrect="off" class="form-field-input form-field-text" data-val="true" data-val-length="Vui lòng nhập" data-val-length-max="100" data-val-required="Vui lòng nhập Số điện thoại." id="Phone" name="phone" type="text" value="" />
                        <label class="form-field-title" for="Phone">Số điện thoại</label>
                    </div>

                    <div class="form-field">
                        <textarea class="form-field-input form-field-textarea" cols="20" data-val="true" data-val-length="Nội dung không cho phép quá 1500 ký tự." data-val-length-max="1500" data-val-required="Vui lòng nhập" id="Content" name="content" rows="2"></textarea>
                        <label class="form-field-title" for="Content">
                            Nội dung
                        </label>
                    </div>
                    <div class="form-action-row">
                        <button class="button-primary contact-form-button" type="submit">
                            Gửi liên hệ
                        </button>
                    </div>
                </form>
            </div>

        </article>
    </main>
    @if(isset($info->map_iframe))
    <div>
        <iframe src="{{$info->map_iframe}}" width="100%" height="400" style="border:0;" allowfullscreen=""></iframe>
    </div>
    @endif
@endsection

@push('stylesheets')
<link href="{{ asset('guest/css/custom.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('guest/css/validate.css')}}">
@endpush

@push('scripts')
<script src="{{asset('guest/scripts/jquery.validate.js')}}"></script>
<script src="{{asset('guest/scripts/jquery.validate.unobtrusive.js')}}"></script>
<script>
    let show_error = '<div class="message message-error" id="show-message"><ul id="message-list-items"></ul></div>'
    let frm = $('#contact_form');
    let frmDiv = document.getElementById("contact_form");
    frm.submit(function (e) {
        let list_mess = $('#message-list-items');
        let show_mess = $('#show-message');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/contact/send",
            data: frm.serialize(),
            success: function (data) {
                if(list_mess.length > 0 && show_mess.length > 0){
                    show_mess.remove();
                }
                $(".contact-page-content").html(data);
            },
            error: function (data) {
                let err = JSON.parse(data.responseText);
                if(list_mess.length > 0 && show_mess.length > 0){
                    list_mess.empty();
                }else{
                    $(show_error).insertBefore( frm );
                }
                $.each(err.errors, function(index, value) {
                    $('#message-list-items').append('<li id="item-message">'+ value +'</li>');
                });
            },
        });
    });
</script>
@endpush

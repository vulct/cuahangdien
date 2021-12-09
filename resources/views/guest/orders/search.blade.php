
@extends('guest.layouts.app')

@section('content')
    <main class="site-main  page--text">
        <article class="site-page" data-template-page>
            <header class="page-masthead">
                <h1 class="page-title">
                    TRA CỨU TÌNH TRẠNG ĐƠN HÀNG ONLINE
                </h1>
            </header>
            <div class="page-content rte">
                <meta charset="utf-8">
                <section class="article-info">
                    <div class="article-content">
                        <div class="article-body">

                            <form id="form_search" class="edit_checkout animate-floating-labels" action="{{route('tracuu.form')}}" accept-charset="UTF-8" method="post">
                                @csrf
                                <div class="order-history">
                                    <div class="fieldset floating-labels">
                                        <div style="background: #eeeeeeee;">
                                            <div class="field field--optional field--half">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="code">Mã đơn hàng</label>
                                                    <input class="field__input" id="code" name="code" placeholder="Mã đơn hàng" type="text" value="{{old('code')}}" />
                                                </div>
                                            </div>
                                            <div class="field field--required field--half">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="phone">Số điện thoại</label>
                                                    <input class="field__input" id="phone" name="phone" placeholder="Số điện thoại" type="text" value="{{old('phone')}}" />
                                                </div>
                                            </div>
                                            <div class="clearfix" style="clear:both"></div>
                                        </div>
                                        <div class="step__footer" data-step-footer="">
                                            <input id="submit_search" name="button" type="submit" class="step__footer__continue-btn btn " aria-busy="false" value="Tra cứu đơn hàng" onclick="this.disabled=true; this.value='Đang kiểm tra…'; " style="margin: 0 auto;display: block;float: unset;padding: 1.1em 1.5em;">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <footer>
                    <div class="article-footer">
                        <div class="article-share"></div>
                    </div>
                </footer>
            </div>
        </article>
    </main>
@endsection

@push('stylesheets')
<link rel="stylesheet" media="all" href="{{asset('guest/css/checkout.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('manage/plugins/toastr/toastr.min.css')}}">
<style>
        #order-history {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background: #eeeeeeee;
        }
        .order-history {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .field__input {
            -webkit-box-shadow: 0 0 0 1px #d9d9d9;
            box-shadow: 0 0 0 1px #d9d9d9;
            background-color: white;
            color: #333333;
        }  .input-validation-error{-webkit-box-shadow: 0 0 0 2px #ff6d6d!important; box-shadow: 0 0 0 2px #ff6d6d!important;}
    </style>
@endpush

@push('scripts')
<!-- Toastr -->
<script src="{{asset('manage/plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    let frm = $('#form_search');
    let btn = $('#submit_search');
    btn.on("click",function (e) {
        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (response) {
                btn.removeAttr("disabled");
                btn.val("Tra cứu đơn hàng");
                if (response.error === false){
                    setTimeout(() => {
                        window.location.href = response.url;
                    },100);
                }else{
                    toastr.error(response.message);
                }

            },
            error: function(xhr) {
                btn.removeAttr("disabled");
                btn.val("Tra cứu đơn hàng");
                if (xhr.responseText){
                    let list_error = JSON.parse(xhr.responseText);
                    $.each(list_error.errors, function(index, value) {
                        toastr.error(value);
                    });
                    if (xhr.status === 419){
                        toastr.error('Token đã hết hạn. Vui lòng chờ tải lại trang để lấy token mới.');
                        setTimeout(function (){
                            window.location.reload();
                        },1000);
                    }
                }
                console.log(xhr);
            }
        });

    });
</script>
@endpush


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

                            <form novalidate="novalidate" class="edit_checkout animate-floating-labels" data-customer-information-form="true" data-email-or-phone="false" action="/tra-cuu-don-hang" accept-charset="UTF-8" method="post">
                                <input name="__RequestVerificationToken" type="hidden" value="A1Ex7yuX7yMlY1N0XlyJyxn8y_rIdCN_7jpfGGwqD3Z_9bbKUIXq-ZJYWjr5nDLB9Iq2K4SVhEzxpgeBhUr-pnsN69x2f1MM9sFcOz1KhyU1" />
                                <div class="order-history">
                                    <div class="fieldset floating-labels" data-address-fields="">
                                        <div style="background: #eeeeeeee;">
                                            <div class="field field--optional field--half" data-address-field="first_name">
                                                <div class="field__input-wrapper"><label class="field__label field__label--visible" for="checkout_shipping_address_first_name">Mã đơn hàng</label>
                                                    <input class="field__input" data-val="true" data-val-length="Tên khách hàng không được nhập quá 50 ký tự." data-val-length-max="100" data-val-required="Tên khách hàng không được để trống." id="Code" name="Code" placeholder="Mã đơn hàng" type="text" value="" />
                                                </div>
                                            </div>
                                            <div class="field field--required field--half" data-address-field="last_name">
                                                <div class="field__input-wrapper"><label class="field__label field__label--visible" for="checkout_shipping_address_last_name">Số điện thoại</label>
                                                    <input class="field__input" data-val="true" data-val-length="Tên khách hàng không được nhập quá 50 ký tự." data-val-length-max="100" data-val-required="Tên khách hàng không được để trống." id="Phone" name="Phone" placeholder="Số điện thoại" type="text" value="" />
                                                </div>
                                            </div>
                                            <div class="clearfix" style="clear:both"></div>
                                        </div>
                                        <div class="step__footer" data-step-footer="">
                                            <input name="button" type="submit" class="step__footer__continue-btn btn " aria-busy="false" value="Tra cứu đơn hàng" onclick="this.form.submit(); this.disabled=true; this.value='Đang kiểm tra…'; " style="margin: 0 auto;display: block;float: unset;padding: 1.1em 1.5em;">
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

@endpush

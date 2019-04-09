@extends('frontend.layouts.master')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="{{ route('fe.home.index') }}">
                            <span itemprop="title"><i class="fa fa-home"></i></span>
                        </a>
                        <span><i class="fa">/</i></span>
                    </li>
                    <li><strong itemprop="title">Thanh toán</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<link href="frontend/catalog/view/theme/default/stylesheet/checkout.css" rel="stylesheet">
<div class="container">
    <div class="page-information margin-bottom-50">
        <div class="alert alert-success">
            <i class="fa fa-exclamation-circle"></i> Thành công: Bạn đã thêm <a
                href="kinh-mat-nam-nba-1150-a01.html">...</a> vào <a
                href="index630e.html?route=checkout/cart">giỏ hàng</a>! <button type="button" class="close"
                data-dismiss="alert">×</button>
        </div>
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
                    {{ Form::open(['method' => 'POST', 'route' => 'fe.contact.store', 'id' => 'checkout_form', 'class' => 'form-horizontal']) }}
                        <div class="col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Địa chỉ nhận hàng
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group required">
                                        {{ Form::label('ht', 'Tên Đầy Đủ <span style="color:red;">*</span>', ['class' => 'control-label col-md-2', 'for' => 'input-firstname'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'input-firstname', 'placeholder' => 'Ví dụ: Nguyễn Văn A']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                {{ Form::label('em', 'Email <span style="color:red;">*</span>', ['class' => 'control-label col-sm-4', 'for' => 'input-email'], false) }}
                                                <div class="col-sm-8">
                                                    {{ Form::email('email','',['class' => 'form-control', 'id' => 'input-email', 'placeholder' => 'contact@yourdomain.com']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                {{ Form::label('ph', 'Điện Thoại <span style="color:red;">*</span>', ['class' => 'control-label col-sm-4', 'for' => 'input-telephone'], false) }}
                                                <div class="col-sm-8">
                                                    {{ Form::number('phone','',['class' => 'form-control', 'id' => 'input-telephone', 'placeholder' => 'Ví dụ: 01234567890']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('ad', 'Địa Chỉ <span style="color:red;">*</span>', ['class' => 'control-label col-md-2', 'for' => 'input-address'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'input-address', 'placeholder' => 'Ví dụ: Số 102, Hùng Vương, tp.Tam Kỳ']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('tn', 'Lời nhắn', ['class' => 'control-label col-md-2', 'for' => 'input-zoneid'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::textarea('note', null, ['class' => 'form-control', 'id' => 'input-comment', 'rows' => '3', 'placeholder' => 'Ví dụ: Chuyển hàng ngoài giờ hành chính']) }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="adr-oms checkbox">
                                                <input type="checkbox" name="same_info_as_buyer_toggle"
                                                    id="is-delivery-address" onclick="showHideDeliveryAddress()"
                                                    checked="" disabled>
                                                <label for="is-delivery-address">
                                                    <strong>Địa chỉ nhận hàng và thanh toán giống nhau</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        Đơn hàng ({{Cart::getContent()->count()}} sản phẩm)
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <table class="adr-oms table table_order_items">
                                        <tbody id="orderItem">
                                                @foreach ($cart as $item)
                                            <tr class="group-type-1 item-child-0">
                                                <td>
                                                    <div class="table_order_items-cell-detail">
                                                        <div class="table_order_items-cell-title">
                                                            <div class="table_order_items_product_name">
                                                                <a target="_blank" rel="noopener"
                                                                    href="kinh-mat-nam-nba-1150-a01.html"
                                                                    title="Kính Mát Nam NBA 1150 A01">
                                                                    <span class="title">
                                                                        {{ $item->name }}
                                                                    </span>
                                                                    <span class="title">

                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="table_order_items-cell-price">
                                                        <div class="tt-price">1,170,000đ</div>
                                                        <div class="quantity">x1</div>
                                                        <div class="tt-price">1,170,000đ</div>
                                                    </div>
                                                    <div class="table_order_items-cell-price">
                                                            {{ $item->attributes->color }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        Vận chuyển
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <span id="ajax-load-shipping-method">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tag" aria-hidden="true"></i> Sử dụng mã giảm
                                        giá</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <span id="show_notice_coupon"></span>
                                            <div class="input-group">
                                                <input type="text" name="coupon" value="" placeholder="Nhập mã giảm giá"
                                                    id="input-coupon" class="form-control">
                                                <span class="input-group-btn">
                                                    <input class="btn btn-primary" type="button" value="Áp dụng"
                                                        id="button-coupon" data-loading-text="Đang áp dụng">
                                                </span>
                                            </div>
                                            <span id="load-input-hidden"></span>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $('#button-coupon').on('click', function () {
                                            var coupon_submit = '<input type="hidden" name="submit_coupon" value="1">';
                                            $('#load-input-hidden').html(coupon_submit);

                                            $.ajax({
                                                url: 'index.php?route=extension/total/coupon/coupon',
                                                type: 'post',
                                                data: 'coupon=' + encodeURIComponent($('input[name=\'coupon\']').val()),
                                                dataType: 'json',
                                                beforeSend: function () {
                                                    $('#button-coupon').button('loading');
                                                },
                                                complete: function () {
                                                    $('#button-coupon').button('reset');
                                                },
                                                success: function (json) {
                                                    $('.alert').remove();

                                                    if (json['error']) {
                                                        $('#show_notice_coupon').html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                                                    } else {
                                                        $("form#checkout_form").submit();
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="panel panel-default" id="ajax-load-total">
                                <div class="panel-body">
                                    <table class="adr-oms table">
                                        <tbody class="orderSummary">
                                            <tr class="row-total-amount">
                                                <td class="text-left">Thành tiền</td>
                                                <td class="text-right">
                                                    <strong class="">1,170,000đ</strong>
                                                </td>
                                            </tr>
                                            <tr class="row-total-amount">
                                                <td class="text-left">Tổng số</td>
                                                <td class="text-right">
                                                    <strong class="text-danger">1,170,000đ</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="pull-left" href="index630e.html?route=checkout/cart"
                                    title="Quay lại giỏ hàng">
                                    <i class="fa fa-mail-reply-all" aria-hidden="true"></i> Quay lại giỏ hàng </a>
                                <button class="btn btn-primary pull-right" type="button" id="submit_form_button"
                                    onclick="$('form#checkout_form').submit();">Đặt hàng <i
                                        class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
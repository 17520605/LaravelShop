@extends('layouts.app')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Liên hệ</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- contact-details start -->
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="contact-us-area">
                    <!-- google-map-area start -->
                    <div class="google-map-area">
                        <!--  Map Section -->
                        <div id="contacts" class="map-area">
                            <div id="map" class="map" data-lat="43.6532" data-lng="-79.3832">
                                <div id="contacts" class="map-area">
                                    <div id="map" class="map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18633.673658086474!2d106.87332190331766!3d10.944679243486178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb211fc0d30057a29!2sRestaurant%20Picker%20Uit!5e0!3m2!1sen!2s!4v1599490845464!5m2!1sen!2s" width="1170" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- google-map-area end -->
                    <!-- contact us form start -->
                    <div class="contact-us-form">
                        <div class="sec-heading-area">
                            <h2>Thắc mắc của khách hàng </h2>
                        </div>
                        <div class="contact-form">
                            <span class="legend">Thông tin khách hàng </span>
                            <form action="" method="post">
                                @csrf
                                <div class="form-top">
                                    <div class="form-group col-sm-12">
                                        <label>Họ tên<sup>*</sup></label>
                                        <input type="text" name="c_name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Số điện thoại<sup>*</sup></label>
                                        <input type="text" name="c_phone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Email <sup>*</sup></label>
                                        <input type="email" name="c_email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Subject <sup>*</sup></label>
                                        <input type="text" name="c_title" class="form-control" required>
                                    </div>												
                                    <div class="form-group col-sm-12">
                                        <label>Comment <sup>*</sup></label>
                                        <textarea class="yourmessage" name="c_content" required></textarea>
                                    </div>												
                                </div>
                                <div class="submit-form form-group col-sm-12 submit-review">
                                    <button type="submit" class="add-tag-btn">Gửi thông tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact us form end -->
                </div>					
            </div>
        </div>
    </div>	
</div>
<!-- contact-details end -->
@stop
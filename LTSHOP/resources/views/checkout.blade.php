@extends('layout_home')
@section('content')

<div ng-controller="checkoutcontroller">

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click tại đây để đăng nhập</a>
                        </div>
                        <h4>Chi tiết thanh toán</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">Họ tên<span>*</span></label>
                                <input type="text" id="fir" ng-model="item.ten_kh">
                            </div>
                            <!-- <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" id="last">
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input type="text" id="cun-name">
                            </div> -->

                            <div class="col-lg-12">
                                <label for="cun">Địa chỉ giao hàng<span>*</span></label>
                                <input type="text" id="cun" ng-model="item.diachi_giaohang">
                            </div>
                            <!-- <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="street" class="street-first">
                                <input type="text">
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input type="text" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" id="town">
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" id="email" ng-model="item.email">
                            </div> -->
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại<span>*</span></label>
                                <input type="text" id="phone" ng-model="item.sdt">
                            </div>
                            <div class="col-lg-6">
                                <label for="ghichu">Ghi chú</label>
                                <input type="text" id="ghichu" ng-model="item.note">
                            </div>
                            <!-- <div class="col-lg-6">
                                <label for="tongtien">Tong tien</label>
                                <input type="text" id="ghichu" value="@{{getTotal()}}" ng-model="item.tong_tien">
                            </div> -->

                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Tạo tài khoản?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Nhập mã giảm giá">
                        </div>
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng tiền</span></li>
                                    <div ng-repeat="item in listSP">

                                        <li class="fw-normal">@{{item.name}} X @{{item.quantity}} <span>@{{item.quantity*item.unit_price|number}} VNĐ</span></li>
                                        <!-- <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                        <li class="fw-normal">Combination x 1 <span>$120.00</span></li> -->
                                        
                                    </div>
                                    <li class="fw-normal">Subtotal <span>0 VNĐ</span></li>
                                    <li class="total-price">Total <span>@{{getTotal()|number}} VNĐ</span></li>

                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán bằng thẻ
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán bằng tiền mặt
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" ng-click="CreateHoaDon()">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="js/angular.min.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    <script src="js/checkout.js"></script> -->
    <!-- Partner Logo Section End -->
</div>


@stop
@extends('layout_home')
@section('content')

<div ng-controller="cartcontroller">
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in listSP">
                                    <td class="cart-pic first-row"><img src="/upload/product/@{{item.image}}" alt="" style="width:100px;"></td>
                                    <td class="cart-title first-row">
                                        <h5>@{{item.name}}</h5>
                                    </td>
                                    <td class="p-price first-row">@{{item.unit_price|number}} VNĐ</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div>
                                                <button ng-click="changeQuantityDown($index)"> - </button>
                                                <input type="text" style="width:30px" value="1" ng-model="item.quantity">
                                                <button ng-click="changeQuantityUp($index)"> + </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">@{{item.quantity*item.unit_price|number}}  VNĐ</td>
                                    <td class="close-td first-row"><i class="ti-close" ng-click="removeCart(item)"></i></td>
                                </tr>
                                <!-- <tr>
                                    <td class="cart-pic"><img src="img/cart-page/product-2.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>American lobster</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="img/cart-page/product-3.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>Guangzhou sweater</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="/" class="primary-btn continue-shop">Tiếp tục mua hàng</a>
                                
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Thêm</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng phụ <span>0 VNĐ</span></li>
                                    <li class="cart-total">Tổng <span>@{{getTotal()|number}}  VNĐ</span></li>
                                </ul>
                                <a href="/checkout" class="proceed-btn">Tiến tới thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- Partner Logo Section End -->

    <!-- <script src="js/angular.min.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    <script src="js/cart.js"></script> -->
</div>


@stop
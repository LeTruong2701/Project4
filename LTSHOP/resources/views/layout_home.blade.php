<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LTShop| Shop đồ thể thao</title>

    <!-- Google Font -->
    <link href="https:/fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body ng-app="myapp">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        ltshop@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +(84) 37 9517046
                    </div>
                </div>
                <div class="ht-right">
                    <a href="/#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt'  data-imagecss="flag yt" data-title="English">VietNam</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu" data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="/#"><i class="ti-facebook"></i></a>
                        <a href="/#"><i class="ti-twitter-alt"></i></a>
                        <a href="/#"><i class="ti-linkedin"></i></a>
                        <a href="/#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/">
                                <img style="margin-top:-15px" src="/upload/images/LOGOlt3.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7" ng-controller="searchcontroller">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Top tìm kiếm</button>
                            <div class="input-group">
                                <input type="text" placeholder="Bạn cần tìm gì...?" ng-model="keyword">
                                <button type="button" ng-click="Search(keyword)"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="/#">
                                    <i class="icon_heart_alt"></i>
                                    <span>17</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="/cart">
                                    <i class="icon_bag_alt"></i>

                                </a>
                                <div class="cart-hover" ng-controller="cartcontroller">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr ng-repeat="a in listSP">
                                                    <td class="si-pic"><img src="/upload/product/@{{a.image}}" alt="" style="height:60px;width:80px"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p style="font-size:14px">@{{a.unit_price|number}} VNĐ</p>
                                                            <h6 style="font-size:14px">@{{a.name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close" ng-click="removeCart(a)"></i>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td class="si-pic"><img src="/img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng:</span>
                                        <h5></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="/cart" class="/cart">Giỏ hàng</a>
                                        <a href="/checkout" class="/checkout" style="margin-left:60px;">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price" style="color:white">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Danh mục</span>
                        <ul class="depart-hover" ng-controller="searchcontroller">
                            <li class="active"><a href="/#">Sản phẩm bán chạy</a></li>

                            <li><a ng-click="Searchquan()">Quần thể thao</a></li>
                            <li><a ng-click="Searchao()">Áo thể thao</a></li>
                            <li><a ng-click="Searchgiay()">Giày thể thao</a></li>
                            <li><a ng-click="Searchtui()">Túi xách thể thao</a></li>
                            <li><a href="/#">Dụng cụ thể thao</a></li>
                            <li><a href="/#">Sản phẩm HOT</a></li>
                            <li><a href="/#">BIG SALE</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/./index.html">Home</a></li>
                        <li><a href="https://forms.gle/zXYY6F8CKL3Yp3w88">Liên hệ</a></li>
                        <li><a href="/shop">Shop</a>
                            <ul class="dropdown" ng-controller="searchcontroller">
                                <li><a ng-click="Getsptheoloai(14)">Quần áo thể thao</a></li>
                                <li><a ng-click="Searchgiay()">Giày thể thao</a></li>
                                <li><a ng-click="Searchtui()">Túi xách thể thao</a></li>
                            </ul>
                        </li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/./contact.html">Về chúng tôi</a></li>
                        <li><a href="/#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="/./blog-details.html">Blog Details</a></li>
                                <li><a href="/cart">Giỏ hàng</a></li>
                                <li><a href="/checkout">Thanh toán</a></li>
                                <li><a href="/./faq.html">Faq</a></li>
                                <li><a href="/./register.html">Đăng ký</a></li>
                                <li><a href="/./login.html">Đăng nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="/#"><img src="/upload/images/LogoLTshopft.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Khoái Châu Hưng Yên</li>
                            <li>Phone: (+84) 379517046</li>
                            <li>Email:ltshop@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="/#"><i class="fa fa-facebook"></i></a>
                            <a href="/#"><i class="fa fa-instagram"></i></a>
                            <a href="/#"><i class="fa fa-twitter"></i></a>
                            <a href="/#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="/#">Về chúng tôi</a></li>
                            <li><a href="/#">Checkout</a></li>
                            <li><a href="/#">Kết nối</a></li>
                            <li><a href="/#">Bảo mật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="/#">My Account</a></li>
                            <li><a href="/#">Contact</a></li>
                            <li><a href="/#">Shopping Cart</a></li>
                            <li><a href="/#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Đăng ký để nhận thông tin mới nhất</h5>
                        <p>Nhập Email dưới đây, chúng tôi sẽ luôn cập nhật tới bạn</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập Email">
                            <button type="button">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/truong.leo.27/" target="_blank">Lê Trường</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/js/home/jquery-3.3.1.min.js"></script>
    <script src="/js/home/bootstrap.min.js"></script>
    <script src="/js/home/jquery-ui.min.js"></script>
    <script src="/js/home/jquery.countdown.min.js"></script>
    <script src="/js/home/jquery.nice-select.min.js"></script>
    <script src="/js/home/jquery.zoom.min.js"></script>
    <script src="/js/home/jquery.dd.min.js"></script>
    <script src="/js/home/jquery.slicknav.js"></script>
    <script src="/js/home/owl.carousel.min.js"></script>
    <script src="/js/home/main.js"></script>


    <script src="/js/angular.min.js"></script>




    <script>
        var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
        app.controller('searchcontroller', ['$scope', '$http', mycontrol]);

        function mycontrol($scope, $http) {

            $scope.Search = function(keyword) {
                sessionStorage.setItem('keyword', keyword);
                window.location.href = "/shop";
            }
            $scope.Searchgiay = function() {
                $scope.keyword = 'Giay';
                console.log($scope.keyword);
                sessionStorage.setItem('keyword', $scope.keyword);
                window.location.href = "/shop";
            }
            $scope.Searchquan = function() {
                $scope.keyword = 'Quan';
                console.log($scope.keyword);
                sessionStorage.setItem('keyword', $scope.keyword);
                window.location.href = "/shop";
            }
            $scope.Searchao = function() {
                $scope.keyword = 'Áo';
                console.log($scope.keyword);
                sessionStorage.setItem('keyword', $scope.keyword);
                window.location.href = "/shop";
            }
            $scope.Searchtui = function() {
                $scope.keyword = 'Tui';
                console.log($scope.keyword);
                sessionStorage.setItem('keyword', $scope.keyword);
                window.location.href = "/shop";
            }

        }
    </script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    <script src="/js/sanphamcontroller.js"></script>

    <script src="/js/cart.js"></script>

    <script src="/js/checkout.js"></script>


    <script src="/js/newscontroller.js"></script>
</body>

</html>
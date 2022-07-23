@extends('layout_home')
@section('content')
<div ng-app="myapp" ng-controller="mycontroller">
<input type="file" class="form-control" id="file-upload" hidden >
<section class="hero-section">
  <div class="hero-items owl-carousel">
    <div class="single-hero-items set-bg" data-setbg="img/banner-main.jpg" style="height: 725px;" >
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <span>Giày,túi thể thao</span>
            <h1 style="color:#e7ab3c;">Black friday</h1>
            
            <a href="#" class="primary-btn">Shop Now</a>
          </div>
        </div>
        <div class="off-card">
          <h2>Sale <span>40%</span></h2>
        </div>
      </div>
    </div>
    <div class="single-hero-items set-bg" data-setbg="img/bannerchitiet1.jpg" style="height: 725px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <span>Giày,túi thể thao</span>
            <h1 style="color:#e7ab3c;">Black friday</h1>
        
            <a href="#" class="primary-btn">Shop Now</a>
          </div>
        </div>
        <div class="off-card">
          <h2>Sale <span>40%</span></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="img/banner-1.jpg" alt="">
          <div class="inner-text">
            <h4>Quần áo</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="img/banner-giay.png" alt="" style="height: 248px;">
          <div class="inner-text">
            <h4>Giày</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="img/bannertuixach2.jpg" alt="" style="height: 248px;">
          <div class="inner-text">
            <h4>Túi</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Section End -->
<!-- ////////////////////////////////////

/////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Women Banner Section Begin -->
<section class="women-banner spad" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <div class="product-large set-bg" data-setbg="img/banner-quanao2.jpg">
      
          <h2>Quần áo thể thao</h2>
          <a href="#">Khám phá thêm</a>
        </div>
      </div>
      <div class="col-lg-8 offset-lg-1">
        <div class="filter-control">
          <ul>
            <li class="active">Quần áo</li>
            <li>Nike</li>
            <li>Adidas</li>
            <li>Puma</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          <div class="product-item" ng-repeat="row in quanaos">
            <div class="pi-pic">
              <img src="/upload/product/@{{row.image}}" alt="">
              <div class="sale">Sale</div>
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="/product/@{{row.id}}" ng-click="openDetail(row.id)">Chi tiết</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Coat</div>
              <a href="/product/@{{row.id}}" ng-click="openDetail(row.id)">
                <h5>@{{row.name}}</h5>
              </a>
              <div class="product-price">
                @{{row.unit_price|number}} VNĐ
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Women Banner Section End -->

<!-- Deal Of The Week Section Begin-->
<section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
  <div class="container">
    <div class="col-lg-6 text-center">
      <div class="section-title">
        <h2>Giảm giá cuối tuần</h2>
        <p>Cùng chờ đón đợt giảm giá này nhé!!! </p>
        <div class="product-price">
          1.500.000
          <span>/ Túi thể thao</span>
        </div>
      </div>
      <div class="countdown-timer" id="countdown">
        <div class="cd-item">
          <span>28</span>
          <p>Ngày</p>
        </div>
        <div class="cd-item">
          <span>12</span>
          <p>Giờ</p>
        </div>
        <div class="cd-item">
          <span>40</span>
          <p>Phút</p>
        </div>
        <div class="cd-item">
          <span>52</span>
          <p>Giây</p>
        </div>
      </div>
      <a href="#" class="primary-btn">Shop Now</a>
    </div>
  </div>
</section>
<!-- Deal Of The Week Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="filter-control">
          <ul>
            <li class="active">Giày</li>
            <li>Nike</li>
            <li>Adidas</li>
            <li>Puma</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          <div class="product-item" ng-repeat="a in giays">
            <div class="pi-pic">
              <img src="/upload/product/@{{a.image}}" alt="">
              <div class="sale">Sale</div>
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="/product/@{{a.id}}" ng-click="openDetail(a.id)">Chi tiết</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Coat</div>
              <a href="/product/@{{a.id}}" ng-click="openDetail(a.id)">
                <h5>@{{a.name}}</h5>
              </a>
              <div class="product-price">
                @{{a.unit_price|number}} VNĐ
                <!-- <span>$35.00</span> -->
              </div>
            </div>
          </div>
          <!-- <div class="product-item">
            <div class="pi-pic">
              <img src="img/products/man-2.jpg" alt="">
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="#">+ Quick View</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Shoes</div>
              <a href="#">
                <h5>Guangzhou sweater</h5>
              </a>
              <div class="product-price">
                $13.00
              </div>
            </div>
          </div>
          <div class="product-item">
            <div class="pi-pic">
              <img src="img/products/man-3.jpg" alt="">
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="#">+ Quick View</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Towel</div>
              <a href="#">
                <h5>Pure Pineapple</h5>
              </a>
              <div class="product-price">
                $34.00
              </div>
            </div>
          </div>
          <div class="product-item">
            <div class="pi-pic">
              <img src="img/products/man-4.jpg" alt="">
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="#">+ Quick View</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Towel</div>
              <a href="#">
                <h5>Converse Shoes</h5>
              </a>
              <div class="product-price">
                $34.00
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="product-large set-bg m-large" data-setbg="img/banner-giay4.jpg">
          <h2>Giày thể thao</h2>
          <a href="#">Discover More</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Man Banner Section End -->

<!-- Instagram Section Begin -->
<div class="instagram-photo">
  <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5><a href="#">colorlib_Collection</a></h5>
    </div>
  </div>
</div>
<!-- Instagram Section End -->


<div style="height: 100px;">

</div>
<!--////////////////////////////////////     PHU KIEN     /////////////////-->
<!-- Phukien Banner Section Begin -->
<section class="women-banner spad" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <div class="product-large set-bg" data-setbg="img/banner-phukien.jpg">
      
          <h2>Túi thể thao</h2>
          <a href="#">Discover More</a>
        </div>
      </div>
      <div class="col-lg-8 offset-lg-1">
        <div class="filter-control">
          <ul>
            <li class="active">Túi thể thao</li>
            <li>Nike</li>
            <li>Adidas</li>
            <li>Puma</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          <div class="product-item" ng-repeat="row in tuis">
            <div class="pi-pic">
              <img src="/upload/product/@{{row.image}}" alt="">
              <div class="sale">Sale</div>
              <div class="icon">
                <i class="icon_heart_alt"></i>
              </div>
              <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="/product/@{{row.id}}" ng-click="openDetail(row.id)"> Chi tiết</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
            </div>
            <div class="pi-text">
              <div class="catagory-name">Coat</div>
              <a href="/product/@{{row.id}}" ng-click="openDetail(row.id)">
                <h5>@{{row.name}}</h5>
              </a>
              <div class="product-price">
                @{{row.unit_price|number}} VNĐ
                <!-- <span>$35.00</span> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Women Banner Section End -->





















<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h2>Blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="img/blog1.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i>
                May 4,2019
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i>
                5
              </div>
            </div>
            <a href="#">
              <h4>Tăng sức khỏe tinh thần từ việc thể thao</h4>
            </a>
            <p>Tăng sức khỏe tinh thần từ việc thể thao đều đặn mỗi ngày. </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="img/blog2.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i>
                May 4,2019
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i>
                5
              </div>
            </div>
            <a href="#">
              <h4>Cải thiện khả năng thăng bằng</h4>
            </a>
            <p>Cải thiện khả năng thăng bằng với các bài học đi xe đạp leo núi.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="img/blog3.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i>
                May 4,2019
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i>
                5
              </div>
            </div>
            <a href="#">
              <h4>Bảo vệ môi trường</h4>
            </a>
            <p>Dự án bảo vệ môi trường với các cuộc thi thể thao cực hấp dẫn </p>
          </div>
        </div>
      </div>
    </div>
    <div class="benefit-items">
      <div class="row">
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="img/icon-1.png" alt="">
            </div>
            <div class="sb-text">
              <h6>Free Shipping</h6>
              <p>Đơn hàng từ 500k</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="img/icon-2.png" alt="">
            </div>
            <div class="sb-text">
              <h6>Giao hàng nhanh</h6>
              <p>Nhanh chóng, tiết kiệm</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="img/icon-1.png" alt="">
            </div>
            <div class="sb-text">
              <h6>Thanh toán</h6>
              <p>100% an toàn</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Latest Blog Section End -->

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
</div>
<!-- Hero Section Begin -->

<!-- Partner Logo Section End -->
<!-- <script src="js/angular.min.js"></script>
<script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
<script src="js/sanphamcontroller.js"></script> -->


@stop
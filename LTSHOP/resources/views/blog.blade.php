@extends('layout_home')
@section('content')
<div ng-controller="newscontroller">
   <!-- Breadcrumb Section Begin -->
   <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Tìm kiếm</h4>
                            <form action="#">
                                <input type="text" placeholder="Tìm kiếm . . . ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Thể loại</h4>
                            <ul>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Mẹo</a></li>
                                <li><a href="#">Cập nhật mỗi ngày</a></li>
                                
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Bài đăng gần đây</h4>
                            <div class="recent-blog" ng-repeat="a in newss">
                                <a href="#" class="rb-item" >
                                    <div class="rb-pic">
                                        <img src="/upload/images/@{{a.image}}" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>@{{a.title}}</h6>
                                        <p>Thời trang <span>- Tháng 4 năm 2020</span></p>
                                    </div>
                                </a>
                                <!-- <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-2.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>Tip buộc dây giày thể thao cực nhanh ...</h6>
                                        <p>Mẹo <span>- Tháng 8 năm 2020</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-3.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-4.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Sản phẩm Tags</h4>
                            <div class="tag-item">
                                <a href="#">Quần áo</a>
                                <a href="#">Giày</a>
                                <a href="#">Phụ kiện</a>
                                <a href="#">Dụng cụ</a>
                                <a href="#">Sản phẩm mới</a>
                                <a href="#">Sale</a>
                                <a href="#">Balo</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6" ng-repeat="a in newss">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="/upload/images/@{{a.image}}" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>@{{a.title}}</h4>
                                    </a>
                                    <p>Thời trang <span>- Tháng 4 năm 2020</span></p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-2.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Top 10 đôi giày thể thao nhất định bạn phải có.</h4>
                                    </a>
                                    <p>Lời khuyên <span>- Tháng 5  năm 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-3.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Last week I had my first work trip of the year to Sonoma Valley</h4>
                                    </a>
                                    <p>travel <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-4.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Happppppy New Year! I know I am a little late on this post</h4>
                                    </a>
                                    <p>Fashion <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-5.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Absolue collection. The Lancome team has been one…</h4>
                                    </a>
                                    <p>Model <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-6.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Writing has always been kind of therapeutic for me</h4>
                                    </a>
                                    <p>Fashion <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">
                                    Loading More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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
</div>
<!-- <script src="js/angular.min.js"></script>
<script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
<script src="js/newscontroller.js"></script> -->
 
@stop
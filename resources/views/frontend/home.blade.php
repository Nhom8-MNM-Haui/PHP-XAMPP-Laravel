<!DOCTYPE html>
<html lang="vi-VN" data-nhanh.vn-template="T0260">
<head>
    <meta name="robots" content="noindex"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta charset="utf-8">
    <title>Nhanh.vn</title>
    <meta name="keywords" content="Phần mềm quản lý bán hàng">
    <meta name="description" content="Phần mềm quản lý bán hàng Nhanh.vn giúp bạn dễ dàng quản lý kho hàng, đơn hàng, khách hàng, tiết kiệm thời gian, tăng doanh thu, giảm chi phí cho việc quản lý cửa hàng">
    <meta property="og:title" content="Nhanh.vn">
    <meta property="og:url" content="//t0260.store.nhanh.vn">
    <meta property="og:type" content="product">
    <meta name="DC.language" content="scheme=utf-8 content=vi">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="google-site-verification" content="">
    <link href="{{asset('frontend/images/store_1548917773_553.png')}}" rel="shortcut icon" type="frontend/image/vnd.microsoft.icon">
    <link rel="stylesheet" href="{{asset('frontend/css/t0260.store.nhanh.vn.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/cart.css')}}">
    <script src="{{asset('frontend/js/jquery-1.12.0.min.js')}}"></script>
    <style type="text/css">
    img.lazyload {
        opacity: 0.001;
        object-fit: scale-down !important;
    }

    .fb-customerchat>span>iframe.fb_customer_chat_bounce_out_v2 {
        max-height: 0 !important;
    }

    .fb-customerchat>span>iframe.fb_customer_chat_bounce_in_v2 {
        max-height: calc(100% - 80px) !important;
    }
    .fa-star{
       color: #EBC912; 
       font-size: 20px;
       margin-right: 5px;
   }
   .rating tr td{
       border: 0px !important;
   }
</style>
</head>
<body class="tp_background tp_text_color">
   <!--Start of Tawk.to Script-->
   <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/605f60a7067c2605c0bcde6e/1f1q9344t';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- header -->
@include("frontend.header")
<!-- end header -->
<div class="tp_banner_main">
    <div id="owl-index" class="owl-carousel owl-theme">
        <div class="item">
            <a href="javascript:void(0);">
                <img class="lazyload" data-sizes="auto" data-src="{{asset('frontend/images/sb_1551942213_200.png')}}" alt="bb3"/>
            </a>
            <div class="slider-caption">
                <div class="slider-title"></div>
                <div class="slider-des "></div>
            </div>
        </div>
        <div class="item">
            <a href="javascript:void(0);">
                <img class="lazyload" data-sizes="auto" data-src="{{asset('frontend/images/sb_1551942148_856.png')}}" alt="bb2"/>
            </a>
            <div class="slider-caption">
                <div class="slider-title"></div>
                <div class="slider-des "></div>
            </div>
        </div>
        <div class="item">
            <a href="javascript:void(0);">
                <img class="lazyload" data-sizes="auto" data-src="{{asset('frontend/images/sb_1551939754_137.jpg')}}" alt="bb1"/>
            </a>
            <div class="slider-caption">
                <div class="slider-title"></div>
                <div class="slider-des "></div>
            </div>
        </div>
    </div>
</div>
<!-- main -->
    <div class="banner-index tp_product_new">
  <div class="container">
    <div class="row">
      <div class="main-title text-center">
        <h2 class="tp_title">Sản phẩm mới</h2>
        <div class="shop-now">
          <a href="#">Xem thêm</a>
        </div>
      </div>
      <div id="owl-product-index2" class="owl-carousel owl-theme clearfix banner-list">
        <?php foreach($hotProducts as $rows): ?>
          <div class="banner-item" style="position: relative;">
            <div style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;"><?php echo $rows->discount; ?>%</div>
            <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"><i style=" z-index: 1; position: absolute; width: 70px; color:black; right:-40px ; top:0px; font-size: 25px;" class="fa fa-heart" aria-hidden="true"></i></a>
            <div class="img">
              <a class="img_product" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>" data-id="12074462">
                <img class="lazyload" data-sizes="auto" data-src="{{asset('upload/products/'.$rows->photo)}}" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" >
              </a>
            </div>
            <div class="info">
              <h3>
                <a class="tp_product_name" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
              </h3>
              <div class="prices">
                  <span style="text-decoration:line-through;" class="tp_product_price"><?php echo number_format($rows->price); ?>₫</span>
                </div>
              <div class="prices">
                <span class="tp_product_price"><?php echo number_format($rows->price-($rows->price*$rows->discount)/100); ?>₫</span>
              </div>
              <div>
                <p class="price-box"> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><i class="fa fa-star" aria-hidden="true"></i></a> </p>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<div class="best-seller tp_product_hot">
  <div class="container">
    <div class="row">
      <div class="main-title text-center">
        <h2 class="tp_title">Sản phẩm nổi bật</h2>
        <div class="shop-now">
          <a href="#">Xem thêm</a>
        </div>
      </div>
      <div id="owl-product-index" class="owl-carousel owl-theme">
        <?php foreach($newsProducts as $rows): ?>
          <div class="item">
            <div class="product-item" style="position: relative;">
              <div style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;"><?php echo $rows->discount; ?>%</div>
            <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"><i style=" z-index: 1; position: absolute; width: 70px; color:black; right:-45px ; top:0px; font-size: 25px;" class="fa fa-heart" aria-hidden="true"></i></a>
              <div class="img">
                <a class="img_product" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                  <img class="lazyload " data-sizes="auto" src="{{asset('upload/products/'.$rows->photo)}}" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>">
                </a>
              </div>
              <div class="info">
                <h3>
                  <a class="tp_product_name" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                </h3>
                <div class="prices">
                  <span style="text-decoration:line-through;" class="tp_product_price"><?php echo number_format($rows->price); ?>₫</span>
                </div>
                <div class="prices">
                  <span class="tp_product_price"><?php echo number_format($rows->price-($rows->price*$rows->discount)/100); ?>₫</span>
                </div>
                 <div style="text-align: center;">
                <p class="price-box"> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><i class="fa fa-star" aria-hidden="true"></i></a> </p>
              </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
</div>
<!-- end main -->
<div class="banner-bottom">
    <div class="banner-ads text-center">
        <a href="javascript:void(0);" target="_self">
            <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/sb_1546487694_538.jpg')}}" alt="boottom 2"/>
        </a>
        <a href="javascript:void(0);" target="_self">
            <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/sb_1551941953_799.jpg')}}" alt="fashion 1"/>
        </a>
    </div>
</div>
<style>
#popupHome .modal-dialog .modal-content {
    background: transparent !important;
    box-shadow: none;
    border: none;
}

#popupHome .modal-dialog .modal-header {
    border-bottom: none;
}

#popupHome .modal-dialog button.close {
    border-radius: 50px;
    width: 30px;
    background: #000;
    opacity: 1;
    border: 2px solid #fff;
}

#popupHome .modal-dialog button.close span {
    font-size: 21px;
    color: #fff;
    line-height: 26px;
}

@media screen and (max-width: 768px) {
    #popupHome {
        padding-right: 0 !important;
        top: 85px;
        display: block;
    }
}
</style>
<div class="container">
    <div class="box-icon row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="banner-footer-item">
                <p>
                    <img src="{{asset('frontend/images/icon-vanchuyen.png')}}">
                </p>
                <div class="banner-footer-item-info">
                    <p class="banner-footer-item-title">Miễn phí vận chuyển toàn quốc</p>
                    <p class="banner-footer-item-des">Với Đơn Hàng Trên 500.000 đ</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="banner-footer-item">
                <p>
                    <img src="{{asset('frontend/images/icon-hotro.png')}}">
                </p>
                <div class="banner-footer-item-info">
                    <p class="banner-footer-item-title">Hỗ trợ 24/7</p>
                    <p class="banner-footer-item-des">0287 307 64 64</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="banner-footer-item">
                <p>
                    <img src="{{asset('frontend/images/icon-doitra.png')}}">
                </p>
                <div class="banner-footer-item-info">
                    <p class="banner-footer-item-title">Miễn phí đổi trả</p>
                    <p class="banner-footer-item-des">Trong Vòng 10 ngày</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-block">
        <div class="container">
            <div class="footer-address clearfix">
                <div class="adress-item">
                    <h4>VỀ CHÚNG TÔI</h4>
                    <ul class="footer-nav no-bullets">
                        <li>
                            <a href="#">Triết lý kinh doanh</a>
                        </li>
                        <li>
                            <a href="#">Truyền thông sự kiện</a>
                        </li>
                        <li>
                            <a href="#">Hoạt động xã hội</a>
                        </li>
                        <li>
                            <a href="#">Liên kết &hợp tác</a>
                        </li>
                    </ul>
                </div>
                <div class="adress-item">
                    <h4>TIN TỨC</h4>
                    <ul class="footer-nav no-bullets">
                        <li>
                            <a href="#">Review sản phẩm</a>
                        </li>
                        <li>
                            <a href="#">Tin tức thời trang</a>
                        </li>
                        <li>
                            <a href="#">Thương hiệu nổi tiếng</a>
                        </li>
                        <li>
                            <a href="#">Đánh giá của khách hàng</a>
                        </li>
                        <li>
                            <a href="#">Lịch sử thương hiệu</a>
                        </li>
                    </ul>
                </div>
                <div class="adress-item">
                    <h4>TƯ VẤN SẢN PHẨM</h4>
                    <ul class="footer-nav no-bullets">
                        <li>
                            <a href="#">Thời trang công sở</a>
                        </li>
                        <li>
                            <a href="#">Đặt may trang phục</a>
                        </li>
                        <li>
                            <a href="#">Câu hỏi thường gặp</a>
                        </li>
                        <li>
                            <a href="#">Kiến thức cần thiết</a>
                        </li>
                        <li>
                            <a href="#">Tại sao nên lựa chọn chúng tôi</a>
                        </li>
                    </ul>
                </div>
                <div class="adress-item">
                    <h4>Đăng ký nhận tin</h4>
                    <ul class="footer-nav no-bullets">
                        <li>
                            <a href="#">Hướng dẫn mua hàng</a>
                        </li>
                        <li>
                            <a href="#">Chính sách ưu đãi thẻ VIP</a>
                        </li>
                        <li>
                            <a href="#">Chính sách bảo hành</a>
                        </li>
                        <li>
                            <a href="#">Hướng dẫn sử dụng</a>
                        </li>
                        <li>
                            <a href="#">Hướng dẫn thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-socials text-center">
        <div class="container">
            <h4>Kết nối với chúng tôi</h4>
            <ul class="clearfix">
                <li>
                    <a href="https://www.facebook.com/nhanh.vn/" class="fb">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="yo">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="in">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-newsletter text-center">
        <div class="container">
            <h4>Đăng ký nhận tin</h4>
            <p class="sub">Đăng ký để nhận thông tin về những chương trình khuyến mại nhanh nhất</p>
            <div class="link">
                <a href="#">Contact us</a>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p style="display: block; margin: 0; color: #fff;">
            Thiết kế website bởi <img src="{{asset('frontend/images/favicon.ico')}}" alt="Thiết kế web bởi NHANH.VN" title="Thiết kế web bởi NHANH.VN"/>
            <a style="margin-top:5px;display:inline-block;font-size: 15px;color: #dc3333;" href="https://nhanh.vn" target="_blank">Nhanh.vn</a>
        </p>
    </div>
</footer>
<a href="javascript:" class="scrollToTop">
    <i class="fa fa-angle-up"></i>
</a>
<div id="boxMenu" class="hidden-lg hidden-md">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
        </li>
        <li>
            <a href="danhmuc.html">Đồ nam</a>
            <ul>
                <li>
                    <a href="danhmuc.html">Áo thể thao</a>
                </li>
                <li>
                    <a href="danhmuc.html">Áo Nike</a>
                </li>
                <li>
                    <a href="danhmuc.html">Quần Jeans</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="danhmuc.html">Đồ nữ</a>
            <ul>
                <li>
                    <a href="danhmuc.html">Quần Jeans</a>
                </li>
                <li>
                    <a href="danhmuc.html">Váy</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="danhmuc.html">Đồ trẻ em</a>
        </li>
        <li>
            <a href="danhmuc.html">Phụ kiện</a>
            <ul>
                <li>
                    <a href="danhmuc.html">Đồng hồ</a>
                </li>
                <li>
                    <a href="danhmuc.html">Thắt lưng</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Tin tức</a>
        </li>
        <li>
            <a href="#">Khuyến mại</a>
        </li>
    </ul>
</div>
<script type="text/javascript" src="{{asset('frontend/js/t0260.store.nhanh.vn')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/T1260.store.nhanh.vn')}}"></script>
<script src="{{asset('frontend/js/location.vn.js')}}" defer></script>
<script src="{{asset('frontend/js/lazysizes.min.js')}}" async=""></script>
<div id="dialog-message" title="Giỏ hàng"></div>
<div id="dialogMessage"></div>
</body>
</html>
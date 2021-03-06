@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="container">
  <div class="row clearfix">
    <div class="product-left">
      <div id="surround">
        <div class="blockImage">
          <img class="product-image-feature" data-zoom-image="{{asset('upload/products/'.$record->photo)}}" src="{{asset('upload/products/'.$record->photo)}}" alt="{{$record->name}}">
        </div>
        <div class="thumb-mt20 visible-xs visible-sm">
          <div id="sliderproduct" class="owl-carousel owl-theme">
            <div class="item">
              <img alt="{{$record->name}}" src="{{asset('upload/products/'.$record->photo)}}" data-image="{{asset('upload/products/'.$record->photo)}}">
            </div>
            <div class="item">
              <img alt="{{$record->name}}" src="{{asset('upload/products/'.$record->photo)}}" data-image="{{asset('upload/products/'.$record->photo)}}">
            </div>
          </div>
        </div>
        <div id="sliderproduct-pc" class="hidden-xs hidden-sm" style="display:none;">
          <ul class="slides">
            <li class="product-thumb">
              <a href="javascript:" data-image="{{asset('upload/products/'.$record->photo)}}" data-zoom-image="{{asset('upload/products/'.$record->photo)}}">
                <img alt="{{$record->name}}" data-image="{{asset('upload/products/'.$record->photo)}}" src="{{asset('upload/products/'.$record->photo)}}">
              </a>
            </li>
            <li class="product-thumb">
              <a href="javascript:" data-image="{{asset('upload/products/'.$record->photo)}}" data-zoom-image="{{asset('upload/products/'.$record->photo)}}">
                <img alt="{{$record->name}}" data-image="{{asset('upload/products/'.$record->photo)}}" src="{{asset('upload/products/'.$record->photo)}}">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="product-right" style="margin-top: 0px !important;">
      <h3 class="tp_product_detail_name">{{$record->name}}</h3>
      <h6>Category:&nbsp; <span>  {{App\ProductsL::getCategory($record->category_id)}} </h6>
      <h6>M?? sp: 610</h6>
      <div class="product-price" id="price-preview2">
        <span class="tp_product_detail_price" style="text-decoration:line-through;">  {{number_format($record->price)}}??? </span>
        <p><span class="tp_product_detail_price"> {{number_format($record->price-($record->price*$record->discount)/100)}}??? </span></p>
      </div>
      <div id="add-item-form" class="variants clearfix">
        <div class="action_btn">
       <form action="{{url('cart/create/'.$record->id)}}" method="post">
        @csrf
            <div class="select-wrapper number-wrapper">
              <label>S??? l?????ng</label>
            <input type="number" id="pview-qtt" value="1" min="1" max="5000" class="text-center" name="sl"></div>
          <button type="submit" id="AddToCart" class="btnBuyNow " data-psid="12074411" data-selId="12074411" title="" data-ck="1" onclick="alert('Th??m v??o gi??? h??ng th??nh c??ng')" >Th??m v??o gi???</button>
      </form>
          <a href="{{url('cart/pay')}}"><button id="buyNow" class="btnBuyNow " data-psid="12074411" data-selId="12074411" title="" data-ck="1" >Mua ngay</button></a>
        </div>
        <!-- /rating -->
        <div style="border:1px solid #dddddd; margin-top: 15px;">
      <h4 style="padding-left: 10px;">Rating</h4>
      <table class="rating" style="width: 100%; border:0px;">
        <tr>
          <td style="width: 80%; padding-left: 10px;"><i class="fa fa-star" aria-hidden="true"></i></td>
          <td><span class="label label-primary">{{App\ProductsL::getStar($record->id,1)}} vote</span></td>
        </tr>
        <tr>
          <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
          <td><span class="label label-warning">{{App\ProductsL::getStar($record->id,2)}} vote</span></td>
        </tr>
        <tr>
          <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
          <td><span class="label label-danger">{{App\ProductsL::getStar($record->id,3)}} vote</span></td>
        </tr>
        <tr>
          <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
          <td><span class="label label-info">{{App\ProductsL::getStar($record->id,4)}} vote</span></td>
        </tr>
        <tr>
          <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
          <td><span class="label label-success">{{App\ProductsL::getStar($record->id,5)}} vote</span></td>
        </tr>
      </table>
      <br>
    </div>
    <!-- /rating -->
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="policy clearfix">
      <div class="policy-item">
        <h4>Th??ng tin s???n ph???m</h4>
        <div class="content"></div>
      </div>
      <div class="policy-item">
        <h4>??u ????i member vip</h4>
        <div class="content">
          Vui l??ng ????ng k?? t??i kho???n mua h??ng ????? ???????c t??ch ??i???m l??m Member Vip:<br/>
          - T??i kho???n Sliver ???????c gi???m 5% khi t??ch ????? 5tr<br/>
          - T??i kho???n Gold ???????c gi???m 10% khi t??ch ????? 10tr<br/>
          - T??i kho???n Diamond ???????c gi???m 15% khi t??ch ????? 20tr<br/>
        </div>
      </div>
      <div class="policy-item">
        <h4>Ch??nh S??ch ?????i Tr??? H??ng</h4>
        <div class="content">
          - ???????c ki???m tra h??ng tr?????c khi nh???n h??ng<br/>
          - ?????i/ Tr??? trong v??ng 7 ng??y k??? t??? khi nh???n h??ng<br/>
          - Mi???n ph?? ?????i tr??? n???u l???i sai s??t<br/>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="product-related" class="tp_product_detail_suggest">
  <div class="container">
    <div class="row">
      <div class="title-like text-center">
        <h4>C?? th??? b???n th??ch</h4>
      </div>
      <div id="owl-product-related" class="owl-carousel owl-theme">
        
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_17509_400x400.jpg')}}" alt="Jean nam r??ch g???i c?? t??nh">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam r??ch g???i c?? t??nh</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">235,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_174911_400x400.jpg')}}" alt="Jean nam xanh tr??n">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam xanh tr??n</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">450,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_17509_400x400.jpg')}}" alt="Jean nam ??en tr??n">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam ??en tr??n</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">340,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_174911_400x400.jpg')}}" alt="Jean nam ??en m??i nh???">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam ??en m??i nh???</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">235,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_17509_400x400.jpg')}}" alt="Jean nam xanh th??u">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam xanh th??u</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">340,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/2732017_17509_400x400.jpg')}}" alt="Jean nam xanh ??en tr??n">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam xanh ??en tr??n</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">350,000</span>
            </div>
          </div>
        </div>
        <div class="product-item">
          <div class="img">
            <a href="#">
              <img class="lazyload" data-sizes="auto" src="{{asset('frontend/images/lazyLoading.gif')}}" data-src="{{asset('frontend/images/Quan_Jeans_Nam_Lph_____Be14_430x430.jpg')}}" alt="Jean nam ??en th??u ch???">
            </a>
          </div>
          <div class="info">
            <h3>
              <a class="tp_product_name" href="#">Jean nam ??en th??u ch???</a>
            </h3>
            <div class="prices">
              <span class="tp_product_price">450,000</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
@endsection
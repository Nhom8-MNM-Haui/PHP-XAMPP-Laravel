<input type="hidden" id="checkStoreId" value="39301">
<div class="cart-fixscroll hidden">
    <a href="{{url('cart')}}">
        <img class="lazyload" data-sizes="auto" data-src="{{asset('frontend/images/cart.png')}}" alt="cart icon" width="18"/>
        @php 
            $numberProduct = 0;
            if(session()->has('cart')){
                foreach(session('cart') as $product){
                  $numberProduct++;
                }
            }
         @endphp
        <span class="number-count">{{$numberProduct}}</span>
    </a>
</div>
<div class="header">
    <div class="header-top tp_header clearfix hidden-xs hidden-sm">
        <div class="container">
            <h1 class="logo">
                <a href="#" class="brand">
                    <img class="lazyload" data-sizes="auto" data-src="{{asset('frontend/images/store_1548917977_950.png')}}" alt="Home"/>
                </a>
            </h1>
            <div class="user-cart hidden-xs hidden-sm">
                @if(!session()->has('customer'))
                <a href="{{url('account/login')}}">Đăng nhập</a>
                @else
                  <a href="{{url('account/personal')}}">{{session('customer')['name']}}</a>&nbsp; &nbsp;<a href="{{url('account/logout')}}">Đăng xuất</a>
                @endif
                <a href="{{url('cart')}}" class="cart-top">
                    Giỏ hàng<span class="cart-count">{{$numberProduct}}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="header-bottom clearfix hidden-xs hidden-sm">
        <div class="container">
            <div class="menu-center">
                <ul class="main-menu tp_menu clearfix">
                    <li class="">
                        <a class="tp_menu_item" href="{{url('/')}}">Trang chủ</a>
                    </li>
                    @php 
                      //load cap 1
                     $categories = DB::table("categories")->where("parent_id","=","0")->orderBy('id','desc')->get();
                    @endphp
                    @foreach($categories as $rows)
                     <li class="has-child">
                        <a href="{{url('products/categories/'.$rows->id)}}"><?php echo $rows->name; ?></a>
                         <ul class="child">
                                @php 
                                    //load cap 2
                                    $categoriesSub = DB::table("categories")->where("parent_id","=",$rows->id)->orderBy('id','desc')->get();
                                @endphp
                                @foreach($categoriesSub as $rowsSub)
                                    <li style="padding-left:20px;"><a href="{{url('products/categories/'.$rowsSub->id)}}">{{$rowsSub->name}}</a></li>
                                @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <li class="">
                        <a class="tp_menu_item" href="{{url('wishlist')}}">Sản phẩm yêu thích</a>
                    </li>
                    <li class="">
                        <a class="tp_menu_item" href="{{url('news')}}">Tin tức</a>
                    </li>
                    <li class="">
                        <a class="tp_menu_item" href="{{url('contact')}}">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="search-pc pull-right">
                <span>Tìm kiếm</span>
                <div class="search-bar">
                    <div class="container">
                        <form action="{{url('products/search')}}" class="search-top" method="get">
                            <div style="position: relative;">
                                <label>Tìm kiếm:</label>
                                <input type="text" name="searchkey" id="key" value="" placeholder="Nhập từ khóa tìm kiếm..."/>
                                <button type="submit" class="search-btn">Tìm kiếm</button>
                                <div class="smart-search">
                                  <ul>
                                  </ul>
                                </div>
                            </div>
                        </form>
                            <style type="text/css">
                            .smart-search img{width: 70px; margin-right: 5px;}
                            .smart-search{position: absolute; width: 100%; z-index: 1; display: none; max-height: 350px; overflow: scroll;}
                            .smart-search ul{padding:0px; margin:0px; list-style: none;}
                            .smart-search ul li{background: white; border-bottom: 1px solid #dddddd;}
                          </style>
                          <script type="text/javascript">
                            $(document).ready(function(){
                              $("#key").keyup(function(){
                                var strKey = $("#key").val();
                                strKey = strKey.trim();
                                if(strKey != ""){
                                  $(".smart-search").attr("style","display:block");
                                  //---
                                  $.ajax({
                                    url: "products/ajax/key="+strKey,
                                    success: function( result ) {
                                      $(".smart-search ul").empty();
                                      $(".smart-search ul").append(result);
                                    }
                                  });
                                  //---
                                }else
                                  $(".smart-search").attr("style","display:none");
                              });
                            });
                          </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="header-new tp_header visible-xs visible-sm">
        <div class="container clearfix ">
            <div class="header-container clearfix">
                <div class="clearfix">
                    <div class=" js-menu-mobile">
                        <div class="trigger-menu">
                            <a href="#boxMenu" class="three-bars-icon"></a>
                            <span class="text">menu</span>
                        </div>
                    </div>
                    <div class="logo">
                        <a href="#">
                            <img alt="Home" src="images/store_1548917977_950.png">
                        </a>
                    </div>
                    <div class="login-icon">
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="menu-top clearfix">
                        <div class="search">
                            <span class="ic-search"></span>
                        </div>
                    </div>
                    <div class="search-on-mobile">
                        <div class="inside">
                            <form action="/search" method="get">
                                @csrf
                                <input value="" name="q" id="input-search-mobile" type="text" placeholder="Tìm kiếm...">
                                <a href="#!" class="close-search-mobile">Đóng search</a>
                            </form>
                        </div>
                    </div>
                    <div class="cart-top">
                        <a href="{{url('cart')}}">
                            <img src="images/cart.png" width="18">
                            <span class="number-count">{{$numberProduct}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<script type="text/javascript">
  $(document).ready(function(){
  $(".item-quantity").click(function(){
      $( "#update_cart" ).trigger( "click" );
      });
  });
</script>
<div class="container">
  <form action="{{url('cart/update')}}" method="post">
    @csrf
  <div class="row">
    <div id="layout-page" class="col-md-12">
      <div class="main-title2 mb30">
        <h1>Giỏ hàng</h1>
      </div>
      <div id="cartformpage" class="pb30">
        <table class="cart cart-hidden">
          <thead>
            <tr>
              <th class="image">Hình ảnh</th>
              <th class="item">Tên sản phẩm</th>
              <th class="price">Giá bán lẻ</th>
              <th class="qty">Số lượng</th>
              <th class="remove">Xoá</th>
            </tr>
          </thead>
          <tbody>
            @foreach(Session('cart') as $product)
            <tr class="item">
              <td class="image">
                <div class="product_image">
                  <a href="{{asset('products/detail/'.$product['id'])}}">
                    <img class="lazyload" data-sizes="auto" src="{{asset('upload/products/'.$product['photo'])}}" data-src="{{asset('upload/products/'.$product['photo'])}}"/>
                  </a>
                </div>
              </td>
              <td class="item">
                <a href="{{asset('products/detail/'.$product['id'])}}">
                  <strong>{{$product['name']}}</strong>
                </a>
              </td>
              <td class="price">{{number_format($product['price'])}}₫</td>
              <td class="qty">
                <input type="number" id="quantity" min="1" class="item-quantity" value="{{$product['number']}}" name="product_{{$product['id']}}" required="Không thể để trống">
              </td>
              <td class="remove">
                <a href="{{asset('cart/delete/'.$product['id'])}}" rel="nofollow" class="cart remove_cart" ></a>
              </td>
            </tr>
            @endforeach
            @if(App\Cart::cartNumber() >0)
            <tr class="summary">
              <td class="image"></td>
              <td>
                  <a style="    width: 110px;display: block; line-height: 34px; margin-top: 10px;  background: #c6ab7f; color: #fff; text-transform: uppercase; float: left;" class="button-default" href="{{url('cart/destroy')}}" class="button pull-left" onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng')">Xóa toàn bộ</a>
                  <input id="update_cart" style="display: none; width:100px; margin-right: 10px; float: right; " type="submit" class="button-default" value="Cập nhật">
              </td>
              <td style="font-size: 20px; text-transform: uppercase;">Tổng tiền</td>
              <td class="price">
                <span class="total" style="font-size: 25px;">
                  <strong>{{number_format(App\Cart::cartTotal())}}₫</strong>
                </span>
              </td>
              <td>&nbsp;</td>
            </tr>
            @endif
          </tbody>
        </table>
        <div class="cart-buttons inner-right inner-left">
          <div class="buttons clearfix text-right">
            <button type="button" id="update-cart" class="button-default" name="update" onclick="location.href = '{{url('/')}}'">Tiếp tục mua sắm</button>
            @if(App\Cart::cartNumber() > 0)
            <button type="button" id="checkout" class="button-default" onclick="location.href = '{{url('cart/checkout')}}'">Thanh toán
            </button>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection
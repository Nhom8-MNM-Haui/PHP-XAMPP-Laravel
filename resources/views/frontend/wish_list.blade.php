@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="container">
  <div class="row">
    <div id="layout-page" class="col-md-12">
      <div class="main-title2 mb30">
        <h1>Sản phẩm yêu thích</h1>
      </div>
      <div id="cartformpage" class="pb30">
        <table class="cart cart-hidden">
          <thead>
            <tr>
              <th class="image">Hình ảnh</th>
              <th class="item">Tên sản phẩm</th>
              <th class="remove">Xoá</th>
            </tr>
          </thead>
          <tbody>
            @foreach(Session('wishlist') as $product)
            <tr class="item">
              <td class="image">
                <div class="product_image">
                  <a href="{{url('products/detail/'.$product['id'])}}">
                    <img class="lazyload" data-sizes="auto" src="{{asset('upload/products/'.$product["photo"])}}" data-src="{{asset('upload/products/'.$product["photo"])}}"/>
                  </a>
                </div>
              </td>
              <td class="item">
                <a href="{{url('products/detail/'.$product['id'])}}">
                  <strong>{{$product['name']}}</strong>
                </a>
              </td>
              <td class="remove">
                <a href="{{url('wishlist/delete/'.$product['id'])}}" rel="nofollow" class="cart remove_cart" ></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
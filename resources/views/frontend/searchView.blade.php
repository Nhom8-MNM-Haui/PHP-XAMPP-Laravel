@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div id="collection" class="tp_product_category">
  <div class="fix-breadcrumb">
    <ul class="breadcrumb&#x20;breadcrumb-arrow&#x20;hidden-sm&#x20;hidden-xs">
      <li>
        <h3 style="margin-bottom: 50px;">TÌM KIẾM</h3>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="product-lists clearfix select4">
        @foreach($data as $rows)
          <div class="product-item" style="position: relative;">
            <div style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;">{{$rows->discount}}%</div>
            <a href="{{url('wishlist/create/'.$rows->id)}}"><i style=" z-index: 1; position: absolute; width: 70px; color:black; right:-44px ; top:0px; font-size: 25px;" class="fa fa-heart" aria-hidden="true"></i></a>
            <div class="img">
              <a href="{{url('products/detail/'.$rows->id)}}">
                <img class="lazyload" data-sizes="auto" src="{{asset('upload/products/'.$rows->photo)}}" title="{{$rows->name}}" alt="{{$rows->name}}">
              </a>
            </div>
            <div class="info">
              <h3>
                <a class="tp_product_name" href="{{url('products/detail/'.$rows->id)}}">{{$rows->name}}</a>
              </h3>
              <div class="prices">
                <span style="text-decoration:line-through;" class="tp_product_price">{{number_format($rows->price)}}₫</span>
              </div>
              <div class="prices">
                <span class="tp_product_price">{{number_format($rows->price-($rows->price*$rows->discount)/100)}}₫</span>
              </div>
              <div style="text-align: center;">
                <p class="price-box"> <a href="{{url('products/rating/'.$rows->id.'/star=1')}}"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="{{url('products/rating/'.$rows->id.'/star=2')}}"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="{{url('products/rating/'.$rows->id.'/star=3')}}"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="{{url('products/rating/'.$rows->id.'/star=4')}}"><i class="fa fa-star" aria-hidden="true"></i></a> <a href="{{url('products/rating/'.$rows->id.'/star=5')}}"><i class="fa fa-star" aria-hidden="true"></i></a> </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="paginate text-center">
        {{$data->appends(request()->all())->render()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
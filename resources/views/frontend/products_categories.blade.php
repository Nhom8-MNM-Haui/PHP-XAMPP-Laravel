@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div id="collection" class="tp_product_category">
  <div class="fix-breadcrumb">
    <ul class="breadcrumb&#x20;breadcrumb-arrow&#x20;hidden-sm&#x20;hidden-xs">
      <li>
        <a href="index.html">Trang chủ</a>
      </li>
      <li>
        <span>Nam</span>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="clearfix filter-box">
        <div class="browse-tags pull-left">
          <span class="hidden">Sắp xếp theo:</span>
          <span class="custom-dropdown custom-dropdown--white">
            @php
                $vdefault = Request::get('sort') == 'default' ? 'selected' : '';
                $v1 = Request::get('sort') == 'priceAsc' ? 'selected' : '';
                $v2 = Request::get('sort') == 'priceDesc' ? 'selected' : '';
                $v3 = Request::get('sort') == 'nameAsc' ? 'selected' : '';
                $v4 = Request::get('sort') == 'nameDesc' ? 'selected' : '';
            @endphp
            <form action="{{url('products/categories/'.$category_id)}}" method="get" id="form-sort">
              <select class="sort-by custom-dropdown__select custom-dropdown__select--white input-sort" name="sort" >
                <option value="default" {{ $vdefault }}>Sắp xếp</option>
                <option value="priceAsc" {{ $v1 }}>Giá tăng dần</option>
                <option value="priceDesc" {{ $v2 }}>Giá giảm dần</option>
                <option value="nameAsc" {{ $v3 }}>Sắp xếp A-Z</option>
                <option value="nameDesc" {{ $v4 }}>Sắp xếp Z-A</option>
              </select>
            </form>
          </span>
        </div>
        <div class="product-filter filter-price pull-left tp_product_category_filter_price">
          <span class="filter-title">
            Lọc theo giá <i class="fa fa-angle-down"></i>
          </span>
          <div class="filter-container">
            <div class="clearfix">
              <form action="{{url('products/search')}}" class="search-top" method="get">
                <div class="widget_price_filter">
                 <ul class="list-group" style="border:0px;">
                    <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;
                      <input type="number" min="0" value="0" name="fromPrice" id="fromPrice" class="form-control" required />
                    </li>
                    <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="number" min="0" value="0" name="toPrice" id="toPrice" class="form-control" required/>
                    </li>
                    <li class="list-group-item" style="border:0px; text-align:center">
                    <button type="submit" class="search-btn">Tìm kiếm</button>
                    </li>
                  </ul>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
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
<script>
    $(function () {
        $('.input-sort').change(function () {
            $('#form-sort').submit();
        });
    });
</script>
@endsection
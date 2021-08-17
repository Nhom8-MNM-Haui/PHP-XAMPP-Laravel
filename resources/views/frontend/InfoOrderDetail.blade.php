@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-12">
    <h1 class="title-head" style="font-size: 18px; font-weight: bold; text-transform: uppercase;">Chi Tiết Đơn Hàng</h1> 
    <div style="margin-bottom:5px;">
        <input onclick="history.go(-1);" type="button" value="Back" class="btn btn-secondary">
    </div>    
    <div class="panel panel-warning">
        <div class="panel-heading">Orders detail</div>
        <div class="panel-body">
            <!-- thong tin don hang -->
            <table class="table">
                <tr>
                    <th style="width: 200px;">Họ tên người nhận</th>
                    <td>{{$order->name}}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Địa chỉ giao hàng</th>
                    <td>{{$order->address}}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Điện thoại</th>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Ngày đặt</th>
                    <td>{{$order->create_at}}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Ghi chú</th>
                    <td>{{$order->description}}</td>
                </tr>
                <tr>
                    <th style="width: 200px;">Trạng thái</th>
                    <td>
                        @if($order->status == 1)
                            <span class="label label-primary">Đã giao hàng</span>
                        @elseif($order->status == 3)
                            <span class="label label-danger">Đã hủy</span>
                        @else
                            <span class="label label-warning">Chưa giao hàng</span>
                        @endif
                    </td>
                </tr>
            </table>
            <!-- /thong tin -->
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Photo</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Number</th>
                </tr>
                @foreach($data as $rows)
                    @php 
                        $product = App\Account::modelGetProducts($rows->product_id);
                    @endphp
                <tr>
                    <td style="text-align: center;"><img src="{{asset('Upload/Products/'.$product->photo)}}" style="width:100px;"></td>
                    <td>{{$product->name}}</td>
                    <td style="text-align: center;">{{number_format($rows->price)}}₫</td>
                    <td style="text-align: center;">{{$rows->number}}</td>
                </tr>
                @endforeach
            </table>            
        </div>
    </div>
</div>
@endsection
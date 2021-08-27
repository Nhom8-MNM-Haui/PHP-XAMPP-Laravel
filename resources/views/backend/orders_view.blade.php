@extends("backend.layout")
@section("do-du-lieu")
<h1 class="mt-4">Quản lý đơn hàng</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="col-md-12">    
    <div class="panel panel-primary">
        <div class="panel-heading">List Orders</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>                  
                    <th style="width:150px; text-align: center;">Status</th>
                    <th style="width:150px;">Delivery</th>
                </tr>
                @foreach($listRecord as $rows)
                @php   
                    //lay ban ghi customer
                	$customer  = DB::table("customers")->where('id','=',$rows->customer_id)->first();
                @endphp
                 <tr>
                     <td>{{$customer->name}}</td>
                     <td>{{$customer->phone}}</td>
                     <td>
                        @php 
                        $date = Date_create($rows->create_at);
                        echo Date_format($date, "d/m/Y");
                        @endphp                           
                        </td>
                     <td style="text-align: center;">
                        @if($rows->status == 1)
                            <span class="label label-primary">Đã giao hàng</span>
                        @elseif($rows->status == 3)
                            <span class="label label-danger">Đã hủy</span>
                        @else
                            <span class="label label-warning">Chưa giao hàng</span>
                        @endif
                     </td>
                     <td style="text-align: center;">
                        <a href="{{ url('admin/orders/detail/'.$rows->id) }}" class="label label-success">Chi tiết</a>
                        @if($rows->status != 1&&$rows->status != 3)
                            <a href="{{ url('admin/orders/delivery/'.$rows->id) }}" class="label label-info">Giao hàng</a>
                        @endif
                     </td>
                 </tr>
                @endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            {{$listRecord->render()}}
        </div>
    </div>
</div>
@endsection
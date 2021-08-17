@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-12"> 
    <h1 class="title-head" style="font-size: 18px; font-weight: bold; text-transform: uppercase;">Đơn Hàng</h1>   
    <div class="panel panel-warning">
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
                        <a href="{{url('account/detail/'.$rows->id)}}" class="label label-success">Chi tiết</a>
                        @if($rows->status != 1&&$rows->status != 3)
                        <a href="{{url('account/removeOrders/'.$rows->id)}}" class="label label-success">Hủy đơn hàng</a>
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
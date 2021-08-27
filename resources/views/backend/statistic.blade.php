@extends("backend.layout")
@section("do-du-lieu")
<h1 class="mt-4">Thống kê</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
	<div class="col-lg-6 col-xl-3 mb-4">
		<div class="card bg-primary text-white h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div style="font-size: 20px;" class="me-3">
						<div class="text-white-75 small">Tổng số đơn hàng</div>
						<div class="text-lg fw-bold">{{$orderTotal}}</div>
					</div>
					<i style="font-size: 30px;" class="fab fa-first-order"></i>
				</div>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="#">View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xl-3 mb-4">
		<div class="card bg-warning text-white h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div style="font-size: 20px;" class="me-3">
						<div class="text-white-75 small">Thành viên</div>
						<div class="text-lg fw-bold">{{$customerTotal}}</div>
					</div>
					<i style="font-size: 30px;" class="fas fa-users"></i>
				</div>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="#">View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xl-3 mb-4">
		<div class="card bg-success text-white h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div style="font-size: 20px;" class="me-3">
						<div class="text-white-75 small">Sản phẩm</div>
						<div class="text-lg fw-bold">{{$productTotal}}</div>
					</div>
					<i style="font-size: 30px;" class="fab fa-product-hunt"></i>
				</div>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="#">View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xl-3 mb-4">
		<div class="card bg-danger text-white h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div style="font-size: 20px;" class="me-3">
						<div class="text-white-75 small">Đánh giá</div>
						<div class="text-lg fw-bold">{{$ratingTotal}}</div>
					</div>
					<i style="font-size: 30px;" class="far fa-star"></i>
				</div>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="#">View Details</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		List Orders
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form action="{{url('admin/statistic')}}" class="form-inline" method="get">
				<div class="form-group mb-2">
					<input type="date" class="form-control" name="fromDate" id="fromDate" >
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<input type="date" class="form-control" name="toDate" id="toDate" >
				</div>
				<button type="submit" class="btn btn-primary mb-2">Submit</button>
			</form>
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Date</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@if($data)
						@foreach($data as $rows)
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
                    <td>{{$rows->total}}₫</td>
                   <td style="text-align: center;">
                      @if($rows->status == 1)
                          <span class="label label-primary">Đã giao hàng</span>
                      @elseif($rows->status == 3)
                          <span class="label label-danger">Đã hủy</span>
                      @else
                          <span class="label label-warning">Chưa giao hàng</span>
                      @endif
                   </td>
               </tr>
              @endforeach
				</tbody>
			</table>
			{{$data->appends(request()->all())->render()}}
			@endif
		</div>
	</div>
</div>
@endsection
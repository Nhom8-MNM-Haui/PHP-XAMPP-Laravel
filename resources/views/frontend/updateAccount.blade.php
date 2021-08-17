@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="container">
	<h2 class="text-center">Cập nhật thông tin tài khoản</h2>
	<form action="{{url('account/update')}}" method="post" class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
		@csrf
		<table class="table profile" cellspacing="0">
			<tbody>
				<tr>
					<td>Địa chỉ email</td>
					<td class="val">{{isset($customer->email)?$customer->email:""}}</td>
				</tr>
				<tr>
					<td>Họ và tên</td>
					<td class="val">
						<input type="text" name="name" class="validate[required] form-control" value="{{isset($customer->name)?$customer->name:""}}">
					</td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td class="val">
						<input name="phone" type="text" class="validate[required] form-control" value="{{isset($customer->phone)?$customer->phone:""}}">
					</td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td class="val">
						<input type="text" name="address" class="validate[required] form-control" value="{{isset($customer->address)?$customer->address:""}}">
					</td>
				</tr>
				<tr>
					<td>

					</td>
					<td class="val">
						<button type="submit" class="btn btn-success">Cập nhật</button>
						<button class="btn btn-default" onclick="window.location.href='{{url('account/personal')}}'" style="background: #ccc;">Hủy</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
@endsection
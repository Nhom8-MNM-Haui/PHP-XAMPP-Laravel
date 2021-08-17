@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<main class="main-content" role="main">
		<div id="collection">
			<section class="signup_page" style="margin-top: 20px; margin-bottom: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div id="parent" class="row">
								<div id="a" class="col-xs-12 col-sm-12 col-lg-9">
									@if(session()->has('UpdateSuccessful'))
									<h4 style="text-align: center; color:red;">{{session('UpdateSuccessful')}}</h4>
									@endif
									<div class="page-title m992"><h1 class="title-head" style="font-size: 18px; font-weight: bold; padding-bottom: 7px; text-transform: uppercase">Thông tin tài khoản</h1>
									</div>
									<div class="form-signup m992"><p><strong>Xin chào <b style="color: #dc3333;">{{$customer->name}}</b>&nbsp;!</strong></p>
									</div>
									<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
										<div class="my-account">
											<div class="dashboard">
												<div class="recent-orders">
													<div class="table-responsive "style="overflow-x:auto;"><table class="table table-cart" id="my-orders-table">
														<thead class="thead-default">
															<tr>
																<th>Tên tài khoản</th>
																<th>Địa chỉ</th>
																<th>Email</th>
																<th>Điện thoại</th>
															</tr>
														</thead>
														<tbody>
															<tr class="first odd">
																<td>{{$customer->name}}</td>
																<td>{{$customer->address}}</td>
																<td>{{$customer->email}}</td>
																<td>{{$customer->phone}}</td>
															</tr>
														</tbody>
													</table>
													<a href="{{url('account/updateInfo')}}" class="btn btn-success" style="margin: 15px 0;">Cập nhật thông tin</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="b" class="col-xs-12 col-sm-12 col-lg-3">
								<div class="page-title mx991">
									<h1 class="title-head">Tài khoản</h1>
								</div>
								<div class="block-account" style="padding-top: 10px;">
									<div class="block-content form-signup">
										<p><a href="javascript:" class="text-primary" style="cursor: not-allowed;">Thông tin tài khoản</a></p>
										<p><a href="{{url('account/orders')}}" style="color: #000;">Quản lý đơn hàng</a></p>
										<p><a href="{{url('account/logout')}}" style="color: #000;">Đăng xuất</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>
@endsection
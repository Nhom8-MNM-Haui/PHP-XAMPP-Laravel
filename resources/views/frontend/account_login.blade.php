@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="template-customer">
    <div id="layout-page" class="bgfafafa">
        <div class="container">
        <div id="customer-login">
            <div id="login" class="userbox" style="display: block;">
                <div style="text-align: center;">
                    <h1>Đăng nhập</h1>
                    <p>
                    	@if(session()->has('success'))
	                    <p style="color:red;">{{session('success')}}</p>
	                	@elseif(session()->has('loginFail'))
	                	<p style="color:red;">{{session('loginFail')}}</p>
	                	@else
	                    <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
	                    @endif
	                </p>
                </div>
                <div class="large_form">        
                    <form method='post' action="{{url('account/loginPost')}}" class="f">
                    	@csrf
                        <ul>
                            <input type="hidden" name="csrf" value="47d3f9b2e5551283de34fc52a1a4a287-5027385159cb764a9762df61f170828e">
                            <li>
                                <input name="email" type="email" class="tb&#x20;validate&#x5B;required&#x5D;" id="username" placeholder="Email" value="">
                            </li>
                            <li>
                                <input name="password" type="password" class="tb&#x20;validate&#x5B;required&#x5D;" id="password" placeholder="M&#x1EAD;t&#x20;kh&#x1EA9;u" value="">
                            </li>
                            <li class="btns">
                                <input name="submit" type="submit" id="btnSubmit" class="htmlBtn&#x20;first" value="&#x0110;&#x0103;ng&#x20;nh&#x1EAD;p">
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="req_pass">
                    <a class="btn-more btn-register" href="#">Quên mật khẩu</a>
                    <a class="btn-more btn-register pull-right" href="{{url('account/register')}}" title="Đăng ký">Đăng ký</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
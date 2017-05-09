<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta name="viewreport">
	<title>Tài liệu công nghệ thông tin</title>
	<link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/glyphicons-halflings-regular.svg')}}">
    <link rel="stylesheet" href="{{asset('fonts/glyphicons-halflings-regular.ttf')}}">
    <link rel="stylesheet" href="{{asset('fonts/glyphicons-halflings-regular.woff')}}">
    <link rel="stylesheet" href="{{asset('fonts/glyphicons-halflings-regular.woff2')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="row" style="padding-top: 10px">
				<div class="col-md-3 col-xs-4">
					<a href='{{URL::to("/")}}' title="Trang chủ">
						<img src="" style="height: 70px;" /></a> <!-- alt="Khoaluan.vn - Thư viện tài liệu số trực tuyến"  -->
				</div>
				<div class="col-md-9 col-xs-8 no-padding" style="padding-top: 10px;">

					<div id="userControlHeader_SearchPanel" class="col-md-7 col-xs-7 search-panel-main">
						<div class="input-group">
							<div class="input-group-btn search-panel">
								<button style="height: 34px;" type="button" class="btn btn-default btn-primary dropdown-toggle" data-toggle="dropdown">
									<span id="search_concept">
										Tìm theo</span> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
								@foreach($categories as $category)
									<li><a href="" data-id="9bc0cb57-d4f9-4644-a957-023fb8bab662">{{$category->name}}</a></li>
								@endforeach
								</ul> 
							</div>
							<input type="hidden" name="ctl00$userControlHeader$hdfSearchParam" id="userControlHeader_hdfSearchParam" value="0" />
							<input type="hidden" name="ctl00$userControlHeader$hdfSearchParamName" id="userControlHeader_hdfSearchParamName" value="Bất kỳ" />
							<input name="ctl00$userControlHeader$txtSearch" type="text" id="userControlHeader_txtSearch" class="form-control" placeholder="Nhập từ khóa..." style="border: 0px;" />
							<span class="input-group-btn">
								<a id="userControlHeader_btnSearch" class="btn btn-default btn-primary" href="javascript:__doPostBack(&#39;ctl00$userControlHeader$btnSearch&#39;,&#39;&#39;)" style="height: 34px;"><span class="glyphicon glyphicon-search"></span></a>
							</span>
						</div>
					</div>
					<div>
						<div class="b-header-3">
						@if (Route::has('login'))
							@if (Auth::check())
                                <ul class="b-header-3__user pull-right">
                                    <li class="b-header-3__user-name pull-right">
                                        <a href="javascript:void(0)" class="b-header-3__user-link clearfix" title="Thông Tin Tài Khoản">
                                            <img width="34" height="34" class="b-header-3__user-avatar" src="{{asset('images/icons/avartar.png')}}" alt="Chia sẽ tài liệu công nghệ thông tin" />
                                            <ul class="b-header-3__user-text">
                                                <li class="b-header-3__user-text-name"><span class="b-header-3__user-short-name">Ho&#224;ng Ch&#237; C&#244;ng</span></li>
                                                <li class="b-header-3__user-text-account"><span>Tài khoản <span class="tk-hidden-md">&amp; Bộ sưu tập</span></span></li>
                                            </ul>
                                            <span class="caret b-header-3__caret"></span>
                                        </a>
                                        <div class="b-header-3__hover-box custom_hover_box">
                                            <ul class="b-header-3__user-dropdown arrow_top">
                                                <li id="dd-new-account" class="b-header-3__user-dropdown__item">
                                                    <div class="b-header-3__user-new-account" style="text-align: right;">
                                                        <a href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </div>
                                                </li>
                                                <li class="b-header-3__user-dropdown__item">
                                                        <a href="" title="Thông tin cá nhân" class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-user"></span>Thông tin cá nhân</a>
                                                        <a href="" title="Tải lên" class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-cloud-upload"></span>Tải lên</a>
                                                        <a href="" title="Tài liệu tải lên" class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-file"></span>Tài liệu tải lên</a>
                                                        <a href="" title="Danh sách đã tải" class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-cloud-download"></span>Danh sách đã tải</a>
                                                        <a href="" title="Danh sách đánh dấu" class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-heart"></span>Danh sách đánh dấu</a>
                                                    <div class="b-header-3__user-new-account" style="text-align: right;">  </div>
                                                    <a style="display: none;" href="" title="Điểm tải của bạn : " class="b-header-3__user-dropdown__link"><span class="glyphicon glyphicon-usd"></span>Điểm tải của bạn : 1000</a>
                                                </li>
                                            </ul>
                                            </div>
                                    </li>
                                </ul>
							@else
							<ul class="b-header-3__user pull-right">
								<li class="b-header-3__user-name pull-right">
									<a href="{{ url('/login') }}" class="b-header-3__user-link clearfix" title="Thông Tin Tài Khoản">
										<img width="34" height="34" class="b-header-3__user-avatar" src="{{asset('images/icons/avartar.png')}}" /><!-- alt="Khoaluan.vn - Thư viện tài liệu số trực tuyến"  -->
										<ul class="b-header-3__user-text">
											<li class="b-header-3__user-text-name"><span class="b-header-3__user-short-name">Đăng nhập</span></li>
											<li class="b-header-3__user-text-account"><span>Tài khoản <span class="tk-hidden-md">&amp; Bộ sưu tập</span></span></li>
										</ul>
										<span class="caret b-header-3__caret"></span>
									</a>
<!--									<div class="b-header-3__hover-box custom_hover_box">
										<ul class="b-header-3__user-dropdown arrow_top">
											<li id="dd-new-account" class="b-header-3__user-dropdown__item">
												<div id="socialLoginList">
													<a href="{{ url('/login') }}" class="loginList">Đăng nhập</a>
													<button type="submit" class="loginList btn_Google" name="provider" value="Google"
														title="Đăng nhập bằng tài khoản Google của bạn.">
													</button>
													<button type="submit" class="loginList btn_Facebook" name="provider" value="Facebook"
														title="Đăng nhập bằng tài khoản Facebook của bạn.">
													</button>
												</div>
												<div class="b-header-3__user-new-account">
													Khách hàng mới? 
												<a href="danh-muc_bai-giang-dien-tu.htm#" data-toggle="modal" data-target=".modalRegister" title="Tạo tài khoản mới">Tạo tài khoản</a>
												</div>
												<div class="b-header-3__user-new-account">
													Quên mật khẩu?                                                    
												<a href="danh-muc_bai-giang-dien-tu.htm#" data-toggle="modal" data-target=".modalForgotPassword" title="Quên mật khẩu">Cấp lại mật khẩu</a>
												</div>
											</li>
											<li class="b-header-3__user-dropdown__item"></li>
										</ul>
									</div>-->
								</li>
							</ul>
							@endif
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid no-padding">
			@include('user.layouts.navbar')
		</div>
	</div>

	<!-- left-bar -->
	<div class="container">
		<div class="row">
			<div class="container advertisement col-thin">
				<a href="dut_khoaluan_default.html#" title="">
				<img width="100%" src="{{asset('images/banner.jpg')}}"/>
				</a>
			</div>
			<div class="container" style="padding-top: 10px;">
				
				<div class="row">
					<!-- left-bar -->
                                        <div class="box mini-navigation main-category clearfix col-md-3 col-xs-4 col-thin">
					@yield('sidebar')
                                        </div>
					<!-- content -->
					@yield('content')
				</div>
			</div>
		</div>
	</div>
    
     <!-- jQuery 2.1.4 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    @yield('scripts')
</body>
</html>

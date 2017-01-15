<div class="page-header-top">
	<div class="container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
				<img src="{{ asset('public/assets/img/logo-default.jpg') }}" alt="logo" class="logo-default">
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler"></a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user dropdown-dark">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					@if (Auth::user()->photo)
						<img src="{{ asset('public/uploads/user/'.Auth::user()->photo) }}" class="img-circle" alt=""> 
					@else
						<img src="{{ asset('public/assets/img/no_image_profile.jpg') }}" class="img-circle" alt="">
					@endif
						<span class="username username-hide-mobile">{{ Auth::user()->name }}</span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ route('pages.setting') }}">
								<i class="fa fa-user"></i> Thông tin tài khoản 
							</a>
						</li>
						<li>
							<a href="javascript:void(0)"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-key"></i> Đăng xuất 
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
</div>
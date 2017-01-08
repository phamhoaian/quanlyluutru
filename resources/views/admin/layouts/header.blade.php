<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner ">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
				<img src="{{ asset('public/assets/img/logo-admin.png') }}" alt="logo" class="logo-default" /> 
			</a>
			<div class="menu-toggler sidebar-toggler">
				<span></span>
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			<span></span>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<span class="badge badge-default"> 7 </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>
								<span class="bold">12 thông báo mới</span>
							</h3>
							<a href="{{ url('/quan-ly/thong-bao') }}">xem tất cả</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								<li>
									<a href="javascript:;">
										<span class="time">just now</span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
											<i class="fa fa-plus"></i>
										</span> New user registered. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<span class="time">3 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
										</span> Server #12 overloaded. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<span class="time">10 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-warning">
											<i class="fa fa-bell-o"></i>
										</span> Server #2 not responding. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<span class="time">14 hrs</span>
										<span class="details">
										<span class="label label-sm label-icon label-info">
											<i class="fa fa-bullhorn"></i>
										</span> Application error. </span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					@if (Auth::user()->photo)
						<img src="{{ asset('resources/upload/user/'.$user->id.'_150.'.$user->photo) }}" class="img-circle" alt="" width="30"> 
					@else
						<img src="{{ asset('public/assets/img/no_image_profile.jpg') }}" class="img-circle" alt="" width="30">
					@endif
						<span class="username username-hide-on-mobile">{{ Auth::user()->name }}</span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ route('admin.user.edit', Auth::id()) }}">
								<i class="icon-user"></i> Thông tin tài khoản
							</a>
						</li>
						<li>
							<a href="javascript:void(0)"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> Đăng xuất 
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
	<!-- END HEADER INNER -->
</div>
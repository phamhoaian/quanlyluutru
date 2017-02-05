<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner ">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{ route('admin.top') }}">
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
						<span class="badge badge-default">@if (isset($count_notices) && $count_notices) {{ $count_notices }} @endif</span>
					</a>
					@if (isset($notices) && $notices)
					<ul class="dropdown-menu">
						<li class="external">
							<h3>
								<span class="bold">{{ $count_notices }} thông báo mới</span>
							</h3>
							<a href="{{ route('admin.notice') }}">xem tất cả</a>
						</li>
						<li>						
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								@foreach ($notices as $notice)
								<li>
									<a href="{{ route('admin.notice.link', $notice->id) }}">
										<span class="time">{{ \CarBon\CarBon::parse($notice->created_at)->diffForHumans() }}</span>
										<span class="details">
										@if ($notice->type == 2)
											<span class="label label-sm label-icon label-warning">
												<i class="fa fa-plus"></i>
										@elseif ($notice->type == 3)
											<span class="label label-sm label-icon label-info">
												<i class="fa fa-bullhorn"></i>
										@elseif ($notice->type == 4)
											<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
										@else
											<span class="label label-sm label-icon label-success">
												<i class="fa fa-bell-o"></i>
										@endif
										</span>{{ $notice->message }}</span>
									</a>
								</li>
								@endforeach
							</ul>

						</li>
					</ul>
					@endif
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					@if (Auth::user()->photo)
						<img src="{{ asset('public/uploads/user/'.Auth::user()->photo) }}" class="img-circle" alt="" width="30"> 
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
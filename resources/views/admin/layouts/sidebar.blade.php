<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler">
					<span></span>
				</div>
			</li>
			<!-- END SIDEBAR TOGGLER BUTTON -->
			<li class="nav-item start {{ Request::segment('2') == 'tong-quan' ? 'active' : false }}">
				<a href="{{ url('/quan-ly/tong-quan') }}" class="nav-link nav-toggle">
					<i class="icon-home"></i>
					<span class="title">Tổng quan</span>
					<span class="selected"></span>
				</a>
			</li>
			<li class="nav-item {{ Request::segment('2') == 'nha-nghi-khach-san' ? 'active' : false }}">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-diamond"></i>
					<span class="title">Nhà nghỉ / khách sạn</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item {{ (Request::segment('2') == 'nha-nghi-khach-san' && Request::segment('3') == 'danh-sach') ? 'active' : false }}">
						<a href="{{ url('/quan-ly/nha-nghi-khach-san/danh-sach') }}" class="nav-link ">
							<i class="icon-list"></i>&nbsp;
							<span class="title">Danh sách</span>
						</a>
					</li>
					<li class="nav-item {{ (Request::segment('2') == 'nha-nghi-khach-san' && Request::segment('3') == 'them-moi') ? 'active' : false }}">
						<a href="{{ url('/quan-ly/nha-nghi-khach-san/them-moi') }}" class="nav-link ">
							<i class="icon-plus"></i>&nbsp;
							<span class="title">Thêm mới</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item {{ (Route::currentRouteName() == 'admin.search.form' || Route::currentRouteName() == 'admin.counting.form') ? 'active' : false }}">
				<a href="javascript:void()" class="nav-link nav-toggle">
					<i class="icon-layers"></i>
					<span class="title">Tra cứu thông tin</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item {{ Route::currentRouteName() == 'admin.search.form' ? 'active' : false }}">
						<a href="{{ route('admin.search.form') }}" class="nav-link ">
							<i class="fa fa-search"></i>&nbsp;
							<span class="title">Tìm kiếm</span>
						</a>
					</li>
					<li class="nav-item {{ Route::currentRouteName() == 'admin.counting.form' ? 'active' : false }}">
						<a href="{{ route('admin.counting.form') }}" class="nav-link ">
							<i class="icon-bar-chart"></i>&nbsp;
							<span class="title">Thống kê</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item {{ Request::segment('2') == 'tai-khoan' ? 'active' : false }}">
				<a href="#" class="nav-link nav-toggle">
					<i class="icon-users"></i>
					<span class="title">Tài khoản</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item {{ (Request::segment('2') == 'tai-khoan' && Request::segment('3') == 'danh-sach') ? 'active' : false }}">
						<a href="{{ route('admin.user.list') }}" class="nav-link ">
							<i class="icon-list"></i>&nbsp;
							<span class="title">Danh sách</span>
						</a>
					</li>
					<li class="nav-item {{ (Request::segment('2') == 'tai-khoan' && Request::segment('3') == 'them-moi') ? 'active' : false }}">
						<a href="{{ route('admin.user.add') }}" class="nav-link ">
							<i class="icon-plus"></i>&nbsp;
							<span class="title">Thêm mới</span>
						</a>
					</li>
				</ul>
			</li>
			{{-- <li class="nav-item {{ Request::segment('2') == 'thiet-lap' ? 'active' : false }}">
				<a href="{{ url('/quan-ly/thiet-lap') }}" class="nav-link nav-toggle">
					<i class="icon-settings"></i>
					<span class="title">Thiết lập</span>
				</a>
			</li> --}}
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>
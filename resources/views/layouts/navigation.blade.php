<div class="page-header-menu">
	<div class="container">
		<!-- BEGIN MEGA MENU -->
		<div class="hor-menu  ">
			<div class="nav navbar-nav">
				<li class="{{ Route::currentRouteName() == 'pages.top' ? 'active' : '' }}">											
					<a href="{{ route('pages.top') }}">
						<i class="fa fa-home"></i>
						Tổng quan
					</a>
				</li>
				<li class="{{ Route::currentRouteName() == 'pages.staying' ? 'active' : '' }}">
					<a href="{{ route('pages.staying') }}">
						<i class="fa fa-calendar-plus-o"></i>
						Khai báo lưu trú
					</a>
				</li>
				<li class="{{ Route::currentRouteName() == 'pages.setting' ? 'active' : '' }}">
					<a href="{{ route('pages.setting') }}">
						<i class="fa fa-cog"></i>
						Thiết lập thông tin
					</a>
				</li>
			</div>
		</div>
		<!-- END MEGA MENU -->
	</div>
</div>
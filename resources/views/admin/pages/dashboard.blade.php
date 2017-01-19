@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('public/assets/plugins/morris/morris.css') }}">
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('public/assets/scripts/chart.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="1349">1349</span>
                </div>
                <div class="desc"> New Feedbacks </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="12,5">12,5</span>M$ </div>
                <div class="desc"> Total Profit </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="549">549</span>
                </div>
                <div class="desc"> New Orders </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> +
                    <span data-counter="counterup" data-value="89">89</span>% </div>
                <div class="desc"> Brand Popularity </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-share font-dark hide"></i>
					<span class="caption-subject font-blue bold uppercase">Thống kê</span>
				</div>
				<div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn blue btn-outline btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">Ngày</label>
                        <label class="btn red btn-outline btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Tuần</label>
                        <label class="btn green btn-outline btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Tháng</label>
                    </div>
                </div>
			</div>
			<div class="portlet-body">
				<div id="summary_analytics"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-share font-dark hide"></i>
					<span class="caption-subject font-blue bold uppercase">Hoạt động gần đây</span>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="feeds">
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-info">
										<i class="fa fa-check"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 4 pending tasks.
										<span class="label label-sm label-warning "> Take action
											<i class="fa fa-share"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> Just now </div>
						</div>
					</li>
					<li>
						<a href="javascript:;">
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bar-chart-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc"> Finance Report for year 2013 has been released. </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date"> 20 mins </div>
							</div>
						</a>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-danger">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 5 pending membership that requires a quick review. </div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 24 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-info">
										<i class="fa fa-shopping-cart"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> New order received with
										<span class="label label-sm label-success"> Reference Number: DR23923 </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 30 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-success">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 5 pending membership that requires a quick review. </div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 24 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-default">
										<i class="fa fa-bell-o"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> Web server hardware needs to be upgraded.
										<span class="label label-sm label-default "> Overdue </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 2 hours </div>
						</div>
					</li>
					<li>
						<a href="javascript:;">
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-briefcase"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc"> IPO Report for year 2013 has been released. </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date"> 20 mins </div>
							</div>
						</a>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-info">
										<i class="fa fa-check"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 4 pending tasks.
										<span class="label label-sm label-warning "> Take action
											<i class="fa fa-share"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> Just now </div>
						</div>
					</li>
					<li>
						<a href="javascript:;">
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger">
											<i class="fa fa-bar-chart-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc"> Finance Report for year 2013 has been released. </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date"> 20 mins </div>
							</div>
						</a>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-default">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 5 pending membership that requires a quick review. </div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 24 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-info">
										<i class="fa fa-shopping-cart"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> New order received with
										<span class="label label-sm label-success"> Reference Number: DR23923 </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 30 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-success">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> You have 5 pending membership that requires a quick review. </div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 24 mins </div>
						</div>
					</li>
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
									<div class="label label-sm label-warning">
										<i class="fa fa-bell-o"></i>
									</div>
								</div>
								<div class="cont-col2">
									<div class="desc"> Web server hardware needs to be upgraded.
										<span class="label label-sm label-default "> Overdue </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date"> 2 hours </div>
						</div>
					</li>
					<li>
						<a href="javascript:;">
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-briefcase"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc"> IPO Report for year 2013 has been released. </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date"> 20 mins </div>
							</div>
						</a>
					</li>
				</ul>
				<div class="scroller-footer">
					<div class="btn-arrow-link pull-right">
						<a href="javascript:;">Xem tất cả</a>
						<i class="icon-arrow-right"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
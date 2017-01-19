@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('public/assets/plugins/morris/morris.css') }}">
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('public/admin/scripts/dashboard.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="icon-home"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $motel_count }}">{{ $motel_count }}</span>
                </div>
                <div class="desc">Nhà nghỉ</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-building"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $hotel_count }}">{{ $hotel_count }}</span>
                </div>
                <div class="desc">Khách sạn</div>
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
                            <input type="radio" name="type" class="toggle" value="day">Ngày</label>
                        <label class="btn red btn-outline btn-circle btn-sm">
                            <input type="radio" name="type" class="toggle" value="week">Tuần</label>
                        <label class="btn green btn-outline btn-circle btn-sm">
                            <input type="radio" name="type" class="toggle" value="month">Tháng</label>
                    </div>
                </div>
			</div>
			<div class="portlet-body">
				<div id="site_statistics_loading" style="display: none;">
                	<img src="{{ asset('public/assets/img/loading.gif') }}" alt="loading"> 
                </div>
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
			@if ($notices)
				<ul class="feeds">
					@foreach ($notices as $notice)
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
								@if ($notice->type == 2)
									<div class="label label-sm label-warning">
										<i class="fa fa-plus"></i>
									</div>
								@elseif ($notice->type == 3)
									<div class="label label-sm label-info">
										<i class="fa fa-bullhorn"></i>
									</div>
								@elseif ($notice->type == 4)
									<div class="label label-sm label-danger">
										<i class="fa fa-bolt"></i>
									</div>
								@else
									<div class="label label-sm label-success">
										<i class="fa fa-bell-o"></i>
									</div>
								@endif
								</div>
								<div class="cont-col2">
									<div class="desc">
										<a href="{{ route('admin.notice.link', $notice->id) }}">
											{{ $notice->message }}
											@if ( ! $notice->read_flg)
											<span class="label label-sm label-info"> Mới
												<i class="fa fa-share"></i>
											</span>
											@endif
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col2">
							<div class="date">{{ \CarBon\CarBon::parse($notice->created_at)->diffForHumans() }}</div>
						</div>
					</li>
					@endforeach
				</ul>
				<div class="scroller-footer">
					<div class="btn-arrow-link pull-right">
						<a href="{{ route('admin.notice') }}">Xem tất cả</a>
						<i class="icon-arrow-right"></i>
					</div>
				</div>
			@else
			<p>Không có thông báo nào</p>
			@endif
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = '{{ url('/') }}';
</script>
@endsection
@extends('layouts.master')

@section('js')
<script src="{{ asset('public/assets/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>		
<script src="{{ asset('public/front/scripts/dashboard.js') }}" type="text/javascript"></script>		
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12">
		<!-- BEGIN PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-dark hide"></i>
					<span class="caption-subject font-green-jungle bold uppercase">Thống kê</span>
				</div>
				<div class="actions">
					<div class="btn-group btn-group-devided" data-toggle="buttons">
						<label class="btn blue btn-outline btn-circle btn-sm active">
							<input type="radio" name="type" class="toggle" value="day">Ngày
						</label>
						<label class="btn red btn-outline btn-circle btn-sm">
							<input type="radio" name="type" class="toggle" value="week">Tuần
						</label>
						<label class="btn green btn-outline btn-circle btn-sm">
							<input type="radio" name="type" class="toggle" value="month">Tháng
						</label>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div id="site_statistics_loading">
					<img src="{{ asset('public/assets/img/loading.gif') }}" alt="loading" /> </div>
				<div id="site_statistics_content" class="display-none">
					<div id="site_statistics" class="chart"> </div>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
</div>
@endsection
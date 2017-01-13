@extends('admin.layouts.master')

@section('breadcrumb', 'Thông báo')
@section('page-title', 'Thông báo')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title tabbable-line">
				<div class="caption caption-md">
					<i class="icon-globe theme-font hide"></i>
					<span class="caption-subject font-blue-madison bold uppercase">Danh sách thông báo</span>
				</div>
			</div>
			<div class="portlet-body">
			@if ($notice)
				<ul class="feeds">
				@foreach ($notice as $row)
					<li>
						<div class="col1">
							<div class="cont">
								<div class="cont-col1">
								@if ($row->type == 2)
									<div class="label label-sm label-warning">
										<i class="fa fa-plus"></i>
									</div>
								@elseif ($row->type == 3)
									<div class="label label-sm label-info">
										<i class="fa fa-bullhorn"></i>
									</div>
								@elseif ($row->type == 4)
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
										<a href="{{ route('admin.notice.link', $row->id) }}">
											{{ $row->message }}
											@if ( ! $row->read_flg)
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
							<div class="date">{{ \CarBon\CarBon::parse($row->created_at)->diffForHumans() }}</div>
						</div>
					</li>
				@endforeach
				</ul>
				<div class="text-right margin-top-20">
					{!! $notice->render() !!}
					</ul>
				</div>
			@else
			<p>Không có thông báo nào</p>
			@endif
			</div>
		</div>
	</div>
</div>
@endsection
@extends('admin.layouts.master')

@section('breadcrumb', 'Thông tin')
@section('page-title', 'Thông tin lưu trú')
@section('title', 'Thông tin lưu trú')

@section('css')
<link href="{{ asset('public/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/table-datatables-managed.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div id="hotel_list">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green-jungle">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-building"></i>{{ $staying_title }}
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover order-column" id="list_hotels">
						<thead>
							<tr>
								<th> Tên nhà nghỉ / khách sạn </th>
								<th> Tên chủ cơ sở </th>
								<th> Loại hình kinh doanh </th>
								<th> Địa chỉ </th>
							</tr>
						</thead>
						<tbody>
						@if ($hotels)
							@foreach ($hotels as $hotel)
							<tr class="odd gradeX">
								<td>{{ $hotel['hotel_name'] }}</td>
								<td>
								@if (isset($hotel['owner_name']))
									{{ $hotel['owner_name'] }}
								@endif
								</td>
								<td class="text-center">
								@if ($hotel['type'] == 1)
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								@else
									<span class="label label-sm label-success"> Khách sạn </span>
								@endif
								</td>
								<td class="center">{{ $hotel['address'] }}</td>
							</tr>
							@endforeach
						@else
							<tr class="odd gradeX">
								<td colspan="6">Không có dữ liệu.</td>
							</tr>
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
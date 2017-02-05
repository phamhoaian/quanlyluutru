@extends('admin.layouts.master')

@section('breadcrumb', 'Danh sách nhà nghỉ / khách sạn')
@section('page-title', 'Quản lý nhà nghỉ / khách sạn')
@section('title', 'Danh sách nhà nghỉ / khách sạn')

@section('css')
<link href="{{ asset('public/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/table-datatables-managed.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="table-toolbar">
		<div class="col-md-6">
			<div class="btn-group">
			<a href="{{ route('admin.hotel.add') }}">
				<button class="btn sbold green"> Thêm mới
					<i class="fa fa-plus"></i>
				</button>
			</a>
			</div>
		</div>
	</div>
</div>
<div id="hotel_list">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-body">
					@if (Session::has('flash_message'))
					<div class="flash-message">
						<div class="row">
							<div class="col-lg-12">
			                    <div class="alert alert-{!! Session::get('flash_level') !!} alert-dismissable">
			                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			                        {!! Session::get('flash_message') !!}
			                    </div>
				            </div>
						</div>
					</div>
		            @endif
					<table class="table table-striped table-bordered table-hover order-column" id="list_hotels">
						<thead>
							<tr>
								<th> Tên nhà nghỉ / khách sạn </th>
								<th> Tên chủ cơ sở </th>
								<th> Loại hình kinh doanh </th>
								<th> Địa chỉ </th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@if ($hotels)
							@foreach ($hotels as $hotel)
							<tr class="odd gradeX">
								<td>{{ $hotel->name }}</td>
								<td>
								@if (isset($hotel->owner))
									{{ $hotel->owner->name }}
								@endif
								</td>
								<td class="text-center">
								@if ($hotel->type == 1)
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								@else
									<span class="label label-sm label-success"> Khách sạn </span>
								@endif
								</td>
								<td class="center">{{ $hotel->address }}</td>
								<td class="text-center">
									<a href="{{ route('admin.hotel.edit', $hotel->id) }}" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Xem thông tin
									</a>
								</td>
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
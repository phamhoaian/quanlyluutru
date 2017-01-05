@extends('admin.layouts.master')

@section('breadcrumb', 'Danh sách tài khoản')
@section('page-title', 'Quản lý tài khoản')
@section('menu-active', 'user')

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
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a href="{{ route('admin.user.add') }}">
									<button class="btn sbold green"> Thêm mới
										<i class="fa fa-plus"></i>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="list_users">
					<thead>
						<tr>
							<th>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="group-checkable" data-set="#list_users .checkboxes" />
									<span></span>
								</label>
							</th>
							<th> Nhà nghỉ / khách sạn </th>
							<th> Email </th>
							<th> Trạng thái </th>
							<th> Đăng nhập lần cuối </th>
							<th class="text-center"> Hành động </th>
						</tr>
					</thead>
					<tbody>
					@if ($users)
						@foreach ($users as $user)
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="{{ $user->id }}" />
									<span></span>
								</label>
							</td>
							<td>{{ $user->name }}</td>
							<td>
								<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
							</td>
							<td>
							@if ($user->active_flg)
								<span class="label label-sm label-info"> Hoạt động </span>
							@else
								<span class="label label-sm label-danger"> Khóa </span>
							@endif
							</td>
							<td class="center">{{ \Carbon\Carbon::parse($user->last_login)->format('H:i:s d/m/Y') }}</td>
							<td class="text-center">
								<a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Xem thông tin
								</a>
								<a href="javascript:void(0);" class="btn btn-xs yellow">
									<i class="fa fa-lock"></i>
									Khóa
								</a>
								<a href="javascript:void(0)" class="btn btn-xs red">
									<i class="fa fa-trash"></i>
									Xóa
								</a>
							</td>
						</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
	</div>
</div>
@endsection
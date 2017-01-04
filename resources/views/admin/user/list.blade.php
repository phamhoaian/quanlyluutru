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
								<button id="sample_editable_1_new" class="btn sbold green"> Thêm mới
									<i class="fa fa-plus"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
					<thead>
						<tr>
							<th>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> shuxer </td>
							<td>
								<a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-info"> Hoạt động </span>
							</td>
							<td class="center"> 12 Jan 2012 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> looper </td>
							<td>
								<a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-danger"> Khóa </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> userwow </td>
							<td>
								<a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
							</td>
							<td>
								<span class="label label-sm label-info"> Hoạt động </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
								</a>
								<a href="javascript:void(0);" class="btn btn-xs yellow">
									<i class="fa fa-lock"></i>
									Khóa
								</a>
								<a href="javascript:void(0)" class="btn btn-xs red">
									<i class="fa fa-trash"></i>
									Xóa
								</a>
									</ul>
								</div>
							</td>
						</tr>
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> user1wow </td>
							<td>
								<a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-danger"> Khóa </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> restest </td>
							<td>
								<a href="mailto:userwow@gmail.com"> test@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-info"> Hoạt động </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> foopl </td>
							<td>
								<a href="mailto:userwow@gmail.com"> good@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-info"> Hoạt động </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> weep </td>
							<td>
								<a href="mailto:userwow@gmail.com"> good@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-danger"> Khóa </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> coop </td>
							<td>
								<a href="mailto:userwow@gmail.com"> good@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-info"> Hoạt động </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
						<tr class="odd gradeX">
							<td>
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" value="1" />
									<span></span>
								</label>
							</td>
							<td> pppol </td>
							<td>
								<a href="mailto:userwow@gmail.com"> good@gmail.com </a>
							</td>
							<td>
								<span class="label label-sm label-danger"> Khóa </span>
							</td>
							<td class="center"> 12.12.2011 </td>
							<td class="text-center">
								<a href="#" class="btn btn-xs blue">
									<i class="fa fa-edit"></i>
									Chỉnh sửa
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
					</tbody>
				</table>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
	</div>
</div>
@endsection
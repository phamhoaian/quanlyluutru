@extends('admin.layouts.master')

@section('breadcrumb', 'Danh sách nhà nghỉ / khách sạn')
@section('page-title', 'Quản lý nhà nghỉ / khách sạn')

@section('css')
<link href="{{ asset('public/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin/scripts/hotel.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="table-toolbar">
		<div class="col-md-6">
			<div class="btn-group">
				<button id="sample_editable_1_new" class="btn sbold green"> Thêm mới
					<i class="fa fa-plus"></i>
				</button>
			</div>
		</div>
		<div class="col-md-6">
			<div class="btn-group pull-right">
				<a href="#" id="list" class="btn btn-default md-skip">
					<i class="fa fa-th-list fa-2"></i>
				</a>
				<a href="#" id="grid" class="btn btn-default md-skip active">
					<i class="fa fa-th-large fa-2"></i>
				</a>
			</div>
		</div>
	</div>
</div>
<div id="hotel_grid">
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item grid-item">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<span class="caption-subject font-green-sharp uppercase">Nhà nghỉ Ánh Ngọc</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-2 mt-overlay-2-grey">
									<img src="../assets/assets/img/03.jpg">
									<div class="mt-overlay">
										<h2>Nhà nghỉ Ánh Ngọc</h2>
										<a class="mt-info btn default btn-outline" href="#">Xem thông tin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="pagination pull-right">
				<li>
					<a href="javascript:;">
						<i class="fa fa-angle-left"></i>
					</a>
				</li>
				<li>
					<a href="javascript:;"> 1 </a>
				</li>
				<li>
					<a href="javascript:;"> 2 </a>
				</li>
				<li class="active">
					<a href="javascript:;"> 3 </a>
				</li>
				<li>
					<a href="javascript:;"> 4 </a>
				</li>
				<li>
					<a href="javascript:;"> 5 </a>
				</li>
				<li>
					<a href="javascript:;"> 6 </a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-angle-right"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="hotel_list" class="hidden">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th>
									<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
										<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
										<span></span>
									</label>
								</th>
								<th> Tên nhà nghỉ / khách sạn </th>
								<th> Tên chủ cơ sở </th>
								<th> Loại hình kinh doanh </th>
								<th> Địa chỉ </th>
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
								<td> Nhà nghỉ Ánh Hồng </td>
								<td>
									Phạm Văn A
								</td>
								<td>
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								</td>
								<td class="center"> 174/3 Khu phố 2 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Khách sạn Anh Kiệt </td>
								<td>
									Nguyễn Văn B
								</td>
								<td>
									<span class="label label-sm label-success"> Khách sạn </span>
								</td>
								<td class="center"> 123/4 Khu phố 1 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Nhà nghỉ Ánh Hồng </td>
								<td>
									Phạm Văn A
								</td>
								<td>
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								</td>
								<td class="center"> 174/3 Khu phố 2 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Khách sạn Anh Kiệt </td>
								<td>
									Nguyễn Văn B
								</td>
								<td>
									<span class="label label-sm label-success"> Khách sạn </span>
								</td>
								<td class="center"> 123/4 Khu phố 1 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Nhà nghỉ Ánh Hồng </td>
								<td>
									Phạm Văn A
								</td>
								<td>
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								</td>
								<td class="center"> 174/3 Khu phố 2 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Khách sạn Anh Kiệt </td>
								<td>
									Nguyễn Văn B
								</td>
								<td>
									<span class="label label-sm label-success"> Khách sạn </span>
								</td>
								<td class="center"> 123/4 Khu phố 1 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Nhà nghỉ Ánh Hồng </td>
								<td>
									Phạm Văn A
								</td>
								<td>
									<span class="label label-sm label-info"> Nhà nghỉ </span>
								</td>
								<td class="center"> 174/3 Khu phố 2 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
								<td> Khách sạn Anh Kiệt </td>
								<td>
									Nguyễn Văn B
								</td>
								<td>
									<span class="label label-sm label-success"> Khách sạn </span>
								</td>
								<td class="center"> 123/4 Khu phố 1 </td>
								<td class="text-center">
									<a href="#" class="btn btn-xs blue">
										<i class="fa fa-edit"></i>
										Chỉnh sửa
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
		</div>
	</div>
</div>
@endsection
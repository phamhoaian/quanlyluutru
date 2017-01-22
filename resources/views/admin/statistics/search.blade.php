@extends('admin.layouts.master')

@section('breadcrumb', 'Tìm kiếm')
@section('page-title', 'Tìm kiếm')

@section('css')
<link href="{{ asset('public/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/blockui/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/table-datatables-ajax.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-settings font-green"></i>
					<span class="caption-subject bold uppercase font-green"> Danh sách khách lưu trú</span>
				</div>
				<div class="pull-right">
					<button type="button" class="btn blue mt-ladda-btn ladda-button" data-style="expand-right">
						<span class="ladda-label">
							<i class="fa fa-print"></i> 
							&nbsp;In</span>
					</button>
					<button type="button" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-right">
						<span class="ladda-label">
							<i class="fa fa-file-excel-o"></i> 
							&nbsp;Xuất ra Excel</span>
					</button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="search">
					<thead>
						<tr role="row" class="heading">
							<th> Tên nhà nghỉ/khách sạn </th>
							<th> Họ và tên </th>
							<th> Năm sinh </th>
							<th> Nam/nữ </th>
							<th> Số CMND </th>
							<th> Hộ khẩu thường trú </th>
							<th> Phòng số </th>
							<th> Thời gian vào </th>
							<th> Thời gian ra </th>
						</tr>
						<tr role="row" class="filter">
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_customer_name" placeholder="Tìm theo tên nhà nghỉ/khách sạn">
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_customer_name" placeholder="Tìm theo tên khách">
							</td>
							<td></td>
							<td>
								<select name="order_status" class="form-control form-filter input-sm">
                                    <option value="">Giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_customer_name" placeholder="Số CMND">
							</td>
							<td></td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_customer_name" placeholder="Phòng">
							</td>
							<td>
								<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="Từ">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="Đến">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
							</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = '{{ url('/') }}';
</script>
@endsection
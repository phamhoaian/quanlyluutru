@extends('admin.layouts.master')

@section('breadcrumb', 'Tìm kiếm')
@section('page-title', 'Tìm kiếm')
@section('title', 'Danh sách khách lưu trú')

@section('css')
<link href="{{ asset('public/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/blockui/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/scripts/table-datatables-ajax.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-settings font-green-jungle"></i>
					<span class="caption-subject bold uppercase font-green-jungle"> Danh sách khách lưu trú</span>
				</div>
				<div id="datatable_ajax_tools" class="pull-right margin-bottom-10">
					<a href="javascript:;" class="btn blue mt-ladda-btn ladda-button tool-action" data-style="expand-right" data-action="0">
						<span class="ladda-label">
							<i class="fa fa-print"></i> 
							&nbsp;In</span>
					</a>
					<a href="javascript:;" class="btn btn-success mt-ladda-btn ladda-button tool-action" data-style="expand-right" data-action="1">
						<span class="ladda-label">
							<i class="fa fa-file-excel-o"></i> 
							&nbsp;Xuất ra Excel</span>
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover order-column" id="search">
						<thead>
							<tr role="row" class="heading">
								<th> Tên nhà nghỉ/khách sạn </th>
								<th> Họ và tên </th>
								<th> Năm sinh </th>
								<th> Nam/nữ </th>
								<th> Số CMND/hộ chiếu </th>
								<th> Phòng số </th>
								<th> Thời gian vào </th>
								<th> Thời gian ra </th>
								<th></th>
							</tr>
							<tr role="row" class="filter">
								<td>
									<input type="text" class="form-control form-filter input-sm" name="hotel_name" placeholder="Tìm theo tên nhà nghỉ/ks" >
								</td>
								<td>
									<input type="text" class="form-control form-filter input-sm" name="customer_name" placeholder="Tìm theo tên khách">
								</td>
								<td></td>
								<td>
									<select name="customer_genre" class="form-control form-filter input-sm">
	                                    <option value="">Giới tính</option>
	                                    <option value="1">Nam</option>
	                                    <option value="2">Nữ</option>
	                                </select>
								</td>
								<td>
									<input type="text" class="form-control form-filter input-sm" name="customer_id_card" placeholder="Tìm theo số CMND/hộ chiếu">
								</td>
								<td>
									<input type="text" class="form-control form-filter input-sm" name="room_number" placeholder="Tìm theo số phòng">
								</td>
								<td>
	                                <div class="input-group" id="date_range">
	                                    <input type="text" class="form-control form-filter input-sm" readonly name="date_range" placeholder="Tìm theo ngày">
	                                    <span class="input-group-btn">
	                                        <button class="btn btn-sm default date-range-toggle" type="button">
	                                            <i class="fa fa-calendar"></i>
	                                        </button>
	                                    </span>
	                                </div>
								</td>
								<td></td>
								<td>
									<div class="margin-bottom-5">
	                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
	                                        <i class="fa fa-search"></i> Tìm
	                                    </button>
	                                </div>
	                                <button class="btn btn-sm red btn-outline filter-cancel">
	                                    <i class="fa fa-times"></i> Reset
	                                </button>
								</td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = '{{ url('/') }}';
</script>
@endsection
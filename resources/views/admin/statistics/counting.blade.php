@extends('admin.layouts.master')

@section('breadcrumb', 'Thống kê')
@section('page-title', 'Thống kê')
@section('title', 'Thống kê số lượng khách lưu trú')

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
					<i class="icon-settings font-green"></i>
					<span class="caption-subject bold uppercase font-green"> Thống kê số lượng khách lưu trú</span>
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
					<div class="table-actions-wrapper">
						<input type="text" class="form-control form-filter input-sm inline-block margin-right-10 margin-bottom-10" name="hotel_name" placeholder="Tìm theo tên nhà nghỉ/ks">
                        <div class="input-group inline-block margin-right-10 margin-bottom-10" id="date_range">
                            <input type="text" class="form-control form-filter input-sm inline-block" readonly name="date_range" placeholder="Tìm theo ngày" style="width: 166px">
                            <span class="input-group-btn inline-block" style="width: auto">
                                <button class="btn btn-sm default date-range-toggle" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
						<button class="btn btn-sm green btn-outline filter-submit margin-right-10">
                            <i class="fa fa-search"></i> Tìm
                        </button>
                        <button class="btn btn-sm red btn-outline filter-cancel">
                            <i class="fa fa-times"></i> Reset
                        </button>
	                </div>
					<table class="table table-striped table-bordered table-hover order-column" id="counting">
						<thead>
							<tr role="row" class="heading">
								<th> Tên nhà nghỉ/khách sạn </th>
								<th> Nam </th>
								<th> Nữ </th>
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
@extends('admin.layouts.master')

@section('breadcrumb', 'Thông tin lưu trú')
@section('page-title', 'Thông tin lưu trú')
@section('title', 'Thông tin lưu trú')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green-jungle">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Thông tin lưu trú
				</div>
			</div>
			<div class="portlet-body">
				<div class="form-horizontal">
					<h3 class="form-section">Thông tin khách lưu trú</h3>
					<div class="form-group">
						<label class="control-label col-md-3">Tên nhà nghỉ/khách sạn lưu trú:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->hotel->name }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tên khách lưu trú:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->name }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Năm sinh:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->year_of_birth }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Giới tính:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->sex == 1 ? 'Nam' : 'Nữ' }}</p>
						</div>
					</div>
					@if ( ! $staying->customer->foreign_flg)
					<div class="form-group">
						<label class="control-label col-md-3">Số CMND:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->id_card }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Hộ khẩu thường trú:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->address }}</p>
						</div>
					</div>
					@else
					<div class="form-group">
						<label class="control-label col-md-3">Quốc tịch:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->nationality }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Số hộ chiếu:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->passport }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Thông tin hộ chiếu:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->passport_info }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Ngày nhập cảnh:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ \CarBon\CarBon::parse($staying->customer->date_entry)->format('d/m/Y') }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Cửa khẩu nhập cảnh:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->port_entry }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Mục đích nhập cảnh:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->customer->purpose_entry }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tạm trú (từ ngày đến ngày):</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ \CarBon\CarBon::parse($staying->customer->permitted_start)->format('d/m/Y') . ' - ' . \CarBon\CarBon::parse($staying->customer->permitted_end)->format('d/m/Y') }}</p>
						</div>
					</div>
					@endif
					<h3 class="form-section">Thời gian lưu trú</h3>
					<div class="form-group">
						<label class="control-label col-md-3">Phòng số:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ $staying->room_number }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Thời gian vào:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ \CarBon\CarBon::parse($staying->check_in)->format('d/m/Y H:i') }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Thời gian ra:</label>
						<div class="col-md-9">
							<p class="form-control-static">{{ \CarBon\CarBon::parse($staying->check_out)->format('d/m/Y H:i') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
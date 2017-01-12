@extends('layouts.master')

@section('css')
<link href="{{ asset('public/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/scripts/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/front/scripts/staying.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Khai báo khách lưu trú
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'pages.staying', 'id' => 'staying_form', 'class' => 'form-horizontal']) !!}
					<div class="form-body">
						<h3 class="form-section">Thông tin khách hàng</h3>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Họ và tên 
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								<input name="name" type="text" class="form-control input-circle" placeholder="Trần Văn A">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Năm sinh 
							</label>
							<div class="col-md-4">
								<select name="year_of_birth" id="year_of_birth" class="form-control input-circle">
									<option value="1990">1990</option>
									<option value="1991">1991</option>
									<option value="1992">1992</option>
									<option value="1993">1993</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Số CMND
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								<input name="id_card" type="text" class="form-control input-circle" placeholder="280909090">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Giới tính
							</label>
							<div class="col-md-4">
								<select name="gender" id="gender" class="form-control input-circle">
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
								</select>
							</div>
						</div>
						<h3 class="form-section">Thời gian lưu trú</h3>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Số phòng 
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								<input name="room_number" type="text" class="form-control input-circle" placeholder="001">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Thời gian vào
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-2">
								<div class="input-group">
									<input name="date_start" id="date_start" type="text" class="form-control input-circle-left" placeholder="12/12/2016">
									<span class="input-group-addon input-circle-right">
										<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
								</div>
							</div>
							<div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker input-circle-left" placeholder="12:34">
                                    <span class="input-group-addon input-circle-right">
                                       <span class="glyphicon glyphicon-time">
										</span>
                                    </span>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">
								Thời gian ra
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-2">
								<div class="input-group">
									<input name="date_end" id="date_end" type="text" class="form-control input-circle-left" placeholder="12/12/2016">
									<span class="input-group-addon input-circle-right">
										<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
								</div>
							</div>
							<div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker input-circle-left" placeholder="12:34">
                                    <span class="input-group-addon input-circle-right">
                                       <span class="glyphicon glyphicon-time">
										</span>
                                    </span>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<div class="col-md-12 margin-top-10">
								<span class="label label-danger">Lưu ý !</span>&nbsp;
								<span>Trường có <span class="required" aria-required="true">*</span> là bắt buộc nhập.</span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle blue" data-loading-text="Đang xử lý...">Thêm mới</button>
								<button type="reset" class="btn btn-circle default">Hủy bỏ</button>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
@endsection
@extends('admin.layouts.master')

@section('breadcrumb', 'Thêm nhà nghỉ / khách sạn mới')
@section('page-title', 'Quản lý nhà nghỉ / khách sạn')

@section('css')
<link href="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin/scripts/hotel.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Thêm nhà nghỉ / khách sạn mới
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="form-horizontal" id="hotel_form">
					<div class="form-body">
						<h3 class="form-section">Thông tin nhà nghỉ / khách sạn</h3>
						<div class="form-group">
							<label class="col-md-3 control-label">Tên nhà nghỉ / khách sạn <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-building"></i>
									</span>
									<input name="hotel_name" type="text" class="form-control input-circle-right" placeholder="Nhà nghỉ Ánh Ngọc">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Địa chỉ <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-home"></i>
									</span>
									<input name="hotel_address" type="text" class="form-control input-circle-right" placeholder="123 Khu phố 1">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số điện thoại</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-phone"></i>
									</span>
									<input name="hotel_phone" type="text" class="form-control input-circle-right" placeholder="0909 123 456">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số lượng phòng</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-bed"></i>
									</span>
									<input name="hotel_room" type="text" class="form-control input-circle-right" placeholder="123">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									<input name="hotel_email" type="email" class="form-control input-circle-right" placeholder="example@gmail.com">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Loại hình kinh doanh <span class="required">*</span></label>
							<div class="col-md-6">
								<div class="mt-radio-inline">
									<label class="mt-radio">
										<input type="radio" name="hotel_type" value="1" checked=""> Nhà nghỉ
										<span></span>
									</label>
									<label class="mt-radio">
										<input type="radio" name="hotel_type" value="2" checked=""> Khách sạn
										<span></span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Hình ảnh</label>
							<div class="col-md-4">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> 
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
									</div>
									<div>
										<span class="btn default btn-file">
											<span class="fileinput-new"> Chọn ảnh </span>
											<span class="fileinput-exists"> Đổi ảnh khác </span>
											<input type="file" name="hotel_image"> </span>
										<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa </a>
									</div>
								</div>
							</div>
						</div>
						<h3 class="form-section">Thông tin chủ cơ sở kinh doanh</h3>
						<div class="form-group">
							<label class="col-md-3 control-label">Họ và tên <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_name" type="text" class="form-control input-circle" placeholder="Trần Văn A">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Ngày tháng năm sinh <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_birthday" type="text" class="form-control input-circle" placeholder="12/12/1980">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số CMND <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_id_card" type="text" class="form-control input-circle" placeholder="280984484">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Hộ khẩu thường trú <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_address" type="text" class="form-control input-circle" placeholder="123 Khu phố 1">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số giấy chứng nhận đăng ký kinh doanh <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_business_cert" type="text" class="form-control input-circle" placeholder="KD0001">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số giấy an ninh trật tự <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="owner_security" type="text" class="form-control input-circle" placeholder="TT0001">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 margin-top-10">
								<span class="label label-danger">Lưu ý !</span>&nbsp;
								<span>Trường có <span class="required">*</span> là bắt buộc nhập.</span>
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
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
@endsection
@extends('admin.layouts.master')

@section('breadcrumb', 'Thêm tài khoản mới')
@section('page-title', 'Quản lý tài khoản')

@section('js')
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin/scripts/user.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Thêm tài khoản mới
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="form-horizontal" id="user_form">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Tên tài khoản <span class="required">*</span></label>
							<div class="col-md-4">
								<input name="username" type="text" class="form-control input-circle" placeholder="Trần Văn A">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Số điện thoại</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-phone"></i>
									</span>
									<input name="phone" type="text" class="form-control input-circle-right" placeholder="0909 123 456">
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
									<input name="email" type="email" class="form-control input-circle-right" placeholder="example@gmail.com">
								</div>
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
								<button type="submit" class="btn btn-circle blue">Thêm mới</button>
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
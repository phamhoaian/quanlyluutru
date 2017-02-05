@extends('admin.layouts.master')

@section('breadcrumb', 'Thêm tài khoản mới')
@section('title', 'Thêm tài khoản mới')
@section('page-title', 'Quản lý tài khoản')

@section('css')
<link href="{{ asset('public/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
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
				{!! Form::open(['route' => 'admin.user.add', 'id' => 'user_form', 'class' => 'form-horizontal']) !!}
					<div class="form-body">
						<div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Nhà nghỉ/khách sạn <span class="required">*</span></label>
							<div class="col-md-4">
								{!! Form::select('hotel', $list_hotel, null, ['placeholder' => 'Vui lòng chọn', 'class' => 'select2me']) !!}
								@if ($errors->has('hotel'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('hotel') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Email <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-envelope"></i>
									</span>
									{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
								</div>
								@if ($errors->has('email'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
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
								{!! Form::submit('Thêm mới', ['class' => 'btn btn-circle blue']) !!}
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
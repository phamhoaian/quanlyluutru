@extends('layouts.master')

@section('js')
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/front/scripts/user.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green-jungle">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Đổi mật khẩu
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'pages.changePassword', 'class' => 'form-horizontal', 'id' => 'change_password']) !!}
					<div class="form-body">
						@if (Session::has('flash_message'))
						<div class="flash-message">
							<div class="alert alert-{!! Session::get('flash_level') !!} alert-dismissable">
		                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		                        {!! Session::get('flash_message') !!}
		                    </div>
						</div>
			            @endif
						<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Mật khẩu hiện tại <span class="required">*</span></label>
							<div class="col-md-4">
								{!! Form::password('current_password', ['class' => 'form-control input-circle']) !!}
								@if ($errors->has('current_password'))
	                                <span class="help-block help-block-error">
	                                    {{ $errors->first('current_password') }}
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Mật khẩu mới <span class="required">*</span></label>
							<div class="col-md-4">
								{!! Form::password('new_password', ['class' => 'form-control input-circle', 'id' => 'new_password']) !!}
								@if ($errors->has('new_password'))
	                                <span class="help-block help-block-error">
	                                    {{ $errors->first('new_password') }}
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('retype_new_password') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Nhập lại mật khẩu mới <span class="required">*</span></label>
							<div class="col-md-4">
								{!! Form::password('retype_new_password', ['class' => 'form-control input-circle']) !!}
								@if ($errors->has('retype_new_password'))
	                                <span class="help-block help-block-error">
	                                    {{ $errors->first('retype_new_password') }}
	                                </span>
	                            @endif
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle blue" data-loading-text="Đang xử lý...">Đổi mật khẩu</button>
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
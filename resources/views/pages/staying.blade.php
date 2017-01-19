@extends('layouts.master')

@section('css')
<link href="{{ asset('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/scripts/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.vi.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/front/scripts/staying.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green-jungle">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Khai báo khách lưu trú
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'pages.staying', 'id' => 'staying_form', 'class' => 'form-horizontal']) !!}
					<div class="form-body">
						@if (Session::has('flash_message'))
						<div class="flash-message">
							<div class="alert alert-{!! Session::get('flash_level') !!} alert-dismissable">
		                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		                        {!! Session::get('flash_message') !!}
		                    </div>
						</div>
			            @endif
						<h3 class="form-section">Thông tin khách hàng</h3>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Họ và tên 
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::text('name', null, ['class' => 'form-control input-circle', 'placeholder' => 'Trần Văn A']) !!}
								@if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('year_of_birth') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Năm sinh 
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::select('year_of_birth', $list_year, 1990, ['class' => 'form-control input-circle', 'id' => 'year_of_birth']) !!}
								@if ($errors->has('year_of_birth'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('year_of_birth') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('id_card') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Số CMND
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::text('id_card', null, ['class' => 'form-control input-circle', 'placeholder' => '280909090', 'maxlength' => 12]) !!}
								@if ($errors->has('id_card'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('id_card') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Hộ khẩu thường trú
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::text('address', null, ['class' => 'form-control input-circle', 'placeholder' => 'An Phú, Thuận An, Bình Dương']) !!}
								@if ($errors->has('address'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Giới tính
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::select('sex', [1 => 'Nam', 2 => 'Nữ'], 1, ['class' => 'form-control input-circle']) !!}
								@if ($errors->has('sex'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('sex') }}
                                    </span>
                                @endif
							</div>
						</div>
						<h3 class="form-section">Thời gian lưu trú</h3>
						<div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Phòng số
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-4">
								{!! Form::text('room_number', null, ['class' => 'form-control input-circle', 'placeholder' => '101']) !!}
								@if ($errors->has('room_number'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('room_number') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('date_start') || $errors->has('check_in') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Thời gian vào
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-2">
								<div class="input-group">
									{!! Form::text('date_start', $current_date, ['class' => 'form-control input-circle-left', 'readonly' => '']) !!}
									<span class="input-group-addon input-circle-right">
										<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
								</div>
								@if ($errors->has('date_start'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('date_start') }}
                                    </span>
                                @endif
							</div>
							<div class="col-md-2">
                                <div class="input-group bootstrap-timepicker">
                                	{!! Form::text('check_in', null, ['class' => 'form-control timepicker input-circle-left', 'placeholder' => '12:30']) !!}
                                    <span class="input-group-addon input-circle-right">
                                       <span class="glyphicon glyphicon-time">
										</span>
                                    </span>
                                </div>
                                @if ($errors->has('check_in'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('check_in') }}
                                    </span>
                                @endif
                            </div>
						</div>
						<div class="form-group{{ $errors->has('date_end') || $errors->has('check_out') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">
								Thời gian ra
								<span class="required" aria-required="true">*</span>
							</label>
							<div class="col-md-2">
								<div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
									{!! Form::text('date_end', $current_date, ['class' => 'form-control input-circle-left', 'readonly' => '']) !!}
									<span class="input-group-addon input-circle-right">
										<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
								</div>
								@if ($errors->has('date_end'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('date_end') }}
                                    </span>
                                @endif
							</div>
							<div class="col-md-2">
                                <div class="input-group bootstrap-timepicker">
                                    {!! Form::text('check_out', null, ['class' => 'form-control timepicker input-circle-left', 'placeholder' => '12:30']) !!}
                                    <span class="input-group-addon input-circle-right">
                                       <span class="glyphicon glyphicon-time">
										</span>
                                    </span>
                                </div>
                                @if ($errors->has('check_out'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('check_out') }}
                                    </span>
                                @endif
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
								<button type="submit" class="btn btn-circle blue" data-loading-text="Đang xử lý...">Đăng ký</button>
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
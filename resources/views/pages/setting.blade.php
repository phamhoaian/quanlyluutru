@extends('layouts.master')

@section('title', 'Thiết lập thông tin | ')

@section('css')
<link href="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/front/scripts/setting.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green-jungle">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-building"></i>Thiết lập thông tin
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'pages.setting', 'class' => 'form-horizontal', 'id' => 'hotel_form', 'files' => TRUE]) !!}
					<div class="form-body">
						@if (Session::has('flash_message'))
						<div class="flash-message">
							<div class="alert alert-{!! Session::get('flash_level') !!} alert-dismissable">
		                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		                        {!! Session::get('flash_message') !!}
		                    </div>
						</div>
			            @endif
						<h3 class="form-section">Thông tin nhà nghỉ / khách sạn</h3>
						<div class="form-group{{ $errors->has('hotel_name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Tên nhà nghỉ / khách sạn <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-building"></i>
									</span>
									{!! Form::text('hotel_name', $hotel->name, ['class' => 'form-control input-circle-right', 'placeholder' => 'Nhà nghỉ Ánh Ngọc']) !!}
								</div>
								@if ($errors->has('hotel_name'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_name') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_address') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Địa chỉ <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-home"></i>
									</span>
									{!! Form::text('hotel_address', $hotel->address, ['class' => 'form-control input-circle-right', 'placeholder' => '123 Khu phố 1']) !!}
								</div>
								@if ($errors->has('hotel_address'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_address') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_phone') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Số điện thoại</label>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-phone"></i>
									</span>
									{!! Form::text('hotel_phone', $hotel->phone, ['class' => 'form-control input-circle-right', 'placeholder' => '0909123456', 'maxlength' => 11]) !!}
								</div>
								@if ($errors->has('hotel_phone'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_phone') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_room') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Số lượng phòng</label>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-bed"></i>
									</span>
									{!! Form::text('hotel_room', $hotel->room, ['class' => 'form-control input-circle-right', 'placeholder' => '123']) !!}
								</div>
								@if ($errors->has('hotel_room'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_room') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Email <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									{!! Form::text('hotel_email', Auth::user()->email, ['class' => 'form-control input-circle-right', 'placeholder' => 'example@gmail.com']) !!}
								</div>
								@if ($errors->has('hotel_email'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_email') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_type') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Loại hình kinh doanh <span class="required" aria-required="true">*</span></label>
							<div class="col-md-6">
								<div class="mt-radio-inline">
									<label class="mt-radio">
										<input type="radio" name="hotel_type" value="1" {{ $hotel->type == 1 ? 'checked' : '' }}> Nhà nghỉ
										<span></span>
									</label>
									<label class="mt-radio">
										<input type="radio" name="hotel_type" value="2" {{ $hotel->type == 2 ? 'checked' : '' }}> Khách sạn
										<span></span>
									</label>
								</div>
								@if ($errors->has('hotel_type'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_type') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('hotel_photo') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Hình ảnh</label>
							<div class="col-md-5">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										@if ($hotel->photo)
											<img src="{{ asset('public/uploads/hotel/'.$hotel->photo) }}" alt=""> 
										@else
											<img src="{{ asset('public/assets/img/no-image.png') }}" alt="">
										@endif
											<input type="hidden" name="current_photo" value="{{ $hotel->photo }}">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
									</div>
									<div>
										<span class="btn default btn-file">
											<span class="fileinput-new"> Chọn ảnh </span>
											<span class="fileinput-exists"> Đổi ảnh khác </span>
											<input type="file" name="hotel_photo"> </span>
										<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa </a>
									</div>
								</div>
								@if ($errors->has('hotel_photo'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('hotel_photo') }}
                                    </span>
								@endif
							</div>
						</div>
						<h3 class="form-section">Thông tin chủ cơ sở kinh doanh</h3>
						<div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Họ và tên <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_name', $hotel->owner->name, ['class' => 'form-control input-circle', 'placeholder' => 'Trần Văn A']) !!}
								@if ($errors->has('owner_name'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_name') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('owner_birthday') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Ngày tháng năm sinh <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_birthday', \Carbon\Carbon::parse($hotel->owner->birthday)->format('d-m-Y'), ['class' => 'form-control input-circle', 'placeholder' => '12/12/1980']) !!}
								@if ($errors->has('owner_birthday'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_birthday') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('owner_id_card') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Số CMND <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_id_card', $hotel->owner->id_card, ['class' => 'form-control input-circle', 'placeholder' => '280984484', 'maxlength' => 12]) !!}
								@if ($errors->has('owner_id_card'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_id_card') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('owner_address') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Hộ khẩu thường trú <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_address', $hotel->owner->address, ['class' => 'form-control input-circle', 'placeholder' => '123 Khu phố 1']) !!}
								@if ($errors->has('owner_address'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_address') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('owner_business_cert') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Số giấy chứng nhận đăng ký kinh doanh <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_business_cert', $hotel->owner->business_cert, ['class' => 'form-control input-circle', 'placeholder' => 'KD0001']) !!}
								@if ($errors->has('owner_business_cert'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_business_cert') }}
                                    </span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('owner_security') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Số giấy an ninh trật tự <span class="required" aria-required="true">*</span></label>
							<div class="col-md-5">
								{!! Form::text('owner_security', $hotel->owner->security, ['class' => 'form-control input-circle', 'placeholder' => 'TT0001']) !!}
								@if ($errors->has('owner_security'))
									<span class="help-block help-block-error">
                                        {{ $errors->first('owner_security') }}
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
							<div class="col-md-offset-4 col-md-8">
								<button type="submit" class="btn btn-circle blue" data-loading-text="Đang xử lý...">Cập nhật</button>
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
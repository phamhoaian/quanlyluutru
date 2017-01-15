@extends('layouts.master')

@section('css')
<link href="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/front/scripts/first_login.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light " id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<i class=" icon-layers font-red"></i>
					<span class="caption-subject font-red bold uppercase"> Thiết lập thông tin
					</span>
				</div>
			</div>
			<div class="portlet-body form">
				{!! Form::open(['route' => 'pages.firstLogin', 'class' => 'form-horizontal', 'id' => 'submit_form']) !!}
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
										<span class="number"> 1 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Nhà nghỉ/khách sạn </span>
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
										<span class="number"> 2 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Chủ cơ sở kinh doanh </span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
										<span class="number"> 3 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Hình ảnh </span>
									</a>
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">
										<span class="number"> 4 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Xác nhận </span>
									</a>
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success"> </div>
							</div>
							<div class="tab-content">
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button> Có một số lỗi xảy ra, vui lòng kiểm tra lại thông tin. </div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button> Thông tin đầy đủ và chính xác! </div>
								<div class="tab-pane active" id="tab1">
									<h3 class="block">Thông tin nhà nghỉ/khách sạn</h3>
									<div class="form-group{{ $errors->has('hotel_name') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Tên nhà nghỉ / khách sạn <span class="required">*</span></label>
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
										<label class="col-md-4 control-label">Địa chỉ <span class="required">*</span></label>
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
												{!! Form::text('hotel_phone', null, ['class' => 'form-control input-circle-right', 'placeholder' => '0909123456']) !!}
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
												{!! Form::text('hotel_room', null, ['class' => 'form-control input-circle-right', 'placeholder' => '123']) !!}
											</div>
											@if ($errors->has('hotel_room'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('hotel_room') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('hotel_email') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Email <span class="required">*</span></label>
										<div class="col-md-5">
											<div class="input-group">
												<span class="input-group-addon input-circle-left">
												<i class="fa fa-envelope"></i>
												</span>
												{!! Form::text('hotel_email', $hotel->user->email, ['class' => 'form-control input-circle-right', 'placeholder' => 'example@gmail.com']) !!}
											</div>
											@if ($errors->has('hotel_email'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('hotel_email') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('hotel_type') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Loại hình kinh doanh <span class="required">*</span></label>
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
								</div>
								<div class="tab-pane" id="tab2">
									<h3 class="block">Thông tin chủ cơ sở kinh doanh</h3>
									<div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Họ và tên <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_name', null, ['class' => 'form-control input-circle-right', 'placeholder' => 'Trần Văn A']) !!}
											@if ($errors->has('owner_name'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_name') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('owner_birthday') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Ngày tháng năm sinh <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_birthday', null, ['class' => 'form-control input-circle-right', 'placeholder' => '12/12/1980']) !!}
											@if ($errors->has('owner_birthday'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_birthday') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('owner_id_card') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Số CMND <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_id_card', null, ['class' => 'form-control input-circle-right', 'placeholder' => '280984484']) !!}
											@if ($errors->has('owner_id_card'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_id_card') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('owner_address') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Hộ khẩu thường trú <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_address', null, ['class' => 'form-control input-circle-right', 'placeholder' => '123 Khu phố 1']) !!}
											@if ($errors->has('owner_address'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_address') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('owner_business_cert') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Số giấy chứng nhận đăng ký kinh doanh <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_business_cert', null, ['class' => 'form-control input-circle-right', 'placeholder' => 'KD0001']) !!}
											@if ($errors->has('owner_business_cert'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_business_cert') }}
			                                    </span>
											@endif
										</div>
									</div>
									<div class="form-group{{ $errors->has('owner_security') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">Số giấy an ninh trật tự <span class="required">*</span></label>
										<div class="col-md-5">
											{!! Form::text('owner_security', null, ['class' => 'form-control input-circle-right', 'placeholder' => 'TT0001']) !!}
											@if ($errors->has('owner_security'))
												<span class="help-block help-block-error">
			                                        {{ $errors->first('owner_security') }}
			                                    </span>
											@endif
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<h3 class="block">Hình ảnh tổng quan</h3>
									<div class="form-group">
										<label class="col-md-4 control-label"></label>
										<div class="col-md-5">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="{{ asset('public/assets/img/no-image.png') }}" alt="">
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
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab4">
									<h3 class="block">Xác nhận thông tin</h3>
									<h4 class="form-section">Thông tin nhà nghỉ / khách sạn</h4>
									<div class="form-group">
										<label class="control-label col-md-4">Tên nhà nghỉ / khách sạn:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_name"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Địa chỉ:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_address"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Số điện thoại:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_phone"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Số lượng phòng:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_room"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Email:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_email"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Loại hình kinh doanh:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="hotel_type"> </p>
										</div>
									</div>
									<h4 class="form-section">Thông tin chủ cơ sở kinh doanh</h4>
									<div class="form-group">
										<label class="control-label col-md-4">Họ và tên:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_name"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Ngày tháng năm sinh:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_birthday"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Số CMND:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_id_card"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Hộ khẩu thường trú:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_address"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Số giấy chứng nhận đăng ký kinh doanh:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_business_cert"> </p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Số giấy an ninh trật tự:</label>
										<div class="col-md-5">
											<p class="form-control-static" data-display="owner_security"> </p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-4 col-md-8">
									<a href="javascript:;" class="btn default button-previous">
										<i class="fa fa-angle-left"></i> Quay lại </a>
									<a href="javascript:;" class="btn btn-outline green button-next"> Tiếp tục
										<i class="fa fa-angle-right"></i>
									</a>
									<a href="javascript:;" class="btn green button-submit"> Hoàn thành
										<i class="fa fa-check"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
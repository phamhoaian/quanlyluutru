@extends('admin.layouts.master')

@section('breadcrumb', 'Thông tin nhà nghỉ / khách sạn')
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
					<i class="fa fa-building"></i>Thông tin nhà nghỉ / khách sạn
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.hotel.add', 'class' => 'form-horizontal', 'id' => 'hotel_form', 'files' => TRUE]) !!}
					<div class="form-body">
						<h3 class="form-section">Thông tin nhà nghỉ / khách sạn</h3>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Tên nhà nghỉ / khách sạn <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-building"></i>
									</span>
									{!! Form::text('name', $hotel->name, ['class' => 'form-control input-circle-right', 'placeholder' => 'Nhà nghỉ Ánh Ngọc']) !!}
								</div>
								@if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Địa chỉ <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-home"></i>
									</span>
									{!! Form::text('address', $hotel->address, ['class' => 'form-control input-circle-right', 'placeholder' => '123 Khu phố 1']) !!}
								</div>
								@if ($errors->has('address'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Số điện thoại</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-phone"></i>
									</span>
									{!! Form::text('phone', $hotel->phone, ['class' => 'form-control input-circle-right', 'placeholder' => '0909123456']) !!}
								</div>
								@if ($errors->has('phone'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Số lượng phòng</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-bed"></i>
									</span>
									{!! Form::text('room', $hotel->room, ['class' => 'form-control input-circle-right', 'placeholder' => '123']) !!}
								</div>
								@if ($errors->has('room'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('room') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Email <span class="required">*</span></label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									{!! Form::text('email', isset($hotel->user) ? $hotel->user->name : '', ['class' => 'form-control input-circle-right', 'placeholder' => 'example@gmail.com']) !!}
								</div>
								@if ($errors->has('email'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Loại hình kinh doanh <span class="required">*</span></label>
							<div class="col-md-6">
								<div class="mt-radio-inline">
									<label class="mt-radio">
										<input type="radio" name="type" value="1" {{ $hotel->type == 1 ? 'checked' : '' }}> Nhà nghỉ
										<span></span>
									</label>
									<label class="mt-radio">
										<input type="radio" name="type" value="2" {{ $hotel->type == 2 ? 'checked' : '' }}> Khách sạn
										<span></span>
									</label>
								</div>
								@if ($errors->has('type'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('type') }}
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Hình ảnh</label>
							<div class="col-md-4">
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
											<input type="file" name="photo"> </span>
										<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa </a>
									</div>
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
								{!! Form::submit('Cập nhật', ['class' => 'btn btn-circle blue', 'data-loading-text' => 'Đang xử lý...']) !!}
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
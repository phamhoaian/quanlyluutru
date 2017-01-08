@extends('admin.layouts.master')

@section('breadcrumb', 'Thông tin tài khoản')
@section('page-title', 'Quản lý tài khoản')

@section('css')
<link href="{{ asset('public/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/admin/css/profile.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('public/assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin/scripts/user.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PROFILE SIDEBAR -->
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet ">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
				@if ($user->photo)
					<img src="{{ asset('resources/upload/user/'.$user->id.'_150.'.$user->photo) }}" class="img-responsive" alt=""> 
				@else
					<img src="{{ asset('public/assets/img/no_image_profile.jpg') }}" class="img-responsive" alt="">
				@endif
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">{{ $user->name }}</div>
					<div class="profile-usertitle-job">
					@if ($user->role_id != 1)
						Quản trị viên
					@else
						Thành viên
					@endif
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
				@if ($user->active_flg)
					<button type="button" class="btn btn-circle green btn-sm">Hoạt động</button>
				@else
					<button type="button" class="btn btn-circle red btn-sm">Khóa</button>
				@endif
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
				</div>
				<!-- END MENU -->
			</div>
			<!-- END PORTLET MAIN -->
		</div>
		<!-- END BEGIN PROFILE SIDEBAR -->
		<!-- BEGIN PROFILE CONTENT -->
		<div class="profile-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light ">
						<div class="portlet-title tabbable-line">
							<div class="caption caption-md">
								<i class="icon-globe theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">Cập nhật tài khoản</span>
							</div>
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Thông tin tài khoản</a>
								</li>
								@if (Auth::id() == $user->id)
								<li>
									<a href="#tab_1_2" data-toggle="tab">Ảnh đại diện</a>
								</li>
								<li>
									<a href="#tab_1_3" data-toggle="tab">Đổi mật khẩu</a>
								</li>
								@endif
								<li>
									<a href="#tab_1_4" data-toggle="tab">Reset mật khẩu</a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<!-- PERSONAL INFO TAB -->
								<div class="tab-pane active" id="tab_1_1">
									@if (Session::has('flash_message'))
									<div class="flash-message">
					                    <div class="alert alert-{!! Session::get('flash_level') !!} alert-dismissable">
					                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					                        {!! Session::get('flash_message') !!}
					                    </div>
									</div>
						            @endif
									{!! Form::open(['route' => ['admin.user.edit', $user->id], 'id' => 'user_form']) !!}
										{!! Form::hidden('_method', 'PUT') !!}
										@foreach($errors->all() as $error)
											{{ $error }}<br>
										@endforeach
										@if ($user->role_id === 1)
										<div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
											<label class="control-label">Nhà nghỉ / khách sạn <span class="required">*</span></label>
											{!! Form::select('hotel', ['1' => 'Nhà nghỉ Ánh Ngọc', '2' => 'Khách sạn Anh Kiệt'], $user->hotel_id, ['placeholder' => 'Vui lòng chọn', 'class' => 'select2me']) !!}
											@if ($errors->has('hotel'))
			                                    <span class="help-block help-block-error">
			                                        {{ $errors->first('hotel') }}
			                                    </span>
			                                @endif
										</div>
										@endif
										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<label class="control-label">Email <span class="required">*</span></label>
											{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
											@if ($errors->has('email'))
			                                    <span class="help-block help-block-error">
			                                        {{ $errors->first('email') }}
			                                    </span>
			                                @endif
										</div>
										<div class="form-group">
											<label class="control-label">Ghi chú</label>
											{!! Form::textarea('note', $user->note, ['class' => 'form-control', 'placeholder' => 'Thông tin thêm!!!', 'rows' => 3]) !!}
										</div>
										<div class="form-group">
                                            <span class="label label-danger">Lưu ý !</span>&nbsp;
                                            <span>Trường chứa <span class="required">*</span> là bắt buộc nhập.</span>
                                        </div>
										<div class="margin-top-20">
											{!! Form::submit('Cập nhật', ['class' => 'btn green']) !!}
                                			<button type="reset" class="btn default">Hủy bỏ</button>
										</div>
									{!! Form::close() !!}
								</div>
								<!-- END PERSONAL INFO TAB -->
								<!-- CHANGE AVATAR TAB -->
								<div class="tab-pane" id="tab_1_2">
									{!! Form::open(['route' => ['admin.user.uploadAvatar', $user->id]]) !!}
										<div class="form-group">
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
														<input type="file" name="..."> </span>
													<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa </a>
												</div>
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-danger">Ghi chú !</span>&nbsp;
												<span>Định dạng hình ảnh cho phép tải lên (jpg, jpeg, png, gif)</span>
											</div>
										</div>
										<div class="margin-top-10">
											{!! Form::submit('Lưu', ['class' => 'btn green']) !!}
											<button type="reset" class="btn default">Hủy bỏ</button>
										</div>
									{!! Form::close() !!}
								</div>
								<!-- END CHANGE AVATAR TAB -->
								<!-- CHANGE PASSWORD TAB -->
								<div class="tab-pane" id="tab_1_3">
									{!! Form::open(['route' => ['admin.user.changePassword', $user->id], 'id' => 'user_change_password']) !!}
										<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
											<label class="control-label">Mật khẩu hiện tại <span class="required">*</span></label>
											{!! Form::password('current_password', ['class' => 'form-control']) !!}
											@if ($errors->has('current_password'))
			                                    <span class="help-block help-block-error">
			                                        {{ $errors->first('current_password') }}
			                                    </span>
			                                @endif
										</div>
										<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
											<label class="control-label">Mật khẩu mới <span class="required">*</span></label>
											{!! Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password']) !!}
											@if ($errors->has('new_password'))
			                                    <span class="help-block help-block-error">
			                                        {{ $errors->first('new_password') }}
			                                    </span>
			                                @endif
										</div>
										<div class="form-group{{ $errors->has('retype_new_password') ? ' has-error' : '' }}">
											<label class="control-label">Nhập lại mật khẩu mới <span class="required">*</span></label>
											{!! Form::password('retype_new_password', ['class' => 'form-control']) !!}
											@if ($errors->has('retype_new_password'))
			                                    <span class="help-block help-block-error">
			                                        {{ $errors->first('retype_new_password') }}
			                                    </span>
			                                @endif
										</div>
										<div class="margin-top-10">
											{!! Form::submit('Đổi mật khẩu', ['class' => 'btn green']) !!}
                                			<button type="reset" class="btn default">Hủy bỏ</button>
										</div>
									{!! Form::close() !!}
								</div>
								<!-- END CHANGE PASSWORD TAB -->
								<!-- RESET PASSWORD TAB -->
								<div class="tab-pane" id="tab_1_4">
									<button type="button" data-loading-text="Đang xử lý..." class="demo-loading-btn btn green"> Reset mật khẩu </button>
									<div class="clearfix margin-top-10">
										<span class="label label-danger">Ghi chú !</span>&nbsp;
										<span>Một email bao gồm mật khẩu mới sẽ được gửi đến địa chỉ email đã đăng ký.</span>
									</div>
								</div>
								<!-- END RESET PASSWORD TAB -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PROFILE CONTENT -->
	</div>
</div>
@endsection
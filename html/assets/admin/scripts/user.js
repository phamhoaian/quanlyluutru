$(document).ready(function() {
	// initialize
	User.init();
});

var User = function() {

	var handleCreate = function() {

		$('#user_form').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				username: {
					required: true
				},
				phone: {
					number: true
				},
				email: {
					required: true,
					email: true
				}
			},

			messages: {
				username: {
					required: 'Tên tài khoản không được bỏ trống'
				},
				phone: {
					number: 'Vui lòng nhập số điện thoại chính xác'
				},
				email: {
					required: 'Email không được bỏ trống',
					email: 'Vui lòng nhập đúng email'
				}
			},

			errorPlacement: function (error, element) { // render error placement for each input type
				if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
			},

			highlight: function(element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			unhighlight: function (element) { // revert the change done by hightlight
				$(element)
					.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

			success: function(label) {
				label.closest('.form-group').removeClass('has-error');
				label.remove();
			},

			submitHandler: function(form) {
				form.submit(); // form validation success, call ajax form submit
			}
		});

		$('#user_form input').keypress(function(e) {
			if (e.which == 13) {
				if ($('#user_form').validate().form()) {
					$('#user_form').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});
	}

	var handleChangePassword = function() {

		$('#user_change_password').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				current_password: {
					required: true
				},
				new_password: {
					required: true
				},
				retype_new_password: {
					required: true,
					equalTo: '#new_password'
				}
			},

			messages: {
				current_password: {
					required: 'Mật khẩu hiện tại không được bỏ trống'
				},
				new_password: {
					required: 'Mật khẩu mới không được bỏ trống'
				},
				retype_new_password: {
					required: 'Mật khẩu xác nhận không được bỏ trống',
					equalTo: 'Mật khẩu xác nhận không trùng khớp'
				}
			},

			errorPlacement: function (error, element) { // render error placement for each input type
				if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
			},

			highlight: function(element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			unhighlight: function (element) { // revert the change done by hightlight
				$(element)
					.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

			success: function(label) {
				label.closest('.form-group').removeClass('has-error');
				label.remove();
			},

			submitHandler: function(form) {
				form.submit(); // form validation success, call ajax form submit
			}
		});

		$('#user_change_password input').keypress(function(e) {
			if (e.which == 13) {
				if ($('#user_change_password').validate().form()) {
					$('#user_change_password').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});
	}

	return {
		//main function to initiate the module
		init: function() {

			handleCreate();
			handleChangePassword();
		}

	};

}();
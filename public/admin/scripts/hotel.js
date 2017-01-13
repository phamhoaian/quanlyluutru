$(document).ready(function() {
	// initialize
	Hotel.init();

	$('#list').click(function(event){
		event.preventDefault();
		if ($(this).hasClass("active")) {
			return false;
		} else {
			$(this).addClass('active');
			$('#grid').removeClass('active');
			$('#hotel_list').removeClass('hidden');
			$('#hotel_grid').addClass('hidden');
		}
	});

	$('#grid').click(function(event){
		event.preventDefault();
		if ($(this).hasClass("active")) {
			return false;
		} else {
			$(this).addClass('active');
			$('#list').removeClass('active');
			$('#hotel_list').addClass('hidden');
			$('#hotel_grid').removeClass('hidden');
		}
	});
});

var Hotel = function() {

	var handleCreate = function() {

		$('#hotel_form').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				name: {
					required: true
				},
				address: {
					required: true
				},
				phone: {
					number: true
				},
				room: {
					number: true
				},
				email: {
					required: true,
					email: true
				},
				type: {
					required: true
				}
			},

			messages: {
				name: {
					required: 'Tên nhà nghỉ / khách sạn không được bỏ trống'
				},
				address: {
					required: 'Địa chỉ không được bỏ trống'
				},
				phone: {
					number: 'Vui lòng nhập số điện thoại chính xác'
				},
				room: {
					number: 'Vui lòng nhập số phòng chính xác'
				},
				email: {
					required: 'Email không được bỏ trống',
					email: 'Vui lòng nhập đúng email'
				},
				type: {
					required: 'Vui lòng chọn loại hình kinh doanh'
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

		$('#hotel_form input').keypress(function(e) {
			if (e.which == 13) {
				if ($('#hotel_form').validate().form()) {
					$('#hotel_form').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});
	}

	return {
		//main function to initiate the module
		init: function() {

			handleCreate();
		}

	};

}();
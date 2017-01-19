$(document).ready(function() {
	// initialize
	Staying.init();
});

var Staying = function() {

	var handleStaying = function() {

		$('#staying_form').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				name: {
					required: true
				},
				year_of_birth: {
					required: true,
					number: true
				},
				id_card: {
					required: true,
					number: true
				},
				address: {
					required: true
				},
				sex: {
					required: true,
					number: true
				},
				room_number: {
					required: true,
				},
				date_start: {
					required: true
				},
				date_end: {
					required: true
				},
				check_in: {
					required: true
				},
				check_out: {
					required: true
				}
			},

			messages: {
				name: {
					required: 'Họ và tên không được bỏ trống'
				},
				year_of_birth: {
					required: 'Vui lòng chọn năm sinh',
					number: 'Chỉ cho phép nhập số'
				},
				id_card: {
					required: 'Số CMND không được bỏ trống',
					number: 'Chỉ cho phép nhập số'
				},
				address: {
					required: 'Hộ khẩu thường trú không được bỏ trống'
				},
				sex: {
					required: 'Vui lòng chọn giới tính',
					number: 'Chỉ cho phép nhập số'
				},
				room_number: {
					required: 'Số phòng không được bỏ trống',
				},
				date_start: {
					required: 'Ngày vào không được bỏ trống'
				},
				date_end: {
					required: 'Ngày ra không được bỏ trống'
				},
				check_in: {
					required: 'Thời gian vào không được bỏ trống'
				},
				check_out: {
					required: 'Thời gian ra không được bỏ trống'
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
				$('button[type="submit"]').attr('disabled', '');
				form.submit(); // form validation success, call ajax form submit
			}
		});

		$('#staying_form input').keypress(function(e) {
			if (e.which == 13) {
				if ($('#staying_form').validate().form()) {
					$('#staying_form').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});
	};

	var handleTimePicker = function(){
		if (jQuery().timepicker) {
			$('.timepicker').timepicker({
				autoclose: true,
				minuteStep: 5,
				showSeconds: false,
				showMeridian: false
			});
		}
	};

	var handleDatePicker = function () {

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
                language: 'vi'
            });
        }
    }

	return {
		//main function to initiate the module
		init: function() {

			handleStaying();			
			handleDatePicker();
			handleTimePicker();
		}

	};

}();
$(document).ready(function() {
	// initialize
	Staying.init();
});

var Staying = function() {

	var handleStaying = function() {

		var domestic_rules = {
			id_card: {
				required: true,
				number: true
			},
			address: {
				required: true
			}
		};

		var foreign_rules = {
			nationality: {
				required: true
			},
			passport: {
				required: true
			},
			passport_info: {
				required: true
			},
			date_entry: {
				required: true
			},
			port_entry: {
				required: true
			},
			purpose_entry: {
				required: true
			},
			permitted_start: {
				required: true
			},
			permitted_end: {
				required: true
			}
		};

		if ($('#domestic').is(':checked'))
		{
			registerDomestic();
		}
		if ($('#foreign').is(':checked'))
		{
			registerForeign();
		}

		$('input:radio[name="foreign_flg"]').change(function(){
			if ($(this).is(':checked') && $(this).val() == 0) 
			{
	            registerDomestic();
	            removeRules(foreign_rules);
				addRules(domestic_rules);
	        }
	        else
	        {
	        	registerForeign();
	        	removeRules(domestic_rules);
				addRules(foreign_rules);
	        }
		});

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
				foreign_flg: {
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
				foreign_flg: {
					required: 'Vui lòng chọn loại khách'
				},
				nationality: {
					required: 'Quốc tịch không được bỏ trống'
				},
				passport: {
					required: 'Số hộ chiếu không được bỏ trống'
				},
				passport_info: {
					required: 'Thông tin hộ chiếu không được bỏ trống'
				},
				date_entry: {
					required: 'Ngày nhập cảnh không được bỏ trống'
				},
				port_entry: {
					required: 'Cửa khẩu nhập cảnh không được bỏ trống'
				},
				purpose_entry: {
					required: 'Mục đích nhập cảnh không được bỏ trống'
				},
				permitted_start: {
					required: 'Ngày bắt đầu không được bỏ trống'
				},
				permitted_end: {
					required: 'Ngày kết thúc không được bỏ trống'
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
		addRules(domestic_rules);

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

    var registerDomestic = function() {
    	$('.foreign_form').addClass('hidden');
		$('.domestic_form').removeClass('hidden');
		$('.foreign_form').removeClass('has-error');
		$('.foreign_form').find('.help-block-error').remove();
    }

   	var registerForeign = function() {
   		$('.foreign_form').removeClass('hidden');
		$('.domestic_form').addClass('hidden');
		$('.domestic_form').removeClass('has-error');
		$('.domestic_form').find('.help-block-error').remove();
   	}

    var addRules = function(rules) {
    	for (var item in rules){
	       $('input[name="' + item + '"]').rules('add', rules[item]);  
	    }
    }

    var removeRules = function(rules) {
    	for (var item in rules){
	       $('input[name="' + item + '"]').rules('remove');
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
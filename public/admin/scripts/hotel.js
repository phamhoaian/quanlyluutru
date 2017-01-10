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
				hotel_name: {
					required: true
				},
				hotel_address: {
					required: true
				},
				hotel_phone: {
					number: true
				},
				hotel_room: {
					number: true
				},
				hotel_email: {
					required: true,
					email: true
				},
				hotel_type: {
					required: true
				},
				owner_name: {
					required: true
				},
				owner_birthday: {
					required: true
				},
				owner_id_card: {
					required: true
				},
				owner_address: {
					required: true
				},
				owner_business_cert: {
					required: true
				},
				owner_security: {
					required: true
				}
			},

			messages: {
				hotel_name: {
					required: 'Tên nhà nghỉ / khách sạn không được bỏ trống'
				},
				hotel_address: {
					required: 'Địa chỉ không được bỏ trống'
				},
				hotel_phone: {
					number: 'Vui lòng nhập số điện thoại chính xác'
				},
				hotel_room: {
					number: 'Vui lòng nhập số phòng chính xác'
				},
				hotel_email: {
					required: 'Email không được bỏ trống',
					email: 'Vui lòng nhập đúng email'
				},
				hotel_type: {
					required: 'Vui lòng chọn loại hình kinh doanh'
				},
				owner_name: {
					required: 'Họ và tên không được bỏ trống'
				},
				owner_birthday: {
					required: 'Ngày tháng năm sinh không được bỏ trống'
				},
				owner_id_card: {
					required: 'Số CMND không được bỏ trống'
				},
				owner_address: {
					required: 'Hộ khẩu thường trú không được bỏ trống'
				},
				owner_business_cert: {
					required: 'Số giấy chứng nhận đăng ký kinh doanh không được bỏ trống'
				},
				owner_security: {
					required: 'Số giấy an ninh trật tự không được bỏ trống'
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

	var handleDatabaseTable = function() {
		var table = $('#list_hotels');

        // begin first table
        table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "Không có dữ liệu",
                "info": "Hiển thị _START_ đến _END_ trên tổng số _TOTAL_",
                "infoEmpty": "Không có dữ liệu",
                "infoFiltered": "(lọc trên tổng số _MAX_)",
                "lengthMenu": "Hiển thị _MENU_",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không có dữ liệu nào trùng khớp",
                "paginate": {
                    "previous":"Trang trước",
                    "next": "Trang kế",
                    "last": "Trang cuối",
                    "first": "Trang đầu"
                }
            },

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "Tất cả"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,            
            "pagingType": "bootstrap_full_number",
            "columnDefs": [
                {  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }, 
                {
                    "searchable": false,
                    "targets": [0]
                },
                {
                    "className": "dt-right", 
                    //"targets": [2]
                }
            ],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#list_users_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).prop("checked", true);
                    $(this).parents('tr').addClass("active");
                } else {
                    $(this).prop("checked", false);
                    $(this).parents('tr').removeClass("active");
                }
            });
        });

        table.on('change', 'tbody tr .checkboxes', function () {
            $(this).parents('tr').toggleClass("active");
        });
	}

	return {
		//main function to initiate the module
		init: function() {

			handleCreate();
			handleDatabaseTable();
		}

	};

}();
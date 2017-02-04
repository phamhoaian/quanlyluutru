var TableDatatablesAjax = function () {

    var initPickers = function () {

        $('#date_range').daterangepicker({
                opens: 'left',
                format: 'DD/MM/YYYY',
                separator: ' - ',
                autoUpdateInput: false,
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    '7 ngày gần đây': [moment().subtract('days', 6), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                locale: {    
                    format: 'DD/MM/YYYY',                    
                    applyLabel: 'Áp dụng',
                    cancelLabel: 'Hủy',
                    fromLabel: 'Từ',
                    toLabel: 'Đến',
                    customRangeLabel: 'Tùy chọn',
                    daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    monthNames: ['Tháng một', 'Tháng hai', 'Tháng ba', 'Tháng tư', 'Tháng năm', 'Tháng sáu', 'Tháng bảy', 'Tháng tám', 'Tháng chín', 'Tháng mười', 'Tháng mười một', 'Tháng mười hai'],
                    firstDay: 1
                },
                showCustomRangeLabel: false,
                alwaysShowCalendars: true,
            },
            function (start, end) {
                $('#date_range input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            }
        );

        $('#date_range').on('apply.daterangepicker', function(ev, picker){
            $('#date_range input').val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
    }

    var handleSearch = function () {

        var grid = new Datatable();

        grid.init({
            src: $("#search"),
            onSuccess: function (grid, response) {
                // grid:        grid object
                // response:    json object of server side ajax response
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
            },
            loadingMessage: 'Đang xử lý...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                "dom": "<'row'<'col-md-12 col-sm-12 margin-bottom-20'pli>r><'table-responsive't><'row'<'col-md-12 col-sm-12'pli>>", // datatable layout
                
                "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "Tất cả"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": base_url + "/quan-ly/tim-kiem", // ajax source
                },
                "order": [
                    [7, "desc"]
                ],
                "columnDefs": [{ // define columns sorting options(by default all columns are sortable extept the first checkbox column)
                    'orderable': false,
                    'targets': [2,3,4,5,6]
                }],

                buttons: [
                    { extend: 'print', className: 'btn default' },
                    { extend: 'excel', className: 'btn default' },
                    {
                        text: 'Reload',
                        className: 'btn default',
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                            alert('Datatable reloaded!');
                        }
                    }
                ],
            }
        });

        // handle datatable custom tools
        $('#datatable_ajax_tools > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            grid.getDataTable().button(action).trigger();
        });
    }

    var handleCounting = function () {

        var grid = new Datatable();

        grid.init({
            src: $("#counting"),
            onSuccess: function (grid, response) {
                // grid:        grid object
                // response:    json object of server side ajax response
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
            },
            loadingMessage: 'Đang xử lý...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                "dom": "<'row'<'col-md-6 col-sm-12 margin-bottom-10'pli><'col-md-6 col-sm-12 margin-bottom-10'<'table-group-actions text-right'>>r><'table-responsive't><'row'<'col-md-6 col-sm-12'pli><'col-md-6 col-sm-12'>>", // datatable layout
                
                "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "Tất cả"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": base_url + "/quan-ly/thong-ke", // ajax source
                },
                "order": [
                    [0, "asc"]
                ],// set first column as a default sort by asc

                buttons: [
                    { extend: 'print', className: 'btn default' },
                    { extend: 'excel', className: 'btn default' },
                    {
                        text: 'Reload',
                        className: 'btn default',
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                            alert('Datatable reloaded!');
                        }
                    }
                ],
            }
        });

        // handle datatable custom tools
        $('#datatable_ajax_tools > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            grid.getDataTable().button(action).trigger();
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            
            handleSearch();
            handleCounting();
            initPickers();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesAjax.init();
});
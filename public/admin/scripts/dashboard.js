var Dashboard = function() {

	return {
		initCharts: function() {

	        var visitors = [];

	        $('input[name="type"]').on('change', function(){
	        	var type = $(this).val();
	        	var token = $('meta[name="csrf-token"]').attr('content');

	        	$.ajax({
	        		url: base_url + '/quan-ly/thong-ke',
	        		type: 'POST',
	        		dataType: 'json',
	        		headers: {'X-CSRF-Token': token},
	        		data: {
	        			'type': type,
	        			'_token': token
	        		},
	        		beforeSend: function(xhr) {
	        			$('#site_statistics_loading').show();
	        			$('#summary_analytics').hide();
	        		},
	        		success: function(data) {
	        			$('#site_statistics_loading').hide();
		        		$('#summary_analytics').show();

		        		visitors = [];
		        		$.each(data.men_visitors, function(){

		        			var date = new Date(this.date);
		        			switch(data.type) {
	        					case 'week':
	        						visitors.push(['TUẦN ' + this.week + '/' + date.getFullYear(), this.number]);
	        						break;
        						case 'month':        							
        							visitors.push(['THÁNG ' + this.month + '/' + date.getFullYear(), this.number]);
        							break;
    							default:
    								visitors.push([date.getDate() + '/' + (date.getMonth() + 1), this.number]);
    							 	break;
		        			}
		        			
		        		});		        			        		

		        		Morris.Bar({
							element: 'summary_analytics',
							data: [
								{ y: '25/12', a: 100, b: 90 },
								{ y: '26/12', a: 75,  b: 65 },
								{ y: '27/12', a: 50,  b: 40 },
								{ y: '28/12', a: 75,  b: 65 },
								{ y: '29/12', a: 50,  b: 40 },
								{ y: '30/12', a: 75,  b: 65 },
								{ y: '31/12', a: 100, b: 90 }
							],
							xkey: 'y',
							ykeys: ['a', 'b'],
							labels: ['Nam', 'Nữ'],
							barColors: ['#0B62A4', '#D30000'],
							hideHover: 'auto',
							resize: true
						});
	        		},
	        		failed: function(data) {
	        			$('#site_statistics_loading').hide();
	        		}
	        	});
	        });

	        // select first type as default
	        $('input[name="type"]:first').click();
	    },	

	    init: function() {

	    	this.initCharts();
	    }
	};

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); 
    });
}
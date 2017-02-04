var Dashboard = function() {

	return {
		initCharts: function() {

	        var visitors = [];

	        $('input[name="type"]').on('change', function(){
	        	var type = $(this).val();
	        	var token = $('meta[name="csrf-token"]').attr('content');

	        	$.ajax({
	        		url: base_url + '/quan-ly/tra-cuu',
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
		        		$('#summary_analytics').html('');

		        		visitors = [];
		        		if (data.visitors)
		        		{
		        			$.each(data.visitors, function(){

			        			var day = new Date(this.day);
			        			switch(data.type) {
		        					case 'week':
		        						visitors.push({ y: 'TUẦN ' + this.week + '/' + day.getFullYear(), a: this.men, b: this.women});
		        						break;
	        						case 'month':        							
	        							visitors.push({ y: 'THÁNG ' + this.month + '/' + day.getFullYear(), a: this.men, b: this.women});
	        							break;
	    							default:
	    								visitors.push({ y: day.getDate() + '/' + (day.getMonth() + 1), a: this.men, b: this.women});
	    							 	break;
			        			}
			        			
			        		});		        			        		

			        		Morris.Bar({
								element: 'summary_analytics',
								data: visitors,
								xkey: 'y',
								ykeys: ['a', 'b'],
								labels: ['Nam', 'Nữ'],
								barColors: ['#0B62A4', '#D30000'],
								hideHover: 'auto',
								resize: true
							});
		        		}
		        		else
		        		{
		        			$('#summary_analytics').html('Không có dữ liệu');
		        		}	
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
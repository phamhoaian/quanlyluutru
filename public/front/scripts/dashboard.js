var Dashboard = function() {

	return {
		initCharts: function() {
	        if (!jQuery.plot) {
	            return;
	        }

	        function showChartTooltip(x, y, xValue, yValue) {
	            $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
	                position: 'absolute',
	                display: 'none',
	                top: y - 40,
	                left: x - 40,
	                border: '0px solid #ccc',
	                padding: '2px 6px',
	                'background-color': '#fff'
	            }).appendTo("body").fadeIn(200);
	        }

	        var data = [];
	        var totalPoints = 250;

	        // random data generator for plot charts

	        function getRandomData() {
	            if (data.length > 0) data = data.slice(1);
	            // do a random walk
	            while (data.length < totalPoints) {
	                var prev = data.length > 0 ? data[data.length - 1] : 50;
	                var y = prev + Math.random() * 10 - 5;
	                if (y < 0) y = 0;
	                if (y > 100) y = 100;
	                data.push(y);
	            }
	            // zip the generated y values with the x values
	            var res = [];
	            for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
	            return res;
	        }

	        function randValue() {
	            return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
	        }

	        var visitors = [];

	        var options = {
	        	xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,
                    mode: "categories",
                    min: 0,
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 5,
                    tickDecimals: 0,
                    tickColor: "#eee",
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
	        };

	        $('input[name="type"]').on('change', function(){
	        	var type = $(this).val();
	        	var token = $('meta[name="csrf-token"]').attr('content');

	        	$.ajax({
	        		url: base_url + '/thong-ke',
	        		type: 'POST',
	        		dataType: 'json',
	        		headers: {'X-CSRF-Token': token},
	        		data: {
	        			'type': type,
	        			'_token': token
	        		},
	        		beforeSend: function(xhr) {
	        			$('#site_statistics_loading').show();
	        			$('#site_statistics_content').hide();
	        		},
	        		success: function(data) {
	        			$('#site_statistics_loading').hide();
		        		$('#site_statistics_content').show();

		        		visitors = [];

		        		if (data.visitors != '')
		        		{
		        			$.each(data.visitors, function(){

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

			        		var plot_statistics = $.plot($("#site_statistics"), [{
			                    data: visitors,
			                    lines: {
			                        fill: 0.6,
			                        lineWidth: 0
			                    },
			                    color: ['#f89f9f']
			                }, {
			                    data: visitors,
			                    points: {
			                        show: true,
			                        fill: true,
			                        radius: 5,
			                        fillColor: "#f89f9f",
			                        lineWidth: 3
			                    },
			                    color: '#fff',
			                    shadowSize: 0
			                }], options);
		        		}
		        		else
		        		{
		        			
		        		}
	        		},
	        		failed: function(data) {
	        			$('#site_statistics_loading').hide();
	        		}
	        	});
	        });

	        if ($('#site_statistics').size() != 0) {

	            $('#site_statistics_loading').hide();
	            $('#site_statistics_content').show();	            

	            var previousPoint = null;
	            $("#site_statistics").bind("plothover", function(event, pos, item) {
	                $("#x").text(pos.x.toFixed(2));
	                $("#y").text(pos.y.toFixed(2));
	                if (item) {
	                    if (previousPoint != item.dataIndex) {
	                        previousPoint = item.dataIndex;

	                        $("#tooltip").remove();
	                        var x = item.datapoint[0].toFixed(2),
	                            y = item.datapoint[1].toFixed(2);

	                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' khách');
	                    }
	                } else {
	                    $("#tooltip").remove();
	                    previousPoint = null;
	                }
	            });
	        }

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
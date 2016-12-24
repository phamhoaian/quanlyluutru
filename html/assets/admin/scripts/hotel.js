$(document).ready(function() {
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
$(document).ready(function(){
 
    $('#my_radio_box [type="radio"]').on('change', function() {
	        $(this)
	        .prev().addClass('checked')
	        .siblings().removeClass('checked');
	    });
});
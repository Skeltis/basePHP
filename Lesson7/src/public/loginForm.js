$(document).ready(function(){

	$('.tabs .tab').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.tabs .tab').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});

	$('.input').blur(function(){
		tmpval = $(this).val();
		if(tmpval == '') {
			$(this).addClass('');
			$(this).removeClass('not-empty');
		} else {
			$(this).addClass('not-empty');
			$(this).removeClass('');
		}
	});

})

$(function(){
	$('#register-panel').hide();

	$('#get-registration-panel').hover(
		function(){
		$( this ).addClass('blue');
	},
		function(){
		$( this ).removeClass('blue');
		}

	);

	$('#get-registration-panel').click(
		function () {
			$('#login-panel').hide();
			$('#register-panel').show();
		}
	);

});

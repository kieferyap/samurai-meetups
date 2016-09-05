$(document).ready(function() {
	$(document).on('click', '#btn-send-email', function() {
		var adminEmail = $('#contact-data').data('admin-email');
		var title = $.trim($('#contactform-title').val());
		var message = $.trim($('#contactform-message').val());

		// TO-DO: Change spaces to %20???
		if (title.length > 0 && message.length > 0) {
			$('#error-all-fields-required').addClass('hidden');
			window.location = 'mailto:'+adminEmail+'?subject='+title+'&body='+message;
		}
		else {
			$('#error-all-fields-required').removeClass('hidden');
		}
	});
});
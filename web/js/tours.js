$(document).ready(function() {
	$(document).on('click', '#terms-of-service-checkbox', function(){		
		if (document.getElementById('terms-of-service-checkbox').checked) {
			$('#btn-join-tour').prop("disabled", false);
		}
		else {
			$('#btn-join-tour').prop("disabled", true);
		}
	}).on('click', '#btn-join-tour', function(){
		window.location = $('#tour-data').data('google-doc-url');
	});
});
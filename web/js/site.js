$(document).ready(function() {
	$(document).on('click', '#terms-of-service-checkbox', function(){		
		if (document.getElementById('terms-of-service-checkbox').checked) {
			$('#terms-of-service-target-button').prop("disabled", false);
		}
		else {
			$('#terms-of-service-target-button').prop("disabled", true);
		}
	});
});

function test() {
	alert("Test");
}
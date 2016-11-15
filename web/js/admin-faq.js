$(document).ready(function() {

	$(document).on('click', '.btn-delete', function() {
		var confirmed = confirm("This action cannot be undone. Are you sure?");
		if (confirmed) {
			var row = $(this).parent().parent();
			var hideDelay = 500;
			$.ajax({
				type: 'POST',
				url: $(this).data('delete-url'),
				data: {
					'id': $(this).data('id')
				},
				success: function(msg){
					row.hide(hideDelay);
				},
				error: function(msg){
					// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
					alert("An unknown error has occured. Press OK to reload.");
					location.reload();
				}
			});
		}		
	});	
});
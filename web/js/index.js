$(document).ready(function() {
	$(document).on('click', '#toggle-language', function(event) {
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $('#samurai-meetups-data').data('toggle-language-url'),
			success: function(msg){
				alert('SUCCESS >>>'+msg);
				location.reload();
			},
			error: function(msg){
				alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				// alert("An unknown error has occured. Press OK to reload.");
				location.reload();
			}
		});
	});
});
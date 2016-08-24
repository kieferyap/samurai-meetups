$(document).ready(function() {
	$(document).on('click', '#toggle-language', function() {
		if ($('#samurai-meetups-data').data('is-toggle-clicked') == 0)
		{
			$('#samurai-meetups-data').data('is-toggle-clicked', 1);
			$.ajax({
				url: $('#samurai-meetups-data').data('toggle-language-url'),
				success: function(msg){
					location.reload();
				},
				error: function(msg){
					alert("An unknown error has occured. Press OK to reload.");
					location.reload();
				}
			});
		}
	});
});
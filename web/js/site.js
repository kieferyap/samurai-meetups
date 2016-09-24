$(document).ready(function() {
	if ($('body').height() == $(document).height()) {
		$('.footer').css('position', 'fixed');
		$('.footer').css('left', 0);
		$('.footer').css('right', 0);
		$('.footer').css('bottom', 0);
	}

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
					// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
					// location.reload();
				}
			});
		}
	});
});

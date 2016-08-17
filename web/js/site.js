$(document).ready(function() {
	$(document).on('click', '#terms-of-service-checkbox', function(){		
		if (document.getElementById('terms-of-service-checkbox').checked) {
			$('#terms-of-service-target-button').prop("disabled", false);
		}
		else {
			$('#terms-of-service-target-button').prop("disabled", true);
		}
	})
	.on('click', '#report-show-more-btn', function() {
		$('#report-show-more-btn').text('Loading...').prop('disabled', true);

		$.ajax({
			type: 'POST',
			url: $('#report-information').data('show-more-url'),
			data: {
				'id': $('#report-information').data('last-report-id')
			},
			success: function(msg){
				var json = JSON.parse(msg);
				var reportId = 0;

				if (json.length > 0) {
					for(key in json) {
						var element = json[key]
						
						reportId = element['report_id'];
						var shortDescription = element['short_description'];
						var sidebarImageUrl = element['sidebar_image_url'];
						sidebarImageUrl = $('#report-information').data('base-image-url')+sidebarImageUrl;

						$('#new-report-element .report-sidebar-element').attr('data-id', reportId);
						$('#new-report-element .report-sidebar-element .report-sidebar-element-photo img').attr('src', sidebarImageUrl);
						$('#new-report-element .report-sidebar-element .report-sidebar-element-text').html(shortDescription);
						$('#report-sidebar-elements').append($('#new-report-element').html());
					}

					$('#report-information').data('last-report-id', reportId);
					$('#report-show-more-btn').prop('disabled', false);
					$('#report-show-more-btn').text('Show More');
				}

				else {
					$('#report-show-more-btn').css('display', 'none');
				}
			},
			error: function(msg){
				// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				alert("An unknown error has occured. Press OK to reload.");
				location.reload();
			}
		});
	})
	.on('click', '.report-sidebar-element', function() {
		$.ajax({
			type: 'POST',
			url: $('#report-information').data('report-data-url'),
			data: {
				'id': $(this).data('id')
			},
			success: function(msg){
				var json = JSON.parse(msg);
				var scrollOffset = -75;

				$('#worker-image').attr('src', 
					$('#report-information').data('base-image-url')
					+json['worker_image_url']);
				$('#set-image').attr('src', 
					$('#report-information').data('base-image-url')
					+json['set_image_url']);
				$('#experience-image').attr('src', 
					$('#report-information').data('base-image-url')
					+json['experience_image_url']
				);
				$('#report-content-description').html(json['description']);
				$('html, body').animate({
					scrollTop: $("#report-content").offset().top+scrollOffset
				}, 500);
			},
			error: function(msg){
				alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				// alert("An unknown error has occured. Press OK to reload.");
				location.reload();
			}
		});
	});
});

function test() {
	alert("Test");
}
$(document).ready(function() {
	$(document).on('click', '#report-show-more-btn', function() {
		$('#report-show-more-btn').text($('#report-information').data('loading-localized')).prop('disabled', true);

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
						var typeClass = element['type_id'] == 1 ? 'samurai-tour' : 'discovery-tour';
						sidebarImageUrl = $('#report-information').data('base-image-url')+sidebarImageUrl;

						$('#new-report-element .report-sidebar-element').attr('data-id', reportId);
						$('#new-report-element .report-sidebar-element .report-sidebar-element-photo img').attr('src', sidebarImageUrl);
						$('#new-report-element .report-sidebar-element .report-sidebar-element-text').html(shortDescription);

						$('#new-report-element .report-sidebar-element').removeClass('samurai-tour');
						$('#new-report-element .report-sidebar-element').removeClass('discovery-tour');
						$('#new-report-element .report-sidebar-element').addClass(typeClass);

						$('#report-sidebar-elements').append($('#new-report-element').html());
					}

					$('#report-information').data('last-report-id', reportId);
					$('#report-show-more-btn').prop('disabled', false);
					$('#report-show-more-btn').text($('#report-information').data('show-more-localized'));
				}

				else {
					$('#report-show-more-btn').css('display', 'none');
				}
			},
			error: function(msg){
				// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				// alert("An unknown error has occured. Press OK to reload.");
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
				var scrollTimeMilliseconds = 500;
				var baseUrl = $('#report-information').data('base-image-url');

				$('#worker-image').attr('src', baseUrl+json['worker_image_url']);
				$('#set-image').attr('src', baseUrl+json['set_image_url']);
				$('#experience-image').attr('src', baseUrl+json['experience_image_url']);
				$('#report-content-description').html(json['description']);

				$('html, body').animate({
					scrollTop: $("#report-content").offset().top+scrollOffset
				}, scrollTimeMilliseconds);

				if ($('#report-sidebar').height() < $('#report-content').height() && $(document).width() > 990) {
					$('#report-sidebar').height($('#report-content').height());
				}
			},
			error: function(msg){
				// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				alert("An unknown error has occured. Press OK to reload.");
				location.reload();
			}
		});
	});
});
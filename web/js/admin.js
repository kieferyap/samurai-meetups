$(document).ready(function() {

	// Preparing the updates
	var fieldArray = []; // "Question (EN)"
	var typeArray = []; // "text", "textarea", "formatted-textarea", etc.

	$('.row-fields').first().find('.field').each(function() {
		fieldArray.push($(this).text());
		typeArray.push($(this).data('type'));
	})

	// Updating an entry: Displaying the modal
	$('.row-content').each(function () {
		var rowIndex = $(this).attr('id');
		$(this).find('.value').each(function(index, value) {
			var trueIndex = index % fieldArray.length; // Used for getting which fieldText to use
			var fieldText = fieldArray[trueIndex]; // e.g.: "Banner Image"
			var fieldType = typeArray[trueIndex];

			var valueText = $(value).text().trim(); // e.g.: "banner_zazen.jpg"
			var selector = ".admin-form-text";
			
			var formId = 'form-'+fieldText;
			var controlId = '';

			switch(fieldType) {
				case "text":
					selector = ".admin-form-text";
					$(selector).find('.form-control').attr('value', valueText);
					break;
				case "textarea":
					selector = ".admin-form-textarea";
					$(selector).find('.form-control').text(valueText);
					break;
				case "formatted-textarea":
					selector = ".admin-form-formatted";
					valueText = $(value).html().trim();
					$(selector).find('.form-control').attr('data-content', valueText);
					break;
				case "image-upload":
					selector = ".admin-form-image";
					$(selector).find('img').attr('src', $(value).find('img').attr('src'));
					$(selector).find('img').attr('class', $(value).find('img').attr('class'));
					$(selector).find('img').addClass('max-width-100');
					break;
				case "dropdown":
					selector = ".admin-form-dropdown";
					$(selector).find('.form-control').find('option').remove();

					var dropdownOptions = $(this).data('dropdown-options');
					$.each(dropdownOptions, function(index, value){
						$(selector).find('.form-control').append($('<option/>', { 
							value: index,
							text : value 
						}));
					});
					break;
				default:
					alert("NONE>>>"+fieldType);
					break;
			}

			$(selector).find('.control-label').attr('for', formId);
			$(selector).find('.control-label').text(fieldText);
			$(selector).find('input').attr('id', formId);

			$('.modal-inner-data-'+rowIndex).append($(selector).html());
		});
	});

	// Once the Modal's Add button has been clicked, gather all the information and update
	$('.row-fields').first().find('.field').each(function(index, value) {
		var fieldText = fieldArray[index]; // e.g.: "Banner Image"
		var fieldType = typeArray[index]; // e.g.: "image-upload"
		var selector = ".admin-form-text";
		var formId = 'form-'+fieldText;
		var controlId = '';

		switch(fieldType) {
			case "text":
				selector = ".admin-form-text";
				$(selector).find('.form-control').attr('value', '');
				break;
			case "textarea":
				selector = ".admin-form-textarea";
				$(selector).find('.form-control').text('');
				break;
			case "formatted-textarea":
				selector = ".admin-form-formatted";
				$(selector).find('.form-control').attr('data-content', '');
				break;
			case "image-upload":
				selector = ".admin-form-image";
				$(selector).find('img').attr('src', $(value).find('img').attr('src'));
				$(selector).find('img').attr('class', $(value).find('img').attr('class'));
				$(selector).find('img').addClass('max-width-100');
				break;
			case "dropdown":
				selector = ".admin-form-dropdown";
				$(selector).find('.form-control').find('option').remove();

				var dropdownOptions = $(this).data('dropdown-options');
				alert(dropdownOptions);
				$.each(dropdownOptions, function(index, value){
					$(selector).find('.form-control').append($('<option/>', { 
						value: index,
						text : value 
					}));
				});
				break;
			default:
				alert("NONE>>>"+fieldType);
				break;
		}

		$(selector).find('.control-label').attr('for', formId);
		$(selector).find('.control-label').text(fieldText);
		$(selector).find('input').attr('id', formId);

		$('.modal-inner-data-new').append($(selector).html());
	});

	var data = {};
	var fieldNameArray = [];

	$('.field').each(function() {
		fieldNameArray.push($(this).data('field'));
	});

	// Delete Button clicked
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

	// Special handling for the formattable text area (TinyMCE)
	$(document).on('click', '.btn-update', function() {
		fillAllFormattedTextArea();
	});

	// Once the Modal's Update button has been clicked, gather all the information and update
	$(document).on('click', '.btn-action-update', function() {
		data = {};
		data['id'] = $(this).data('id');
		$(this).parent().parent().find('.form-group').each(function(index, value) {
			var fieldType = typeArray[index];
			var result = "";

			switch(fieldType) {
				case "text":
					result = $(this).find('.form-control').val();
					break;
				case "textarea":
					result = $(this).find('.form-control').text();
					break;
				case "formatted-textarea":
					result = $(this).find('iframe').contents().find('html').find('.mce-content-body').html();
					break;
				case "image-upload":
					result = $(this).find('img').attr('src');
					break;
				case "dropdown":
					result = $(this).find('.form-control').val();
					break;
				default:
					alert("NONE>>>"+fieldType);
					break;
			}
			data[fieldNameArray[index]] = result;
		});

		$.ajax({
			type: 'POST',
			url: $(this).data('update-url'),
			data: data,
			success: function(msg){
				// alert(msg);
				location.reload();
			},
			error: function(msg){
				alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				// alert("An unknown error has occured. Press OK to reload.");
				// location.reload();
			}
		});
	});

	// Add new entry was clicked
	$(document).on('click', '.btn-add', function() {
		fillAllFormattedTextArea();
	});

	// Inserting a new entry
	$(document).on('click', '.btn-action-add', function() {
		data = {};
		$(this).parent().parent().find('.form-group').each(function(index, value) {
			var fieldType = typeArray[index];
			var result = "";

			switch(fieldType) {
				case "text":
					result = $(this).find('.form-control').val();
					break;
				case "textarea":
					result = $(this).find('.form-control').text();
					break;
				case "formatted-textarea":
					result = $(this).find('iframe').contents().find('html').find('.mce-content-body').html();
					break;
				case "image-upload":
					alert("D:");
					break;
				case "dropdown":
					alert("D:");
					break;
				default:
					alert("NONE>>>"+fieldType);
					break;
			}

			data[fieldNameArray[index]] = result;
		});

		$.ajax({
			type: 'POST',
			url: $(this).data('add-url'),
			data: data,
			success: function(msg){
				location.reload();
			},
			error: function(msg){
				// alert(msg);
				// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				alert("An unknown error has occured. Press OK to reload.");
				location.reload();
			}
		});
	});

	// File upload
	$('.browse-file-modal').on('change', function() {
		// Change the photo
		var file = this.files[0];
		var name = file.name;
		var size = file.size;
		var type = file.type;

		// Change photo into a loading pic
		var reader = new FileReader();
		var browseFileInputParent = $(this).parent();
		var loadingGif = $('#ajax-loading-image').data('url')
		var oldPhoto = browseFileInputParent.find('img').attr('src');

		browseFileInputParent.find('img').attr('src', loadingGif)

		reader.onload = function(e) {
			// Upload the image file here and return the filename
			$.ajax({
				type: 'POST',
				url: $('#ajax-upload-image').data('url'),
				data: {
					'image': e.target.result,
					'filename': name,
					'type': type,
					'size': size
				},
				success: function(msg){
					var response = JSON.parse(msg);
					if (response.success) {
						browseFileInputParent.find('img').attr('src', response.message);
					}
					else {
						alert(response.message);
						browseFileInputParent.find('img').attr('src', oldPhoto);
					}
				},
				error: function(msg){
					alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				}
			});

			
		}
		reader.readAsDataURL(this.files[0]);
	})
});

function fillAllFormattedTextArea() {
	$('.tinymce').each(function(index, value){
		// Ignore the very first one because that is the hidden one
		if (index > 0) {
			var content = $(this).data('content');

			// For some very weird reason, TinyMCE does not always fill its iframes with the correct HTML. This looks ugly but it is to remedy that problem.
			// var whyMustYouDoThisToMe = '<head></head><body spellcheck="false" id="tinymce" class="mce-content-body" data-id="???" contenteditable="true"></body>';
			// $(this).parent().find('iframe').contents().find('html').html(whyMustYouDoThisToMe);
			// alert($(this).parent().find('iframe').contents().find('html').html());
			$(this).parent().find('iframe').contents().find('html').find('.mce-content-body').html(content);
		}
	});
}
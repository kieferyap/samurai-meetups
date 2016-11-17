$(document).ready(function() {

	// Preparing the updates
	var fieldArray = []; // "Question (EN)"
	var typeArray = []; // "text", "textarea", "formatted-textarea", etc.

	$('.field').each(function() {
		fieldArray.push($(this).text());
		typeArray.push($(this).data('type'));
	})

	// Fill the update modal
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
				default:
					alert("NONE");
					break;
			}

			$(selector).find('.control-label').attr('for', formId);
			$(selector).find('.control-label').text(fieldText);
			$(selector).find('input').attr('id', formId);

			$('.modal-inner-data-'+rowIndex).append($(selector).html());
		});
	});

	$('.field').each(function(index, value) {
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
			default:
				alert("NONE");
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
	})

	// Delete Button
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
					alert("D:");
					break;
				default:
					alert("NONE");
					break;
			}

			data[fieldNameArray[index]] = result;
		});

		$.ajax({
			type: 'POST',
			url: $(this).data('update-url'),
			data: data,
			success: function(msg){
				location.reload();
			},
			error: function(msg){
				// alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
				alert("An unknown error has occured. Press OK to reload.");
				location.reload();
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
				default:
					alert("NONE");
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
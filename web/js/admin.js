$(document).ready(function() {

	/*
	*	Implementation notes:
	*		- Update button must have a data-id
	*		- Update Action button must also have a data-id 
	*/	

	// Gather all the fields
	var fieldArray = []; // "Question (EN)"
	var typeArray = []; // "text", "textarea", "formatted-textarea", etc.
	var fieldNameArray = []; // "question_en"

	$('.row-fields').first().find('.field').each(function() {
		fieldArray.push($(this).text());
		typeArray.push($(this).data('type'));
		fieldNameArray.push($(this).data('field'));
	})

	// Once the UPDATE button is clicked, fill the modal.
	$('.btn-update').on('click', function() {
		var dataId = $(this).data('id');
		if ($('.modal-inner-data-'+dataId).html().trim() == ""){
			$(this).parent().parent().find('.value').each(function(index, value) {
				fillUpdateModal(dataId, index, value, fieldArray, typeArray);
			});

			// All newly-added formattable textarea in the modal must be editable
			$('.modal-inner-data-'+dataId).find('.formatted-textarea').each(function() {
				$(this).tinymce({
					menubar: false,
					plugins: ['lists link'],
					toolbar1: 'bold italic underline link | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify'
				});
			});
		}
	});

	// Once the SAVE button is clicked, gather the updated information and toss it to the controller.
	$('.btn-action-update').on('click', function() {
		saveUpdateModal($(this), $(this).data('update-url'), typeArray, fieldNameArray);
	});

	// Once the ADD button is clicked, fill the modal.
	$('.btn-add').on('click', function() {

	});

	// Once the INSERT button is clicked, gather the newly-added information and toss it to the controller.
	$('.btn-action-add').on('click', function() {

	});

	//=====================================================

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

	// Inserting a new entry
	$(document).on('click', '.btn-action-add', function() {
		data = {};
		$(this).parent().parent().find('.form-group').each(function(index, value) {
			var fieldType = typeArray[index];
			var result = "";

			switch(fieldType) {
				case "text":
					result = $(this).find('.form-element').val();
					break;
				case "textarea":
					result = $(this).find('.form-element').text();
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

function saveUpdateModal(buttonElement, actionUrl, typeArray, fieldNameArray) {
	data = {};
	data['id'] = $(buttonElement).data('id');
	alert($(buttonElement).parent().parent().html());
	$(buttonElement).parent().parent().find('.form-group').each(function(index, value) {
		var fieldType = typeArray[index];
		var result = "";

		switch(fieldType) {
			case "text":
				alert("Text>>>"+$(this).html());
				result = $(this).find('.form-control').val();
				break;
			case "textarea":
				result = $(this).find('.form-control').text();
				break;
			case "formatted-textarea":
				alert("FormattedTextArea>>>"+$(this).html());
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
		url: actionUrl,
		data: data,
		success: function(msg){
			alert(msg);
			// location.reload();
		},
		error: function(msg){
			alert('Whoops, looks like something went wrong... \n\n Message: '+msg['responseText']+'\n Refreshing...');
			// alert("An unknown error has occured. Press OK to reload.");
			// location.reload();
		}
	});
}

function fillUpdateModal(dataId, index, value, fieldArray, typeArray) {

	var trueIndex = index % fieldArray.length; // Used for getting which fieldText to use
	var valueText = $(value).text().trim(); // e.g.: "banner_zazen.jpg"
	var fieldText = fieldArray[trueIndex]; // e.g.: "Banner Image"
	var fieldType = typeArray[trueIndex];
	var newElement = '';

	var selector = ".admin-form-text";
	
	var formId = 'form-'+fieldText;
	var controlId = '';

	switch(fieldType) {
		case "text":
			selector = ".admin-form-text";
			$(selector).find('.form-control').attr('value', valueText);
			newElement = $(selector).find('.form-content').html();
			break;
		case "textarea":
			selector = ".admin-form-textarea";
			$(selector).find('.form-control').text(valueText);
			newElement = $(selector).find('.form-content').html();
			break;
		case "formatted-textarea":
			selector = ".admin-form-formatted";
			valueText = $(value).html().trim();

			$(selector).find('.form-element').html($(selector).find('.form-control-source').html());
			$(selector).find('.form-element').find('textarea').text(valueText);
			$(selector).find('.form-element').find('textarea').addClass('formatted-textarea');
			newElement = $(selector).find('.form-label').html()
				+"<br/>"
				+$(selector).find('.form-element').html()
				+"<br/>";
			break;
		case "image-upload":
			selector = ".admin-form-image";
			$(selector).find('img').attr('src', $(value).find('img').attr('src'));
			$(selector).find('img').attr('class', $(value).find('img').attr('class'));
			$(selector).find('img').addClass('max-width-100');
			newElement = $(selector).find('.form-content').html();
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
			newElement = $(selector).find('.form-content').html();
			break;
		default:
			alert("NONE>>>"+fieldType);
			break;
	}

	$(selector).find('.control-label').attr('for', formId);
	$(selector).find('.control-label').text(fieldText);
	$(selector).find('input').attr('id', formId);

	alert(newElement);
	$('.modal-inner-data-'+dataId).append(newElement);
}
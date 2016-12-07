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
		var modalSelector = '.modal-inner-data-'+dataId;
		if ($(modalSelector).html().trim() == ""){
			$('#row-'+dataId).find('.value').each(function(index, value) {
				fillModal($(this), dataId, index, value, fieldArray, typeArray);
			});

			makeModalTextAreaEditable(modalSelector);
		}
	});

	// Once the SAVE button is clicked, gather the updated information and toss it to the controller.
	$('.btn-action-update').on('click', function() {
		saveUpdateModal($(this), $(this).data('update-url'), typeArray, fieldNameArray, false);
	});

	// Once the ADD button is clicked, fill the modal.
	$('.btn-add').on('click', function() {
		var modalSelector = '.modal-inner-data-new';
		if ($(this).parent().find(modalSelector).html().trim() == ""){
			$('.row-fields').first().find('.field').each(function(index, value) {
				fillModalAdd($(this), index, value, fieldArray, typeArray);
			});
			makeModalTextAreaEditable(modalSelector);
		}
	});

	// Once the INSERT button is clicked, gather the newly-added information and toss it to the controller.
	$('.btn-action-add').on('click', function() {
		saveUpdateModal($(this), $(this).data('add-url'), typeArray, fieldNameArray, true);

	});

	// Once the DELETE button is clicked, confirm the destructive action, and delete if the user has approved it.
	$(document).on('click', '.btn-delete', function() {
		deleteElement($(this));		
	});

	// File upload
	$(document).on('change', '.browse-file-modal', function() {
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

function makeModalTextAreaEditable(modalSelector) {
	// All newly-added formattable textarea in the modal must be editable
	$(modalSelector).find('.formatted-textarea').each(function() {
		$(this).tinymce({
			menubar: false,
			plugins: ['lists link'],
			toolbar1: 'bold italic underline link | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify'
		});
	});
}

function fillModalAdd(dataElement, index, value, fieldArray, typeArray) {
	var newDataId = -1;
	fillModal(dataElement, newDataId, index, value, fieldArray, typeArray);
}

function deleteElement(rowElement) {
	var confirmed = confirm("This action cannot be undone. Are you sure?");
	if (confirmed) {
		var row = $(rowElement).parent().parent();
		var hideDelay = 500;
		$.ajax({
			type: 'POST',
			url: $(rowElement).data('delete-url'),
			data: {
				'id': $(rowElement).data('id')
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
}

function saveUpdateModal(buttonElement, actionUrl, typeArray, fieldNameArray, isNewEntry) {
	data = {};
	if (isNewEntry == false) {
		data['id'] = $(buttonElement).data('id');
	}
	
	$(buttonElement).parent().parent().find('.form-group').each(function(index, value) {
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
		url: actionUrl,
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
}

function fillModal(dataElement, dataId, index, value, fieldArray, typeArray) {

	var trueIndex = index % fieldArray.length; // Used for getting which fieldText to use
	var valueText = $(dataElement).text().trim(); // e.g.: "banner_zazen.jpg"
	var fieldText = fieldArray[trueIndex]; // e.g.: "Banner Image"
	var fieldType = typeArray[trueIndex];

	var selector = '.admin-form-text';
	var targetSelector = '.modal-inner-data-'+dataId;
	var formId = 'form-'+fieldText;
	var isNewEntry = dataId == -1;

	if (isNewEntry) {
		valueText = '';
		targetSelector = '.modal-inner-data-new';
	}

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

			if (isNewEntry) {
				valueText = '';
			}
			else {
				valueText = $(value).html().trim();
			}

			$(selector).find('.form-element').html($(selector).find('.form-control-source').html());
			$(selector).find('.form-element').find('textarea').text(valueText);
			$(selector).find('.form-element').find('textarea').addClass('formatted-textarea');
			break;
		case "image-upload":
			selector = ".admin-form-image";

			if (isNewEntry) {
				$(selector).find('img').attr('src', $('#no-image').data('url'));
				$(selector).find('img').attr('class', $(value).data('class'));
				$(selector).find('img').addClass('max-width-100');
			}
			else {
				$(selector).find('img').attr('src', $(value).find('img').attr('src'));
				$(selector).find('img').attr('class', $(value).find('img').attr('class'));
				$(selector).find('img').addClass('max-width-100');
			}
			
			break;
		case "dropdown":
			selector = ".admin-form-dropdown";
			$(selector).find('.form-control').find('option').remove();

			var dropdownOptions = $(dataElement).data('dropdown-options');
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

	$(targetSelector).append($(selector).find('.form-content').html());
}
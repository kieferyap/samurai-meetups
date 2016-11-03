$(document).ready(function() {

	var fieldArray = [];

	$('.field').each(function() {
		fieldArray.push($(this).text());
	})

	$('.row-content').each(function () {
		var rowIndex = $(this).attr('id');
		$(this).find('.value').each(function(index, value) {
			var trueIndex = index % fieldArray.length; // Used for getting which fieldText to use
			var fieldText = fieldArray[trueIndex]; // e.g.: "Banner Image"
			var valueText = $(value).text(); // e.g.: "banner_zazen.jpg"
			var fieldType = $(value).data('type'); // e.g.: "image-upload"
			var selector = ".admin-form-text";
			var formId = 'form-'+fieldText; 

			switch(fieldType) {
				case "text":
					selector = ".admin-form-text";
					break;
				case "textarea":
					selector = ".admin-form-textarea";
					break;
				case "formatted-textarea":
					selector = ".admin-form-formatted";
					break;
				case "image-upload":
					selector = ".admin-form-image";
					break;
				default:
					alert("NONE");
					break;
			}

			$(selector).find('.control-label').attr('for', formId);
			$(selector).find('.control-label').text(fieldText);
			$(selector).find('.form-control').attr('value', valueText);
			$(selector).find('.form-control').attr('id', formId);

			$('.modal-inner-data-'+rowIndex).append($(selector).html());
		});
	});

	// $('.row-content').find('.value').each(function(index, value) {
	
	// });

	// $(".modal-content").each(function() {
	// 	$(this).nearest('.value').each(function() {
	// 		alert($(this).html());
	// 	});
	// });

});
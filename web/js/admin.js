$(document).ready(function() {

	var fieldArray = [];

	$('.field').each(function() {
		fieldArray.push($(this).text());
	})

	$('.row-content').each(function () {
		var rowIndex = $(this).attr('id');
		$(this).find('.value').each(function(index, value) {
			var trueIndex = index % fieldArray.length;
			var fieldText = fieldArray[trueIndex];
			var valueText = $(value).text();
			var id = 'form-'+fieldText;

			$('.admin-form-required').find('.control-label').attr('for', id);
			$('.admin-form-required').find('.control-label').text(fieldText);
			$('.admin-form-required').find('.form-control').attr('value', valueText);
			$('.admin-form-required').find('.form-control').attr('id', id);

			$('.modal-inner-data-'+rowIndex).append($('.admin-form-required').html());
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
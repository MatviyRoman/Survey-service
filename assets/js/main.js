$(document).ready(function () {
	$('.add-answer').click(function () {
		var html =
			'<input type="text" class="w-100 form-control mt-2" name="answers[]">';
		$(this).closest('.form-group').find('.input-group').append(html);
	});
});

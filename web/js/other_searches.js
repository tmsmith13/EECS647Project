$(document).ready(function() {
	$('#sales_form').ajaxForm(function(response) {
		$('#middle_pane_container').html(response);
	});
});

$(document).ready(function() {
	$('#empl_form').ajaxForm(function(response) {
		$('#middle_pane_container').html(response);
	});
});

$(document).ready(function() {
	$('#car_search').ajaxForm(function(response) {
		$('#middle_pane_container').html(response);
	});
});


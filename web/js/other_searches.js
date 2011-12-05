$(document).ready(function() {
	$('#sales_form').ajaxForm(function(response) {
		$('#middle_pane_container').html(response);
	});
});

$(function() {

  $(".button").click(function() {
		
		
	var make = $("input#make").val();
	if (make == "") 
	{
		return false;
	}
	
	var model = $("input#model").val();
	if (model == "") 
	{
		return false;
	}
	
	var year = $("input#year").val();
	if (year == "") 
	{
		return false;
	}
	
	//add more 
	
	
	
	var dataString = 'make='+ make + '&model=' + model + '&year=' + year;
	//alert (dataString);return false;
	
		$.ajax({
			type: "POST",
			url: "process_car_form.php",
			data: dataString,
			success: function(responseText, statusText, xhr, $form) {
			$('#middle_pane_container').html(responseText);
			$('#message').html(responseText)		
			.hide()
			.fadeIn(1500, function() {
			  $('#message')
			});
		}
	});
	return false;
	});
});

runOnLoad(function(){
  $("input#name").select().focus();
});

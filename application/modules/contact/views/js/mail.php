$("#contactForm").submit(function(e)
	{
		e.preventDefault();
	    var postData = $(this).serializeArray();
		var thisInput =$(this).find("input");
	    var formURL = $(this).attr("action");
		var validForm = true;

		$('.response').hide();
		$('.error_message').hide();

		$.each( thisInput, function( key, value ) {
  				if($(this).hasClass("req") && $(this).val() == "")
  						validForm = false;
				});
		
		//If all required input is filled
		if(validForm){
			$.ajax(
			    {
			        url : formURL,
			        type: "POST",
			        data : postData,
			        success:function(data, textStatus, jqXHR) 
			        {
						var res =  $.parseJSON(data);
						if(res.status == "ok"){
							$('.response').html(res.message).show();
						}else{
							$('.error_message').html(res.message).show();
						}

						grecaptcha.reset(widgetId1);

			        },
			        error: function(jqXHR, textStatus, errorThrown) 
			        {
						$('.error_message').html(errorThrown);
		              	grecaptcha.reset(widgetId1);
			        }
			      });
		}else{
			//Amennyiben nincs kitöltve a kötelező mező
			$('.error_message').html('<?php echo lang("req_error")?>').show();
		}
	  
	    e.preventDefault(); 
});
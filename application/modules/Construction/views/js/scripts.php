$("#mailform").submit(function(e)
	{
		debugger;
	    var postData = $(this).serializeArray();
	    var formURL = $(this).attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {
				alert(data);
				$('#messageBox').html(data);
				$('#messageBox').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#messageBox').html(errorThrown);
				$('#messageBox').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        }
	    });
	    e.preventDefault(); 
	});

$("#preview").submit(function(e)
	{
		debugger;
	    var postData = $(this).serializeArray();
	    var formURL = $(this).attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {	
				alert(data);
				$('#previewMsg').html(data);
				$('#previewMsg').addClass('alert');
				if(data === 'Helyes jelszó!'){
					window.location.replace("<?php echo base_url(); ?>");
				};
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#previewMsg').html(errorThrown);
				$('#previewMsg').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        }
	    });
	    e.preventDefault(); 
	});
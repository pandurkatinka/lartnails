<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Popular Marketing - Admin Login</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="assets/template/login/css/style.css">

  
</head>

<body>
<div class="form">
 		<div class="form-content">
	        <div id="login">
		        <div class='logo'><img src="assets/template/logo.png" alt="Popular Marketing Kft."></div>
		        <h1>Üdvözöljük újra!</h1>
		        <h2 id='messageBox' class='white text-center'>Kérjük jelentkezzen be</h2>
		        
		        <form id='loginForm' action="Auth/login" method="post">
		            <div class="field-wrap">
			            <label>
			              Email cím<span class="req">*</span>
			            </label>
			            <input name='email' placeholder="Email cím*" type="email" required autocomplete="off"/>
		          	</div>
		          
			        <div class="field-wrap">
			            <label>
			              Jelszó<span class="req">*</span>
			            </label>
			            <input name='password' placeholder="Jelszó*" type="password" required autocomplete="off"/>
			         </div>
	          
	          		<p id='forgot' class="forgot"><a href="#">Elfelejtette jelszavát?</a></p>
	          
	          		<button class="button button-block"/>Bejelentkezés</button>
	  			</form>

	  			<form style='display:none;' id='passrecForm' action="Auth/passrec">
	  				<div class="field-wrap">
			            <label>
			              Email cím<span class="req">*</span>
			            </label>
			            <input name='email' placeholder="Email cím*" type="email" required autocomplete="off"/>
		          	</div>
	          
	          		<p class="forgot" id='backtologin' ><a href="#">Vissza a bejelentkezéshez</a></p>
	          
	          		<button class="button button-block"/>Jelszó megváltoztatása</button>
	  			</form>

	        </div>
	    </div><!-- /tab-content end -->
</div> <!-- /form end -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="assets/template/login/js/index.js"></script>
<script type='text/javascript'>
	$("#loginForm").submit(function(e)
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
				$('#messageBox').html(data);
				if(data =='Helyes jelszó!'){
					$(location).attr('href', '<?php echo base_url() ?>admin');	
				}else{
					$('#messageBox').addClass('alert');
				}
				
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#messageBox').html(errorThrown);
				$('#messageBox').addClass('alert');
	        }
	    });
	    e.preventDefault(); 
	});
</script>
<script type='text/javascript'>
	$("#passrecForm").submit(function(e)
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
				$('#messageBox').html(data);
				$('#messageBox').addClass('alert');
				
				
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#messageBox').html(errorThrown);
				$('#messageBox').addClass('alert');
	        }
	    });
	    e.preventDefault(); 
	});
</script>
<script type='text/javascript'>
	$('#forgot').on( "click", function() {
  		$('#passrecForm').show();
  		$('#loginForm').hide();
	});

	$('#backtologin').on( "click", function() {
  		$('#passrecForm').hide();
  		$('#loginForm').show();
	});
</script>
</body>
</html>

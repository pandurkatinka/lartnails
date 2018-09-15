<main role="main" id="onas">
	<!-- section -->
	
	
	
	<div class="slider clearfix">
		
		
		<div class="w-100 w-100-img float-left vertical slider hidden-md-down">
			
						 
			<div>
				
				<img src="<?php echo base_url() ?>assets/template/frontend/img/lepj-kapcsolatba.png" alt="" />
			</div>
			
			     
					</div>
		
		<div class="w-100 w-100-img float-left vertical slider hidden-lg-up">
			
						 
			<div>
				
				<img src="../wp-content/uploads/2018/07/Kontakt.jpg" alt="" />
			</div>
			
			     
					</div>
	</div>
	
	
	<div class="row-custom w-100">
		<div class="container text-left my-5">
			<div class="row-custom w-100">
				<div class="col-lg-6">
											<h2 class="line-title-left">DANE KONTAKTOWE</h2>
																<div class="font-1 color-1">
							<p>ul. Górska 6,<br />
43-300 Bielsko-Biała<br />
+ 48 882 771 681<br />
biuro@vkcosmetic.pl</p>
<p><strong>Dział Marketingu:</strong> marketing@vkcosmetic.pl<br />
<strong>Dział Reklamacji:</strong> reklamacje@vkcosmetic.pl<br />
<strong>Obsługa Klienta B2B:</strong> biuro@vkcosmetic.pl</p>
<p>&nbsp;</p>
						</div>
									</div>
				<div class="col-lg-6">
											<h2 class="line-title-left">PRZEDSTAWICIELE HANDLOWI</h2>
																<div class="font-1 color-1">
							<p><strong>woj. śląskie, woj. opolskie:</strong><br />
kom. 882 481 200<br />
e-mail: slask@vkcosmetic.pl</p>
<p><strong>woj. małopolskie, woj. świętokrzyskie:</strong><br />
kom. 882 771 678<br />
e-mail: malopolska@vkcosmetic.pl</p>
<p><strong>woj. mazowieckie, woj. łódzkie:</strong><br />
kom. 606 173 621<br />
e-mail: mazowieckie@vkcosmetic.pl</p>
<p><strong>woj. dolnośląskie:</strong><br />
kom. 664 424 840<br />
e-mail: dolnyslask@vkcosmetic.pl</p>
<p><strong>woj. podlaskie, warmińsko-mazurskie:</strong><br />
kom. 606 404 827<br />
e-mail: podlaskie@vkcosmetic.pl</p>
<p><strong>woj. zachodniopomorskie:</strong><br />
kom. 882 693 505<br />
e-mail: zachodniopomorskie@vkcosmetic.pl</p>
<p><strong>wielkopolskie:<br />
</strong> tel. 660 622 041<br />
e-mail: wielkopolska@vkcosmetic.pl</p>
<p><strong>lubelskie,podkarpackie:</strong><br />
tel. 608 007 395<br />
e-mail: lubelskie@vkcosmetic.pl</p>
						</div>
									</div>
			</div>
		</div>
	</div>
	
</div>

</div>

<div class="google-map">
	<div class="marker" data-lat="49.800128" data-lng="19.06211600000006"></div>
</div>
</main>


<?php
// The header and footer is allready included, we include the primari navbar menu, we do this manually, cause the position of the primary menu can change occasionally.
// we can change the nav looks in the navigation model views.
?>

<?php //Dont remove this line:
	  // You can add any input element, but the email is a required field
	  // Dont modified the action url
	  // Dont remove the .error_message and the .response divs
	  // If u have required input add .req class
	  //   ?>
<form id='contactForm' action="<?php echo base_url() ?>contact/sendMail">
	<div class="error_message" style="display:none"></div>
	<div class="response" style="display:none"></div>
	<label for="Name">Név:</label>
	<input type="text" name="name" class="req" id="Name" />
	<input type="hidden" name="webpage" id="name" value='<?php echo $this->site_set->sitename ?>'/>

	<label for="subject">Tárgy:</label>
	<input type="text" name="subject" id="subject" />

	<label for="Email">Email cím:</label>
	<input type="text" name="email" id="email" />
	<br>
	<label for="Message">Üzenet:</label><br />
	<textarea name="message" rows="20" cols="20" id="message"></textarea>
	<br>
	<div id="RecaptchaField1"></div>
	<input type="submit" name="submit" value="Küldés" class="submit-button" />
</form>



<?php include_once("captcha.php"); ?>

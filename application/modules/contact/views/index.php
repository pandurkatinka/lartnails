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
				
				<img src="<?php echo base_url() ?>assets/template/frontend/img/elerhetosegek.png" alt="" />
			</div>
			
			     
					</div>
	</div>
	
		
		<div class="row-custom w-100">
			<div class="container text-left my-5">
				<div class="row-custom w-100">
					<div class="col-lg-6">
							<h2 class="line-title-left">LÉPJ VELÜNK KAPCSOLATBA ÉS BESZÉLJÜK MEG</h2>
							<h3>mit tehetünk együtt a szalonod fejlesztése érdekében.</h3>
								<div class="font-1 color-1">
									<p>8230 Balatonfüred<br />
										Jókai utca 6.<br />
										e-mail: info@lartnails.hu<br />
										telefon.: + 36 70 6231 188</p>
								</div>
					</div>
					<div class="col-lg-6">
						<h2 class="line-title-left">Küldjön nekünk üzenetet!</h2>
							<div class="font-1 color-1">
								<form id='contactForm'  action="<?php echo base_url() ?>contact/sendMail">

									<div class="error_message" style="display:none"></div>

									<div class="response" style="display:none"></div>
									
										
										<input placeholder="Név *" type="text" name="name" class="req col-lg-12" id="Name" /><br>
									
										<input placeholder="Tetszőleges név *" type="hidden" name="webpage" id="name" value='<?php echo $this->site_set->sitename ?>'/>

										
										<input placeholder="Tárgy *" type="text" name="subject" class=" col-lg-12" id="subject" /><br>

										
										<input placeholder="E-mail cím *" type="text" name="email" class=" col-lg-12" id="email" /><br>
									
										
										<textarea placeholder="Üzenet *" class="col-lg-12 " name="message" rows="5" cols="20" id="message"></textarea>
									<br>
									<div id="RecaptchaField1"></div>
									
									<div class="btn-kafelek"><br>
									<input type="submit" name="submit" value="Küldés" class=" " />
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	
</div>

</div>

<div class="google-map">
	<div class="marker" data-lat="46.9575624" data-lng="17.8838105">
		
	</div>
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




<?php include_once("captcha.php"); ?>

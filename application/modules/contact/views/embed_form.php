<h3>Ez egy beillesztett contact form</h3>
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
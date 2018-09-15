<script type='text/javascript'>
    //recaptchak inicializalasa, kirenderelese explicit modon magyar nyelvvel
    var widgetId1;        
    var onloadCallback = function() {
    widgetId1 = grecaptcha.render('RecaptchaField1', {'sitekey' : '<?php echo $this->site_set->grecaptcha_site_key ?>'});
            };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
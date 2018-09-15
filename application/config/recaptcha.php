<?php

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
//$config['recaptcha_site_key'] = '6LeBpyYTAAAAABP3aZ6BQZe50i8OXwz9eIfJqGW8';
//$config['recaptcha_secret_key'] = '6LeBpyYTAAAAABRW_VUiqbAlMSmylcqw4gSXfFcO';
//
//
$CI =& get_instance();
$settings = $CI->db->get_where('settings', array('language' => 'hungarian'))->row();

if ($settings->grecaptcha_site_key != '') {
	$config['recaptcha_site_key'] = $settings->grecaptcha_site_key;
} else {
	$config['recaptcha_site_key'] = '6LeBpyYTAAAAABP3aZ6BQZe50i8OXwz9eIfJqGW8';
}

if ($settings->grecaptcha_api_key != '') {
	$config['recaptcha_secret_key'] = $settings->grecaptcha_api_key;
} else {
	$config['recaptcha_secret_key'] = '6LeBpyYTAAAAABRW_VUiqbAlMSmylcqw4gSXfFcO';
}	

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'hu';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */

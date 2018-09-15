<script>
<?php 
		//$this->output->set_header('Content-type: text/javascript');
        echo "$(document).ready(function(){";
        $CI = &get_instance();
        foreach ($CI->load->_ci_cached_vars['modules'] as $value) {
        	echo $this->OwnHelpers->load_module_js($value);
        }
        echo " })";
?>
</script>
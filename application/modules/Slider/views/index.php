<?php 

if(!empty($slider)){
		foreach ($slider as $value) {
		echo $value->name;
		echo $value->main_image;
		echo $value->content;
		echo $value->ext_url;
	}
}


?>
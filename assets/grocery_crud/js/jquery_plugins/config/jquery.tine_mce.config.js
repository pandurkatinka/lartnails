	$(function() {
		var tinymce_path = default_texteditor_path+'/tiny_mce/';
	
		tinymce.init({
		  selector: 'textarea',
		  height: 500,
		  forced_root_block : "",
		  extended_valid_elements: 'span',
		  menubar: false,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen textcolor',
		    'insertdatetime media table contextmenu paste code responsivefilemanager'
		  ],
		  image_advtab: true,
		  image_caption: true,
		  toolbar: 'responsivefilemanager | undo redo | insert | styleselect | charmap bold italic | fontselect fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image media | searchreplace | visualblocks fullscreen code',
		
		  	external_filemanager_path:"/filemanager/",
   			filemanager_title:"Fájlkezelő" ,
   			filemanager_access_key:"aaabbbccc",
   			external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.js"}
		
		});

	});
});
	function loadCart(){
		debugger;
		$.ajax({
		  type: 'POST',
		  url: '<?php echo base_url() ?>shop/updateCart',
		  data: '',
		  success: function(data){
		    // on success use return data here
		    $('#cart').html('');
		    $('#cart').append(data);
		  },
		  error: function(xhr, type, exception) { 
		    // if ajax fails display error alert
		    alert("ajax error response type "+type);
		  }
		});
	}

	function loadshoppingCart(){
		debugger;
		$.ajax({
		  type: 'POST',
		  url: '<?php echo base_url() ?>shop/updateshoppingCart',
		  data: '',
		  success: function(data){
		    // on success use return data here
		    $('#shoppingcart').html('');
			$('#shoppingcart').append(data);
		  },
		  error: function(xhr, type, exception) { 
		    // if ajax fails display error alert
		    alert("ajax error response type "+type);
		  }
		});
	}
function start(){
	loadshoppingCart();
	loadCart();
}

if ($("#shoppingcart").length) {
	window.onload = start;
}else{
	window.onload = loadCart;
}

function scrollToCart(){
	$("html, body").animate({ scrollTop: 0 }, "slow");
  	return false;
}
function updateCart(){
	debugger;
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/updateCart',
	  data: '',
	  success: function(data){
	    // on success use return data here
	    //document.getElementById("cart").innerHTML = "";
	    $('#cart').html('');
	    $('#cart').append(data);
	    if ($("#shoppingcart").length) {
	    	$.ajax({
				  type: 'POST',
				  url: '<?php echo base_url() ?>shop/updateshoppingCart',
				  data2: '',
				  success: function(data2){
				    // on success use return data here
				    //document.getElementById("cart").innerHTML = "";
				    $('#shoppingcart').html('');
				    $('#shoppingcart').append(data2);
				  },
				  error: function(xhr, type, exception) { 
				    // if ajax fails display error alert
				    alert("ajax error response type "+type);
				  }
				});

	    }
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
}

function deleteFromCart(id){
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/delFromCart',
	  data: {id: id},
	  success: function(data){
	    // on success use return data here
	    updateCart();
	    BootstrapDialog.show({
            title: 'Babycontrol.hu',
            message: 'A terméket eltávolította a <a onclick="scrollToCart()">kosárból</a>!'
        });
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
}

if ($("#orderform").length) {
	var $contactForm = $('#orderform');
	
	$contactForm.on('submit', function(ev){
	    ev.preventDefault();

	    var postData = $('#orderform').serializeArray();
		$.ajax({
		  type: 'POST',
		  url: '<?php echo base_url() ?>shop/codOrder',

		  data: postData,
		  success: function(data){
		    // on success use return data here
		    //updateCart();
		    data = JSON.parse(data);
		    BootstrapDialog.show({
	            title: 'Babycontrol.hu',
	            message: data.message
	        
	        });
		  },
		  error: function(xhr, type, exception) { 
		    // if ajax fails display error alert
		    alert("ajax error response type "+type);
		  }
		});
	});
}

if ($("#paypalform").length) {
	var $contactForm = $('#paypalform');
	
	$contactForm.on('submit', function(ev){
	    ev.preventDefault();

	    var postData = $('#paypalform').serializeArray();
		$.ajax({
		  type: 'POST',
		  url: '<?php echo base_url() ?>shop/paypalOrder',
		  data: postData,
		  success: function(data){
		    // on success use return data here
		    //updateCart();
		    data = JSON.parse(data);
		    if(data.message == 'postPayment'){
		    	window.location.replace('<?php echo base_url() ?>paypal/postPayment');
		    }else{
		    	BootstrapDialog.show({
	            title: 'Babycontrol.hu',
	            message: data.message
	        	});
		    }
		  },
		  error: function(xhr, type, exception) { 
		    // if ajax fails display error alert
		    alert("ajax error response type "+type);
		  }
		});
	});
}

function codOrder(){
	debugger;
	var postData = $('#orderform').serializeArray();
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/codOrder',

	  data: postData,
	  success: function(data){
	    // on success use return data here
	    //updateCart();
	    BootstrapDialog.show({
            title: 'Babycontrol.hu',
            message: data
        
        });
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
}

/*
$( ".deleteitem" ).on( "click", function() {
	
	var id = $( this ).attr('id');
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/delFromCart',
	  data: {id: id},
	  success: function(data){
	    // on success use return data here
	    updateCart();
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
});
*/


$( ".additem" ).on( "click", function() {
	
	var id = $( this ).attr('id');
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/addToCart',
	  data: {item_id: id},
	  success: function(data){
	    // on success use return data here
	    updateCart();
	    BootstrapDialog.show({
            title: 'Babycontrol.hu',
            message: 'A terméket sikeresen a <a onclick="scrollToCart()">kosárba</a> helyezte!'
        });
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
});
function additem(id){
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/addToCart',
	  data: {item_id: id},
	  success: function(data){
	    // on success use return data here
	    updateCart();
	    BootstrapDialog.show({
            title: 'Babycontrol.hu',
            message: 'A terméket sikeresen a <a onclick="scrollToCart()">kosárba</a> helyezte!'
        });
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
}
function removequantity(id){
	debugger;
	$.ajax({
	  type: 'POST',
	  url: '<?php echo base_url() ?>shop/removequantity',
	  data: {id: id},
	  success: function(data){
	    // on success use return data here
	    updateCart();
	    BootstrapDialog.show({
            title: 'Babycontrol.hu',
            message: 'A terméket sikeresen kivette a <a onclick="scrollToCart()">kosárból</a>!'
        });
	  },
	  error: function(xhr, type, exception) { 
	    // if ajax fails display error alert
	    alert("ajax error response type "+type);
	  }
	});
}
$(document).ready(function(){
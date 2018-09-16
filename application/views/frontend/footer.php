
 
<!-- footer -->
<footer class="footer" role="contentinfo">
	<div class="footer-container py-5">
		<div class="row-custom w-100">
			<div class="col-lg-4 col-12 float-left text-center text-lg-left">
				<img src="<?php echo base_url() ?>assets/template/frontend/img/logo_lart_white.png" />
				
								<p class="color-4 font-2 mt-3">Sok szeretettel várunk téged is, hogy megismerd a LART termékeket, amik megnyitják neked a körömművészet legújabb világát.</p>
				
				<div class="row-custom w-100 mt-3 social-main">
					
										
					
					<div class="w-100 text-center text-lg-left">
						 
													
							<a href="https://www.facebook.com/LART-Nails-288573095080930/" target="_blank"><i class="fab fa-facebook-f"></i></a>
							
																			
							<a href="https://www.instagram.com/lartnailshungary/" target="_blank"><i class="fab fa-instagram"></i></a>
							
																			
							<a href="https://www.youtube.com/channel/UCuDtqPLOhBYMP9Qnbvwx32g" target="_blank"><i class="fab fa-youtube"></i></a>
							
																			
							<a href="https://pl.pinterest.com/lartnails/pins/" target="_blank"><i class="fab fa-pinterest"></i></a>
							
												
						
						  
					</div>
					
					
										
				</div>
				
			</div>
			<div class="col-lg-4 col-12 mt-4 mt-lg-0 text-center text-lg-left">
				<p class="font-1 text-uppercase"><b>Oldalak:</b></p>
				<ul id="menu-footer-menu-en" class="menu">
					<li id="menu-item-510" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-487 current_page_item menu-item-510">
						<a href="<?php echo base_url() ?>">Főoldal</a>
					</li>
					<li id="menu-item-509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509">
						<a href="<?php echo base_url() ?>pages/lart-titan-manikur">Lart Titán Manikűr</a>
					</li>
					<li id="menu-item-509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509">
						<a href="<?php echo base_url() ?>pages/lart-hybrid-gellakk">Lart Hybrid géllakk</a>
					</li>
					<li id="menu-item-509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509">
						<a href="<?php echo base_url() ?>kapcsolat">Kapcsolat</a>
					</li>
					<li id="menu-item-509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509">
						<a href="<?php echo base_url() ?>pages/adatvedelem">Adatvédelem</a>
					</li>
					

				</ul>			
			</div>
			<div class="col-lg-4 col-12 mt-4 mt-lg-0 text-center text-lg-left">
				<p class="font-1 text-uppercase"><b>Facebook:</b></p>
				<div class="fb-page" data-href="https://www.facebook.com/LART-Nails-288573095080930/"  data-height="200px" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LART-Nails-288573095080930/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LART-Nails-288573095080930/">LART Nails</a></blockquote></div>

				
				
		</div>
	</div>
	
</footer>
<!-- /footer -->

</div>
<!-- /wrapper -->
</body>
</html>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
	
	//STICKY HEADER
		
	
	
	// TOGGLE TEXT
	$(function() {
		var showTotalChar = 1200,
        showChar = "Czytaj więcej",
        hideChar = "Zwiń";
		$('.short-text').each(function() {
			var content = $(this).html();
			if (content.length > showTotalChar) {
				var shortcontent = content.substr(0, showTotalChar);			
				var txt = '<div class="short-txt">' + shortcontent + '<span class="dots">...</span></div><div class="full-txt">' + content + '</div><div class="btn-more-content"><a href="" class="showmoretxt">' + showChar + '</a></div>';
				$(this).html(txt);
			}
		});
		$(".showmoretxt").addClass("rozwin");
		$(".showmoretxt").click(function() {
			
			if ($(this).hasClass("zwin")) {
				$(this).removeClass("zwin");
				$(this).addClass("rozwin");
				$(this).text(showChar);
				$(".short-txt").css("display", "block");
				} else {
				$(this).addClass("zwin");
				$(this).removeClass("rozwin");
				$(this).text(hideChar);
				$(".short-txt").css("display", "none");
			}
			$(this).parent().prev().toggle();
			$(this).prev().toggle();
			return false;
		});
	});
	
	
	
	//SMOOTH SCROLL
	
	$('a[href*="#"]')
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		// On-page links
		if (
		location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		&& 
		location.hostname == this.hostname
		) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			var headerHeight = $("#sticky_header").height();
			if (target.length) {
				event.preventDefault();		
				if ($(window).width() > 768){
					$('html, body').animate({		
						scrollTop: target.offset().top - headerHeight		
						}, 1000, function() {
						var $target = $(target);
						$target.focus();
						if ($target.is(":focus")) { // Checking if the target was focused
							return false;
							} else {
							$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						};
					});
					} else {	
					$('html, body').animate({		
						scrollTop: target.offset().top	
						}, 1000, function() {
						
						var $target = $(target);
						$target.focus();
						if ($target.is(":focus")) { // Checking if the target was focused
							return false;
							} else {
							$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						};
					});
				}
			}
		}
	});
	
	
	// MENU ACTIVE 
	$('.menu-item').click(function(event) {
		$('.menu-item').removeClass('active');
		$(this).addClass('active');
	});
	
	
	// MENU TOGGLE
	
	$('.menu-toggle').click(function() {
        $('.menu-toggle').toggleClass('on');
	});	
	$('.menu-toggle').click(function() {
        $('.main-navigation').toggleClass('menu-close');
		$('.main-navigation').toggleClass('menu-open');
	});	
	
	// SLICK SLIDER
	
	$(document).ready(function() {
		
		$(".vertical").slick({
			dots: true,
			speed: 1500,
			
			swipe: false,
			draggable: true,
			autoplaySpeed: 2000,
			infinite: true,
			autoplay: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: [		
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			]   
		});
		
		$(".vertical-center-4").slick({
			speed: 1500,
			swipe: false,
			pauseOnHover:false,
			draggable: true,
			autoplaySpeed: 1000,
			infinite: true,
			autoplay: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [		
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			]   
		});
		$(".vertical-center-3").slick({
			dots: true,
			vertical: true,
			centerMode: true,
			slidesToShow: 3,
			slidesToScroll: 3
		});
		$(".vertical-center-2").slick({
			dots: true,
			vertical: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2
		});
		$(".vertical-center").slick({
			dots: true,
			vertical: true,
			centerMode: true,
		});
		
		
		$(".regular").slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [		
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			]   
		}); 
		
		$(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 5,
			slidesToScroll: 3
		});
		$(".variable").slick({
			dots: true,
			infinite: true,
			variableWidth: true
		});
		$(".lazy").slick({
			lazyLoad: 'ondemand', 
			infinite: true
		});
	});
	
	
	/* ZLICZANIE - animacja*/
	
	/* FAQ ACCORDION */
	
	
	$( function() {
		$( "#accordion" ).accordion({ 
			heightStyle: "content",
			collapsible: true,
			active: false,
		});
	} );
	
	</script>
	
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9Uvh6Rw0-31f6SVFZ7_2cqgvouDa4gj8"></script>
<script type="text/javascript">
	/* MAPA GOOGLE */
	(function($) {
		
		
		function new_map( $el ) {
			
			// var
			var $markers = $el.find('.marker');
			
			
			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};
			
			
			// create map	        	
			var map = new google.maps.Map( $el[0], args);
			
			
			// add a markers reference
			map.markers = [];
			
			
			// add markers
			$markers.each(function(){
				
				add_marker( $(this), map );
				
			});
			
			
			// center map
			center_map( map );
			
			
			// return
			return map;
			
		}
		
		
		function add_marker( $marker, map ) {
			
			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
			
			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});
			
			// add to array
			map.markers.push( marker );
			
			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});
				
				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {
					
					infowindow.open( map, marker );
					
				});
			}
			
		}
		
		
		function center_map( map ) {
			
			// vars
			var bounds = new google.maps.LatLngBounds();
			
			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){
				
				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
				
				bounds.extend( latlng );
				
			});
			
			// only 1 marker?
			if( map.markers.length == 1 )
			{
				// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}
			
		}
		
		/*
			*  document ready
			*
			*  This function will render each map when the document is ready (page has loaded)
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	5.0.0
			*
			*  @param	n/a
			*  @return	n/a
		*/
		// global var
		var map = null;
		
		$(document).ready(function(){
			
			$('.google-map').each(function(){
				
				// create map
				map = new_map( $(this) );
				
			});
			
		});
		
	})(jQuery);
	
	
	
</script>





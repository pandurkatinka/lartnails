

<?php 
// The header and footer is allready included, we include the primari navbar menu, we do this manually, cause the position of the primary menu can change occasionally.
// we can change the nav looks in the navigation model views.
?>

	<!-- The start of the page -->
	<section id='start'>
		<div class="container">
			This is the Category Products Page
		</div>
	</section>
	<!-- END of start section -->
	
	<!-- The middle section -->
	<section id="middle">
		<?php print_r($cat_products); ?>
		<?php print_r($links); ?>
	</section>
	<!-- End of the middle section -->

	<!-- Bottom section start until body end/footer -->
	<section id="bottom">
		Bottom Section
	</section>


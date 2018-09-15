<style>
/* Some example styling to the navbar so its not perfecly raw and can be observed. */
ul {
	background-color: #dddddd;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: left;
}

li a {
    display: block;
    padding: 8px;
    background-color: #dddddd;
}
</style>

<?php 
// The header and footer is allready included, we include the primari navbar menu, we do this manually, cause the position of the primary menu can change occasionally.
// we can change the nav looks in the navigation model views. ?>
	<!-- The start of the page -->
	<section id='start'>
		<div class="container">
			Start of the page - Slider etc. stuff comes here
		</div>
	</section>
	<!-- END of start section -->
	
	<!-- The middle section -->
	<section id="middle">
		<?php print_r($site_data) ?>
	</section>
	<!-- End of the middle section -->

	<!-- Bottom section start until body end/footer -->
	<section id="bottom">
		Bottom Section
	</section>


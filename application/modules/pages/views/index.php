

<?php 
// The header and footer is allready included, we include the primari navbar menu, we do this manually, cause the position of the primary menu can change occasionally.
// we can change the nav looks in the navigation model views.
//print_r($this->session->lang); ?>

	<!-- The start of the page -->
	<section id='start'>
		
			<?php foreach ($site_data as $key => $page){ ?>

				<div class="row-custom  w-100">
					<div class="container text-center my-5 color-4 col-lg-12" style="max-width: 100%">
							<h2 class="line-title-center" style="color:#000000"><?php echo $page->name ?></h2>
							<div class="font-2 color-3">
								<?php echo $page->content ?>
							</div>
					</div>
				</div>

			<?php } ?>
		
	</section>
	<!-- END of start section -->
	
	
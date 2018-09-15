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

					<h3 class="font-italic">Galléria</h3>
					<?php 
					foreach($gallery_categories as $item){?>
						<h3><?php echo $item->category_name ?></h3>
							<a href="<?php echo base_url("gallery/".$item->seo_url) ?>">
								<img src="<?php echo base_url('assets/uploads/gallery_category/'.$item->main_image) ?>" class="img-responsive" alt="image">
							</a>
					<?php } ?>
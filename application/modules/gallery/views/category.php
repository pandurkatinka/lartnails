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
<h3>Galléria<?=isset($gallery_pictures[0]) ? " - ".$gallery_pictures[0]->category_name : ""?></h3>
<?php if(isset($gallery_pictures[0])){ ?>
					<?php foreach($gallery_pictures as $item){ ?>
							<a href="<?=base_url()?>assets/uploads/gallery/<?=$item->file?>">
								<img src="<?=base_url()?>assets/uploads/gallery/<?=$item->file?>" alt="image">
											<h5><?=$item->name?></h5>

					<?php } ?>
				<?php } else {?>
				<div class="alert alert-info">Nincs kép ebben a katerógiában!</div>
				<?php } ?>

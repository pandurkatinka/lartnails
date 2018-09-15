<?php 
// The header and footer is allready included, we include the primari navbar menu, we do this manually, cause the position of the primary menu can change occasionally.
// we can change the nav looks in the navigation model views.
 ?>

 	<section class="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Légzésfigyelők</h1>
				</div>
				<div class="col-md-6">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url() ?>">Főoldal</a></li>
						<li class="active">Légzésfigyelők</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- The start of the page -->
	<section id='start'>
		<div class="container">
			<div class="col-md-12">
                    <p style="text-align: left;"><strong>A készülék megvásárlása&nbsp;<span class="bpir style1">egészségbiztosítón keresztül</span>&nbsp;- számla alapján -&nbsp;<span class="bpir style1">elszámolható</span>, mert rendelkezik az elszámolhatósághoz szükséges CE2409 számú<span><a class="linkpiros" href="../../../engedelyek">&nbsp;</a>tanúsítvánnyal. </span></strong></p>
					<p style="text-align: left;"><strong><span>A Baby Control Digital légzézésfigyelők rendkívül megbízhatóak. Az új légzésfigyelőinkre különlegesen hosszú, 5 év garanciát vállalunk, amiből az első két év azonnali cseregaranciát jelent!</span></strong></p>
					<p style="text-align: left;"><a href="../../../arlista" target="_blank"><strong><span style="color: #ff0000;">Új légzésfigyelő készülék vásárlása esetén jelentős kedvezményt, vagy ajándékot választhat!</span></strong></a></p>
					<p style="text-align: left;"><strong><span><span>A Baby Control Digital folyamatosan figyeli a baba minden mozgását. Alvás közben természetesen a légzőmozgás a meghatározó. Az érzékelés a matrac alatt történik, a gyermek nem érintkezik közvetlenül az érzékelőlappal. Mivel a légzésfigyelő nincs közvetlen kapcsolatban a babával, szinte észrevétlen a használata.&nbsp;</span><strong>A Baby Control Digital minden, kereskedelemben kapható matracokhoz használható!</strong></span></strong></p>
					<p style="text-align: left;"><strong>A Baby Control Digital érzékelőlapjai&nbsp;közvetlenül az ágyrácsra&nbsp;elhelyezhetőek (nem szükséges sima, kemény felület). Az érzékelőlap nagyméretű&nbsp;300x500 mm. Nagyobb, mint általában a légzésfigyelőké, ezért az érzékelt felület is nagyobb a kiságyban. Így lehetséges, hogy már egy érzékelőlap is kielégítő védelmet biztosít a baba számára. A nagy érzékelőlap miatt Önnek nem kell beszereznie még plusz farostlemezt az ágyrácsra (kisebb méretű érzékelőlappal rendelkező típusoknál általában előírás kiegészítő farostlemez beszerzése).</strong></p>                    
					<div class="spacer-sm"></div>
                </div>
		</div>
	</section>
	<!-- END of start section -->
	
	<!-- The middle section -->
	<section id="middle">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
	                <figure class="alignnone">
	                    <img src="<?php echo base_url()."assets/uploads/files/".$product_info->main_image; ?>" alt="<?php echo $product_info->name; ?>">
	                </figure>
	            </div>
	            <div class="col-md-6" style="padding-bottom:40px; padding-left:20px; padding-right:50px">
	                <h2><?php echo $product_info->name; ?></h2>
	                <?php echo $product_info->lead; ?>
	                <div class="spacer-sm"></div>
	                <a class="btn btn-primary"><?php echo $product_info->price; ?> Ft ~ <?php echo round($product_info->price*0.003244); ?> €</a></a>

	                <a href="<?php echo base_url() ?>arlista" class="btn btn-primary">Rendelés <span class="fa fa-shopping-cart" aria-hidden="true"></span></a>
	            </div>
			</div>
		</div>
	</section>
	<!-- End of the middle section -->
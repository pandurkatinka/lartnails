	<section id="team" class="our-team padding-section">
		<div class="grid-row">
			<div class="grid-col-row clear">
				<div class="grid-col grid-col-6 col-sd-12">
					<div class="title">
						<span class="main-title">HELLO</span>
						<span class="slash-icon">/</span>
					</div>
					<dl>
						<dt>Popular Marketing fiatalos 20 fős digitális szolgáltatásfejlesztő csapata vagyunk.</dt>
							<dd>Tapasztalt ergonómiai tervező, grafikus, fejlesztők, projektmenedzser és szövegíró munkája révén egyedi vállalati webes fejlesztések, webáruházak születnek nálunk. Azoknak nyújtunk megoldást, akik nem elégednek meg a középszerűséggel. Mi nem honlapokat gyártunk, hanem kapcsolatokat teremtünk: Ön és a célcsoportja között. </dd>
					</dl>
					<br />
					<div class="carousel-nav">
						<div class="carousel-button">
							<div class="prev"><i class="fa fa-chevron-left"></i></div>
							<div class="next"><i class="fa fa-chevron-right"></i></div>
						</div>
						<div class="carousel-line"></div>
					</div>
						<div id="tabs-carousel" class="owl-carousel choose-team">
							
							<?php foreach ($site_data as $row) { ?>
							<div class="team-item">
								<div class="border-img">
									<a id="tab<?php echo $row->coworker_id?>" class="active">
										<div class="window-tabs"><div class="overflow-block"></div><img src="<?php echo base_url("assets/uploads/coworkers/".$row->main_img) ?>" alt></div>
									</a>
								</div>
								<h2><?php echo $row->name ?></h2>
								<p><?php echo $row->job ?></p>
								<span><?php echo $row->phone ?></span>
							</div>
							<?php } ?>
						</div>
					
				</div>
				<div class="grid-col grid-col-6 col-sd-12">
					<div class="border-img">
						<div class="window-tabs big-window-tab">
							<div class="choose-team">
							<?php foreach ($site_data as $row) { ?>
								<div id="con_tab<?php echo $row->coworker_id?>" class="active">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name"><?php echo $row->name ?><br/><p><?php echo $row->job ?></p></div><p><?php echo $row->job_desc ?></p>
											<p><?php echo $row->phone ?></p>
												<div class="social-person clear">
													<?php if($row->phone != ""){ ?> 
													<div class="circle"><a href="tel:<?php echo $row->phone ?>">
													<i class="fa fa-phone"></i></a></div>
													<?php } ?>
													<?php if($row->twitter != ""){ ?> 
													<div class="circle"><a href="<?php echo $row->twitter ?>"><i class="fa fa-twitter"></i></a></div>
													<?php } ?>
													<?php if($row->facebook != ""){ ?> 
													<div class="circle"><a href="<?php echo $row->facebook ?>"><i class="fa fa-facebook"></i></a></div>
													<?php } ?>
													<?php if($row->skype != ""){ ?> 
													<div class="circle"><a href="<?php echo $row->skype ?>"><i class="fa fa-skype"></i></a></div>
													<?php } ?>
												</div>
											</div>
										</div>
										<img src="<?php echo base_url("assets/uploads/coworkers/".$row->main_img) ?>" alt>
								</div>
							<?php  } ?>
							</div>
						</div>
						<img id="splash-3" src="img/splash-3.png" alt>
					</div>
				</div>
			</div>
		</div>
	</section>

	<hr>
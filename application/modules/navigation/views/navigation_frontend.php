
			<!-- header -->
			<header class="header clear">
					
					
					
					<div id="sticky_header" class="sticky-header-normal bgcolor-1">
					<div class="logo">
							<a href="<?php echo base_url()  ?>">
								<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
								<img src="<?php echo base_url() ?>assets/template/frontend/img/logo_lart_white.png" alt="Logo" class="logo-img">
							</a>
						</div>
						<div class="clearfix">
							<div class="menu-toggle">      
								<div class="line-one"></div>
								<div class="line-two"></div>
								<div class="line-three"></div>
							</div>
							<nav id="site-navigation" class="main-navigation clearfix menu-close">
								<ul class="menu">


										<?php
										//Beginning of the list
											foreach($nav as $value){
												//If there is no child we simply write the menu items out as <li>menuitem</li>
												if(!$value['item']->hasChildren()){
													if ($value['item']->getSeoUrl() == base_url() . 'pages/index') {

													}else{
														echo '<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="';
														print_r (
															$value['item']->getNavSeoUrl() . '" >'
														);
														echo $value['item']->getName();
														echo '</a></li>';	
													}
												}else{
												//TODO: do this recursively
												//
												//If there is a child element, we print it like:
												//<li>menuitem
												//	<ul>submenu<ul>
												//</li>
													echo '<li class="menu-item menu-item-type-custom menu-item-object-custom"><a>';
													echo $value['item']->getName();
													echo '</a>';
													//Submenus
													echo '<ul>';
														foreach($value['item']->getChildren() as $child){

															if(!$child->hasChildren()){
																echo '<li><a href="';
																echo $child->getNavSeoUrl() . ' >';
																echo $child->getName();
																echo '</a>';
																echo '</li>';
															}
															else{
																echo '<li><a>';
																
																echo $child->getName();
																echo '</a>';
																//Submenus
																echo '<ul>';
																foreach($child->getChildren() as $child2){
																	echo '<li><a href="';
																	echo $child2->getNavSeoUrl() . ' >';
																	echo $child2->getName();
																	echo '</a>';
																	echo '</li>';
																}
																echo '</ul>';
																echo '</li>';
															}
															
														}
													echo '</ul>';
													echo '</li>';
												}
												
											}
										?>




								</ul>							
							</nav>
						</div>
					</div>
					

			</header>
			<!-- /header -->






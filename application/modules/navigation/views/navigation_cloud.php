<?php
foreach($cloud as $value){
		//If there is no child we simply write the menu items out as <li>menuitem</li>
		if(!$value['item']->hasChildren()){
			echo '<a class="btn btn-secondary btn-sm" href="';
			print_r (
				$value['item']->getSeoUrl() . '" >'
			);
			echo $value['item']->getName();
			echo '</a>';	
		}else{
		//TODO: do this recursively
		//
		//If there is a child element, we print it like:
		//<li>menuitem
		//	<ul>submenu<ul>
		//</li>
			echo '<a class="btn btn-secondary btn-sm" href="';
			print_r (
				$value['item']->getSeoUrl() . ' >'
			);
			
			echo $value['item']->getName();
			echo '</a>';
			//Submenus
				foreach($value['item']->getChildren() as $child){

					if(!$child->hasChildren()){
						echo '<a class="btn btn-secondary btn-sm" href="';
						echo $child->getSeoUrl() . ' >';
						echo $child->getName();
						echo '</a>';
					}
					else{
						echo '<a class="btn btn-secondary btn-sm" href="';
						print_r (
							$child->getSeoUrl() . ' >'
						);
						
						echo $child->getName();
						echo '</a>';
						//Submenus
						foreach($child->getChildren() as $child2){
							echo '<a class="btn btn-secondary btn-sm" href="';
							echo $child2->getSeoUrl() . ' >';
							echo $child2->getName();
							echo '</a>';
						}
					}
					
				}
		}
		
	}
?>
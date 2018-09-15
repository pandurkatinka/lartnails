<?php //print_r($cart->getItem('W139')); ?>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a style='padding-top:0px; padding-bottom:0px; background-color:#fff !important;' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        	<i class='fa fa-shopping-cart'></i> <?php echo $cart->getQuantity() ?> - Termék<span class="caret"></span>
        </a>
    	<ul class="dropdown-menu dropdown-cart" role="menu">
            <?php if (!$cart->isEmpty()){ ?>
            	<?php foreach ($cart->getItems() as $value): ?>
            	<li>
	                <span class="item">
                        <div class="col-lg-3">
                            <img style='width:50px; height:50px;' src="<?php echo base_url() . 'assets/uploads/files/' . $value['item']->getPicture() ?>" alt="">
                        </div>
                        <div class="col-lg-9">
                            <span class="item-info">
                                <span><?php echo $value['item']->getName() ?></span><br>
                                <span>Ár: <?php echo number_format($value['item']->getPrice(),0,' ',' ') ?>Ft</span><br>
                                <span>Mennyiség: <?php echo $value['qty'] ?></span>
                            </span>
                            <span class="item-right">
                                <button id='<?php echo $value['item']->getId() ?>' class="btn btn-xs btn-danger pull-right deleteitem" onclick='deleteFromCart(this.id)'>x</button>
                            </span>
                        </div>
	                </span>
            	</li>
                <li class="divider"></li>
            	<?php endforeach ?>
            	<li><a class="text-center" href="<?php echo base_url() ?>pages/vasarlas">Kosár megtekintése</a></li>
            <?php } else { ?>
            <li><a class="text-center">Az ön kosara üres!</a></li>
            <?php } ?>
        </ul>
    </li>
</ul>
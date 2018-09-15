<?php //print_r($this->session->cart);exit; ?>
<div class="col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<div class="row">
								<div class="col-xs-6">
									<h5 class='mt20'><i class='fa fa-shopping-cart'></i> Kosár</h5>
								</div>
								<div class="col-xs-6">
									<a class='mt20' href="<?php echo base_url() ?>products">
										<button type="button" class="btn btn-primary btn-sm btn-block mt10">
											<i class='fa fa-cart-plus'></i> Vásárlás folytatása
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<?php if (!$cart->isEmpty()){ ?>
							<?php foreach ($cart->getItems() as $value): ?>
								<div class="row">
									<div class="col-xs-2"><img class="img-responsive" src="<?php echo base_url() . 'assets/uploads/files/' . $value['item']->getPicture() ?>">
									</div>
									<div class="col-xs-4">
										<h4 class="product-name">
											<strong>
												<?php echo $value['item']->getName() ?>
											</strong>
										</h4>
									
									<div class='text-justify'>
										<small><?php echo $value['item']->getContent() ?></small>
									</div>

									</div>
									<div class="col-xs-6">
										<div class="col-xs-6 text-right">
											<h6 class='mt10'><strong><?php echo number_format($value['item']->getPrice(),0,' ',' ') ?> Ft (  
											<?php echo number_format($value['item']->getPrice() * $exchangerate, 1, '.',' '); ?> € )<br><span class="text-muted">x</span><br><?php echo $value['qty'] ?> darab</strong></h6>
										</div>
										<div class="col-xs-2">
											<button type="button" id='<?php echo $value['item']->getId() ?>' onclick='removequantity(this.id)' class="btn btn-success btn-block">
												<b>-</b>
											</button>
										</div>
										<div class="col-xs-2">
											<button type="button" id='<?php echo $value['item']->getId() ?>' class="btn btn-success btn-block additem" onclick='additem(this.id)'>
												<b>+</b>
											</button>
										</div>
										<div class="col-xs-2">
											<button id='<?php echo $value['item']->getId() ?>' type="button" class="btn btn-danger btn-block" onclick='deleteFromCart(this.id)'>
												<span class="fa fa-trash"> </span>
											</button>
										</div>
									</div>
								</div>
								<hr>	
							<?php endforeach ?>
						<div class="row">
							<div class="text-center">
								<div class="col-xs-12">
									<h6 class="text-right mt10">Hozzáadna még terméket? A + - gombokkal megteheti!</h6>
								</div>
							</div>
						</div>
						<?php } else { ?>
							<div class="row">
								<div class="text-center">
									<div class="col-xs-12">
										<h1 class="text-center mbt60">Az Ön kosara üres!</h1>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="panel-footer">
						<?php if (!$cart->isEmpty()){ ?>
							<div class="row text-center">
								<div class="col-xs-6">
									<h4 class="text-right mt10">Végösszeg: 
										<strong>
											<?php echo 
												number_format($this->session->cart->getTotalPrice(), 0, '.', ' ');
												?> Ft ( <?php echo 
												number_format($this->session->cart->getTotalPrice() * $exchangerate, 0, '.', ' ');
												?> € )

										</strong>
									</h4>
								</div>
								<div class="col-xs-3">
									<a href='<?php echo base_url() ?>shop/checkout'>
										<button type="button" class="btn btn-success btn-block">
											Fizetés utánvéttel
										</button>	
									</a>
								</div>
								<div class="col-xs-3">
									<a href='<?php echo base_url() ?>shop/checkoutpaypal'>
										<button type="button"  class="btn btn-success btn-block">
											Fizetés PayPal fiókkal
										</button>	
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
</div>
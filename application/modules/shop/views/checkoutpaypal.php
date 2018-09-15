<?php //print_r($this->session->cart->getItems());exit; ?>
<section class="page-content">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">
				<form id='paypalform'>
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-lg-6">
										<h5 class='mt20'><i class='fa fa-money'></i> Fizetés - Paypallel</h5>
									</div>
									<div class="col-lg-6">
										<a class='mt20' href="<?php echo base_url() ?>pages/legzesfigyelok">
											<button type="button" class="btn btn-primary btn-sm btn-block mt10">
												<i class='fa fa-cart-plus'></i> Vásárlás folytatása
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<h4 style='margin-top:40px; margin-bottom:40px;'>Az Ön által megrendelésre váró termékek:</h4>
							<?php if (!$cart->isEmpty()){ ?>
								<?php foreach ($cart->getItems() as $value): ?>
									<div class="row">
										<div class="col-lg-2"><img class="img-responsive" src="<?php echo base_url() . 'assets/uploads/files/' . $value['item']->getPicture() ?>">
										</div>
										<div class="col-lg-6">
											<h4 class="product-name">
												<strong>
													<?php echo $value['item']->getName() ?>
												</strong>
											</h4>
										
										<div class='text-justify'>
											<small><?php echo $value['item']->getContent() ?></small>
										</div>

										</div>
										<div class="col-lg-4">
											<div class="col-lg-12 text-right">
												<h6 class='mt10'><strong><?php echo number_format($value['item']->getPrice(),0,' ',' ') ?> Ft (  
												<?php echo number_format($value['item']->getPrice() * $exchangerate, 1, '.',' '); ?> € )<br><span class="text-muted">x</span><br><?php echo $value['qty'] ?> darab</strong></h6>
											</div>
										</div>
									</div>
									<hr>	
								<?php endforeach ?>
							<div class="row">
								<div class="text-center">
									<div class="col-lg-6">
										<p class="balraig" style="text-align: justify;"><span style="color: #ff0000;"><strong>A készülék megvásárlása <span class="bpir style1">egészségpénztáron keresztül</span> - számla alapján - <span class="bpir style1">elszámolható</span>, mert rendelkezik az elszámolhatósághoz szükséges CE2409 számú<span style="color: #ff0000;"><a class="linkpiros" href="engedelyek">&nbsp;</a>tanúsítvánnyal.</span></strong></span></p>
										<p style="text-align: justify;"><span style="color: #ff0000;"><strong>Új légzésfigyelő készülék vásárlása esetén ne mulasszon el bejelölni egy választható kedvezményt!</strong></span><br> <br> A <span class="bc">fizetés</span> készpénzben történik az áru átvételekor,<span class="bpir">&nbsp;utánvéttel</span>. <strong><span style="color: #ff0000;">Szállítási költség: 0 Ft!</span></strong></p>
									</div>
									<div class="col-lg-6 text-justify">

										<p>A feltüntetett árak <span class="bc">bruttó árak</span>, az ÁFA-t tartalmazzák. <br> <span class="bc">Szállítási határidő:</span> munkanapon a 13 óráig leadott rendelést még aznap elküldjük. <br> Várható kézbesítés: a feladást követő munkanapon. <br> <br> Rendelése megérkezése után visszaigazolást küldünk.</p>
										<div style="text-align: justify;" align="center">Személyes vásárlás esetén kérjük, hogy <a href="<?php echo base_url() ?>contact">» telefonon egyeztessen időpontot irodánkkal</a>!</div>
									</div>
									<div class="col-lg-12">
	                            		<h6>Rendelés előtt, kérjük olvassa el a <a data-toggle="modal" href="#feltetelek">» vásárlási feltételek</a>et!</h6>					
										<div class="spacer-sm"></div>
							
									</div>
								</div>
							</div>
							
								<div class="row">
									<div class='col-lg-12 text-center' style="border: 3px solid #e2eff5; padding-top: 50px; padding-left: 50px;">
												<h5><a href="#kedvezmeny" id="show">Választható kedvezmény!</a></h5>
		                                        <p>Jelölje be, hogy új készülék megrendelése mellé melyik ajándékot kéri</p>
		                                        <?php
		                                        	$discounts = array();
		                                        	foreach ($cart->getItems() as $value) {
		                                        		array_push($discounts,$this->db->where('id', $value['item']->getId())->get('product')->row()->discount);
		                                        	}
		                                        	$discountstotal = 0;
			                                        foreach ($discounts as $value) {
			                                        	$discountstotal += $value; 
			                                        }
			                                        if (in_array(2, $discounts)) { ?>
			                                        	<div class="col-lg-3">
			                                        		<label><input type="radio" name="Kedvezmény" value="1"><a id="kedvezmeny" class="fancybox" href="http://babycontrol.hu/assets/uploads/files/05e6e-1.jpg"><img width="150" style="margin-right:12px" src="http://babycontrol.hu/assets/uploads/files/05e6e-1.jpg"></a></label>
			                                        	</div>
			                                        <?php }
			                                        if (in_array(1, $discounts) || in_array(2, $discounts)) { ?>
				                                        <div class="col-lg-3">
					                                        	<label><input type="radio" name="Kedvezmény" value="3"><a id="kedvezmeny" class="fancybox" href="http://babycontrol.hu/assets/uploads/files/a6782-3.jpg"><img width="150" style="margin-right:12px" src="http://babycontrol.hu/assets/uploads/files/a6782-3.jpg"></a></label>
					                                    </div>
				                                    <?php }
			                                        if($discountstotal > 1){ ?>
			                                        	<div class="col-lg-3">
				                                        	<label><input type="radio" name="Kedvezmény" value="2"><a id="kedvezmeny" class="fancybox" href="http://babycontrol.hu/assets/uploads/files/dbc09-2.jpg"><img width="150" style="margin-right:12px" src="http://babycontrol.hu/assets/uploads/files/dbc09-2.jpg"></a></label>
				                                        </div>
			                                        <?php }
		                                        ?>
		                                        <div class="col-lg-3">
		                                        	<input type="radio" name="Kedvezmény" value="0" checked=""> <label style="margin-right:12px">Nincs</label>
		                                        </div>
		                                            <p>Az ajándékot kizárólag online rendelés esetén adjuk, <strong>csak új légzésfigyelő készülék vásárlása esetén,</strong> kiegészítőknél és felújított készülékeknél nem.</p>
									</div>
								</div>
								<div class="row">
											<div class="col-lg-12">
												<h1 class='text-center' style='margin-top:40px;margin-bottom:40px;'>
													Megrendelőlap<br>
													<small>(a *-gal jelölt mezők megadása kötelező)</small>
												</h1>
											</div>
		                                    <div class="col-md-6">
		                                    	<div class="row">
		                                    		<div class="col-md-6">
														<div class="form-group">
				                                            <label>Név<span class="required">*</span></label>
				                                            <input type="text" value="" data-msg-required="Kérem adja meg a nevét!" class="form-control" name="user_name" id="name" required>
				                                        </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
				                                            <label>E-mail <span class="required">*</span></label>
				                                            <input type="email" value="" data-msg-required="Kérem adja meg e-mail címét!" data-msg-email="Kérem helyes e-mail címet adjon meg!" class="form-control" name="user_email" id="email" required>
				                                        </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
				                                            <label>Telefon <span class="required">*</span></label>
				                                            <input type="phone" value="" data-msg-required="Kérem adja meg telefonszámát!" class="form-control" name="Telefonszám" id="phone" required>
				                                        </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
				                                            <label>Irányítószám <span class="required">*</span></label>
				                                            <input type="text" value="" data-msg-required="Kérem adja meg az irányítószámot!" class="form-control" name="Irányítószám" id="cim" required>
				                                        </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
				                                            <label>Város <span class="required">*</span></label>
				                                            <input type="text" value="" data-msg-required="Kérem adja meg a város nevét!" class="form-control" name="Város" id="cim" required>
				                                        </div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
				                                            <label>Utca,házszám <span class="required">*</span></label>
				                                            <input type="text" value="" data-msg-required="Kérem adja meg a szállítási címet!" class="form-control" name="Cím" id="cim" required>
				                                        </div>
		                                    		</div>
		                                    	</div>
		                                    </div>
											<div class="col-md-6">
		                                        <div class="form-group">
		                                                <label>Megjegyzés</label>
		                                                <textarea rows="3" class="form-control" name="Üzenet" id="Üzenet"></textarea>
		                                        </div>
		                                        <h5><a href="#szamlazasi-adatok" id="show" onclick="showDiv('szamlazasi')">Számlázási cím megadása</a></h5>
		                                        <p>Számlázási adatok, ha eltér a szállítási adatoktól</p>
		                                        <div id="szamlazasi" style="overflow: hidden; height: 0px; max-height: 820px; display: block; transition: height 0.5s linear 0s;">
		                                            <div class="form-group">
		                                                <label>Számlázási név</label>
		                                                <input type="text" value="" class="form-control" name="Számlázási név" id="szn">
		                                            </div>
		                                            <div class="form-group">
		                                                <label>Számlázási cím</label>
		                                                <input type="text" value="" class="form-control" name="Számlázási cím" id="szc">
		                                            </div>
		                                            <a href="#elrejt" onclick="hideDiv('szamlazasi')">Elrejt</a>
		                                        </div>
		                                        <h5><a href="#egeszsegpenztar-adatok" id="show" onclick="showDiv('egeszsegpenztar')">Egészségpénztár adatok megadása</a></h5>
		                                        <p>Számlázási adatok, ha vissza akarja igényelni az Egészségpénztártól a készüléke árát</p>
		                                        <div id="egeszsegpenztar" style="overflow: hidden; height: 0px; max-height: 820px; display: block; transition: height 0.5s linear 0s;">
		                                            <div class="form-group">
		                                                <label>Egészségpénztár neve</label>
		                                                <input type="text" value="" class="form-control" name="Egészségpénztár" id="egn">
		                                            </div>
		                                            <div class="form-group">
		                                                <label>Egészségpénztár címe</label>
		                                                <input type="text" value="" class="form-control" name="Egészségpénztár címe" id="egc">
		                                            </div>
		                                            <div class="form-group">
		                                                <label>Pénztártag neve</label>
		                                                <input type="text" value="" class="form-control" name="Egészségpénztári tag neve" id="egptn">
		                                            </div>
		                                            <div class="form-group">
		                                                <label>Tagazonosító száma</label>
		                                                <input type="text" value="" class="form-control" name="Egészségpénztári tagazonosító" id="egpta">
		                                            </div>
		                                            <a href="#elrejt" onclick="hideDiv('egeszsegpenztar')">Elrejt</a>
		                                        </div>
		                                    </div>
								</div>
								<input type="hidden" name='Megrendelés' value='<?php foreach ($cart->getItems() as $value): ?><?php echo $value['item']->getName() ?> x <?php echo $value['qty'] ?> darab <br><?php endforeach ?>'>
							<?php } else { ?>
								<div class="row">
									<div class="text-center">
										<div class="col-lg-12">
											<h1 class="text-center mbt60">Az Ön kosara üres!</h1>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="panel-footer">
							<?php if (!$cart->isEmpty()){ ?>
								<div class="row text-center">
									<div class="col-lg-6">
										<h4 class="text-right mt10">Végösszeg: 
											<strong>
												<a>
													<?php echo 
													number_format($this->session->cart->getTotalPrice(), 0, '.', ' ');
													?> Ft ( <?php echo 
													number_format($this->session->cart->getTotalPrice() * $exchangerate, 0, '.', ' ');
													?> € )
												</a>
											</strong>
										</h4>
									</div>
									<div class="col-lg-4">
										<div style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;" id="RecaptchaField1"></div>
									</div>
									<div class="col-lg-2">
										<button type="submit" class="btn btn-success btn-block">
											Megrendelés<br>Paypallel
										</button>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-lg-12">
						<div class="text-center">
                                <h6>Baby Control légzésfigyelő készülékek otthoni és egészségügyi használatra, a Heim Pál Gyermekkórház ajánlásával.</h6>
                                <h6>A készülék megvásárlása egészségpénztárnál elszámolható.</h6>
                                <h6>A KÉSZÜLÉK ÉLETET MENTHET, DE NEM ÉLETMENTŐ BERENDEZÉS. A SZÜLŐI GONDOSKODÁST SEMMI SEM PÓTOLHATJA.</h6>
                        </div>
					</div>
				</div>
</div>

<div id="feltetelek" class="modal fade" role="dialog" style="display: none;">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Vásárlási feltételek</h4>
                      </div>
                      <div class="modal-body">
                        <p>A babycontrol.hu weblapot<strong> VMD '95 Kft.</strong> működteti, melynek</p>
						<table cellpadding="3" cellspacing="0">
						  <tbody><tr>
						    <td valign="top" width="221">székhelye: </td>
						    <td valign="top" width="306">1163 Budapest, Színjátszó u. 19. </td>
						  </tr>
						  <tr>
						    <td valign="top">adószáma:</td>
						    <td valign="top"> 12226768-2-42

							</td>
							  </tr>
							  <tr>
							    <td valign="top">cégjegyzék száma:</td>
							    <td valign="top">9010956681</td>
							  </tr>
							  <tr>
							    <td valign="top" width="221">képviselőjének neve: </td>
							    <td valign="top" width="306">Víg János ügyvezető </td>
							  </tr>
							  <tr>
							    <td valign="top" width="221">telefonszáma: </td>
							    <td valign="top" width="306">(06-1-) 401-09-64, fax:(06-1-) 403-9829  </td>
							  </tr>
							  <tr>
							    <td valign="top" width="221">telefonos ügyfélszolgálati ideje: </td>
							    <td valign="top" width="306">munkanapokon 8:00-17:00 óra között </td>
							  </tr>
							  <tr>
							    <td valign="top" width="221">e-mail címe: </td>
							    <td valign="top" width="306"><a href="mailto:vmd95@t-online.hu">vmd95@t-online.hu</a></td>
							  </tr>
							</tbody>
						</table>
						<br>
						<h6 class="cim">Vásárlás </h6>
						<p>Oldalunkon regisztráció nélkül vásárolhat. <br>
						  A vásárlás befejezése előtt meg kell adnia a megrendelő nevét, e-mail címét és telefonszámát, címét, a számlázási nevet és címet (ha az eltér a szállítási címtől). </p>
						<p>Kérjük, hogy megrendeléskor az adatok pontosságára fokozottan figyeljen. </p>
						<p>A VMD '95 Kft. fenntartja a jogot, hogy ellenőrizze a vásárlás során megadott adatok valódiságát. </p>
						<h6 class="cim">Termékek megrendelése </h6>
						<p>A termékek megrendeléséhez a kiválasztott termék mellé, az ára alatt lévő űrlapmezőbe írja be a megrendelni kívánt mennyiséget (db). <br>
						Külön is vásárolhat + érzékelőlapot minden Baby Control légzésfigyelő készülékhez. </p>
						<p> A többi termék (melyet nem kíván megvásárolni) melletti űrlapmezőt hagyja üresen. </p>
						<p>A vásárlás befejezéséhez meg kell adnia a nevét, telefonszámát, e-mail címét, a pontos szállítási címet.<br>
						  Amennyiben a számlázási név és cím eltér a szállítási névtől és címtől, akkor töltse ki a számlázási adatokat is.
						</p>
						<p>A beérkezett érvényes megrendelésről feldolgozás után visszaigazoló e-mailt kap, amely tartalmazza a megrendelt termékek adatait, a megrendelés számát, vételárát. </p>
						<p>Amennyiben a megrendelt áru kiszállítását készlethiány vagy valamely egyéb okból kifolyólag nem tudjuk teljesíteni, erről értesítést küldünk.</p>
						<p> Abban az esetben, ha rendelése feldolgozásakor mindent rendben találunk, automatikusan teljesítjük azt (melyről e-mailben tájékoztatjuk), mely ezt követően nem vonható vissza és nem módosítható. </p>
						<h6 class="cim">Felvilágosítás, felmerülő bármely kérdés, ill. esetleges probléma esetén:</h6>
						<p>telefonon:(06-1-) 401-09-64, faxon:(06-1-) 403-9829

						  ügyfélfogadási időben, vagy <a href="mailto:vmd95@t-online.hu">vmd95@t-online.hu</a> e-mail címen veheti fel velünk a kapcsolatot. </p>
						<h6 class="cim">Vételár </h6>
						<p>A termékek mellett feltüntetett árak bruttó árak, tartalmazzák az Általános Forgalmi Adót (ÁFÁ-t).</p>

						  <h6 class="cim">Szállítási költség:</h6>
						  <p>Szállítási költség: most 0 Ft. </p>
						<h6 class="cim">Fizetési mód: </h6>
						<p>A fizetés készpénzben történik az áru átvételekor, postai utánvéttel. <br>
						Minden rendelés esetében a kiállított számla megfelel az ÁFA tv. ill. PM rendeletekben előírt kötelezettségeknek.</p>
						<h6><span class="cim">Csomagolási költség: </span></h6>
						<p>A megrendelt termékek csomagolásáról mi gondoskodunk, külön költséget nem számolunk fel.</p>
						<h6 class="cim">Szállítási feltételek </h6>
						<p> <strong>Szállítás postai utánvéttel</strong>, a csomag átvételekor kell kifizetni. <br>
						  <strong>Szállítási költség</strong>: most 0 Ft. <br>
						<strong>Szállítási határidő: </strong>munkanapon a 15 óráig leadott rendelést aznap postára adjuk. <br>

						Felhívjuk szíves figyelmét arra, hogy olyan szállítási címre kérje a szállítást, ahol a szállítási napon tartózkodik valaki. </p>
						<h6 class="cim"> Reklamáció </h6>
						<p>Kérjük, a csomagot kézbesítéskor szíveskedjék megvizsgálni, és ha sérült, vetessen fel jegyzőkönyvet, és ne vegye át a csomagot! </p>
						<p>Jogvita esetére a VMD '95 Kft. székhelye szerinti bíróság kizárólagos illetékességét kötjük ki.</p>
						<h6 class="cim">Elállás joga </h6>
						<p>Az áru kézhezvételétől számított 8 napon belül az érvényben lévő törvényi rendelkezések szerint a vásárlónak lehetősége van a megvásárolt áru visszaküldésére. Az áru ellenértékét a  
						VMD '95 Kft. köteles legkésőbb 30 napon belül visszafizetni. </p>
						<p> Amennyiben a kiszállítási költség, fuvardíj (közvetített szolgáltatás) a számlán külön feltüntetésre került, annak a díja nem jár vissza a vevőnek visszaküldés esetén.</p>
						<p>A visszaküldésnél felmerülő szállítási költségeket a vásárló köteles megfizetni. Az elállás jogát abban az esetben gyakorolhatja a vásárló,   ha az árut sértetlenül, bontatlan eredeti csomagolásban juttatja vissza. </p>
						<br>
						  <h6 class="cim">Adatvédelmi nyilatkozat </h6>
						<p>A VMD '95 Kft. a vásárlók adatait kizárólag a megrendelés nyilvántartása és teljesítése érdekében rögzíti és azokat az Adatvédelmi törvény hatályos szabályozásának megfelelően kezeli. <br>
						  A VMD '95 Kft. nem adja át a rögzített adatokat harmadik fél számára. Adatok átadása harmadik fél részére csak megrendelés ill. szállítás teljesítésének érdekében történhet. Ilyen esetekben a partnereinktől elvárjuk, hogy az adatokat bizalmasan, a törvényben előírt rendelkezéseknek megfelelően kezeljék. </p>
						<h6 align="center" class="cim">Köszönjük érdeklődését. Jó vásárlást kívánunk! </h6>                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bezár</button>
                      </div>
                    </div>

                  </div>
                </div>
		</div>
	</div>
</section>
<script type='text/javascript'>
        	//recaptchak inicializalasa, kirenderelese explicit modon magyar nyelvvel
            var widgetId1;
            
            var onloadCallback = function() {
                widgetId1 = grecaptcha.render('RecaptchaField1', {'sitekey' : '<?php echo $this->site_set->grecaptcha_site_key ?>'});
            };
        </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                    async defer>
</script>
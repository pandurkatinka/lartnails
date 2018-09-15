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


<!-- Hírlevél feliratkozás -->

<form class="form" method="POST" action="<?php echo base_url('newsletter/feliratkozas'); ?>">
											<h6 class="widget-title" style="color: black;">Hírlevél feliratkozás</h6>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-control-wrap your-name" style="padding-top: 10px;">
														<input id="nev" type="text" name="nev" value="" size="40" class="form-control" placeholder="Név" required />
													</div>
												</div>
												<div class="col-md-12 col-sm-12" style="margin-top: 15px;">
													<div class="form-control-wrap your-name" >
														<input id="email" type="email" name="mail" value="" size="40" class="form-control" placeholder="Email" required />
													</div>
												</div>
												<div class="col-md-12">
													<input id="feliratkozas" style="margin-top:17px;" type="submit" value="Feliratkozás" class="form-control submit btn-primary"/>
												</div>
											</div>
								</form>

<!-- Hírlevél feliratkozás vége -->

<!-- Hírlevél leiratkozás -->
<form class="form" method="POST" action="<?php echo base_url('newsletter/leiratkozas'); ?>">
											<h6 class="widget-title" style="color: black;">Hírlevél leiratkozás</h6>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-control-wrap your-name" style="padding-top: 10px;">
														<input id="nev" type="text" name="nev" value="" size="40" class="form-control" placeholder="Név" required />
													</div>
												</div>
												<div class="col-md-12 col-sm-12" style="margin-top: 15px;">
													<div class="form-control-wrap your-name" >
														<input id="email" type="email" name="mail" value="" size="40" class="form-control" placeholder="Email" required />
													</div>
												</div>
												<div class="col-md-12">
													<input id="leiratkozas" style="margin-top:17px;" type="submit" value="Leiratkozás" class="form-control submit btn-primary"/>
												</div>
											</div>
								</form>

<!-- Hírlevél leiratkozás vége -->

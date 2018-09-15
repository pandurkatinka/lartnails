<?php //print_r($launch_time);exit; ?>
<!doctype html>
<!--
COPYRIGHT by HighHay/Mivfx
Before using this theme, you should accept themeforest licenses terms.
http://themeforest.net/licenses
-->

<html class="no-js" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="utf-8">

        <!-- Page Title Here -->
        <title><?php echo $site_set->sitename ?> - Készítette: Popular Marketing Kft.</title>
		
        <!-- Page Description Here -->
		<meta name="description" content="A responsive coming soon template, un template HTML pour une page en cours de construction">

        <!-- Disable screen scaling-->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        
        <!-- Initializer -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/normalize.css">        
        
        <!-- Web fonts and Web Icons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/pageloader.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/fonts/opensans/stylesheet.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/fonts/asap/stylesheet.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/ionicons.min.css">
        
        <!-- Vendor CSS style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/foundation.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/js/vendor/jquery.fullPage.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/js/vegas/vegas.min.css">
        
		<!-- Main CSS files -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/main_responsive.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/construction/css/style-color2.css">
        
        <script src="<?php echo base_url() ?>assets/template/construction/js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body id="menu" class="alt-bg">
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Page Loader -->
        <div class="page-loader" id="page-loader">
            <div><i class="ion ion-loading-d"></i><p>betöltés</p></div>
        </div>
        
        <!-- BEGIN OF site header Menu -->
		<!-- Add "material" class for a material design style -->
		<header class="header-top">
			
            <div class="menu clearfix">
                <a href="#about-us">Rólunk</a>
				
                <!--<div class="menu-cont">
					<p class="text">Menu cont</p>
					<ul class="sub-menu">
						<li><a href="htp://page">My Page</a></li>
					</ul>
				</div>-->
				<!-- Add other menu similar to "about" here -->
                <a href="#contact">Kapcsolat</a>
            </div>
		</header>
        <!-- END OF site header Menu-->
        
        <!-- BEGIN OF Quick nav icons at left -->
		<nav class="quick-link count-4 nav-left">
			<div class="logo">
				<a href="#home">
					<img src="<?php echo base_url() ?>assets/template/pm_square.png" alt="Popular Marketing">
				</a>
			</div>
			<ul id="qmenu" class="qmenu">
				<li data-menuanchor="home">
					<a href="#home" class=""><i class="icon ion ion-home"></i>
					</a>
					<span class="title">Indulás</span>
				</li>
				<li data-menuanchor="register">
					<a href="#register"><i class="icon ion ion-compose"></i>
					</a>
					<span class="title">Megtekintés</span>
				</li>
				<li data-menuanchor="about-us">
					<a href="#about-us"><i class="icon ion ion-android-information"></i>
					</a>
					<span class="title">Rólunk</span>
				</li>
				<!--<li data-menuanchor="contact">
					<a href="#contact"><i class="icon ion ion-android-call"></i>
					</a>
					<span class="title">Contact</span>
				</li>-->
				<li data-menuanchor="contact">
					<a href="#contact"><i class="icon ion ion-email"></i>
					</a>
					<span class="title">Kapcsolat</span>
				</li>
			</ul>
		</nav>
        <!-- END OF Quick nav icons at left -->
        


        <!-- BEGIN OF site cover -->
        <div class="page-cover" id="s-cover">
            <!-- Cover Background -->
            <div class="cover-bg pos-abs full-size bg-img" data-image-src="<?php echo base_url() ?>assets/template/construction/img/bg-default.jpg"></div>
			
            <!-- BEGIN OF Slideshow Background -->
            <!--<div class="cover-bg pos-abs full-size slide-show">
				<i class='img' data-src='./img/bg-slide1.jpg'></i>
				<i class='img' data-src='./img/bg-slide2.jpg'></i>
				<i class='img' data-src='./img/bg-slide3.jpg'></i>
				<i class='img' data-src='./img/bg-slide4.jpg'></i>
			</div>-->
            <!-- END OF Slideshow Background -->
            
            <!--BEGIN OF Static video bg  - uncomment below to use Video as Background-->
            <!--<div id="container" class="video-container show-for-medium-up">
                <video autoplay="autoplay" loop="loop" autobuffer="autobuffer" muted="muted"
                       width="640" height="360">
                    <source src="vid/flower_loop.mp4" type="video/mp4">
                </video>
            </div>-->
            <!--END OF Static video bg-->
			
			<!-- Solid color as background -->
<!--            <div class="cover-bg pos-abs full-size bg-color" data-bgcolor="rgb(59, 59, 59)"></div>-->
			
			<!-- Solid color as filter -->
            <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(0, 0, 0, 0.41)"></div>
            
        </div>
        <!--END OF site Cover -->
		
		<!-- Begin of timer pane -->
		<div class="pane-when " id="s-when">
			<div class="content">
				<!-- Clock -->
				<div class="clock clock-countdown">
					<div class="site-config" 
						 data-date="<?php echo $launch_time ?>" 
						 data-date-timezone="+1"
						 ></div>					
					<div class="elem-center">
						<div class="digit">
							<span class="days">30</span>
							<span class="txt">nap</span>
						</div>
					</div>
					<!-- Logo instead -->
<!--
					<div class="logo">
						<a href="#">
							<img src="<?php echo base_url() ?>assets/template/construction/img/logo_only.png">
						</a>
					</div>
-->
					
					<div class="elem-bottom">
						<div class="deco"></div>
						
<!--						<span class="days">12</span><span class="thin">D</span>-->
						<span class="hours">2</span><span class="thin">ó</span>
						<span class="minutes">3</span><span class="thin">p</span>
						<span class="seconds">4</span><span class="thin">mp</span>
					</div>
				</div> 
				
				
				<footer>
					<p>Az oldal indulásáig <strong>hátralévő idő</strong></p>
				</footer>                
			</div> 
		</div>
		<!-- End of timer pane -->
        
        <!-- BEGIN OF site main content content here -->
        <main class="page-main" id="mainpage">             
            
			<!-- Begin of home page -->
			<div class="section page-home page page-cent" id="s-home">
				
				<!-- Logo -->
				<!--<div class="logo-container">
					<img class="h-logo" src="img/logo_only.png" alt="Logo">
				</div>-->
				<!-- Content -->
				<section class="content">
					
					<header class="header">
						<div class="h-left">
							<h2 class='custom-outline'><?php echo $site_set->sitename ?></h2>
						</div>
						<div class="h-right">
							<h3><small style='color:#fff;'>Készítette:</small> <br>Popular Marketing Kft.</h3>
							<h4 class="subhead">
								<a href="<?php echo $launch_url ?>">Indulás után itt:</a>
							</h4>
						</div>
					</header>
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#register">
                        <div class="arrow-d">
							<div class="before">Oldal</div>
							<div class="after">Megtekintése</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of home page -->
            
           
            
            <!-- Begin of register page -->
            <div class="section page-register page page-cent"  id="s-register">
                <section class="content">
                    <header class="p-title">
                        <h3>Megtekintés <i class="ion ion-compose"></i></h3> 
						<h4 class="subhead">Készülő oldal megtekintése</h4>
                    </header>
                    <div>
                        <form id="preview" class="form magic" method="get" action="<?php echo base_url('Construction/check_preview') ?>">
                            <p class="invite">Kérem jelentkezzen be az oldal megtekintéséhez :</p>
							<div class="fields clearfix">
								<div class="input">
									<label for="reg-email">Jelszó </label>
									<input id="reg-email" class="email_f"  name="construct_pass" type="password" required placeholder="******" data-validation-type="password"></div>
								<div class="buttons">
									<button id="submit-email" class="button email_b" name="submit_email">Ok</button>
								</div>
								
							</div>
                            <div style='margin-top:20px;' id="RecaptchaField2"></div>
                            <div id='previewMsg'></div>
                        </form>
                    </div>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#about-us">
                        <div class="arrow-d">
							<div class="before">Rólunk</div>
							<div class="after">röviden</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of register page -->
            
            <!-- Begin of about us page -->
            <div class="section page-about page page-cent" id="s-about-us">
                <section class="content">
                    <header class="p-title">
                        <h3>Popular Marketing<i class="ion ion-android-information">
                            </i>
                        </h3>
						<h4 class="subhead">A MI <span class="bold">VAGYONUNK </span> A TUDÁS,<br><span class="bold">A MI TUDÁSUNK </span> AZ ÖN VAGYONA!</h4>
                    </header>
                    <article class="text">
                        <div class='list-group'>
                        	<div class="list-group-item">Weboldal készítés</div>
                        	<div class="list-group-item">Webshop készítés</div>
                        	<div class="list-group-item">Seo szövegírás</div>
                        	<div class="list-group-item">Facebook kampány</div>
                        	<div class="list-group-item">Logó készítés</div>
                        </div>
                    </article>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#contact">
                        <div class="arrow-d">
							<div class="before">Kapcsolat</div>
							<div class="after">Üzenet</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of about us page -->
                
            <!-- Begin of Contact page   -->
            <div class="section page-contact page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-contact">
				<!-- Begin of contact information -->
				<div class="slide" id="s-information" data-anchor="information">
					<section class="content">
						<header class="p-title">
							<h3>Kapcsolat<i class="ion ion-location">
								</i>
							</h3>
							<ul class="buttons">
								<li class="show-for-medium-up">
									<a title="About" href="#about-us" ><i class="ion ion-android-information"></i></a>
								</li>
								<!--<li>
									<a title="Contact" href="#contact/information"><i class="ion ion-location"></i></a>
								</li>-->
								<li>
									<a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of Page SubSction -->
						<div class="contact">
							<div class="row">
								<div class="medium-6 columns left">
									<ul>
										<li>
											<h4>Email:</h4>
											<p><a href="mailto://kormoczy.gergo@popularmarketing.hu">kormoczy.gergo@popularmarketing.hu</a></p>
										</li>
										<li>
											<h4>Cím:</h4>
											<p>1107 Budapest,
											<br>Zágrábi utca 1.</p>
										</li>
										<li>
											<h4>Tel:</h4>
											<p><a href="callto:+36306786936"></a>+36 30 678 6936 - Iroda</p>
										</li>
									</ul>
								</div>
								<div class="medium-6 columns social-links right">
									<ul>

										<!-- legal notice -->
										<li class="show-for-medium-up">
											<h4>Weboldal</h4>
											<p><a href="http://popularmarketing.hu/">http://popularmarketing.hu/</a></p>
										</li>
										<li  class="show-for-medium-up">
											<h4>Keressen minket</h4>
											<!-- Begin of Social links -->
											<div class="socialnet">
												<a href="https://www.facebook.com/pmarketinghu/?fref=ts"><i class="ion ion-social-facebook"></i></a>
												<a href="https://www.instagram.com/popularmarketing/"><i class="ion ion-social-instagram"></i></a>
												<a href="https://twitter.com/pmarketinghu"><i class="ion ion-social-twitter"></i></a>
											</div>
											<!-- End of Social links -->
										</li>
										<li>
											<p><strong><a href="http://popularmarketing.hu/"><img src="<?php echo base_url() ?>assets/template/logo.png" alt="Popular Marketing Kft."></a></strong></p>
											<p class="small">POPULAR MARKETING KFT. 2016 © MINDEN JOG FENTARTVA</p>
										</li>
									</ul>

								</div>
							</div>
						</div>
						<!-- End of page SubSection -->
					</section>  
				</div>
				<!-- end of contact information -->
				
				<!-- begin of contact message --> 
				<div class="slide" id="s-message" data-anchor="message">
					<section class="content">
						<header class="p-title">
							<h3>Küldjön üzenetet<i class="ion ion-email">
								</i>
							</h3>
							<ul class="buttons">
								<li class="show-for-medium-up">
									<a title="Rólunk" href="#about-us"><i class="ion ion-android-information"></i></a>
								</li>
								<li>
									<a title="Kapcsolat" href="#contact/information"><i class="ion ion-location"></i></a>
								</li>
								<!--<li>
									<a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
								</li>-->
							</ul>
						</header>
						<!-- Begin Of Page SubSction -->
						
						<div class="page-block c-right v-zoomIn">
							<div class="wrapper">
								<div>
									<form class="message form" action="<?php echo base_url('Construction/sendMail') ?>" id='mailform'>
										<div class="fields clearfix">
											<div class="input">
												<label for="mes-name">Név </label>
												<input id="mes-name" name="name" type="text" placeholder="Az Ön neve" required>
											</div>
											<input name="webpage" type="hidden" value='<?php echo $site_set->sitename; ?>' required>
											<div class="buttons">
												<button id="submit-message" class="button email_b" name="submit_message">Küldés</button>
											</div>
										</div>
										<div class="fields clearfix">
											<div class="input">
												<label for="mes-email">Email </label>
												<input id="mes-email" type="email" placeholder="Email Cím" name="email" required>
											</div>
										</div>
										<div style='margin-top:20px;' class="clearfix" id="RecaptchaField1"></div>
										<div class="fields clearfix no-border">
											<label for="mes-text">Üzenet </label>
											<textarea id="mes-text" placeholder="Üzenet ..." name="message" required></textarea>

											<div>
												<p id='messageBox'></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Of Page SubSction -->
					</section>
						
				</div>
				<!-- End of contact message -->
            </div>
            <!-- End of Contact page  -->   
        
        </main>

        <!-- END OF site main content content here -->  
		
		<!-- Begin of site footer -->
		<footer class="page-footer">
			<div>
				<a href="https://www.facebook.com/pmarketinghu/?fref=ts" target="_blank"><i class="ion icon ion-social-facebook"></i></a>
				<a href="https://www.instagram.com/popularmarketing/" target="_blank"><i class="ion icon ion-social-instagram"></i></a>
				<a href="https://twitter.com/pmarketinghu" target="_blank"><i class="ion icon ion-social-twitter"></i></a>
			</div>
		</footer>
		<!-- End of site footer -->

        
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        
        <!-- All Javascript plugins goes here -->
<!--		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>-->
        <script
  			src="https://code.jquery.com/jquery-2.2.4.min.js"
  			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  			crossorigin="anonymous"></script>
		<!-- All vendor scripts -->
        <script src="<?php echo base_url() ?>assets/template/construction/js/vendor/all.js"></script>
		
		<!-- Detailed vendor scripts -->
        <!--<script src="./js/vendor/jquery.fullPage.min.js"></script>
        <script src="<?php echo base_url() ?>assets/template/construction/js/vendor/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/template/construction/js/vendor/jquery.knob.min.js"></script>
        <script src="<?php echo base_url() ?>assets/template/construction/js/vegas/vegas.min.js"></script>
        <script src="<?php echo base_url() ?>assets/template/construction/js/jquery.maximage.js"></script>
        <script src="<?php echo base_url() ?>assets/template/construction/js/okvideo.min.js"></script>-->
		
		<!-- Downcount JS -->
        <script src="<?php echo base_url() ?>assets/template/construction/js/jquery.downCount.js"></script>
		
		<!-- Form script -->
        <script src="<?php echo base_url() ?>assets/template/construction/js/form_script.js"></script>
        
		<!-- Javascript main files -->
        <script src="<?php echo base_url() ?>assets/template/construction/js/main.js"></script>
        <script type='text/javascript'>
        	//recaptchak inicializalasa, kirenderelese explicit modon magyar nyelvvel
            var widgetId1;
            var widgetId2;
            var onloadCallback = function() {
                widgetId1 = grecaptcha.render('RecaptchaField1', {'sitekey' : '<?php echo $this->site_set->grecaptcha_site_key ?>'});
                widgetId2 = grecaptcha.render('RecaptchaField2', {'sitekey' : '<?php echo $this->site_set->grecaptcha_site_key ?>'});
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                    async defer>
         </script>
        
        <!-- Google Analytics: Uncomment and change UA-XXXXX-X to be your site"s ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src="//www.google-analytics.com/analytics.js";
            r.parentNode.insertBefore(e,r)}(window,document,"script","ga"));
            ga("create","UA-XXXXX-X");ga("send","pageview");
        </script>-->
    </body>
</html>

<script>
	$("#mailform").submit(function(e)
	{
		debugger;
	    var postData = $(this).serializeArray();
	    var formURL = $(this).attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {
				alert(data);
				$('#messageBox').html(data);
				$('#messageBox').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#messageBox').html(errorThrown);
				$('#messageBox').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        }
	    });
	    e.preventDefault(); 
	});

$("#preview").submit(function(e)
	{
		debugger;
	    var postData = $(this).serializeArray();
	    var formURL = $(this).attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {	
				alert(data);
				$('#previewMsg').html(data);
				$('#previewMsg').addClass('alert');
				if(data === 'Helyes jelszó!'){
					window.location.replace("<?php echo base_url(); ?>");
				};
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
				$('#previewMsg').html(errorThrown);
				$('#previewMsg').addClass('alert');
				grecaptcha.reset(widgetId2);
              	grecaptcha.reset(widgetId1);
	        }
	    });
	    e.preventDefault(); 
	});
</script>

<!-- Localized -->
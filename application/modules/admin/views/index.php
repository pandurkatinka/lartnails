<?php //print_r($this->site_set->sitename);exit; ?>
<body>

<header>
  <div class="headerpanel">

    <div class="logopanel">
      <h2><a href="<?php echo base_url('admin'); ?>">PM Admin</a></h2>
    </div><!-- logopanel -->

    <div class="headerbar">

      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


      <div class="header-right">
        <ul class="headermenu">
          <?php /*
          <li>
            <div id="noticePanel" class="btn-group">
              <button class="btn btn-notice alert-notice" data-toggle="dropdown">
                <i class="fa fa-globe"></i>
              </button>
              <div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
                <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active"><a data-target="#notification" data-toggle="tab">Notifications (2)</a></li>
                    <li><a data-target="#reminders" data-toggle="tab">Reminders (4)</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="notification">
                      <ul class="list-group notice-list">
                        <li class="list-group-item unread">
                          <div class="row">
                            <div class="col-xs-2">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">New message from Weno Carasbong</a></h5>
                              <small>June 20, 2015</small>
                              <span>Soluta nobis est eligendi optio cumque...</span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item unread">
                          <div class="row">
                            <div class="col-xs-2">
                              <i class="fa fa-user"></i>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">Renov Leonga is now following you!</a></h5>
                              <small>June 18, 2015</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <i class="fa fa-user"></i>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">Zaham Sindil is now following you!</a></h5>
                              <small>June 17, 2015</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">Rey Reslaba likes your post!</a></h5>
                              <small>June 16, 2015</small>
                              <span>HTML5 For Beginners Chapter 1</span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">Socrates commented on your post!</a></h5>
                              <small>June 16, 2015</small>
                              <span>Temporibus autem et aut officiis debitis...</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <a class="btn-more" href="">View More Notifications <i class="fa fa-long-arrow-right"></i></a>
                    </div><!-- tab-pane -->

                    <div role="tabpanel" class="tab-pane" id="reminders">
                      <h1 id="todayDay" class="today-day">...</h1>
                      <h3 id="todayDate" class="today-date">...</h3>

                      <h5 class="today-weather"><i class="wi wi-hail"></i> Cloudy 77 Degree</h5>
                      <p>Thunderstorm in the area this afternoon through this evening</p>

                      <h4 class="panel-title">Upcoming Events</h4>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <h4>20</h4>
                              <p>Aug</p>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">HTML5/CSS3 Live! United States</a></h5>
                              <small>San Francisco, CA</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <h4>05</h4>
                              <p>Sep</p>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">Web Technology Summit</a></h5>
                              <small>Sydney, Australia</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <h4>25</h4>
                              <p>Sep</p>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">HTML5 Developer Conference 2015</a></h5>
                              <small>Los Angeles CA United States</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-xs-2">
                              <h4>10</h4>
                              <p>Oct</p>
                            </div>
                            <div class="col-xs-10">
                              <h5><a href="">AngularJS Conference 2015</a></h5>
                              <small>Silicon Valley CA, United States</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <a class="btn-more" href="">View More Events <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          */ ?>
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-logged" data-toggle="dropdown">
                <!-- <img src="assets/template/logo.png" alt="" /> -->
                <?php //$user->email ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Profilom</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Oldal beállításai</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Segítség</a></li>
                <li><a href="<?php echo base_url('Auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> Kijelentkezés</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
    </div><!-- headerbar -->
  </div><!-- header-->
</header>

<section>

  <div class="leftpanel" style='border-right:1px solid; border-color:#dedede;'>
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

      <div class="media leftpanel-profile">
        <div class="media-left">
          <a href="#">
            <img src="<?php echo base_url('assets/template/pm_square.png'); ?>"
             alt="<?php echo $this->site_set->sitename; ?>" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $this->site_set->sitename; ?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
          <span>Alapadatok</span>
        </div>
      </div><!-- leftpanel-profile -->

      <div class="leftpanel-userinfo collapse" id="loguserinfo">
        <h5 class="sidebar-title">Cím</h5>
        <address>
          <?php echo $this->contact_info->businessaddress; ?>
        </address>
        <h5 class="sidebar-title">Elérhetőségek</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <label class="pull-left">Admin email</label>
            <span class="pull-right"><?php echo $this->contact_info->adminemail; ?></span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Nyilvános email</label>
            <span class="pull-right"><?php echo $this->contact_info->publicemail; ?></span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Telefon</label>
            <span class="pull-right"><?php echo $this->contact_info->phone; ?></span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Mobil</label>
            <span class="pull-right"><?php echo $this->contact_info->mobil; ?></span>
          </li>
          <!-- <li class="list-group-item">
            <label class="pull-left">Social</label>
            <div class="social-icons pull-right">
              <a href="#"><i class="fa fa-facebook-official"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </li> -->
        </ul>
      </div><!-- leftpanel-userinfo -->

      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Vezérlőpult"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Hírlevél"><a data-toggle="tab" data-target="#newsletter"><i class="tooltips fa fa-envelope"></i></a></li>
        <?php /*
          <li class="tooltips unread" data-toggle="tooltip" title="Email"><a data-toggle="tab" data-target="#emailmenu"><i class="tooltips fa fa-envelope"></i></a></li>
        */ ?><!--
        <li class="tooltips" data-toggle="tooltip" title="Beállítások"><a data-toggle="tab" data-target="#settings"><i class="fa fa-cog"></i></a></li> -->
        <li class="tooltips" data-toggle="tooltip" title="Kijelentkezés"><a href="<?php echo base_url('Auth/logout') ?>"><i class="fa fa-sign-out"></i></a></li>
      </ul>

      <div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu" >
          <h5 class="sidebar-title">Honlapadatok</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="<?php echo base_url('admin/settings') ?>"><i class="fa fa-home"></i> <span>Honlap beállítások</span></a></li>
            <li><a href="<?php echo base_url('admin/contact') ?>"><i class="fa fa-map-marker"></i> <span>Elérhetőségek</span></a></li>
            <li><a href="<?php echo base_url('admin/users') ?>"><i class="fa fa-user"></i> <span>Felhasználók</span></a></li>
            <li><a href="<?php echo base_url('admin/news_category') ?>"><i class="fa fa-file-text"></i> <span>Hírek</span></a></li>
            <li><a href="<?php echo base_url('admin/pages') ?>"><i class="fa fa-file-text"></i> <span>Oldalak</span></a></li>
            <li><a href="<?php echo base_url('admin/gallery') ?>"><i class="fa fa-file-text"></i> <span>Galéria</span></a></li>
            <li><a href="<?php echo base_url('admin/product_category') ?>"><i class="fa fa-file-text"></i> <span>Termék kategóriák</span></a></li>
            <li><a href="<?php echo base_url('admin/products') ?>"><i class="fa fa-file-text"></i> <span>Termékek</span></a></li>
            <li><a href="<?php echo base_url('admin/say_about_us') ?>"><i class="fa fa-file-text"></i> <span>Rólunk mondták</span></a></li>
            <li><a href="<?php echo base_url('admin/coworkers') ?>"><i class="fa fa-file-text"></i> <span>Munkatársak</span></a></li>
            <li><a href="<?php echo base_url('admin/slider') ?>"><i class="fa fa-file-text"></i> <span>Slider</span></a></li>

            <!--
            <li><a href="<?php echo base_url('admin/navigation') ?>"><i class="fa fa-file-text"></i> <span>Menük</span></a></li> -->
          </ul>

          <?php /*
            <h5 class="sidebar-title">Main Menu</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk">
              <li class="nav-parent">
                <a href=""><i class="fa fa-check-square"></i> <span>Forms</span></a>
                <ul class="children">
                  <li><a href="general-forms.html">Form Elements</a></li>
                  <li><a href="form-validation.html">Form Validation</a></li>
                  <li><a href="form-wizards.html">Form Wizards</a></li>
                  <li><a href="wysiwyg.html">Text Editor</a></li>
                </ul>
              </li>
              <li class="nav-parent"><a href=""><i class="fa fa-suitcase"></i> <span>UI Elements</span></a>
                <ul class="children">
                  <li><a href="buttons.html">Buttons</a></li>
                  <li><a href="icons.html">Icons</a></li>
                  <li><a href="typography.html">Typography</a></li>
                  <li><a href="alerts.html">Alerts &amp; Notifications</a></li>
                  <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                  <li><a href="sliders.html">Sliders</a></li>
                  <li><a href="graphs.html">Graphs &amp; Charts</a></li>
                  <li><a href="panels.html">Panels</a></li>
                  <li><a href="extras.html">Extras</a></li>
                </ul>
              </li>
              <li class="nav-parent"><a href=""><i class="fa fa-th-list"></i> <span>Tables</span></a>
                <ul class="children">
                  <li><a href="basic-tables.html">Basic Tables</a></li>
                  <li><a href="data-tables.html">Data Tables</a></li>
                </ul>
              </li>
              <li class="nav-parent"><a href=""><i class="fa fa-file-text"></i> <span>Pages</span></a>
                <ul class="children">
                  <li><a href="asset-manager.html">Asset Manager</a></li>
                  <li><a href="people-directory.html">People Directory</a></li>
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="blank.html">Blank Page</a></li>
                  <li><a href="notfound.html">404 Page</a></li>
                  <li><a href="signin.html">Sign In</a></li>
                  <li><a href="signup.html">Sign Up</a></li>
                </ul>
              </li>
            </ul>
          */ ?>
        </div><!-- tab-pane -->

        <div class="tab-pane active" id="newsletter" >
          <h5 class="sidebar-title">Hírlevelek kezelése</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
              <li><a href="<?php echo base_url('admin/subscribers') ?>"><i class="fa fa-users"></i> <span>Feliratkozók</span></a></li>
              <li><a href="<?php echo base_url('admin/newsletter/edit/1') ?>"><i class="fa fa-pencil"></i> <span>Hírlevél szerkesztése</span></a></li>
              <li><a href="<?php echo base_url('admin/newsletter_send') ?>"><i class="fa fa-paper-plane-o"></i> <span>Hírlevelek küldése</span></a></li>
          </ul>
        </div>

          <!-- ######################## EMAIL MENU ##################### -->
        <?php /*
          <div class="tab-pane" id="emailmenu">
            <div class="sidebar-btn-wrapper">
              <a href="compose.html" class="btn btn-danger btn-block">Compose</a>
            </div>

            <h5 class="sidebar-title">Mailboxes</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
              <li><a href="email.html"><i class="fa fa-inbox"></i> <span>Inbox (3)</span></a></li>
              <li><a href="email.html"><i class="fa fa-pencil"></i> <span>Draft (2)</span></a></li>
              <li><a href="email.html"><i class="fa fa-paper-plane"></i> <span>Sent</span></a></li>
            </ul>

            <h5 class="sidebar-title">Tags</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk nav-label">
              <li><a href="#"><i class="fa fa-tags primary"></i> <span>Communication</span></a></li>
              <li><a href="#"><i class="fa fa-tags success"></i> <span>Updates</span></a></li>
              <li><a href="#"><i class="fa fa-tags warning"></i> <span>Promotions</span></a></li>
              <li><a href="#"><i class="fa fa-tags danger"></i> <span>Social</span></a></li>
            </ul>
          </div><!-- tab-pane -->

          <!-- ################### CONTACT LIST ################### -->

          <div class="tab-pane" id="contactmenu">
            <div class="input-group input-search-contact">
              <input type="text" class="form-control" placeholder="Search contact">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <h5 class="sidebar-title">My Contacts</h5>
            <ul class="media-list media-list-contacts">
              <li class="media">
                <a href="#">
                  <div class="media-left">
                      <img class="media-object img-circle" src="assets/template/admin/images/photos/user1.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Christina R. Hill</h4>
                    <span><i class="fa fa-phone"></i> 386-752-1860</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user2.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Floyd M. Romero</h4>
                    <span><i class="fa fa-mobile"></i> +1614-650-8281</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user3.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Jennie S. Gray</h4>
                    <span><i class="fa fa-phone"></i> 310-757-8444</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user4.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Alia J. Locher</h4>
                    <span><i class="fa fa-mobile"></i> +1517-386-0059</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user5.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Nicholas T. Hinkle</h4>
                    <span><i class="fa fa-skype"></i> nicholas.hinkle</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user6.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Jamie W. Bradford</h4>
                    <span><i class="fa fa-phone"></i> 225-270-2425</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user7.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Pamela J. Stump</h4>
                    <span><i class="fa fa-mobile"></i> +1773-879-2491</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user8.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Refugio C. Burgess</h4>
                    <span><i class="fa fa-mobile"></i> +1660-627-7184</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user9.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Ashley T. Brewington</h4>
                    <span><i class="fa fa-skype"></i> ashley.brewington</span>
                  </div>
                </a>
              </li>
              <li class="media">
                <a href="#">
                  <div class="media-left">
                    <img class="media-object img-circle" src="assets/template/admin/images/photos/user10.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Roberta F. Horn</h4>
                    <span><i class="fa fa-phone"></i> 716-630-0132</span>
                  </div>
                </a>
              </li>
            </ul>
          </div><!-- tab-pane -->

          <!-- #################### SETTINGS ################### -->

          <div class="tab-pane" id="settings">
            <h5 class="sidebar-title">General Settings</h5>
            <ul class="list-group list-group-settings">
              <li class="list-group-item">
                <h5>Daily Newsletter</h5>
                <small>Get notified when someone else is trying to access your account.</small>
                <div class="toggle-wrapper">
                  <div class="leftpanel-toggle toggle-light success"></div>
                </div>
              </li>
              <li class="list-group-item">
                <h5>Call Phones</h5>
                <small>Make calls to friends and family right from your account.</small>
                <div class="toggle-wrapper">
                  <div class="leftpanel-toggle-off toggle-light success"></div>
                </div>
              </li>
            </ul>
            <h5 class="sidebar-title">Security Settings</h5>
            <ul class="list-group list-group-settings">
              <li class="list-group-item">
                <h5>Login Notifications</h5>
                <small>Get notified when someone else is trying to access your account.</small>
                <div class="toggle-wrapper">
                  <div class="leftpanel-toggle toggle-light success"></div>
                </div>
              </li>
              <li class="list-group-item">
                <h5>Phone Approvals</h5>
                <small>Use your phone when login as an extra layer of security.</small>
                <div class="toggle-wrapper">
                  <div class="leftpanel-toggle toggle-light success"></div>
                </div>
              </li>
            </ul>
          </div><!-- tab-pane -->
        */ ?>

      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">
      <?php echo $output; ?>

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>

<!-- staying on the newsletter page -->
<script>
<?php if(($this->uri->segment(2) == 'subscribers') || ($this->uri->segment(2) == 'newsletter'))  { ?>
			setTimeout(function(){
				$('[data-target=#newsletter]').click();
			}, 10);
			<?php } ?>
</script>

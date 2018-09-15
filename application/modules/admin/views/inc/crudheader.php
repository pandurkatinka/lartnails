<?php //print_r($this);exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="assets/template/admin/images/favicon.png" type="image/png">-->

  <title><?php echo $this->site_set->sitename; ?> - Running on: PopIgniter</title>

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/Hover/hover.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/weather-icons/css/weather-icons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/jquery-toggles/toggles-full.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/lib/morrisjs/morris.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/admin/css/quirk.css">

  <script src="<?php echo base_url() ?>assets/template/admin/lib/modernizr/modernizr.js"></script>
  <?php
  foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
  <?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
  <?php endforeach; ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="assets/template/admin/lib/html5shiv/html5shiv.js"></script>
  <script src="assets/template/admin/lib/respond/respond.src.js"></script>
  <![endif]-->
</head>
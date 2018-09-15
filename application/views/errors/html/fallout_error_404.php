<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>

<style>
	.image-layer {
  z-index: 1;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: url(http://www.windowscentral.com/sites/wpcentral.com/files/styles/larger/public/field/image/2015/06/fallout-4-teaser.jpg?itok=L6Ln4CRc);
  color: transparent;
  background-size: cover;
  text-shadow: 0 0 30px rgba(0, 0, 0, .5);
  animation: glitch 8s linear infinite;
}

.frame {
  z-index: 3;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
}

.frame div {
  position: absolute;
  left: 0;
  top: -20%;
  width: 100%;
  height: 20%;
  background-color: rgba(0, 0, 0, .12);
  box-shadow: 0 0 10px rgba(0, 0, 0, .3);
  animation: waves 12s linear infinite;
}

.frame div:nth-child(1) {
  animation-delay: 0;
}

.frame div:nth-child(2) {
  animation-delay: 4s;
}

.frame div:nth-child(3) {
  animation-delay: 8s;
}

@keyframes waves {
  0% {
    top: -20%;
  }
  100% {
    top: 100%;
  }
}

@keyframes glitch {
  0% {
    opacity: .8;
  }
  10% {
    opacity: .6;
  }
  20% {
    opacity: .7;
  }
  30% {
    opacity: .5;
  }
  40% {
    opacity: .6;
  }
  50% {
    opacity: .6;
  }
  54% {
    opacity: .8;
  }
  58% {
    opacity: .6;
  }
  60% {
    opacity: .6;
  }
  65% {
    opacity: .7;
  }
  70% {
    opacity: .5;
  }
  80% {
    opacity: .6;
  }
  90% {
    opacity: .7;
  }
  93% {
    opacity: .8;
  }
  96% {
    opacity: .6;
  }
  100% {
    opacity: .7;
  }
}

iframe {
  display: none
}
</style>
</head>
<body>
	<div class="frame">
    <div></div>
    <div></div>
    <div></div>
</div>
<div class="image-layer"></div>

<iframe width="560" height="315" src="https://www.youtube.com/embed/wiSTfT_AO98?autoplay=1" frameborder="0" allowfullscreen></iframe>
</body>
</html>
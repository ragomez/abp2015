<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->




<html class=" js csstransitions" lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">

<title>Leroy - Onepage Bootstrap HTML Template</title>

<meta name="description" content="Onepage Multipurpose Bootstrap HTML Template">

<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" media="screen" href="archivos/bootstrap.css">
<link rel="stylesheet" href="archivos/font-awesome.css">
<link rel="stylesheet" href="archivos/animate.css">
<link rel="stylesheet" href="archivos/theme.css">

<link href="archivos/css_002.css" rel="stylesheet" type="text/css">
<link href="archivos/css.css" rel="stylesheet" type="text/css">
<link href="archivos/css_003.css" rel="stylesheet" type="text/css">

</head>
<body>
<!--wrapper start-->
<div class="wrapper spHeight" id="wrapper">
	
	<!--header-->
	<?php 
		include ("header.html");
	?>		
	<!--header-->
	
	<!-- aki esta el codigo que quiero insertar por include  -->
	<?php 
		include ("slideEstablecimientos.html");
	?>
	<!-- aki esta el codigo que quiero insertar por include  -->


	<!--gallery-->
	<?php 
		include ("pinchoMasVotados.html");
	?>	
	<!--gallery-->

	<!--contact-->
	<?php 
		include ("contacto.html");
	?>
  	<!--contact-->


	<!--footer-->
	<?php 
		include ("footer.html");
	?>
	<!--footer-->
		
</div><!--wrapper end-->

<!--Javascripts-->
<script src="archivos/jquery.js"></script>
<script src="archivos/modernizr.js"></script>
<script src="archivos/bootstrap.js"></script>
<script src="archivos/menustick.js"></script>
<script src="archivos/parallax.js"></script>
<script src="archivos/easing.js"></script>
<script src="archivos/wow.js"></script>
<script src="archivos/smoothscroll.js"></script>
<script src="archivos/masonry.js"></script>
<script src="archivos/imgloaded.js"></script>
<script src="archivos/classie.js"></script>
<script src="archivos/colorfinder.js"></script>
<script src="archivos/gridscroll.js"></script>
<script src="archivos/contact.js"></script>
<script src="archivos/common.js"></script>

<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
  //enabling stickUp on the '.navbar-wrapper' class
	$('.navbar-wrapper').stickUp({
		parts: {
		  0: 'banner',
		  1: 'aboutus',
		  2: 'specialties',
		  3: 'gallery',
		  4: 'feedback',
		  5: 'contact'
		},
		itemClass: 'menuItem',
		itemHover: 'active',
		topMargin: 'auto'
		});
	});
});
</script>

</body></html>
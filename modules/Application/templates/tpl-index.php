<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project Title</title>

	<!-- Include CSS Stylesheets -->
	<link href="css/screen.css" rel="stylesheet">
	<link href="css/navigation.css" rel="stylesheet">
	<link href="css/apprise.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico"/>

	<!-- HTML 5 Shiv script -->
	<!--[if lte IE 9]>
	<link href="css/ie.css" rel="stylesheet">
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Library Scripts (At the top because it is an Intranet app - don't worry be happy) -->
	<script src="js/libs/jquery.1.6.min.js"></script>
	<script src="js/libs/jquery.color.js"></script>
	<script src="js/libs/apprise-1.5.min.js"></script>

</head>
<body>
<div class="container prepend-top">

	<!-- Header -->
	<header id="header" class="span-24 last">
		<h1>Project Title</h1>
	</header>

	<!-- Navigation -->
	<div id="navigation" class="span-24 last">
		<?php echo $this->navigation ?>
	</div>

	<!-- Main Container -->
	<div id="main" class="span-24 last">
		<?php echo $this->module_content ?>
	</div>

	<!-- Footer -->
	<hr>
	<footer id="footer" class="span-24 last append-bottom">
		<p class="quiet">&copy; Copyright 2011 by Aiden Tailor</p>
	</footer>

</div>
</body>
</html>

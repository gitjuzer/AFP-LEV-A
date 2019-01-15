<?php session_start(); ?>
<html>
	<head>
		<title>Tesztoldal</title>
		
		<link rel="stylesheet" type="text/css" href="mystyle.css"> 
</head>
<body>
<div border="1px" width="80%" align="center">
<div>
	<div>
		Fejléc(kép)
	<div>
<div>

		<div>
			<ul>
			  <?php if(array_key_exists('uid', $_GET)): ?><li><a href="index.php?d=0">Adatbevitel</a></li> <?php endif;?>
			  <li><a href="index.php?d=1">Cikkoldal</a></li>
			  <li><a href="index.php?d=2">Cikklista</a></li>
			  <li><a href="index.php?d=3">Szűrő</a></li>
			  <li><a href="index.php?d=4">Login</a></li>
			</ul>
		</div>

<div>
	<!-- <td height="400px" valign="top"> -->

	<?php

	include_once "pages/DB.php";
	

	if (!array_key_exists("d", $_GET)) {$_GET["d"] = 0;}

	switch ($_GET["d"])
	{
		case 0: include_once "pages/cikklista.php"; break;
		case 1: include_once "pages/cikkoldal.php"; break;
		case 2: include_once "pages/adatfelvitel.php"; break;
		case 3: include_once "pages/szures.php"; break;
		default: include_once "pages/cikklista.php"; break;

	}
	?>
	</div>


<div>
	<div>
		lábléc
	</div>
</div>
</div>
</body>
</html>


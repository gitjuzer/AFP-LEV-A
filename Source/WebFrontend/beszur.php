<?php

include_once "DB.php";

$id = DBconnect();

$q = "insert into adatok (title, lead, ttext, picture)
		values('". $_POST['title'] ."',
		'". $_POST['lead'] ."',
		'". $_POST['ttext'] ."', 
		'images/'".$_POST['picture']."')";

DBquery($id, $q, 1);

DBclose($id);

?>

<meta http-equiv="refresh" content="0;../index.php?d=2">
<html>

<?php
echo "cikklista";

$id = DBconnect();
$adatok = DBquery($id, 'SELECT * FROM adatok', 0);
DBclose($id);
?>

<table width="90%" border="1">
	<?php
	foreach ( $adatok as $sor)
	{
		echo "<tr>";
		echo "<td valign='top'>" . $sor['title'] . "</td> <td> <img src='" . $sor['picture'] . "'width='100px'></td> <td>" . $sor['lead'];
		echo "</td><td>" . $sor['ttext'] . "</td>";
		echo "</tr>";
	}
	?>
</table>

</html>

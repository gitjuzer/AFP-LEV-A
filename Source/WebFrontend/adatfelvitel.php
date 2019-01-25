<html>


	<form action= "pages/beszur.php" method="post" enctype='multipart-form/data'>

		Cim:
		<input type="text" name="title"><br>

		Bevezeto:
		<input type="text" name="lead"><br>

		Szoveg:
		<br><textarea name="ttext" rows="10" cols="30"></textarea><br>

		<input type="file" name="picture"><br>

		<input type="submit" name="elkuld"><br>

	</form>
	
	<?php include_once "pages/cikklista.php"; ?>

</html>
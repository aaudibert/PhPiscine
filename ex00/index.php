<?php 
session_start();
if ($_GET['submit'] == "OK")
{
	$_SESSION["login"] = $_GET["login"] . "\n";
	$_SESSION["passwd"] = $_GET["passwd"] ."\n";
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Session</title>
		<style>
			.form {
				text-align: center;
				margin-top: 17vw;
			}
			.field {
				font-size: 2vw;
			}
		</style>
	</head>
	<body>
		<form action="index.php" class="form" method="get">
			  <input class="field" type="text" name="login" <?php echo $_GET["login"]; ?> placeholder="login"><br><br>
			  <input class="field" type="text" name="passwd" <?php echo $_GET["passwd"]; ?> placeholder="password"><br><br>
			  <input class="field" type="submit" name="submit" value="OK" width="2vw";>
		</form>
	</body>
</html>
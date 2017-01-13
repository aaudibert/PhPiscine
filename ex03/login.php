<?php
include ('auth.php');
session_start();
if (auth($login, $passwd) == TRUE) {
	$_SESSION($login);
	echo "OK\n"
}
else {
	$_SESSION[“loggued_on_user”] = '';
	echo "ERROR\n"
}
 ?>

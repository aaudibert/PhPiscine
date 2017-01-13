<?php 
	if ($_POST["login"] != "" && $_POST["passwd"] != "" && $_POST["submit"] == "OK") {
		if (file_exists("../private") == FALSE)
			mkdir("../private");
		$login = $_POST['login'];
		$hpass = hash('whirlpool', $_POST['passwd']);
		$data = array('login' => $login, 'passwd' => $hpass);
		if (file_exists('../private/passwd') == FALSE) {
			$ret = array($data);
			file_put_contents('../private/passwd', serialize($ret));
			echo "OK\n";
		}
		else {
			$file = unserialize(file_get_contents('../private/passwd'));
			$err = 0;
			foreach ($file as $user) {
				if ($user['login'] == $login)
				{
					echo "ERROR\n";
					$err = 1;
				}
			}
			if ($err == 0)
			{
				$file[] = $data;
				file_put_contents('../private/passwd', serialize($file));
				echo "OK\n";
			}
		}
	}
	else
		echo "ERROR\n";
 ?>
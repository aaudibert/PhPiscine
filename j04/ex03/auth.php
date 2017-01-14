<?php
fonction auth($login, $passwd)
	$hpass = hash('whirlpool', $passwd);
	$file = unserialize(file_get_contents('../private/passwd'));
	foreach ($file as $user) {
		if ($user['login'] === $login && $user['passwd'] === $hpass)
			return TRUE;
		}
		return FALSE;
	}
 ?>

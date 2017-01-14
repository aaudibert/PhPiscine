<?php 
if ($_POST["login"] != "" && $_POST["newpw"] != "" && $_POST['oldpw'] != "" && $_POST["submit"] == "OK") {
	$login = $_POST['login'];
	$oldhpass = hash('whirlpool', $_POST['oldpw']);
	$newhpass = hash('whirlpool', $_POST['newpw']);
	$data = array('login' => $login, 'passwd' => $newhpass);
	$file = unserialize(file_get_contents('../private/passwd'));
	$val = $tmp = $i = 0;
	foreach ($file as $user) {
		if ($user['login'] == $login && $user['passwd'] == $oldhpass)
		{
			$val = 1;
			$i = $tmp;
		}
		$tmp += 1;
	}
	if ($val)
	{
		$file[$i] = $data;
		file_put_contents('../private/passwd', serialize($file));
		echo "OK\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
 
 ?>
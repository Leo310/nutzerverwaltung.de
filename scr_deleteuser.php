<?php
session_start();
if (isset($_SESSION['user'])) header("location:index.php");
if (isset($_SESSION['salt'])) $salt = $_SESSION['salt'];
$uname = $_SESSION['user'];
$name = $_POST['name'];
$pw = "";

if (isset($_POST['pw']))   $pw = $_POST['pw'];


$users = file("include/nutzer.txt", FILE_IGNORE_NEW_LINES);

$index = 0;
$delete = -1;

if($uname == $name){

// löschvorgang
foreach($users as $user) {
	$daten = explode(";", $user);
	if ($uname == $daten[0]) {
		$delete = $index;
		if (password_verify($pw.$salt, $daten[1])) {

		unset($users[$delete]);
		file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));


		session_destroy();
		header("location:index.php");
		} else if($_SESSION['rechte'] == "admin"){
			header("location:deleteuser.php");
		}else {
			$_SESSION['error4'] = '<font color="#ff2e2e">kennwort inkorrekt.</font> bitte wiederholen.';
			header("location:deleteuser.php");
		}
	}
	$index++;
}
} else{
	foreach($users as $user) {
	$daten = explode(";", $user);
	if ($name == $daten[0]) $delete = $index;
	$index++;
}

unset($users[$delete]);
file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
 

header("location:nutzerListe.php");
}


?>

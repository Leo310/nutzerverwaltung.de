<?php
session_start();
$name = $newname = $newpw = $newrechte = "";
if (isset($_POST['salt'])) $salt = $_POST['salt'];
if(isset($_POST['name'])) $name = $_POST['name'];
if(isset($_POST['newname'])) $newname = $_POST['newname'];
if(isset($_POST['newpw'])){
	if($_POST['newpw'])$newpw = password_hash($_POST['newpw'].$salt, PASSWORD_DEFAULT);
}
if(isset($_POST['newrechte'])) $newrechte = $_POST['newrechte'];

$users = file("include/nutzer.txt", FILE_IGNORE_NEW_LINES);

$index = 0;
$delete = -1;

foreach($users as $user){
	$daten = explode(";",$user);
	if ($name == $daten[0]){
		if(!$newname){
			$newname = $daten[0];
		}if(!$newpw){
			$newpw = $daten[1];
		}if (!$newrechte){
			$newrechte = $daten[2];
		}
	$users[$index] = "$newname;$newpw;$newrechte;$salt";
	file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
}
	$index++;

}


header("location:nutzerListe.php");


?>

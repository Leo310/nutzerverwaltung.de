	<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 $oldpw = $newpw = $bnewpw = "";

if (!isset($_SESSION['user'])) header("location:index.php");

if (isset($_SESSION['salt'])) $salt = $_SESSION['salt'];
if (isset($_POST['oldpw']))   $oldpw = $_POST['oldpw'];
if (isset($_POST['newpw']))   $newpw = $_POST['newpw'];
if (isset($_POST['bnewpw']))   $bnewpw = $_POST['bnewpw'];
if (isset($_POST['rechte']))   $rechte = $_POST['rechte'];

$thisuser = $_SESSION['user'];

$changed = false;

// Nutzerliste in ein Array einlesen, Zeilenumbrüche entfernen
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);

//echo "<pre>"; print_r($users); echo "</pre>";

// Die foreach-Schleife ist eine PHP-Spezialität - und sehr bequem
$index = 0;
foreach ($users as $user) {
	$daten = explode(";", $user);
	if($daten[0] == $thisuser) {
		if(password_verify($oldpw.$salt, $daten[1])) {
			if($newpw == $bnewpw) {
				$newpw = password_hash($newpw.$salt, PASSWORD_DEFAULT);
				$users[$index] = "$thisuser;$newpw;$rechte;$salt";
				file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
				header("Location:pwchange.php");
				$_SESSION['pwchanged'] = '<font color="#01d28e">neues passwort wurde gespeichert.';

			} else {
						$_SESSION['error'] = '<font color="#ff2e2e">eingabe der neuen kennwörter stimmt nicht überein.</font> bitte wiederholen.';
						header("location:pwchange.php");
			}
		} else { $_SESSION['error'] = '<font color="#ff2e2e">eingabe des alten passworts inkorrekt.</font> bitte wiederholen.';
						header("location:pwchange.php");
		}
	}
	$index++;
}




 ?>

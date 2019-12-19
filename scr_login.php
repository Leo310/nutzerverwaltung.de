<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['rechte'] == "admin") header("location:startadmin.php");
if (isset($_SESSION['user']) && $_SESSION['rechte'] == "nutzer") header("location:start.php");

include('include/dbconnectmysqli.php');

$name = $pw = "";
$vergleichRecht = "admin";

if (isset($_POST['name'])) $name = $_POST['name'];
if (isset($_POST['pw']))   $pw = $_POST['pw'];

// Nutzerliste in ein Array einlesen, Zeilenumbrüche entfernen
//$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);

$found = 0;

// Die foreach-Schleife ist eine PHP-Spezialität - und sehr bequem
//foreach ($users as $user) {
  // explode zerlegt den String in ein Array, das Trennzeichen ist frei wählbar
//  $daten = explode(";", $user);
//  if ($name == $daten[0] && password_verify($pw.$daten[3], $daten[1])) {
//	    $_SESSION['pw'] = $daten[1];
//        $_SESSION['rechte'] = $daten[2];
//        $_SESSION['salt'] = $daten[3];
//		$rechte = $_SESSION['rechte'];
//	if($vergleichRecht == $rechte){
//		//auf adminseite
//		$found = 1;
//		$_SESSION['user'] = $daten[0];
//	}else{
//    $found = 2;
//    $_SESSION['user'] = $daten[0];
//	}
//  }

$sqlquery = "select name,pswd,rechte,salt from user where name like ?";
$stmt = prepared_query($conn, $sqlquery, [$name]);
$dbuser = $stmt->get_result()->fetch_assoc();

if(password_verify($pw.$dbuser['salt'], $dbuser['pswd'])){
	$_SESSION['pw'] = $dbuser['pswd'];
        $_SESSION['rechte'] = $dbuser['rechte'];
        $_SESSION['salt'] = $dbuser['salt'];
        $rechte = $_SESSION['rechte'];

      if($vergleichRecht == $rechte){
              //auf adminseite
              $found = 1;
      }else{
    $found = 2;
      }
$_SESSION['user'] = $dbuser['name'];
}

switch ($found) {
    case 0:
        $_SESSION['error'] = '<font color="#ff2e2e">nutzername oder kennwort inkorrekt.</font> bitte wiederholen.';
		header("location:index.php");
        break;
    case 1:
        header("location:startadmin.php");
        break;
    case 2:
        header("location:start.php");
        break;
}


?>

<?php
	session_start();
if(isset($_SESSION['user'])) header("location:start.php");

//connect to db
//include('include/dbconnectpdo.php');
include('include/dbconnectmysqli.php');

$name = $pw = $bpw = "";
$rechte = "nutzer";
$existent = false;

$_SESSION['rechte'] = $rechte;

if(isset($_POST['name'])) $name=$_POST['name'];
if(isset($_POST['pw'])) $pw =$_POST['pw'];
if(isset($_POST['bpw'])) $bpw =$_POST['bpw'];


$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);


foreach($users as $user){
	$daten = explode(";",$user);
	if($daten[0] == $name){
		$_SESSION['error'] = '<font color="#ff2e2e">dieser nutzername wird bereits verwendet.</font> wähle bitte einen anderen.';
		$existent = true;
	}
}

if(!$existent){
	if($pw == $bpw){
	$_SESSION['salt'] = salt();
	$hashedpw =  password_hash($pw.$_SESSION['salt'], PASSWORD_DEFAULT);
	$salt = $_SESSION['salt'];	
	$email = "test@gmail.com";

	//nutzer.txt
	$userarray = array($name, $hashedpw, $rechte, $salt);
	$user = implode(";", $userarray);
	file_put_contents("include/nutzer.txt","\n".$user, FILE_APPEND);

	//database
	$sqlquery="insert into user(name, email, pswd, rechte, salt) values(?, ?, ?, ?, ?)";
	//$conn->prepare($sqlquery)->execute([$name, $email, $hashedpw, $rechte, $salt]);
	//mysqli_query($conn, $sqlquery);
	prepared_query($conn, $sqlquery, [$name, $email,$hashedpw, $rechte, $salt]);

	$_SESSION['user'] = $name;
	header("location:start.php");

}else{
	$_SESSION['error1'] = '<font color="#ff2e2e">eingabe der passwörter stimmt nicht überein.</font> bitte wiederholen.';
	header("location:register.php");
}
} else {
	header("location:register.php");
}

function salt($laenge = 5) {
	$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$salt ="";
	for($i = 0;$i < $laenge;$i++) {
		$salt .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $salt;
}
?>

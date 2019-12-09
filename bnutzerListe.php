<?php
session_start();
include("include/inc_htmlhead");
include('include/inc_htmlkopfzeile.php');
if ($_SESSION['rechte'] !== "admin") header("location:index.php");
?>


<center><div class="userlistcontainer">
<h1 style="margin-top: 3%;" class="frontheadline">nutzerübersicht</h1>
<table cellspacing="5" cellpadding="4" style="margin-top: 3%">
<thead>
<tr><th class="tablehead" style="width:200px">nutzername</th><th class="tablehead" style="width:500px">kennwort</th><th class="tablehead" style="width:90px">rechte</th></tr>
</thead>
<tbody class="tablecontent">
<?php
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
foreach($users as $user){
	$name = $_POST['name'];
	$daten = explode(";",$user);
	if($name == $daten[0]){
		$salt = $daten[3];
		echo "<tr><td style='width:200px'><form action='scr_bnutzerListe.php' method='post'><input type='hidden' name='name' value='$name'><input type='hidden' name='salt' value='$salt'><input class='inputnamebyadmin' type='text' id='nutzername' name='newname' placeholder='".$daten[0]."'></td><td style='width:500px'><input class='inputpwbyadmin' type='text' id='password' name='newpw' placeholder='kennwort zuweisen'></td>";
		echo "<td style='width:90px'><select name='newrechte' size='1'>";
		if($daten[0] == "admin") {
			echo "<option selected>admin</option><option style='background:#272727'>nutzer</option>";
		}else {
			echo "<option>admin</option><option selected>nutzer</option>";
		}
		echo "</select></td><td><input class='interfaceedit' type='submit' value='✓'></td><td><input class='interfacedeleteunsichtbar' type='submit' value='nutzer löschen'></td></tr>\n";
	}else{
	echo "<tr><td style='width:200px'>".$daten[0]."</td><td style='width:500px'>".$daten[1]."</td><td style='width:90px'>".$daten[2]."</td><td>\n";
	}
	}

?>
<tr></tr>
</tbody>
</table>
</div>
</body>
</html>

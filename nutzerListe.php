<?php
session_start();
include("include/inc_htmlhead");
include('include/inc_htmlkopfzeile.php');
if ($_SESSION['rechte'] !== "admin") header("location:index.php");

?>

<!-- <div style='margin-left:auto; margin-right:auto; margin-top:150px; min-width:500px; width:50%;'> -->
<center><div class="userlistcontainer">
<h1 style="margin-top: 3%;" class="frontheadline">nutzerübersicht</h1>
<table cellspacing="5" cellpadding="4" style="margin-top: 3%;">
<thead>
<tr><th class="tablehead" style="width:200px">nutzername</th><th class="tablehead" style="width:500px">kennwort</th><th class="tablehead" style="width:90px">rechte</th></tr>
</thead>
<tbody class="tablecontent">
<?php
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
foreach($users as $user){
	$daten = explode(";",$user);
	echo "<tr><td style='width:200px'>".$daten[0]."</td><td style='width:500px'>".$daten[1]."</td><td style='width:90px'>".$daten[2]."</td>";
	echo "<td><form action='bnutzerListe.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input class='interfaceedit' type='submit' value='✎'></form></td><td><form action='scr_deleteuser.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input class='interfacedelete' type='submit' value='nutzer löschen'></form></td></tr>\n";
}

?>
<tr></tr>
</tbody>
</table>
</div>
</body>
</html>
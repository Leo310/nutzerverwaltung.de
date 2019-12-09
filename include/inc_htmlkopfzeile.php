<?php
if (isset($_SESSION['user']) && $_SESSION['rechte'] == "admin"){
echo "<body class='body' background='images/bild3.jpg'>";

  // always used menu
echo "<button style='float:right; margin-top:0.5%; margin-right:1%' class='abmeldebutton' onClick=\"window.location.href='scr_logout.php'\">abmelden »</button>";
$user = $_SESSION['user'];
echo "<h1 style='float:right; margin-top:0.7%; margin-right:2%; color: #ff2e2e;' class='userloggedin'>$user</h1>";
echo "<h1 style='float:right; margin-top:0.7%; margin-right:3%' class='userloggedin'>|</h1>";


echo "<button style='float:right; margin-top:0.4%; margin-right:2%' class='menubutton' onClick=\"window.location.href='deleteuser.php'\">account löschen</button>";
echo "<button style='float:right; margin-top:0.4%; margin-right:0.3%' class='menubutton' onClick=\"window.location.href='pwchange.php'\">passwort ändern</button>";
echo "<button style='float:right; margin-top:0.4%; margin-right:0.3%' class='menubutton' onClick=\"window.location.href='nutzerListe.php'\">nutzerliste</button>";

  //end of always used menu -->

  //optional back button top left -->
  echo "<button style='float:left; margin-top:0.4%; margin-left:-1%' class='menubutton' onClick=\"history.back();\">« zurück</button>";
}



if (isset($_SESSION['user']) && $_SESSION['rechte'] == "nutzer") {
echo  "<body class='body' background='images/bild3.jpg'>";

//    always used menu
echo "<button style='float:right; margin-top:0.5%; margin-right:1%' class='abmeldebutton' onClick=\"window.location.href='scr_logout.php'\">abmelden »</button>";
$user = $_SESSION['user'];
echo "<h1 style='float:right; margin-top:0.7%; margin-right:2%' class='userloggedin'>$user</h1>";
echo "<h1 style='float:right; margin-top:0.7%; margin-right:3%' class='userloggedin'>|</h1>";


echo "<button style='float:right; margin-top:0.4%; margin-right:2%' class='menubutton' onClick=\"window.location.href='deleteuser.php'\">account löschen</button>";
echo "<button style='float:right; margin-top:0.4%; margin-right:2%px' class='menubutton' onClick=\"window.location.href='pwchange.php'\">passwort ändern</button>";

    //optional back button top left
echo "<button style='float:left; margin-top:0.4%; margin-left:-1%' class='menubutton' onClick=\"history.back();\">« zurück</button>";
}
?>
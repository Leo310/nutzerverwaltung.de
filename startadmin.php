<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
if ($_SESSION['rechte'] !== "admin") header("location:index.php");
 include("include/inc_htmlhead");
 include('include/inc_htmlkopfzeile.php');

?>
</body>
</html>

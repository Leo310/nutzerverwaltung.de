<?php

function OpenCon() {
    $dbhost = "localhost";
    $dbuser ="pi";
    $dbpass = "UqaL_173";
    $db = "nutzerverwaltung";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}

?>

<?php

function OpenCon() {
    $dbhost = "localhost";
    $dbuser ="pi"
    $dbpass = "UqaL_173"
    $db = "nutzerverwaltung"

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}

?>
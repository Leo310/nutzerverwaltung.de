//https://phpdelusions.net/pdo_examples/connect_to_mysql
<?php

function OpenCon() {
    $host = "localhost";
    $user ="pi";
    $pass = "UqaL_173";
    $db = "nutzerverwaltung";
    $charset = 'utf8mb4';

    $options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        $conn = new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $conn;
}

function CloseCon($conn){
    $conn -> null;
}

?>

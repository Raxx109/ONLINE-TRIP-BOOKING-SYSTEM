<?php

$host = '127.0.0.1';
$db = 'mactosystem';
$user = 'root';
$pass = '';
$port = '3306';
$charset = 'utf8mb4';


    function connect($host, $db, $user, $pass, $charset, $port) {
    try {
$dbz = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$options = [
    \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES     => false,
    ];
    return new \PDO($dbz, $user, $pass, $options);
} catch (\PDOException $e) {
    die($e->getMessage());
}
}

return connect($host, $db, $user, $pass, $charset, $port);
?>
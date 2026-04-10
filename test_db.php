<?php
$host = '127.0.0.1';
$port = '3309';
$db   = 'db_pertemuan3';
$user = 'root';
$pass = 'Gms041204#';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Connection successful!";
} catch (\PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}

<?php
$host = "localhost";
$user = "root";
$senha ="";
$dbname = "ecomerce";
$port = 3306;

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
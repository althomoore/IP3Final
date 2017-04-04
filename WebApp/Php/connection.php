<?php
define("DB_USER", "root");
define("DB_PASS", "");
$servername = "localhost";
$dbname = "mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo DB_USER . " is connected to " . $dbname;
} catch (PDOException $e) {
    echo "Connection Failed: <br />" . $e->getMessage();
}

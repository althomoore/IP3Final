<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Distributee</title>
</head>

<body>

<?php

define("DB_USER", "root");
define("DB_PASS", "");
$servername = "localhost";
$dbname = "mydb";

try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Connection Failed: " . $e -> getMessage();
}

$userId= (int)$_GET['userid'];
$documentId= (int)$_GET['documentId']; //Can't get this
echo $userId;
echo $documentId;

$query = $conn->prepare("DELETE FROM distributee_access WHERE (User_id = '$userId' AND Document_id = '$documentId')");
$query->execute();
$conn = null;
//header('Location: ../mainpage.php');

?>

</body>

</html>
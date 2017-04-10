<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Distributee</title>
</head>

<body>

<?php

session_start();

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

echo $userId;
echo $_SESSION['documentID'];

$query = $conn->prepare("DELETE FROM distributee_access WHERE (User_id = '$userId' AND Document_id = '{$_SESSION['documentID']}')");
$query->execute();
$conn = null;
header('Location: ../mainPage.php');

?>

</body>

</html>
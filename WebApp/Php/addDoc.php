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
    //echo "Connection Failed: " . $e -> getMessage();
}


$extn = $_POST['extension'];
$docTitle = $_POST['docTitle'] . $extn;
$authorId = $_POST['authorId'];
$comment = $_POST['comment'];
$fileURL = $_POST['fileUrl'];
$dire = '../file directory/';

$file = fopen($dire . $docTitle, 'w');


echo "All data has been received from the form";

$query = $conn->prepare("INSERT INTO document VALUES('','$authorId','$docTitle','$comment','$fileURL','draft','','')");
echo "Executing query...";
$query->execute();
echo "Query completed, data entered to database";
$conn = null;
header("Location: ../mainPage.php");
?>
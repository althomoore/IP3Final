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
$docTitle = $_POST['docTitle'];
$authorId = $_POST['authorId'];
$comment = $_POST['comment'];
$fileURL = $_POST['fileUrl'];
$dire = '../file directory/' . $docTitle . $extn .  '/';

if( is_dir($dire) === false ) {

    mkdir($dire);


    $file = fopen($dire . '/' . $docTitle . $extn, 'w');

    fclose($file);
}
else {

    if (glob($dir . "*.*") != false) {
        $filecount = count(glob($dire . "*.*"));

        $file = fopen($dire . '/' . $docTitle . $filecount . $extn, 'w');

        fclose($file);

    } else {
        $filecount = 1;
        $file = fopen($dire . $docTitle . $filecount . $extn, 'w');

        fclose($file);
    }
}
echo "All data has been received from the form";

$query = $conn->prepare("INSERT INTO document VALUES('','$authorId','$docTitle','$comment','$fileURL','draft','','')");
echo "Executing query...";
$query->execute();
echo "Query completed, data entered to database";
$conn = null;
header("Location: ../mainPage.php");
?>
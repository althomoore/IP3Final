<?php
session_start();
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
//$authorId = $_POST['authorId'];
$comment = $_POST['comment'];
$fileURL = $_POST['fileUrl'];
$dire = '../file directory/' . $docTitle . $extn .  '/';
$t = date('Y-m-d G:i:s');
$t1 = time();

$isDraft= 1;
if( is_dir($dire) === false ) {

    mkdir($dire);


    $file = fopen($dire . '/' . $docTitle . $extn, 'w');

    fclose($file);

    $query = $conn->prepare("INSERT INTO document VALUES('','{$_SESSION['userId']}','$docTitle','$comment','$dire','draft','','')");
    echo "Executing query...";
    $query->execute();
    echo "Query completed, data entered to database";
    $conn = null;
}
else {


    $file = fopen($dire . '/' . $docTitle . $t1 . $extn, 'w');

    fclose($file);

    $rdire = $dire . $docTitle .$t . $extn;
    $query2 = "SELECT document.id from document where document.name = '$docTitle'";
    foreach ($conn->query($query2) as $row) {


        $query = $conn->prepare("INSERT INTO revision VALUES('','{$row['id']}', '$isDraft', '$t', '$rdire' )");
        echo "Executing query...";
        $query->execute();

        echo "Query completed, data entered to database";

    }
    $conn = null;
}


header("Location: ../mainPage.php");
?>
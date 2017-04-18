<?php
include 'connection.php';

session_start();


$extn = $_POST['extension'];
$docTitle = $_POST['docTitle'];
//$authorId = $_POST['authorId'];
$comment = $_POST['comment'];
//$fileURL = $_POST['fileUrl'];
$dire = '../file directory/' . $docTitle . $extn . '/';
$t = date('Y-m-d G:i:s');


$t1 = time();

$isDraft = 1;
if (is_dir($dire) === false) {

    mkdir($dire);


    $file = fopen($dire . '/' . $docTitle . $extn, 'w');

    fclose($file);

    $query = $conn->prepare(/** @lang sql */
        "INSERT INTO document VALUES('','{$_SESSION['userId']}','$docTitle','$comment','$dire','draft',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
    echo "Executing query... <br>";
    $query->execute();
    echo "Query completed, data entered to database <br>";
    $conn = null;
} else {

//CHANGE IS HERE
    $i = 0;
    $dir = $dire;
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false) {
            if (!in_array($file, array('.', '..')) && !is_dir($dir . $file))
                $i++;
        }
    }
    echo "FileURL: " . $fileURL . "<br>";
    echo "count: " . $i . "<br>";

    $file = fopen($dire . '/' . $docTitle . $i . $extn, 'w');

    fclose($file);


    $rdire = $dire . $docTitle . $i . $extn;
    $query2 = /** @lang sql */
        "SELECT document.id from document where document.name = '$docTitle'";
    foreach ($conn->query($query2) as $row) {


        $query = $conn->prepare(/** @lang sql */
            "INSERT INTO revision VALUES('','{$row['id']}', '$isDraft', CURRENT_TIMESTAMP, '$rdire' )");
        echo "Executing query... with: " . $row['id'] . "...<br>";
        $query->execute();

        //echo "Query completed, data entered to database <br>";

    }
    $conn = null;
}


header("Location: ../mainPage.php");
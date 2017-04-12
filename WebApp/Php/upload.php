<?php
$target_dir = "../file directory/";
$target_file = "../file directory/" . basename($_FILES["fileToUpload"]["name"]);
$target_upload = "../file directory/" . basename($_FILES["fileToUpload"]["name"]) . '/';
$fileName= basename($_FILES ["fileToUpload"] ["name"]);

$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

$dire = $target_dir . $target_file . '/';
$t = time();
$isDraft = 1;
$authorId = 1;

if(isset($_POST["submit"])) {


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


// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($fileType != "doc" && $fileType != "txt" && $fileType != "xlsx"
        && $fileType != "gdoc" && $fileType != "html" && $fileType != "php" && $fileType != "css" && $fileType != "sql"
        && $fileType != "docx" && $fileType != "pdf"
    ) {
        echo "Sorry, only doc, txt, xlsx, gdoc, html, php, css, sql, pdf & docx files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0)
        echo "Sorry, your file was not uploaded.";

    if (is_dir($dire) === false) {
        mkdir($dire);


        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$dire  $fileName")) {
            $query = $conn->prepare("INSERT INTO document VALUES('','$authorId','$fileName','','$dire','draft',CURRENT_TIMESTAMP,'')");
            echo "Executing query...";
            $query->execute();
            echo "Query csompleted, data entered to database";
            $conn = null;

        } elseif (is_dir($dire) === true) {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$dire $t  $fileName")) {

                $rdire = $dire . $fileName . $fileType . $t;
                $query2 = "SELECT document.id from document where document.name = '$fileName'";
                foreach ($conn->query($query2) as $row) {


                    $query = $conn->prepare("INSERT INTO revision VALUES('','{$row['id']}', '$isDraft', '$t', '$rdire')");
                    echo "Executing query...";
                    $query->execute();

                    echo "Query completed, data entered to database";


                }
            }
        }
    }

    header("Location: ../mainPage.php");
    $conn = null;
}


?>
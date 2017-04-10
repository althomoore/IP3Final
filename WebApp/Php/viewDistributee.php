<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/stylesheet.css">
</head>

<body>

<?php
session_start();
$docId = (int)$_GET['documentId'];
echo "<h4 style='padding-left: 20px;'> Distributees for document:" . $docId . "</h4>";
?>

<a href="../mainPage.php"><button class="btn medium error">Return</button></a>
<table id="mainTable">
    <thead>
    <th>User Id</th>
    <th>Username</th>
    <th>Delete</th>
    </thead>

    <?php
    //session_start();
    define("DB_USER", "root");
    define("DB_PASS", "");
    $servername = "localhost";
    $dbname = "mydb";

    $docId = (int)$_GET['documentId'];
    $_SESSION['documentID'] = $docId;
    try {
        $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection Failed: " . $e -> getMessage();
    }
    $query= "SELECT document.id, user.id, user.username FROM distributee_access
             INNER JOIN user ON
             user.id=distributee_access.User_id
             INNER JOIN document ON
             document.id=distributee_access.Document_id
             WHERE document.id = '$docId'";
    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['username'] . " </td>
                 <td><button class='btn small primary'><a class ='buttonAnchor' href=\"deleteDistributee.php?userid=".$row['id']."\">Delete</a></button></td>
                </tr>
            ";
    }
    ?>
    </table>
</body>
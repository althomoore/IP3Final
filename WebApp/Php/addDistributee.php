<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/stylesheet.css">
</head>

<body>
<a href="../mainPage.php"><button class="btn medium error">Return</button></a>


<form id='Select User' method='post'
      accept-charset='UTF-8'>
    <label for='userId' >Enter id of distributee to be added*:</label>
    <input type='text' name='userId' id='userId' maxlength="30" />
    <input type='submit' name='submit' value='Submit' />
</form>
</body>


<table id="mainTable">
    <caption>User List</caption>
    <thead>
    <td>User Id</td>
    <td>Username</td>
    </thead>
<?php

define("DB_USER", "root");
define("DB_PASS", "");
$servername = "localhost";
$dbname = "mydb";


session_start();

try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo DB_USER . " is connected to " . $dbname;
} catch(PDOException $e) {
    echo "Connection Failed: " . $e -> getMessage();
}

$query= "SELECT * FROM user WHERE isActive='1'";
foreach ($conn->query($query) as $row) {
    echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['username'] . " </td>
                </tr>
            ";
}


//FOR USE WITH BUTTON
//$documentId = $_POST['documentId']
//$userId = $_POST['userId']




If($_POST){
    $documentId = (int)$_GET['documentId'];
    $userId = $_POST['userId'];
    $_SESSION['notify-userId'] = $userId;
    $_SESSION['notify-documentId'] = $documentId;
    $query=$conn->prepare("INSERT INTO distributee_access VALUES('$documentId','$userId')");
    echo "Executing query...";
    $query->execute();
    $conn = null;
    echo "Added distributee $userId to document $documentId";
    echo "<br> " . $_SESSION['notify-userId'];
    header('Location: ../Php/notify.php');
}

?>




</html>
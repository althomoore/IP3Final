<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

<table id="List of Users">
    <thead>
    <td>User Id</td>
    <td>Username</td>
    </thead>

<form id='Select User' method='post'
      accept-charset='UTF-8'>
    <label for='userId' >UserId*:</label>
    <input type='text' name='userId' id='userId' maxlength="30" />
    <input type='submit' name='submit' value='Submit' />
</form>
</body>

<?php

define("DB_USER", "root");
define("DB_PASS", "");
$servername = "localhost";
$dbname = "mydb";




try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo DB_USER . " is connected to " . $dbname;
} catch(PDOException $e) {
    echo "Connection Failed: " . $e -> getMessage();
}




$query= 'SELECT * FROM user';
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
    $query=$conn->prepare("INSERT INTO distributee_access VALUES('$documentId','$userId')");
    echo "Executing query...";
    $query->execute();
    $conn = null;
    echo "Added distributee $userId to document $documentId";
    header('Location: ../mainPage.php');
}

?>




</html>
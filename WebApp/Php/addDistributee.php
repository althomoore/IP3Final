<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Distributee</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="SCSS/stylesheet.css">
    <link rel="stylesheet" href="SCSS/partials/modal.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet" href="SCSS/partials/sideNav.css">
    <link rel="stylesheet" href="SCSS/partials/testing.css">

    <link rel="javascript" href="Javascript/javascript.js">

    <script type="text/javascript" src="https://use.fontawesome.com/2f9bccd1c4.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="Javascript/dropdown.js"></script>
    <script type="text/javascript" src="Javascript/sideNav.js"></script>
</head>

<body>

<table id="List of Users">
    <thead>
    <td>User Id</td>
    <td>Username</td>
    <td>Delete</td>
    </thead>

<form id='Select User' method='post'
      accept-charset='UTF-8'>
    <label for='userId' >UserId*:</label>
    <input type='text' name='userId' id='userId' maxlength="30" />
    <input type='submit' name='Submit' value='Submit' />
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

$documentId = (int)$_GET['documentId'];
$userId = $_POST['userId'];
$query=$conn->prepare("INSERT INTO distributee_access VALUES('$documentId','$userId')");
echo "Executing query...";
$query->execute();
echo "Query completed, data entered to database";
$conn = null;
echo "Add a distributee for document: " . $documentId . "<br>";
?>




</html>
<?php

include 'connection.php';

$username = $_POST['username'];
$message = "This user: " . $username . " needs their password reset, go to admin page to edit user details.";

$query = "SELECT * FROM user WHERE isAdmin = '1'";
foreach ($conn->query($query) as $row) {
    $userId = $row['id'];
    $query2 = $conn->prepare("INSERT INTO notification VALUES('','$userId','$message')");
    $query2->execute();
}
$conn = null;
header("Location: ../index.php");


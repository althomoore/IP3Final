<?php

include 'connection.php';
session_start();

$userId = $_GET['userId'];
$_SESSION['notify-userId'] = $userId;

$query=$conn->prepare("INSERT INTO distributee_access VALUES('{$_SESSION['distDocId']}','$userId')");
echo "Executing query...";
$query->execute();
echo "<br> " . $_SESSION['notify-userId'];
$conn = null;
header('Location: ../Php/notify.php');
